<?php

namespace Common\Controller;

use Think\Controller;

/**
 * 基类控制器，所有控制器都得继承
 * 
 */
class BaseController extends Controller {

	/**
	 * 当前对象模型
	 * @var object
	 * @author smh
	 */
	protected $model = null;

	/**
	 * 操作的表名
	 * @var string
	 */
	protected $_tableName;

	/**
	 * 构造函数
	 */
	protected function _initialize()
	{
       // echo md5(sha1('123456') . 'Q{Da%[_T/)f1pEJ2+jh}-]vnKI$X`l&V4W"mdeoH');exit;
		/* 读取站点配置 */
        $config = api('Config/lists');
        
        C($config); //添加配置

        if(!C('WEB_SITE_CLOSE')){
            $this->error( '站点已经关闭，请稍后访问~' );
        }


        // 判断是否有指定的模型
		if( empty( $this->_tableName) )
			$this->_tableName = CONTROLLER_NAME;	// 没有则等与当前控制器名称

		$this->model = D( $this->_tableName );
		
		if( ! defined('PRE') ) define('PRE', C('DB_PREFIX'));	//表前缀

		if( ! defined('USID') ) define('USID', session('user_auth.uid') );

	}

	/**
	 * 首页
	 * @author smh
	 */
	public function index() {

		$map = array(
			'model' => null,    // 模型
			'where' => array(), // 条件
			'order' => '',      // 排序
			'field' => '*',     // 字段
			'page'  => 10       // 条数
		);

		// _data 手动设置参数
		if( method_exists( $this, 'needIndexWhere' ) )
			$this->needIndexWhere( $map );

		list( $_list, $_page, $_count ) = $this->_data( $map['model'], $map['where'], $map['order'], $map['field'], $map['page'] );

		$this->assign( compact( '_list', '_page', '_count' ) );
		
		$this->display();
	}


	/**
	 * 删除操作
	 * @param object $model 
	 * @param array $where 
	 * @return mixed 
	 */
	public function destory( $model = null, $where = null )
	{
		// 获取数据库模型
		if( is_null( $model ) )
			$model = $this->model;
		else if( is_string ( $model ) )
			$model = D( $model );


		// 判断是否没有条件
		if( is_null( $where ) or 0 >= count( $where ) )
		{
			// 获取主键
			$pk  = $model->getPk();
			// 设置条件
			$where[ $pk ] = I("{$pk}", 0 , 'intval');
		}

		$url = I( 'jumpurl', $_SERVER['HTTP_REFERER'] );

		if( empty( $where ) )
		{
			$this->error( '没有删除条件哦~' , $url );
		}	

		$vo = $model->where( $where )->find();

		if( empty( $vo ) )
		{
			$this->error( '没有数据~', $url );
			return false;
		}

		// 删除数据
		$affectNumber = $model->destory( $where );
		
		// 判断是否成功
		if( $affectNumber )
		{
			if( method_exists( $this, '_delete_callback') )
				$this->_delete_callback( $vo );

			$this->success( '删除成功', $url );
		} else {
			#TODO : 错误日志
			$this->error( '删除失败', $url );
		}
	}

	/**
	 * 修改添加页面
	 * @author smh
	 */
	public function edit()
	{
		// 数据数据库主键
		$pk = $this->model->getPk();

		// 判断如果没有主键则是添加页面
		$fieldValue = I("{$pk}");

		$map[ $pk ] = $fieldValue;

		if( !empty( $map ) && method_exists( $this, 'needEditWhere') )
			$this->needEditWhere( $map );

		if( !empty( $map ) )
			$this->vo = $this->model->where( $map )->find();

		// 查看是否需要在添加其他数据
		if( method_exists( $this, 'insertData' ) )
			$this->insertData();

		// 输出页面
		$this->display();

	}

	/**
	 *	添加 | 修改 操作
	 *	如果有 id 值存在 则表明是 修改 否则是添加
	 *	@param array $input 添加 或 修改的数据 留空则取表单
	 *	@param array $where 修改的条件
	 */
	public function save( $input = null, $where = array() )
	{
		# code...
		// 判断是否有预设值 没有则取表单
		if( is_null( $input) )
			$input = I('post.');
		$data  = $this->model->create( $input );	// 创建数据
		
		$pk = $this->model->getPk();

		$url = I( 'jumpurl', $_SERVER['HTTP_REFERER'] );


		// 查看是否成功
		if( $data )
		{
			// 判断是添加还是修改
			if( empty( $data[$pk] ) && empty( $where ) ) {
				
				$id = $this->model->add();  // 添加
				// 提示消息
				$msg = array('success'=>'添加成功','error'=>'添加失败');

			} else {
				if( empty( $where ) ) {
					$this->error( '没有修改条件哦~', $url );
					return false;
				} else {
					$id = $this->model->where($where)->save();	// 修改
				}
				// 提示消息
				$msg = array('success'=>'更新成功','error'=>'更新失败');
			}

			// 判断是否操作不成功
			if( false === $id )
			{
				#TODO ：错误日志
				$this->error( $this->model->getError() ? :$msg['error'] );
				return false;
			}

			// 查看是否有回调函数
			if( method_exists( $this, '_insert_callback') && empty( $data[$pk] ) )
				$this->_insert_callback( $id );

			if( method_exists( $this, '_update_callback') && !empty( $data[$pk] ) )
				$this->_update_callback( $data );

			if( !empty( $data[$pk]) && 0 === $id )
				$this->success( '您没有做任何修改哦~' , $url );
			else
				$this->success( $msg['success'], $url );
			
		} else {

			// 输出错误信息
			$this->error( $this->model->getError() ? : '操作失败~' );
		}
	}

	/**
	 * 搜索
	 * TODO 
	 * @return array
	 * @author smh
	 */
	protected function _search() {

		if( method_exists( $this, 'set_search_field') ) {

			$fields = $this->set_search_field();

		} else {

			$fields = $this->model->getAllField();
		}


		return $searchData;
	}

	/**
	 * 获取列表
	 * @access protected
	 * @param string | object $model 要操作的模型
	 * @param array     	  $where 数据条件	
	 * @param string          $order 排序 
	 * @param string | array  $field 获取的字段
	 * @param int    		  $page  页大小,要是小于等于1的话就是取单条数据
	 * @return array 
	 * @author smh
	 */

	protected function _data( $model = null, $where = array(), $order = null, $field = true, $page = 10 )
	{
		// 获取数据库模型
		if( is_null( $model ) )
			$model = $this->model;
		else if( is_string ( $model ) )
			$model = D( $model );

		// 获取查询表达式
		$options = $this->getOptions( $model );
		
		// 搜索的条件
		
		// $searchData = $this->_search();
				
		// 将条件合并
		$options['where'] = array_merge( $where, (array) $options['where'] );
		
		// 判断是否是取数据列表还是单条数据
		if( 1 < $page ) {
			
			// 获取条数
			$count = $model->where( $options['where'] )->count();
			
			if( 1 > $count ) return array();
			
			$Page = new \Think\Page( $count, C('PAGE_SIZE') );

			$Page->setConfig('prev','上一页');
			$Page->setConfig('next','下一页');
			$options['order'] = $order;
			
			$model->setProperty( 'options', $options );
			
			$list = $model->field( $field )->where($where)->limit( $Page->firstRow, $Page->listRows )->select();
			
			$return = array( $list, $Page->show(), $count );
			
			return $return;

		} else {

			$model->setProperty( $options, 'options' );

			return $model->field( $field )->find();
		}
	}


	/**
	 * 修改指定字段
	 * @access protected
	 * @param object | string $model
	 * @param array  		  $where
	 * @param string 		  $field
	 * @param string    	  $value
	 * @return bool
	 * @author smh
	 */
	protected function editRow( $model = null, $where, $field, $value )
	{
		// 获取数据库模型
		if( is_null( $model ) )
			$model = $this->model;
		else if( is_string ( $model ) )
			$model = D( $model );

		$data [ $field ] = $value;

		if( $model->create( $data) )
			if( $model->where( $where )->save() )
				return true;
		return false;
	}

	/**
	 * 获取查询表达式
	 * @param object
	 * @return array
	 * @author smh
	 */
	final protected function getOptions( $model )
	{
		if( ! is_object( $model ) ) return false;

		// 反射当前模型，获取options
		$OPT        =   new \ReflectionProperty( $model, 'options' );

        $OPT->setAccessible(true);

        // 获取表达式
        $options = (array) $OPT->getValue( $model );

        return $options;
	}


	/**
	 * 空操作，用于输出404页面
	 * @param string $action 操作的方法名
	 * @return void
	 * TODO : 记录错误地址
	 * @author smh
	 */
	final public function _empty( $action ){

		$this->redirect('Home/Index/index');
	}
}
 ?>
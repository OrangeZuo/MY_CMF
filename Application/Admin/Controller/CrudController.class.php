<?php
/**
 * @description 通用增删改查
 *                使用时传入两个，一个是$this->model，一个是$this->model_title
 * @Author: eecjimmy
 * @CreateTime: 14-11-8 下午3:19
 */

namespace Admin\Controller;


class CrudController extends AdminController
{

    protected $model;

    protected $model_title; // 用户后台增删改查时的显示标题

    protected static $where;

    /**
     * @var string 调用模版前缀
     */
    protected $templatePrefix = '';

    public function _initialize()
    {
        parent::_initialize();
        if ((!isset($this->model)) || !(is_object($this->model))) $this->error('请先指定模型');
        if ((!isset($this->model_title))) $this->error('请先指定模型标题');
    }

    public function index()
    {
        if( empty(self::$where) ){
            $list = $this->lists($this->model);
        }else{
            $list = $this->lists($this->model, self::$where, 'id desc',[], true);
        }
        $this->assign('list', $list);
        $this->assign('meta_title', $this->model_title . '管理');
        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        self::$where = [];
        $this->display($this->templatePrefix.'index');
    }

    public function add()
    {
        $this->assign('meta_title', $this->model_title . '添加');
        $this->display($this->templatePrefix.'edit');
    }

    public function edit($id)
    {
        $info = $this->model->find($id);
        if (!$info) $this->error('没有找到这个' . $this->model_title);
        $this->assign('info', $info);
        $this->assign('meta_title', $this->model_title . '编辑');
        $this->display($this->templatePrefix.'edit');
    }

    public function update()
    {
        if (IS_POST) {
            /**
             * update 前置操作
             */
            if (method_exists($this, 'updateBefore')) {
                $this->updateBefore();
            }
            $method = $_POST[$this->model->getPk()] ? 'save' : 'add';
            if ($this->model->create()) {
                if ($this->model->$method() !== false) {
                    $this->success('操作成功', U('index'));
                } else {
//                    logs($this->model->getDbError());
                    $this->error('未知错误');
                }
            } else {
                $this->error($this->model->getError());
            }
        } else {
            $this->error('错误的来路');
        }

    }

    public function del()
    {
        $ids = array_unique(array_merge(array($_REQUEST['id']), (array)$_REQUEST['ids']));
        if (empty($ids))
            $this->error('请选择删除数据');
        $where['id'] = array('in', implode(',', $ids));

        $result = $this->model->where($where)->delete();
        if ($result !== false) {
            $this->success('成功删除' . $result . '条' . $this->model_title);
        } else {
            $this->error('删除' . $this->model_title . '失败');
        }
    }

    /*修改字段*/
    public function setfield()
    {
        $model = $this->model;

        $data = I('post.');  
        if( empty($data) ){
            $data = I('get.');
            if(empty($data)){
                $this->error('没有任何修改内容');
            }
        }
        $data = $model->create($data);
        if( $data ){
            if( $model->save( $data ) !== false ) {
                $this->success('修改成功');
            } else {
                $this->error('修改失败');
            }
        }else{
            $this->error( $model->getError() );
        }
        
    }
} 
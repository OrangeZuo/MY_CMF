<?php
// +----------------------------------------------------------------------
// | 齐力众信
// +----------------------------------------------------------------------
// | htto://www.qlzhx.com
// +----------------------------------------------------------------------
// | Author: 苏明煌  < qq23025079@126.com >
// +----------------------------------------------------------------------


namespace Addons\Upload;
use Common\Controller\Addon;

/**
 * 上传插件
 * @time 2014-09-19
 */
class UploadAddon extends Addon
{
	# 信息
	public $info = array(
		'name'=>'Upload',
		'title'=>'上传插件',
		'description'=>'方便上传',
		'status'=>1,
		'author'=>'guiguoershao@163.com',
		'version'=>'0.2'
	);
	
	
	// 判断是否加载过
	static private $is_load = 0;

	public function showUpload( $param )
	{

		list( $name, $value, $uploadUrl ) = $param;

		if( empty( $value ) )
			$value = 0;

		if( empty( $uploadUrl ) )
			$uploadUrl = "Home/File/uploadPicture";

		// 判断允许的类型
		if( empty( $param['allow']) ) {
			$type = 'image';
			$allow = $this->c( $type );
			$button_name = $this->c( $type.'_name' );

		} else {
			$type = $param['allow'];
			$allow = $this->c( $type );
			$button_name = $this->c( $type.'_name' );
		}
		
		/*
		 * 一个页面调用多次，只加载一次js
		 */
		$load = ++ self::$is_load;

		$this->assign( compact( 'load', 'name', 'value', 'uploadUrl','allow','button_name','type' ) );

		$this->display('showUpload');
	}


	private function c( $key='' )
	{
		$config = include $this->config_file;

		if( '' !== $key && isset( $config[$key] ) ) {
			return $config[$key];
		} else {
			return $config;
		}
	}

	# 安装
	public function install ()
	{
		$model = M('hooks');
		
		$add = array(
			'name' => 'showUpload',
			'description' => '上传组件',
			'type' => '1',
			'update_time' => NOW_TIME,
			'addons' => 'Upload'
			
		);
		
		$install = $model->add($add);
			
		return $install;
	}
	
	# 卸载
	public function uninstall ()
	{
		
		$model = M('hooks');
		
		$uninstall = $model->where( array('name'=>'showUpload', 'addons'=>'Upload') )->delete();
		
		return $uninstall;
	}

}
 ?>
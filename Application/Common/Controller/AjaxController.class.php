<?php 
namespace Common\Controller;
/**
 * 基本的Ajax 操作
 * @author smh
 */
class AjaxController extends BaseController {

	// 构造函数  
	protected function _initialize()
	{
		// 判断是否使用 ajax 请求
		if( !IS_AJAX ) return false;

		parent::_initialize();
	}

}
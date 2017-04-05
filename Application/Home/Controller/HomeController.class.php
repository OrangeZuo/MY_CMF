<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 鬼国二少 <guiguoershao@163.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use Think\Controller;
use Think\Model;

/**
 * 前台公共控制器
 * 为防止多分组Controller名称冲突，公共Controller名称统一使用分组名称
 */
class HomeController extends Controller {

    protected $nav;
    protected $logo;
    protected $title;
    protected $tel;
	/* 空操作，用于输出404页面 */
	public function _empty(){
		$this->redirect('Index/index');
	}


    protected function _initialize(){
	    // nav导航

        $Channel = new \Home\Model\ChannelModel();
        $this->nav      = $Channel->lists();
        $this->logo     = D('document')->where('status = 1 and category_id = 5')->find();
        $this->title    = D('document')->where('status = 1 and category_id = 7')->find();
        $this->tel      = D('document')->where('status = 1 and category_id = 8')->find();

        /* 读取站点配置 */
        $config = api('Config/lists');
        C($config); //添加配置

        if(!C('WEB_SITE_CLOSE')){
            $this->error('站点已经关闭，请稍后访问~');
        }
    }

//	/* 用户登录检测 */
//	protected function login(){
//		/* 用户登录检测 */
//		is_login() || $this->error('您还没有登录，请先登录！', U('User/login'));
//	}

}

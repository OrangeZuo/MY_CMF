<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 鬼国二少 <guiguoershao@163.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index(){
        parent::_initialize();
        $logo   = D('document')->where('status = 1 and category_id = 5')->find();
        $title  = D('document')->where('status = 1 and category_id = 7')->find();
        $tel    = D('document')->where('status = 1 and category_id = 8')->find();
        $banner = D('document')->where('status = 1 and category_id = 6')->select();
        $run1   = D('document')->where('status = 1 and category_id = 10')->select();

        $this->assign('nav',$this->nav);    // nav导航
        $this->assign('title',$title);      // title
        $this->assign('logo',$logo);        // logo
        $this->assign('tel',$tel);          // 400tel
        $this->assign('banner',$banner);    // banner
        $this->assign('run1',$run1);        // 滚动小图


        var_dump($run1);
        die();




//        var_dump($banner);
//        die();





        $category = D('Category')->getTree();
        $lists = D('Document')->lists(null);

        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('page',D('Document')->page);//分页


        $this->display();
    }

}
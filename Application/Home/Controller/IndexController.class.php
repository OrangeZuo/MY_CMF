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

        $banner       = D('document')->where('status = 1 and category_id = 6')->select();
        $run_small    = D('document')->where('status = 1 and category_id = 10')->select();
        $advertise1   = D('document')->where('status = 1 and category_id = 11')->find();
        $advertise2   = D('document')->where('status = 1 and category_id = 12')->find();
        $advertise3   = D('document')->where('status = 1 and category_id = 13')->find();
        $run_big      = D('document')->where('status = 1 and category_id = 14')->select();
        $run_big_t    = D('category')->where('id = 14')->find();
        $problem      = D('document')->where('status = 1 and class = "problem"')->select();
        $case         = D('document')->where('status = 1 and class = "case"')->limit('2')->order('update_time desc')->select();
        $new          = D('document')->where('status = 1 and class = "new"')->limit('8')->order('update_time desc')->select();
        $new_first    = $new[0];
        unset($new[0]);
        $about_pic_s  = D('document')->where('status = 1 and category_id = 31')->select();
        $about_pic_b  = D('document')->where('status = 1 and category_id = 30')->find();
        $about_art    = D('document')->where('status = 1 and category_id = 9')->find();
        $introduce    = D('document_article')->alias('a')->join('onethink_document as d on d.id = a.id')->where('d.status = 1 and d.category_id = 32')->limit('6')->select();
        $brandTitle   = D('category')->where('id = 21')->find();
        $brand        = D('category')->where('status = 1 and pid = 21')->select();
        $promise      = D('document')->where('status = 1 and category_id = 2')->select();
        $promise_pic  = D('document')->where('status = 1 and category_id = 33')->find();
        $problem_t    = D('category')->where('id = 28')->find();



        $this->assign('banner',$banner);           // banner
        $this->assign('run_small',$run_small);     // 滚动小图
        $this->assign('advertise1',$advertise1);   // 广告1
        $this->assign('advertise2',$advertise2);  // 广告2
        $this->assign('advertise3',$advertise3);  // 广告3
        $this->assign('run_big',$run_big);        // 滚动大图
        $this->assign('run_big_t',$run_big_t);    // 滚动大图标题
        $this->assign('problem',$problem);        // 常见问题
        $this->assign('problem_t',$problem_t);    // 常见问题标题
        $this->assign('case',$case);              // 成功案例
        $this->assign('new',$new);                // 最新动态
        $this->assign('new_first',$new_first);          // 最新动态
        $this->assign('about_pic_s',$about_pic_s); // 关于我们小图片
        $this->assign('about_pic_b',$about_pic_b); // 关于我们大图片
        $this->assign('about_art',$about_art);     // 关于我们文章
        $this->assign('introduce',$introduce);    // 6片简介小段
        $this->assign('brandTitle',$brandTitle);  // 挖机分类
        $this->assign('brand',$brand);            // 分类列表
        $this->assign('promise',$promise);        // 维修承诺文
        $this->assign('promise_pic',$promise_pic);// 维修承诺图
//        var_dump($new_first);
//        die();

        $this->display();
    }

}
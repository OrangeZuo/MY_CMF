<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 鬼国二少 <guiguoershao@163.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;

/**
 * 文档模型控制器
 * 文档模型列表和详情
 */
class BrandController extends HomeController {

    protected $banner = [27,44,45,49,53,57,61,65];
    protected $seo    = [26,43,48,50,54,58,62,66];
    protected $case   = [24,41,46,52,56,60,63,69];
    protected $new    = [25,42,47,51,55,58,64,67];
    /* 文档模型频道页 */
    public function index(){
        parent::_initialize();
        $get = I('get.id');
        $this->assign('nav',$this->nav);           // nav导航
        $this->assign('title',$this->title);       // title
        $this->assign('logo',$this->logo);         // logo
        $this->assign('tel',$this->tel);           // 400tel


        $list = D('category')->where("status = 1 and pid = $get")->select();
        foreach ($list as $item){

            $id = $item['id'];
           if(in_array($id,$this->banner)){
               $banner = D('document')->where("status = 1 and category_id = $id")->find(); //banner
           }elseif (in_array($id,$this->seo)){
               $seo    = D('document')->where("status = 1 and category_id = $id")->find(); //三要素
           }elseif (in_array($id,$this->case)){
               $case   = D('document')->where("status = 1 and category_id = $id")->limit('2')->order('update_time desc')->select(); //成功案例
           }elseif (in_array($id,$this->new)){
               $new    = D('document')->where("status = 1 and category_id = $id")->limit('8')->order('update_time desc')->select(); //最新动态
               $new_first    = $new[0];
               unset($new[0]);
           }

        }
        $brand        = D('category')->where('status = 1 and pid = 21')->select();         // 分类列表
        $brandTitle   = D('category')->where('id = 21')->find();                           // 头部
        $this->assign('brandTitle',$brandTitle);
        $this->assign('brand',$brand);
        $this->assign('banner',$banner);
        $this->assign('seo',$seo);
        $this->assign('new_first',$new_first);
        $this->assign('new',$new);
        $this->assign('case',$case);
        $this->display('index');
    }


}

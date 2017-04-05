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





    /* 文档模型频道页 */
    public function index(){
        parent::_initialize();
        $get = I('get.id');

        var_dump($get);
        die();

        $this->assign('nav',$this->nav);           // nav导航
        $this->assign('title',$this->title);       // title
        $this->assign('logo',$this->logo);         // logo
        $this->assign('tel',$this->tel);           // 400tel







        /* 分类信息 */
        $category = $this->category();
        //频道页只显示模板，默认不读取任何内容
        //内容可以通过模板标签自行定制

        /* 模板赋值并渲染模板 */
        $this->assign('category', $category);
        $this->display($category['template_index']);
    }

    /* 文档分类检测 */
    private function category($id = 3){
        /* 标识正确性检测 */
        $id = $id ? $id : I('get.id', 0);
        if(empty($id)){
            $this->error('没有指定文档分类！');
        }


        /* 获取分类信息 */
        $category = D('Category')->info($id);
        if($category && 1 == $category['status']){
            switch ($category['display']) {
                case 0:
                    $this->error('该分类禁止显示！');
                    break;
                //TODO: 更多分类显示状态判断
                default:
                    return $category;
            }
        } else {
            $this->error('分类不存在或被禁用！');
        }
    }

}

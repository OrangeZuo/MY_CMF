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

     public static function getTitle($id)
     {
         $title = D('category')->where("id = 70 and status = 1")->find();
         return $title['name'];
     }

    //首页
    public function index() {
            parent::_initialize();
            $banner       = D('document')->where('status = 1 and category_id = 6')->select();
            $run_small    = D('document')->where('status = 1 and category_id = 10')->select();
            $advertise1   = D('document')->where('status = 1 and category_id = 11')->find();
            $advertise2   = D('document')->where('status = 1 and category_id = 12')->find();
            $advertise3   = D('document')->where('status = 1 and category_id = 13')->find();
            $run_big      = D('document')->where('status = 1 and category_id = 14')->select();
            $run_big_t    = D('category')->where('id = 14')->find();
            $back         = D('document')->where('status = 1 and category_id = 79')->find();
            $problem      = D('document')->where('status = 1 and class = "changjianwenti"')->select();
            $case         = D('document')->where('status = 1 and class = "anli"')->limit('2')->order('update_time desc')->select();
            $new          = D('document')->where('status = 1 and class = "zixun"')->limit('8')->order('update_time desc')->select();
            $product      = D('document')->where('status = 1 and class = "chanpin"')->limit('6')->order('update_time desc')->select();

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
            $promise_pic_s  = D('document')->where('status = 1 and category_id = 80')->find();
            $problem_t    = D('category')->where('id = 28')->find();
            $keyword      = explode(',',C('INDEX_KEYWORDS'));
            $this->assign('banner',$banner);           // banner
            $this->assign('run_small',$run_small);     // 滚动小图
            $this->assign('advertise1',$advertise1);   // 广告1
            $this->assign('advertise2',$advertise2);   // 广告2
            $this->assign('advertise3',$advertise3);   // 广告3
            $this->assign('run_big',$run_big);         // 滚动大图
            $this->assign('run_big_t',$run_big_t);     // 滚动大图标题
            $this->assign('problem',$problem);         // 常见问题
            $this->assign('problem_t',$problem_t);     // 常见问题标题
            $this->assign('case',$case);               // 成功案例
            $this->assign('new',$new);                 // 最新动态
            $this->assign('product',$product);         // 产品展示图
            $this->assign('new_first',$new_first);     // 最新动态
            $this->assign('about_pic_s',$about_pic_s); // 关于我们小图片
            $this->assign('about_pic_b',$about_pic_b); // 关于我们大图片
            $this->assign('about_art',$about_art);     // 关于我们文章
            $this->assign('introduce',$introduce);     // 6片简介小段
            $this->assign('brandTitle',$brandTitle);   // 挖机分类
            $this->assign('brand',$brand);             // 分类列表
            $this->assign('promise',$promise);         // 维修承诺文
            $this->assign('promise_pic',$promise_pic); // 维修承诺图
            $this->assign('promise_pic_s',$promise_pic_s); // 维修承诺小图
            $this->assign('keyword',$keyword);         // 搜索关键词
            $backimg = get_cover($back['cover_id'])['path'];
            $this->assign('back',$backimg);               // 优势背景图
            $this->display('index');

//            parent::buildHtml('index_html.html', C(INDEX_HTML_FILE), 'index');
//            if((C(INDEX_HTML_FILE).'index_html.html')){

//            }else{
//                $this->display('index_html');
//            }


    }

//
//    public function yzm()
//    {
//        $Verify = new \Think\Verify();
//        $Verify->fontSize = 20;        //字体大小
//        $Verify->length   = 3;        //显示字符数
//        $Verify->fontttf = "5.ttf";            //定义字体
//        //$Verify->useImgBg = true;         //定义背景图
//        $Verify->useZh = true;         //启用中文验证码（必须引入中文字体文件）
//        $Verify->fontttf = "simhei.ttf";    //显示的中文字体类型
//        $Verify->entry();
//    }
    /**
     *
     * 验证码生成
     */
    public function verify_c(){
        $Verify = new \Think\Verify();
        $Verify->fontSize = 14;
        $Verify->length   = 4;
        $Verify->useNoise = false;
        $Verify->codeSet = '0123456789';
        $Verify->imageW = 130;
        $Verify->imageH = 30;
        //$Verify->expire = 600;
        $Verify->entry();
    }

    public function upMessage()
    {
        $tel = I('post.tel');
        $name = I('post.name');
        $add = I('post.add');
        $mail = I('post.mail');
        $information = I('post.information');
        $data = "电话:$tel <br/>
                姓名:$name <br/>
                地址:$add <br/>
                邮箱:$mail <br/>
                信息:$information ";
        $message = [
            'uid'=>1,
            'title'=>'用户反馈',
            'category_id'=>114,
            'description'=>"用户反馈",
            'model_id'=>2,
            'type'=>2,
            'display'=>1,
            'update_time'=>time(),
            'create_time'=>time(),
            'status'=>1,
            ];
        $code = I('post.code');
        $verify = new \Think\Verify();
        $check_verify = $verify->check($code);
        if(!$check_verify){
            echo 0;
        }else{
            $info = D('document')->add($message);
            if($info){
                $info2 = D('document_article')->add(['id'=>$info, 'content'=>$data]);
                if($info2){
                    echo 1;
                }else{
                    echo 2;
                }
            }
        }
}
}
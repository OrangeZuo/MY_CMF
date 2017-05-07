<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en">
<head>
	<html>
<meta charset="UTF-8">
<meta charset="utf-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<meta name="keywords" content="<?php echo C('WEB_SITE_KEYWORD');?>" />
<meta name="description" content="<?php echo C('WEB_SITE_DESCRIPTION');?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<script src="/Public/Home/js/banner.js" type="text/javascript"></script>
<script type="text/javascript">SKIN_PATH = "/Skins/default/";</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/Public/Home/js/JQuery.js"></script>
<script type="text/javascript" src="/Public/Home/js/gotop.js"></script>
<link href="/Public/Home/css/head.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/foot.css" rel="stylesheet" type="text/css" />
<link href="/Public/Home/css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- 头部 -->
	<!-- header  start-->
<div class="header">
    <div class="top">
        <!-- logo -->
        <div class="logo">
            <a href="<?php echo ($logo['link']); ?>">
                <img src="<?php echo get_cover($logo['cover_id'])['path'];?>" width="200" height="100">
            </a>
        </div>
        <!-- 标题 -->
        <div class="title">
                <img src="<?php echo get_cover($title['cover_id'])['path'];?>" width="400" height="100">
        </div>
        <!-- 其他 -->
        <div class="other">
            <img src="<?php echo get_cover($tel['cover_id'])['path'];?>" width="200" height="100">
        </div>
    </div>
    <div class="nav">
        <ul>
            <?php if(is_array($nav)): $k = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($k % 2 );++$k;?><li <?php if(stristr($_SERVER['REQUEST_URI'],$data['url']) || $data['url'] == null || ($data['url'] == 'Index/index' && $_SERVER['REQUEST_URI'] == '/')): ?> class="cur" <?php endif; ?>><a title="" href="<?php echo U($data['url']);?>"><span><?php echo ($data["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

        </ul>
    </div>
</div>
<!-- header over-->
<div class="clear"></div>
<!-- banner start-->
	<!-- /头部 -->
	
	<!-- 主体 -->
	
    <div id="focus" class="banners" style="position: relative; visibility:hidden;">
        <div id="au" style="visibility:hidden;">
            <?php if(is_array($banner)): $k = 0; $__LIST__ = $banner;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$b): $mod = ($k % 2 );++$k;?><div <?php if ($k != 1): ?> style="display: none" <?php endif; ?>>
                    <a href="javascript:void (0);">
                        <img src="<?php echo get_cover($b['cover_id'])['path'];?>" width="1439" height="463" alt="<?php echo ($b['title']); ?>" />
                    </a>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
            <div id="no" style="display: none">
            </div>
            <div class="lunbo">
                <table border="0" cellpadding="0" cellspacing="0" align="right">
                    <tr>
                        <td class='active' id="t0" onmouseover="Mea(0);clearAuto();" onmouseout="setAuto();"></td>
                        <td width="6">
                        </td><td class='bg' id="t1" onmouseover="Mea(1);clearAuto();" onmouseout="setAuto();"></td>
                        <td width="6"></td>
                        <td class='bg' id="t2" onmouseover="Mea(2);clearAuto();" onmouseout="setAuto();"></td>
                        <td width="6"></td>
                    </tr>
                </table>
            </div>
            <div id="conau">
                <div > </div>
                <div style='display: none'></div>
                <div style='display: none'></div>
            </div>
        </div>
    </div>
    <div id="point" style="display: block;position: relative;"></div>
    <script type="text/javascript">
        if ($(window).width() < 1500) {
            $("#focus").attr("style", "width:100%"); // + $(window).width() + "px;");
            $("#au").attr("style", "width:100%;height:464"); //  + $(window).width() + "px;");

            $("#au img").attr("style", "width:100%"); //  + $(window).width() + "px;");
        } else {
            $("#focus").attr("style", "width:1440px;margin:0 auto;");
            $("#au").attr("style", "width:1440px;;height:464");

            $("#au img").attr("style", "width:1440px;");

        }
        var n = 0;
        var sumCount = parseInt("3");
        function Mea(value) {
            n = value;
            setBg(value);
            plays(value);
            conaus(n);
        }
        function setBg(value) {
            for (var i = 0; i < sumCount; i++)
                document.getElementById("t" + i + "").className = "bg";
            document.getElementById("t" + value + "").className = "active";
        }
        function plays(value) {
            try {
                with (au) {
                    //filters[0].Apply();
                    for (i = 0; i < sumCount; i++) i == value ? children[i].style.display = "block" : children[i].style.display = "none";
                    //filters[0].play();
                }
            }
            catch (e) {
                var d = document.getElementById("au").getElementsByTagName("div");
                for (i = 0; i < sumCount; i++) i == value ? d[i].style.display = "block" : d[i].style.display = "none";
            }
        }
        function conaus(value) {
            try {
                with (conau) {

                    for (i = 0; i < sumCount; i++) i == value ? children[i].style.display = "block" : children[i].style.display = "none";

                }
            }
            catch (e) {
                var d = document.getElementById("conau").getElementsByTagName("div");
                for (i = 0; i < sumCount; i++) i == value ? d[i].style.display = "block" : d[i].style.display = "none";
            }

        }
        function clearAuto() { clearInterval(autoStart) }
        function setAuto() { autoStart = setInterval("auto(n)", 4000) }
        function auto() {
            n++;
            if (n > (sumCount - 1)) n = 0;
            Mea(n);
            conaus(n);
        }
        $("#au img").mouseover(function() {
            clearInterval(autoStart)
        });
        $("#au img").mouseout(function() {
            setAuto();
        });
        setAuto();

    </script>
    <!-- banner over-->
    <!--主体内容 开始-->
    <div class="content">
        <div class="search">
            <div class="ss1 fl">
                <input name="" id="seachkeywords" type="text" class="k1" value="请输入关键词" onclick="this.value = '';" onblur="if(this.value == ''){this.value='请输入关键词'}">
                <input name="" type="image" onclick="xuanze();" src="/Public/Home/images/Index/btn1.gif"></div>
            <div class="ss2" style="font-size: 12px;">
                热门关键词: <span id="commonHeaderkeywords">
                <?php if(is_array($keyword)): $i = 0; $__LIST__ = $keyword;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$kd): $mod = ($i % 2 );++$i;?><a href="<?php echo U('/sousuo/'.$kd);?>" target="_parent"><?php echo ($kd); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </span>
            </div>
        </div>
        <script>
            function xuanze(){
                var that = document.getElementById('seachkeywords').value;
                window.location.href="/sousuo/"+that;
            }
        </script>
        <!-- 产品滚动图 start-->
        <div id="brand" class="brand mt12">
            <div class="jiao1 fl" style="padding-right:10px;" id="LeftIDhz">
                <a href="javascript:void(0);">
                    <img src="/Public/Home/images/index/jiao1.gif" alt="">
                </a></div>
            <div id="ScollNamehz" style="float: left;">
                <?php if(is_array($run_small)): $i = 0; $__LIST__ = $run_small;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$small): $mod = ($i % 2 );++$i;?><li><a href="javascript:void (0);" title="<?php echo ($small['title']); ?>"><img src="<?php echo get_cover($small['cover_id'])['path'];?>" alt="<?php echo ($small['description']); ?>" title="<?php echo ($small['title']); ?>" width="145" height="49"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div class="jiao1 fr" id="RightIDhz"><a href="javascript:void(0);"> <img src="/Public/Home/images/index/jiao2.gif" alt=""></a></div>
        </div>
        <script language="javascript" type="text/javascript">
            var adshz = new ScrollPicleft();
            adshz.scrollContId = "ScollNamehz"; // 内容容器ID""
            adshz.arrLeftId = "LeftIDhz"; //左箭头ID
            adshz.arrRightId = "RightIDhz"; //右箭头ID
            adshz.frameWidth = 910; //显示框宽度
            adshz.pageWidth = 153; //翻页宽度
            adshz.speed = 10; //移动速度(单位毫秒，越小越快)
            adshz.space = 10; //每次移动像素(单位px，越大越快)
            adshz.autoPlay = true; //自动播放
            adshz.autoPlayTime = 10; //自动播放间隔时间(秒)
            adshz.initialize(); //初始化
        </script>
        <!-- 产品滚动图 over-->

        <!-- 产品展示图 start-->
        <div class="brand_show">
            <div class="b_left">
                <div class="bl_header">
                    <a href="javascript:void (0);"><?php echo ($brandTitle['title']); ?></a>
                </div>
                <div class="bl_body">
                    <ul>
                        <?php if(is_array($brand)): $i = 0; $__LIST__ = $brand;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bd): $mod = ($i % 2 );++$i;?><!--<li><a href="<?php echo U('brand/index?id='.$bd['id']);?>"><?php echo ($bd['title']); ?></a></li>-->
                            <li><a href="<?php echo U('/'.$bd['name']);?>"><?php echo ($bd['title']); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
            <div class="b_right">
                <div class="br_header">
                    <a href="javascript:void (0);" style="padding: 0;margin: 0">产品展示图</a>
                </div>
                <div class="br_body">
                    <div class="br_content" style="padding-top: 30px;">
                        <?php if(is_array($product)): $i = 0; $__LIST__ = $product;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pt): $mod = ($i % 2 );++$i;?><dl>
                                <?php $t = \Home\Controller\IndexController::getTitle($pt['category_id']);?>
                                <dt><a href="<?php echo U($t.'/'.$pt['id']);?>" target="_blank" title=""><img src="<?php echo get_cover($pt['cover_id'])['path'];?>"></a></dt>
                                <dd><a href="<?php echo U($t.'/'.$pt['id']);?>" target="_blank" title=""><?php echo ($pt['title']); ?></a></dd>
                            </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- 产品展示图 over-->

        <!--pic_show start-->
        <div class="pic_show" style="margin-top: 20px;">
            <img src="<?php echo get_cover($advertise1['cover_id'])['path'];?>" width="100%" height="130" style="padding: 0;margin: 0;">
        </div>
        <!--pic_show over-->
    </div>
    <!--主体内容 结束-->
    <!--message start-->
    <div class="message_pic" style="background: url('<?php echo($back);?>')no-repeat;height: 1206px;width:100%" >
        <div class="message">
            <?php if(is_array($introduce)): $k = 0; $__LIST__ = $introduce;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ite): $mod = ($k % 2 );++$k;?><dl class="msg<?php echo ($k); ?> msg">
                    <!--<dt>-->
                    <!--<a href="#" target="_blank" title="">这是标题</a>-->
                    <!--</dt>-->
                    <dd>
                        <a href="javascript: void (0);"><?php echo ($ite['content']); ?></a>
                    </dd>
                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!--message over-->
    <!--about start-->
    <div class="about">
        <div class="about_head">
            <p>
                <a href="<?php echo U('/guanyuwomen');?>" title="<?php echo ($about_art['title']); ?>"><img alt="<?php echo ($about_art['title']); ?>" title="<?php echo ($about_art['title']); ?>" src="/Public/Home/images/index/more.gif"></a>
            </p>
            <a href="<?php echo U('/guanyuwomen');?>" target="_blank"><?php echo ($about_art['title']); ?></a>
        </div>
        <div class="about_body">
            <div class="about_cont">
                <?php echo ($about_art['description']); ?>
            </div>
            <div class="about_pic">
                <div class="l_about_pic">
                    <a href="javascript:void (0);" title="" target="_blank">
                        <img src="<?php echo get_cover($about_pic_b['cover_id'])['path'];?>" alt="<?php echo ($about_pic_b['description']); ?>">
                    </a>
                </div>
                <div class="r_about_pic">
                    <ul>
                        <?php if(is_array($about_pic_s)): $i = 0; $__LIST__ = $about_pic_s;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ap): $mod = ($i % 2 );++$i;?><li>
                                <a href="javascript:void (0);" target="_blank">
                                    <img src="<?php echo get_cover($ap['cover_id'])['path'];?>" alt="<?php echo ($ap['description']); ?>">
                                </a>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--about over-->
    <!--case start-->
    <div class="case">
        <div class="t_img">
            <a href="javascript:void(0);"><img src="<?php echo get_cover($promise_pic_s['cover_id'])['path'];?>" height="130" width="100%"></a>
        </div>
        <div class="c_cont">
            <p>
                <img src="<?php echo get_cover($promise_pic['cover_id'])['path'];?>" alt=""></p>
            <ul>
                <?php if(is_array($promise)): $k = 0; $__LIST__ = $promise;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pe): $mod = ($k % 2 );++$k;?><li class="lis0<?php echo ($k); ?>"><?php echo ($pe['description']); ?></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <!--case over-->
    <!--pic_show start-->
    <div class="pic_show2" style="margin: 20px auto;width: 960px;">
        <img src="<?php echo get_cover($advertise2['cover_id'])['path'];?>" width="100%" height="130" style="padding: 0;margin: 0;">
    </div>
    <!--pic_show over-->
    <!--滚动2 start-->
    <div class="clear"></div>
    <div class="run_pic">
        <div class="tit">
            <p>
                <a href="javascript: void (0);" title="<?php echo ($run_big_t['title']); ?>">
                    <img src="/Public/Home/images/index/more.gif">
                </a>
            </p>
            <span>
            <a href="javascript: void (0);"><?php echo ($run_big_t['title']); ?></a>
        </span>
        </div>
        <ul id="ScollNamedls" style="float: left; position: absolute; overflow: hidden;">
            <div style="float: left;overflow: hidden">
                <?php if(is_array($run_big)): $i = 0; $__LIST__ = $run_big;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$big): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo ($big['link']); ?>" title="<?php echo ($big['title']); ?>"><img src="<?php echo get_cover($big['cover_id'])['path'];?>" alt="<?php echo ($big['description']); ?>" title="<?php echo ($big['title']); ?>" width="223" height="124"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <div style="float: left; overflow: hidden">
                <?php if(is_array($run_big)): $i = 0; $__LIST__ = $run_big;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$big): $mod = ($i % 2 );++$i;?><li><a target="_blank" href="<?php echo ($big['link']); ?>" title="<?php echo ($big['title']); ?>"><img src="<?php echo get_cover($big['cover_id'])['path'];?>" alt="<?php echo ($big['description']); ?>" title="<?php echo ($big['title']); ?>" width="223" height="124"/></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </ul>
    </div>
    <script type="text/javascript">
        var adsdls = new ScrollPicleft();
        adsdls.scrollContId = "ScollNamedls"; // 内容容器ID""
        //    adsdls.arrLeftId = "LeftIDdls"; //左箭头ID
        //    adsdls.arrRightId = "RightIDdls"; //右箭头ID
        adsdls.frameWidth = 960; //显示框宽度
        adsdls.pageWidth = 243; //翻页宽度
        adsdls.speed = 10; //移动速度(单位毫秒，越小越快)
        adsdls.space = 10; //每次移动像素(单位px，越大越快)
        adsdls.autoPlay = true; //自动播放
        adsdls.autoPlayTime = 2; //自动播放间隔时间(秒)
        adsdls.initialize(); //初始化
    </script>
    <!--滚动2 over-->
    <!--success start-->
    <div class="trouble">
        <div class="tbe_left">
            <div class="l_tbe_head">
                <p>
                    <a href="<?php echo U('/anli/');?>" target="_blank" title="">
                        <img alt="" title="" src="/Public/Home/images/index/more.gif">
                    </a>
                </p>
                <span>
                <a href="<?php echo U('/anli/');?>" title="成功案例" target="_blank">
                    成功案例
                </a>
            </span>
            </div>
            <div class="l_tbe_body">
                <?php if(is_array($case)): $i = 0; $__LIST__ = $case;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cs): $mod = ($i % 2 );++$i; $t = \Home\Controller\IndexController::getTitle($cs['category_id']);?>
                    <dl>
                        <dt>
                            <a href="<?php echo U($t.'/'.$cs['id']);?>" title="" target="_blank">
                                <img src="<?php echo get_cover($cs['cover_id'])['path'];?>" alt="成功案例" title="成功案例">
                            </a>
                        </dt>
                        <dd>
                            <h4>
                                <a href="<?php echo U($t.'/'.$cs['id']);?>" title="" target="_blank">
                                    <?php echo ($cs['title']); ?>
                                </a>
                            </h4>
                            <?php echo ($cs['description']); ?>
                        </dd>
                    </dl><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="tbe_right">
            <div class="tit">
                <p>
                    <a href="<?php echo U('/changjianwenti/');?>" target="_blank" title="">
                        <img src="/Public/Home/images/index/more.gif" alt="" title="">
                    </a>
                </p>
                <span>
                    <a href="<?php echo U('/changjianwenti/');?>" target="_blank" title="">
                        <?php echo ($problem_t['title']); ?>
                    </a>
                </span>
            </div>
            <div id="ulOrderAnns" style="overflow: hidden; width: 275px; height:365px !important;">
                <table style="border-collapse:collapse;" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td>
                            <?php if(is_array($problem)): $i = 0; $__LIST__ = $problem;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$pl): $mod = ($i % 2 );++$i;?><dl>
                                    <dt><span>问</span><a href="<?php echo U('/changjianwenti/'.$pl['id']);?>" target="_blank"><?php echo ($pl['title']); ?></a></dt>
                                    <dd>
                                        <span>答</span><?php echo ($pl['description']); ?></dd>
                                </dl><?php endforeach; endif; else: echo "" ;endif; ?>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <script type="text/javascript">
        $(function() {
            new Marquee("ulOrderAnns", 0, 1, 275, 365, 20, 0, 1000, 22);
        });
    </script>
    <!--success over-->
    <!--pic_show start-->
    <div class="pic_show3" style="margin: 20px auto;width: 960px;">
        <img src="<?php echo get_cover($advertise3['cover_id'])['path'];?>" width="100%" height="130" style="padding: 0;margin: 0;">
    </div>
    <!--pic_show over-->
    <div style="width: 960px;margin: auto">
        <!--动态 start-->
        <div class="dongt">
            <div class="tit">
                <p>
                    <a href="<?php echo U('/zixun/');?>" title="" target="_blank">
                        <img src="/Public/Home/images/index/more.gif" alt="最新动态" title="最新动态">
                    </a>
                </p>
                <span>
            <a href="<?php echo U('/zixun/');?>" title="最新动态" target="_blank">
                最新动态
            </a>
        </span>
            </div>
            <div class="nr">
                <dl>
                    <dt><a href="<?php echo U($t.'/'.$new_first['id']);?>" title="" target="_blank">
                        <img src="<?php echo get_cover($new_first['cover_id'])['path'];?>" alt="最新动态" title="最新动态"></a></dt>
                    <dd>
                        <h4>
                            <a href="<?php echo U($t.'/'.$new_first['id']);?>" title="最新动态" target="_blank">
                                <?php echo ($new_first['title']); ?>
                            </a>
                        </h4>
                        <?php echo ($new_first['title']); ?>
                    </dd>
                </dl>
                <ul>
                    <?php if(is_array($new)): $i = 0; $__LIST__ = $new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nw): $mod = ($i % 2 );++$i;?><li><span class="fr">
                        <?php echo(date('Y-m-d',$nw['update_time']))?></span><a href="<?php echo U('/'.$t.'/'.$nw['id']);?>" title="" target="_blank">
                            <?php echo ($nw['title']); ?></a>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            $(".dongt li:last").addClass("nones");
        </script>
        <!--动态over-->
        <!--建议 start-->
        <div class="xiad">
            <form id="message" action="index/upMessage">
                <p>
                    <img src="/Public/Home/images/index/logo.png" height="48" alt=""></p>
                <div class="biao">
                    <ul id="oran_table_1">
                        <li><span>姓名：</span><input id="txt_name" class="k2" type="text">*</li>
                        <li><span>电话：</span><input id="txt_tel" class="k2" type="text">*</li>
                        <li><span>详细地址：</span><input id="txt_add" class="k2" type="text">*</li>
                        <li><span>邮箱：</span><input id="txt_mail" class="k2" type="text">*</li>
                        <li><span>信息备注：</span><textarea id="txt_information" type="text" class="k3"></textarea>*</li>
                        <li><span>验证码：</span><input id="txt_validate" class="k4" type="text">*<img style="vertical-align: middle;
                cursor: pointer; padding: 0 10px;" src="<?php echo U('/Index/verify_c',array());?>" title="点击刷新" alt="点击刷新" ><a title="点击刷新" href="javascript:void (0);">换一张</a></li>
                    </ul>
                    <div class="anniu1">
                        <a href="javascript:void(0);" onclick="IndexAddAgentDetail()"> <img src="/Public/Home/images/index/btn2.gif" alt=""></a>
                    </div>
                </div>
            </form>

        </div>
        <script type="text/javascript">
            var captcha_img = $('#oran_table_1').find('img');
            var captcha_a   = $('#oran_table_1').find('a');
            var verifyimg = captcha_img.attr("src");
            captcha_img.attr('title', '点击刷新');
            captcha_img.click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(captcha_img).attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(captcha_img).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });
            captcha_a.click(function(){
                if( verifyimg.indexOf('?')>0){
                    $(captcha_img).attr("src", verifyimg+'&random='+Math.random());
                }else{
                    $(captcha_img).attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
                }
            });

            function IndexAddAgentDetail(){
                var txt_name = $('#txt_name').val();
                var txt_tel = $('#txt_tel').val();
                var txt_add = $('#txt_add').val();
                var txt_mail = $('#txt_mail').val();
                var txt_information = $('#txt_information').val();
                var code = $('#txt_validate').val();

                $.ajax({
                    type: "post",
                    url: "/Index/upMessage",
                    data: {name:txt_name, tel:txt_tel, add:txt_add, mail:txt_mail, information:txt_information, code:code},
                    dataType: "json",
                    success: function(data){
                        alert(data);
                        if(data == 0){
                            alert("验证码错误");
                        }else if(data == 1){
                            alert("提交成功");
                            return false;
                        }else {
                            alert("提交失败");
                            return true;
                        }
                    }
                });

            }
//            $(function() {
//                $("#oran_table_1").find("a[title='点击刷新']").click(function() {
//                    $(this).siblings("img").attr("src", "/Tools/ValidCodes.aspx?" + new Date().getTime());
//                });
//            });
        </script>
        <!--建议 over-->
    </div>
    <div class="clear"></div>
    <!--link start-->
    <div class="list2">
        <div class="bis03">
            <div class="aa1">
                <a href="javascript:void(0)" title="">
                    <img src="/Public/Home/images/index/logo.png" alt="" ></a><a href="javascript:void(0)" title=""><img src="/Public/Home/images/index/logo.png" alt=""></a></div>
            <div class="link">
                <a href="#" title="" target="_blank">
                    百度</a>
                <a href="#" title="" target="_blank">
                    美团</a>
                <a href="#" title="" target="_blank">
                    google</a>
                <a href="#" title="" target="_blank">
                    firefox</a>
                <a href="#" title="" target="_blank">
                    xxxx</a>
                <div class="apply">
                    <a href="#" target="_blank" title="">友情链接</a>
                </div>
            </div>
            <div class="aa2">
                <a href="#" title="">
                    <img src="/Public/Home/images/index/logo.png" alt="" ></a><p>
                维修热线<span><?php echo ($about['tel']); ?></span></p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!--link over-->
    <!--foot start-->
    <script type="text/javascript" src="/Public/Home/js/rollup.min.js"></script>
    <script type="text/javascript" src="/Public/Home/js/JQuery-1.3.2.min.js"></script>
    <div id="roll" style="display: block;"><div title="回到顶部" id="roll_top"></div></div>
    <script type="text/javascript">
        $(document).ready(function() {
            //首先将#back-to-top隐藏
            $("#roll").hide();
            //当滚动条的位置处于距顶部100像素以下时，跳转链接出现，否则消失
            $(function() {
                $(window).scroll(function() {
                    if ($(window).scrollTop() > 350) {
                        $("#roll").fadeIn(600);
                    } else {
                        $("#roll").fadeOut(600);
                    }
                });
                //当点击跳转链接后，回到页面顶部位置
                $("#roll_top").click(function() {
                    $('body,html').animate({
                            scrollTop: 0
                        },
                        800);
                    return false;
                });
            });
        });
    </script>

	<!-- /主体 -->

	<!-- 底部 -->
	
<div class="footers">
    <div class="footer">
        <div class="foot_menu">
            <?php if(is_array($nav_foot)): $i = 0; $__LIST__ = $nav_foot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$n_t): $mod = ($i % 2 );++$i;?><a title="<?php echo ($n_t['title']); ?>" href="<?php echo ($n_t['url']); ?>"><?php echo ($n_t['title']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="wenz1">
            龙腾挖机 版权所有 备案号：<a href="#" target="_blank"><?php echo C('WEB_SITE_ICP');?></a>
            <script src="#" language="JavaScript"></script>
            <script src="#" charset="utf-8" type="text/javascript"></script>
            <a href="#" target="_blank" title="站长统计"><img src="http://icon.cnzz.com/img/pic1.gif" vspace="0" hspace="0" border="0"></a>
            <!--<script type="text/javascript">-->
            <!--var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");-->
            <!--document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2c3510c5f224bff89ae4f8ed00436092' type='text/javascript'%3E%3C/script%3E"));-->
            <!--</script><script src="#" type="text/javascript"></script>-->
            <!--<a href="#" target="_blank">-->
                <!--<img src="http://eiv.baidu.com/hmt/icon/21.gif" height="20" border="0" width="20"></a>-->
            <br>
            地址：<span id="address"><?php echo ($about['address']); ?></span>&nbsp;&nbsp;邮箱：<span id="emails"><?php echo ($about['email']); ?></span>
            <br>
            联系人：<span id="Fname"><?php echo ($about['people']); ?></span>&nbsp;&nbsp;400联系电话：<?php echo ($about['tel']); ?>&nbsp;&nbsp;手机：<span id="IPhones"><?php echo ($about['phone']); ?></span>
            <br>

        </div>
        <div class="ico01">
            <a title="" href="javascript:void(0);">
                <img src="/Public/Home/images/index/img01.gif" alt=""></a></div>
        <div class="ico02">
            <a title="" href="javascript:void(0);">
                <img src="/Public/Home/images/index/img02.gif" alt=""></a></div><div class="footerlink">
            <?php if(is_array($link)): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lkf): $mod = ($i % 2 );++$i;?>|<a href="<?php echo ($lkf['link']); ?>" title="<?php echo ($lkf['title']); ?>"><?php echo ($lkf['title']); ?></a>|<?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    </div>
</div>
<html/>
<!--foot over-->

	<!-- /底部 -->
</body>
</html>
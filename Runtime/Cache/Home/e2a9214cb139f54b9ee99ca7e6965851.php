<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="en">
<head>
	<html>
<meta charset="UTF-8">
<title><?php echo C('WEB_SITE_TITLE');?></title>
<meta name="author" content="YFCMF">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<script src="/MY_CMF/Public/Home/js/banner.js" type="text/javascript"></script>
<script type="text/javascript">SKIN_PATH = "/Skins/default/";</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="/MY_CMF/Public/Home/js/JQuery.js"></script>
<script type="text/javascript" src="/MY_CMF/Public/Home/js/gotop.js"></script>
<link href="/MY_CMF/Public/Home/css/head.css" rel="stylesheet" type="text/css" />
<link href="/MY_CMF/Public/Home/css/foot.css" rel="stylesheet" type="text/css" />
<link href="/MY_CMF/Public/Home/css/index.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- 头部 -->
	<!-- header  start-->
<div class="header">
    <div class="top">
        <!-- logo -->
        <div class="logo">
            <a href="#">
                <img src="/MY_CMF/Public/Home/images/index/logo.png">
            </a>
        </div>
        <!-- 标题 -->
        <div class="title">
            <img src="/MY_CMF/Public/Home/images/index/title.png">
        </div>
        <!-- 其他 -->
        <div class="other">
            <ul>
                <li>
                    <img src="{}">
                </li>
            </ul>
        </div>
    </div>
    <div class="nav">
        <ul>
            <?php if(is_array($nav)): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><li class=""><a title="" href="./<?php echo ($data["name"]); ?>"><span><?php echo ($data["title"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?>

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
            <div style='display: block'>
                <a href="#" target="_blank">
                    <img src="/MY_CMF/Public/Home/images/index/banner1.jpg" width="100%" height="100%" alt="" /></a></div>
            <div style='display: none'>
                <a href="#" target="_blank">
                    <img src="/MY_CMF/Public/Home/images/index/banner2.jpg" width="100%" height="100%" alt="" /></a></div>
            <div style='display: none'>
                <a href="#" target="_blank">
                    <img src="/MY_CMF/Public/Home/images/index/banner3.jpg" width="100%" height="100%" alt="" /></a></div>
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
        <!-- 产品滚动图 start-->
        <div id="brand" class="brand mt12">
            <div class="jiao1 fl" style="padding-right:10px;" id="LeftIDhz">
                <a href="javascript:void(0);">
                    <img src="/MY_CMF/Public/Home/images/index/jiao1.gif" alt="">
                </a></div>
            <div id="ScollNamehz" style="float: left;">
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
                <li><a target="_blank" href="#" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="" width="145" height="49"/></a></li>
            </div>
            <div class="jiao1 fr" id="RightIDhz"><a href="javascript:void(0);"> <img src="/MY_CMF/Public/Home/images/index/jiao2.gif" alt=""></a></div>
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
                    <a href="#" target="_blank">挖机分类</a>
                </div>
                <div class="bl_body">
                    <ul>
                        <li><a href="#">龙腾挖机</a></li>
                        <li><a href="#">龙腾挖机222222222222</a></li>
                        <li><a href="#">龙腾挖机</a></li>
                        <li><a href="#">龙腾挖机333</a></li>
                        <li><a href="#">龙腾挖机</a></li>
                        <li><a href="#">龙腾挖机</a></li>
                        <li><a href="#">龙腾挖机</a></li>
                        <li><a href="#">龙腾挖机</a></li>
                    </ul>
                </div>
            </div>
            <div class="b_right">
                <div class="br_header">
                    <a href="javascript:void (0);" style="padding: 0;margin: 0">产品展示图</a>
                </div>
                <div class="br_body">
                    <div class="br_content" style="padding-top: 30px;">
                        <dl>
                            <dt><a href="#" target="_blank" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png"></a></dt>
                            <dd><a href="#" target="_blank" title="">龙腾挖机</a></dd>
                        </dl>
                        <dl>
                            <dt><a href="#" target="_blank" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png"></a></dt>
                            <dd><a href="#" target="_blank" title="">龙腾挖机</a></dd>
                        </dl>
                        <dl>
                            <dt><a href="#" target="_blank" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png"></a></dt>
                            <dd><a href="#" target="_blank" title="">龙腾挖机</a></dd>
                        </dl>
                        <dl>
                            <dt><a href="#" target="_blank" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png"></a></dt>
                            <dd><a href="#" target="_blank" title="">龙腾挖机</a></dd>
                        </dl>
                        <dl>
                            <dt><a href="#" target="_blank" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png"></a></dt>
                            <dd><a href="#" target="_blank" title="">龙腾挖机</a></dd>
                        </dl>
                        <dl>
                            <dt><a href="#" target="_blank" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png"></a></dt>
                            <dd><a href="#" target="_blank" title="">龙腾挖机</a></dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        <!-- 产品展示图 over-->

        <!--pic_show start-->
        <div class="pic_show" style="margin-top: 20px;">
            <img src="/MY_CMF/Public/Home/images/index/pic.jpg" width="100%" height="100%" style="padding: 0;margin: 0;">
        </div>
        <!--pic_show over-->
    </div>
    <!--主体内容 结束-->
    <!--message start-->
    <div class="message_pic" style="background: url('/MY_CMF/Public/Home/images/index/message.jpg');height: 1206px;width:100%" >
        <div class="message">
            <dl class="msg1 msg">
                <dt>
                    <a href="#" target="_blank" title="">这是标题</a>
                </dt>
                <dd>
                    <a href="#"  target="_blank" title="">这是内容111111111</a>
                </dd>
            </dl>
            <dl class="msg2 msg">
                <dt>
                    <a href="#" target="_blank" title="">这是标题</a>
                </dt>
                <dd>
                    <a href="#"  target="_blank" title="">这是内容111111111</a>
                </dd>
            </dl>
            <dl class="msg3 msg">
                <dt>
                    <a href="#" target="_blank" title="">这是标题</a>
                </dt>
                <dd>
                    <a href="#"  target="_blank" title="">这是内容111111111</a>
                </dd>
            </dl>
            <dl class="msg4 msg">
                <dt>
                    <a href="#" target="_blank" title="">这是标题</a>
                </dt>
                <dd>
                    <a href="#"  target="_blank" title="">这是内容111111111</a>
                </dd>
            </dl>
            <dl class="msg5 msg">
                <dt>
                    <a href="#" target="_blank" title="">这是标题</a>
                </dt>
                <dd>
                    <a href="#"  target="_blank" title="">这是内容111111111</a>
                </dd>
            </dl>
            <dl class="msg6 msg">
                <dt>
                    <a href="#" target="_blank" title="">这是标题</a>
                </dt>
                <dd>
                    <a href="#"  target="_blank" title="">这是内容111111111</a>
                </dd>
            </dl>
        </div>
    </div>
    <!--message over-->
    <!--about start-->
    <div class="about">
        <div class="about_head">
            <p>
                <a href="#" title=""><img alt="" title="" src="/MY_CMF/Public/Home/images/index/more.gif"></a>
            </p>
            <a href="#" target="_blank">关于龙腾</a>
        </div>
        <div class="about_body">
            <div class="about_cont">
                龙腾介绍龙腾介绍龙腾介绍龙腾介绍龙腾介绍龙腾介绍
            </div>
            <div class="about_pic">
                <div class="l_about_pic">
                    <a href="#" title="" target="_blank">
                        <img src="/MY_CMF/Public/Home/images/index/logo.png">
                    </a>
                </div>
                <div class="r_about_pic">
                    <ul>
                        <li><a href="#" target="_blank">
                            <img src="/MY_CMF/Public/Home/images/index/logo.png" alt=""></a></li>
                        <li><a href="#" target="_blank">
                            <img src="/MY_CMF/Public/Home/images/index/logo.png" alt=""></a></li>
                        <li><a href="#" target="_blank">
                            <img src="/MY_CMF/Public/Home/images/index/logo.png" alt=""></a></li>
                        <li><a href="#" target="_blank">
                            <img src="/MY_CMF/Public/Home/images/index/logo.png" alt=""></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--about over-->
    <!--case start-->
    <div class="case">
        <div class="t_img">
            <a href="#"><img src="/MY_CMF/Public/Home/images/index/qq.jpg" alt="" title=""></a>
        </div>
        <div class="c_cont">
            <p>
                <img src="/MY_CMF/Public/Home/images/index/img13.jpg" alt=""></p>
            <ul>
                <li class="lis01">内容内容内容内容内容内容</li>
                <li class="lis02">内容内容内容内容内容内容内容内容</li>
                <li class="lis03">内容内容内容内容内容内容内容内容</li>
            </ul>
        </div>
    </div>
    <!--case over-->
    <!--pic_show start-->
    <div class="pic_show2" style="margin: 20px auto;width: 960px;">
        <img src="/MY_CMF/Public/Home/images/index/pic.jpg" width="100%" height="100%" style="padding: 0;margin: 0;">
    </div>
    <!--pic_show over-->
    <!--滚动2 start-->
    <div class="clear"></div>
    <div class="run_pic">
        <div class="tit">
            <p>
                <a href="#" title="" target="_blank">
                    <img src="/MY_CMF/Public/Home/images/index/more.gif" alt="" title="" >
                </a>
            </p>
            <span>
            <a href="" title="" target="_blank">龙腾挖机</a>
        </span>
        </div>
        <ul id="ScollNamedls" style="float: left; position: absolute; overflow: hidden;">
            <div style="float: left;overflow: hidden">
                <li><a target="_blank" href="#" title="">
                    <img src="/MY_CMF/Public/Home/images/index/run.jpg" alt="" title="" ></a><span><a target="_blank" href="#" title="">龙腾挖机1</a></span>
                </li>
                <li><a target="_blank" href="#" title="">
                    <img src="/MY_CMF/Public/Home/images/index/run.jpg" alt="" title="" ></a><span><a target="_blank" href="#" title="">龙腾挖机2</a></span>
                </li>
                <li><a target="_blank" href="#" title="">
                    <img src="/MY_CMF/Public/Home/images/index/run.jpg" alt="" title="" ></a><span><a target="_blank" href="#" title="">龙腾挖机3</a></span>
                </li>
                <li><a target="_blank" href="#" title="">
                    <img src="/MY_CMF/Public/Home/images/index/run.jpg" alt="" title="" ></a><span><a target="_blank" href="#" title="">龙腾挖机4</a></span>
                </li>
            </div>
            <div style="float: left; overflow: hidden">
                <li><a target="_blank" href="#" title="">
                    <img src="/MY_CMF/Public/Home/images/index/run.jpg" alt="" title="" ></a><span><a target="_blank" href="#" title="">龙腾挖机5</a></span>
                </li>
                <li><a target="_blank" href="#" title="">
                    <img src="/MY_CMF/Public/Home/images/index/run.jpg" alt="" title="" ></a><span><a target="_blank" href="#" title="">龙腾挖机6</a></span>
                </li>
                <li><a target="_blank" href="#" title="">
                    <img src="/MY_CMF/Public/Home/images/index/run.jpg" alt="" title="" ></a><span><a target="_blank" href="#" title="">龙腾挖机7</a></span>
                </li>
                <li><a target="_blank" href="#" title="">
                    <img src="/MY_CMF/Public/Home/images/index/run.jpg" alt="" title="" ></a><span><a target="_blank" href="#" title="">龙腾挖机8</a></span>
                </li>
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
                    <a href="#" target="_blank" title="">
                        <img alt="" title="" src="/MY_CMF/Public/Home/images/index/more.gif">
                    </a>
                </p>
                <span>
                <a href="#" title="成功案例" target="_blank">
                    成功案例
                </a>
            </span>
            </div>
            <div class="l_tbe_body">
                <dl>
                    <dt><a href="#" title="" target="_blank">
                        <img src="/MY_CMF/Public/Home/images/index/logo.png" alt="!" title=""></a></dt>
                    <dd>
                        <h4>
                            <a href="#" title="!" target="_blank">
                                成功修理案例1
                            </a>
                        </h4>
                        成功修理案例1
                    </dd>
                </dl>
                <dl>
                    <dt>
                        <a href="#" title="!" target="_blank">
                            <img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title="">
                        </a>
                    </dt>
                    <dd>
                        <h4>
                            <a href="#" title="" target="_blank">
                                成功修理案例2
                            </a>
                        </h4>
                        成功修理案例1成功修理案例1成功修理案例1
                    </dd>
                </dl>
            </div>
        </div>
        <div class="tbe_right">
            <div class="tit">
                <p>
                    <a href="#" target="_blank" title="">
                        <img src="/MY_CMF/Public/Home/images/index/more.gif" alt="" title="">
                    </a>
                </p>
                <span>
                    <a href="#" target="_blank" title="">
                        常见问题
                    </a>
                </span>
            </div>
            <div id="ulOrderAnns" style="overflow: hidden; width: 275px; height:365px !important;">
                <table style="border-collapse:collapse;" cellspacing="0" cellpadding="0">
                    <tbody>
                    <tr>
                        <td>

                            <dl>
                                <dt><span>问</span><a href="#" title="" target="_blank">问题1?</a></dt>
                                <dd>
                                    <span>答</span>回答1</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="" title="" target="_blank">问题2</a></dt>
                                <dd>
                                    <span>答</span>回答2</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="" title="" target="_blank">问题3</a></dt>
                                <dd>
                                    <span>答</span>回答3</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="#" title="" target="_blank">问题4</a></dt>
                                <dd>
                                    <span>答</span>回答4</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="#" title="" target="_blank">问题5</a></dt>
                                <dd>
                                    <span>答</span>回答5</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="" title="" target="_blank">问题6</a></dt>
                                <dd>
                                    <span>答</span>回答6</dd>
                            </dl>

                        </td>
                    </tr>
                    <tr>
                        <td>

                            <dl>
                                <dt><span>问</span><a href="#" title="" target="_blank">问题1?</a></dt>
                                <dd>
                                    <span>答</span>回答1</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="" title="" target="_blank">问题2</a></dt>
                                <dd>
                                    <span>答</span>回答2</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="" title="" target="_blank">问题3</a></dt>
                                <dd>
                                    <span>答</span>回答3</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="#" title="" target="_blank">问题4</a></dt>
                                <dd>
                                    <span>答</span>回答4</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="#" title="" target="_blank">问题5</a></dt>
                                <dd>
                                    <span>答</span>回答5</dd>
                            </dl>

                            <dl>
                                <dt><span>问</span><a href="" title="" target="_blank">问题6</a></dt>
                                <dd>
                                    <span>答</span>回答6</dd>
                            </dl>

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
        <img src="/MY_CMF/Public/Home/images/index/pic.jpg" width="100%" height="100%" style="padding: 0;margin: 0;">
    </div>
    <!--pic_show over-->
    <div style="width: 960px;margin: auto">
        <!--动态 start-->
        <div class="dongt">
            <div class="tit">
                <p>
                    <a href="#" title="" target="_blank">
                        <img src="/MY_CMF/Public/Home/images/index/more.gif" alt="" title="">
                    </a>
                </p>
                <span>
            <a href="#" title="" target="_blank">
                最新动态
            </a>
        </span>
            </div>
            <div class="nr">
                <dl>
                    <dt><a href="#" title="" target="_blank">
                        <img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" title=""></a></dt>
                    <dd>
                        <h4>
                            <a href="#" title="" target="_blank">
                                动态动态
                            </a>
                        </h4>
                        内容内容
                    </dd>
                </dl>
                <ul>
                    <li><span class="fr">
                        2016-07-15</span><a href="#" title="" target="_blank">
                        标题1</a>
                    </li>
                    <li><span class="fr">
                        2016-07-05</span><a href="#" title="" target="_blank">
                        标题2</a>
                    </li>
                    <li><span class="fr">
                        2016-07-02</span><a href="#" title="" target="_blank">
                        标题23</a>
                    </li>
                    <li><span class="fr">
                        2016-07-01</span><a href="#" title="" target="_blank">
                        标题4</a>
                    </li>
                </ul>
            </div>
        </div>
        <script type="text/javascript">
            $(".dongt li:last").addClass("nones");
        </script>
        <!--动态over-->
        <!--建议 start-->
        <div class="xiad">
            <p>
                <img src="/MY_CMF/Public/Home/images/index/logo.png" height="48" alt=""></p>
            <div class="biao">
                <ul id="oran_table_1">
                    <li><span>姓名：</span><input id="txt_name" class="k2" type="text">*</li>
                    <li><span>电话：</span><input id="txt_tel" class="k2" type="text">*</li>
                    <li><span>详细地址：</span><input id="txt_add" class="k2" type="text">*</li>
                    <li><span>邮箱：</span><input id="txt_mail" class="k2" type="text">*</li>
                    <li><span>信息备注：</span><textarea id="txt_information" type="text" class="k3"></textarea>*</li>
                    <li><span>验证码：</span><input id="txt_validate" class="k4" type="text">*<img style="vertical-align: middle;
                cursor: pointer; padding: 0 10px;" src="#" title="点击刷新" alt="点击刷新" onclick="this.src='#'+new Date().getTime()"><a title="点击刷新" href="javascript:void(0);">换一张</a></li>
                </ul>
                <div class="anniu1">
                    <a href="javascript:void(0);" onclick="IndexAddAgentDetail(this)">
                        <img src="/MY_CMF/Public/Home/images/index/btn2.gif" alt=""></a><a href="javascript:void(0);" onclick="emptyText('oran_table_1')"><img src="/MY_CMF/Public/Home/images/index/btn3.gif" alt=""></a></div>
            </div>
        </div>
        <script type="text/javascript">
            $(function() {
                $("#oran_table_1").find("a[title='点击刷新']").click(function() {
                    $(this).siblings("img").attr("src", "/Tools/ValidCodes.aspx?" + new Date().getTime());
                });
            });
        </script>
        <!--建议 over-->
    </div>
    <div class="clear"></div>
    <!--link start-->
    <div class="list2">
        <div class="bis03">
            <div class="aa1">
                <a href="javascript:void(0)" title="">
                    <img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" ></a><a href="javascript:void(0)" title=""><img src="/MY_CMF/Public/Home/images/index/logo.png" alt=""></a></div>
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
                    <img src="/MY_CMF/Public/Home/images/index/logo.png" alt="" ></a><p>
                招商热线<span>40000000</span></p>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <!--link over-->
    <!--foot start-->
    <script type="text/javascript" src="/MY_CMF/Public/Home/js/rollup.min.js"></script>
    <script type="text/javascript" src="/MY_CMF/Public/Home/js/JQuery-1.3.2.min.js"></script>
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
            <a title="" href="#">修理挖机</a><a title="" href="#">挖机修理</a><a title="" href="#">修挖机里</a><a title="" href="#">瓦力秀吉</a><a title="" href="">联系我们</a><a title="网站地图" href="">网站地图</a><a title="其他" href="">其他</a></div>
        <div class="wenz1">
            龙腾挖机 版权所有 备案号：<a href="#" target="_blank">渝ICP备20170909009号-1</a>
            <script src="#" language="JavaScript"></script>
            <script src="#" charset="utf-8" type="text/javascript"></script>
            <a href="#" target="_blank" title="站长统计"><img src="http://icon.cnzz.com/img/pic1.gif" vspace="0" hspace="0" border="0"></a>
            <!--<script type="text/javascript">-->
            <!--var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");-->
            <!--document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F2c3510c5f224bff89ae4f8ed00436092' type='text/javascript'%3E%3C/script%3E"));-->
            <!--</script><script src="#" type="text/javascript"></script>-->
            <a href="#" target="_blank">
                <img src="http://eiv.baidu.com/hmt/icon/21.gif" height="20" border="0" width="20"></a>
            <br>
            地址：<span id="address">重庆市沙坪坝区</span>邮箱：<span id="emails">12346@qq.com</span>
            <br>
            联系电话：40000000 联系人：<span id="Fname">你好先生</span><span id="IPhones">13883838383</span>
            <br>

        </div>
        <div class="ico01">
            <a title="" href="javascript:void(0);">
                <img src="/MY_CMF/Public/Home/images/index/img01.gif" alt=""></a></div>
        <div class="ico02">
            <a title="" href="javascript:void(0);">
                <img src="/MY_CMF/Public/Home/images/index/img02.gif" alt=""></a></div><div class="footerlink">
        <a href="" title="">挖机修理</a>|<a href="#" title="">修理挖机</a>|<a href="" title="">买挖机</a><br>
        <a href="#" title="">轻轻轻轻</a> <a href="#" title=""></a>|<a href="#" title="">走走走走走走</a>|<a href="" title="">车车车和车</a>
    </div>
    </div>
</div>
<html/>
<!--foot over-->

	<!-- /底部 -->
</body>
</html>
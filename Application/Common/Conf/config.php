<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 鬼国二少 <guiguoershao@163.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

/**
 * 系统配文件
 * 所有系统级别的配置
 */
return array(


    //'配置项'=>'配置值'
    'INDEX_MOD'=>1,//首页模式 0-动态模式 1-静态模式
    'INDEX_HTML_FILE'=>__ROOT__.'Application/Home/View/lt/Index/',//静态首页地址

    /* 模块相关配置 */
    'AUTOLOAD_NAMESPACE' => array('Addons' => ONETHINK_ADDON_PATH), //扩展模块列表
    'DEFAULT_MODULE'     => 'Home',
    'MODULE_DENY_LIST'   => array('Common', 'User'),
    'MODULE_ALLOW_LIST'  => array('Home','Admin'),

    /* 系统数据加密设置 */
    'DATA_AUTH_KEY' => '3+n:L^(Pg?y6jw9~MJvo0|$<4abtqcBVImFH)l[/', //默认数据加密KEY

    /* 调试配置 */
    'SHOW_PAGE_TRACE' => true,

    /* 用户相关设置 */
    'USER_MAX_CACHE'     => 1000, //最大缓存用户数
    'USER_ADMINISTRATOR' => 1, //管理员用户ID

    /* URL配置 */


    'URL_ROUTER_ON'   => true, //开启路由
    'URL_ROUTE_RULES'=>array(
        '/'           =>  'Index/index',   //首页
        'xiaosong'    =>  'brand/index?id=23',
        'kate'        =>  'brand/index?id=34',
        'zhuyou'      =>  'brand/index?id=35',
        'shengang'    =>  'brand/index?id=36',
        'rili'        =>  'brand/index?id=37',
        'kaisi'       =>  'brand/index?id=38',
        'jiateng'     =>  'brand/index?id=39',
        'sanyi'       =>  'brand/index?id=40',
        'libohaier'   =>  'brand/index?id=91',
        'woerwo'      =>  'brand/index?id=90',

        '/^xiaosongqiangxiangweixiu$/' => 'article/lists?brand=23&category=82',
        '/^xiaosongqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=23&category=82&id=:1',
        '/^xiaosongguzhangweixiu$/'    => 'article/lists?brand=23&category=83',
        '/^xiaosongguzhangweixiu\/(\d+)$/' => 'article/detail?brand=23&category=83&id=:1',
        '/^xiaosongchanpinzhanshi$/'   => 'article/lists?brand=23&category=70',
        '/^xiaosongchanpinzhanshi\/(\d+)$/' => 'article/detail?brand=23&category=70&id=:1',
        '/^xiaosongchenggonganli$/'    => 'article/lists?brand=23&category=24',
        '/^xiaosongchenggonganli\/(\d+)$/' => 'article/detail?brand=23&category=24&id=:1',
        '/^xiaosongzixun$/'            => 'article/lists?brand=23&category=25',
        '/^xiaosongzixun\/(\d+)$/'         => 'article/detail?brand=23&category=25&id=:1',

        '/^kateqiangxiangweixiu$/' => 'article/lists?brand=34&category=84',
        '/^xiaosongguzhangweixiu$\/(\d+)$/' => 'article/detail?brand=34&category=84&id=:1',
        '/^kateguzhangweixiu$/'    => 'article/lists?brand=34&category=85',
        '/^kateguzhangweixiu\/(\d+)$/' => 'article/detail?brand=34&category=85&id=:1',
        '/^katechanpinzhanshi$/'   => 'article/lists?brand=34&category=71',
        '/^katechanpinzhanshi\/(\d+)$/' => 'article/detail?brand=34&category=71&id=:1',
        '/^katechenggonganli$/'    => 'article/lists?brand=34&category=41',
        '/^katechenggonganli\/(\d+)$/' => 'article/detail?brand=34&category=41&id=:1',
        '/^katezixun$/'            => 'article/lists?brand=34&category=42',
        '/^katezixun\/(\d+)$/' => 'article/detail?brand=34&category=42&id=:1',

        '/^zhuyouqiangxiangweixiu$/' => 'article/lists?brand=35&category=88',
        '/^zhuyouqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=35&category=88&id=:1',
        '/^zhuyouguzhangweixiu$/'    => 'article/lists?brand=35&category=89',
        '/^zhuyouguzhangweixiu\/(\d+)$/' => 'article/detail?brand=35&category=89&id=:1',
        '/^zhuyouchanpinzhanshi$/'   => 'article/lists?brand=35&category=72',
        '/^zhuyouchanpinzhanshi\/(\d+)$/' => 'article/detail?brand=35&category=72&id=:1',
        '/^zhuyouchenggonganli$/'    => 'article/lists?brand=35&category=46',
        '/^zhuyouchenggonganli\/(\d+)$/' => 'article/detail?brand=35&category=46&id=:1',
        '/^zhuyouzixun$/'            => 'article/lists?brand=35&category=47',
        '/^zhuyouzixun\/(\d+)$/' => 'article/detail?brand=35&category=47&id=:1',

        '/^shengangqiangxiangweixiu$/' => 'article/lists?brand=36&category=86',
        '/^shengangqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=36&category=86&id=:1',
        '/^shengangguzhangweixiu$/'    => 'article/lists?brand=36&category=87',
        '/^shengangguzhangweixiu\/(\d+)$/' => 'article/detail?brand=36&category=87&id=:1',
        '/^shengangchanpinzhanshi$/'   => 'article/lists?brand=36&category=73',
        '/^shengangchanpinzhanshi\/(\d+)$/' => 'article/detail?brand=36&category=73&id=:1',
        '/^shengangchenggonganli$/'    => 'article/lists?brand=36&category=52',
        '/^shengangchenggonganli\/(\d+)$/' => 'article/detail?brand=36&category=52&id=:1',
        '/^shengangzixun$/'            => 'article/lists?brand=36&category=51',
        '/^shengangzixun\/(\d+)$/' => 'article/detail?brand=36&category=51&id=:1',

        '/^riliqiangxiangweixiu$/' => 'article/lists?brand=37&category=93',
        '/^riliqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=37&category=93&id=:1',
        '/^riliguzhangweixiu$/'    => 'article/lists?brand=37&category=92',
        '/^riliguzhangweixiu\/(\d+)$/' => 'article/detail?brand=37&category=92&id=:1',
        '/^rilichanpinzhanshi$/'   => 'article/lists?brand=37&category=74',
        '/^rilichanpinzhanshi\/(\d+)$/' => 'article/detail?brand=37&category=74&id=:1',
        '/^rilichenggonganli$/'    => 'article/lists?brand=37&category=56',
        '/^rilichenggonganli\/(\d+)$/' => 'article/detail?brand=37&category=56&id=:1',
        '/^rilizixun$/'            => 'article/lists?brand=37&category=55',
        '/^rilizixun\/(\d+)$/' => 'article/detail?brand=37&category=55&id=:1',

        '/^kaisiqiangxiangweixiu$/' => 'article/lists?brand=38&category=95',
        '/^kaisiqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=38&category=95&id=:1',
        '/^kaisiguzhangweixiu$/'    => 'article/lists?brand=38&category=94',
        '/^kaisiguzhangweixiu\/(\d+)$/' => 'article/detail?brand=38&category=94&id=:1',
        '/^kaisichanpinzhanshi$/'   => 'article/lists?brand=38&category=75',
        '/^kaisichanpinzhanshi\/(\d+)$/' => 'article/detail?brand=38&category=75&id=:1',
        '/^kaisichenggonganli$/'    => 'article/lists?brand=38&category=60',
        '/^kaisichenggonganli\/(\d+)$/' => 'article/detail?brand=38&category=60&id=:1',
        '/^kaisizixun$/'            => 'article/lists?brand=38&category=59',
        '/^kaisizixun\/(\d+)$/' => 'article/detail?brand=38&category=59&id=:1',

        '/^jiatengqiangxiangweixiu$/' => 'article/lists?brand=39&category=97',
        '/^jiatengqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=39&category=97&id=:1',
        '/^jiatengguzhangweixiu$/'    => 'article/lists?brand=39&category=96',
        '/^jiatengguzhangweixiu\/(\d+)$/' => 'article/detail?brand=39&category=96&id=:1',
        '/^jiatengchanpinzhanshi$/'   => 'article/lists?brand=39&category=76',
        '/^jiatengchanpinzhanshi\/(\d+)$/' => 'article/detail?brand=39&category=76&id=:1',
        '/^jiatengchenggonganli$/'    => 'article/lists?brand=39&category=63',
        '/^jiatengchenggonganli\/(\d+)$/' => 'article/detail?brand=39&category=63&id=:1',
        '/^jiatengzixun$/'            => 'article/lists?brand=39&category=64',
        '/^jiatengzixun\/(\d+)$/' => 'article/detail?brand=39&category=64&id=:1',

        '/^sanyiqiangxiangweixiu$/' => 'article/lists?brand=40&category=99',
        '/^sanyiqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=40&category=99&id=:1',
        '/^sanyiguzhangweixiu$/'    => 'article/lists?brand=40&category=98',
        '/^sanyiguzhangweixiu\/(\d+)$/' => 'article/detail?brand=40&category=98&id=:1',
        '/^sanyichanpinzhanshi$/'   => 'article/lists?brand=40&category=77',
        '/^sanyichanpinzhanshi\/(\d+)$/' => 'article/detail?brand=40&category=77&id=:1',
        '/^sanyichenggonganli$/'    => 'article/lists?brand=40&category=69',
        '/^sanyichenggonganli\/(\d+)$/' => 'article/detail?brand=40&category=69&id=:1',
        '/^sanyizixun$/'            => 'article/lists?brand=40&category=67',
        '/^sanyizixun\/(\d+)$/' => 'article/detail?brand=40&category=67&id=:1',

        '/^libohaierqiangxiangweixiu$/' => 'article/lists?brand=91&category=108',
        '/^libohaierqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=91&category=108&id=:1',
        '/^libohaierguzhangweixiu$/'    => 'article/lists?brand=91&category=107',
        '/^libohaierguzhangweixiu\/(\d+)$/' => 'article/detail?brand=91&category=107&id=:1',
        '/^libohaierchanpinzhanshi$/'   => 'article/lists?brand=91&category=113',
        '/^libohaierchanpinzhanshi\/(\d+)$/' => 'article/detail?brand=91&category=113&id=:1',
        '/^libohaierchenggonganli$/'    => 'article/lists?brand=91&category=112',
        '/^libohaierchenggonganli\/(\d+)$/' => 'article/detail?brand=91&category=112&id=:1',
        '/^libohaierzixun$/'            => 'article/lists?brand=91&category=111',
        '/^libohaierzixun\/(\d+)$/' => 'article/detail?brand=91&category=111&id=:1',

        '/^woerwoqiangxiangweixiu$/' => 'article/lists?brand=90&category=101',
        '/^woerwoqiangxiangweixiu\/(\d+)$/' => 'article/detail?brand=90&category=101&id=:1',
        '/^woerwoguzhangweixiu$/'    => 'article/lists?brand=90&category=102',
        '/^woerwoguzhangweixiu\/(\d+)$/' => 'article/detail?brand=90&category=102&id=:1',
        '/^woerwochanpinzhanshi$/'   => 'article/lists?brand=90&category=106',
        '/^woerwochanpinzhanshi\/(\d+)$/' => 'article/detail?brand=90&category=106&id=:1',
        '/^woerwochenggonganli$/'    => 'article/lists?brand=90&category=105',
        '/^woerwochenggonganli\/(\d+)$/' => 'article/detail?brand=90&category=105&id=:1',
        '/^woerwozixun$/'            => 'article/lists?brand=90&category=104',
        '/^woerwozixun\/(\d+)$/' => 'article/detail?brand=90&category=104&id=:1',

        '/^zixun$/'       =>  'article/lists?class=zixun',
        '/^anli$/'       =>  'article/lists?class=anli',
        '/^changjianwenti$/'       =>  'article/lists?class=changjianwenti',
        '/^changjianwenti\/(\d+)$/'       =>  'article/detail?id=:1',
        '/^guanyuwomen$/'       =>  'article/detail?id=61',
        '/^sousuo\/(.*)$/'       =>  'article/lists?keywords=:1',

//        'pinpai'       =>  'brand/index',         //文章列表
//        'detail/:id\d$'        =>   'Article/detail',  //文章页
//        ':category$'            =>  'Article/lists'  //列表页
    ),
    'URL_HTML_SUFFIX'=>'',
    'URL_CASE_INSENSITIVE' => true, //默认false 表示URL区分大小写 true则表示不区分大小写
    'URL_MODEL'            => 2, //URL模式
    'VAR_URL_PARAMS'       => '', // PATHINFO URL参数变量
    'URL_PATHINFO_DEPR'    => '/', //PATHINFO URL分割符

    /* 全局过滤配置 */
    'DEFAULT_FILTER' => '', //全局过滤函数

    /* 数据库配置 */
    'DB_TYPE'   => 'mysqli', // 数据库类型
    'DB_HOST'   => '127.0.0.1', // 服务器地址
    'DB_NAME'   => 'onethink', // 数据库名
    'DB_USER'   => 'root', // 用户名
    'DB_PWD'    => 'root',  // 密码
    'DB_PORT'   => '3306', // 端口
    'DB_PREFIX' => 'onethink_', // 数据库表前缀

    /* 文档模型配置 (文档模型核心配置，请勿更改) */
    'DOCUMENT_MODEL_TYPE' => array(2 => '主题', 1 => '目录', 3 => '段落'),

    /**
    * 广告类型
    * 1:文字 2:单图展示 3:多图轮播
    */
    'ADVERTISE_TYPE' => [
        '1' => ['id' => 1, 'title' => '文字'],
        '2' => ['id' => 2, 'title' => '单图展示'],
        '3' => ['id' => 3, 'title' => '多图轮播'],
    ],
    /* 图片上传相关配置 */
    'PICTURE_UPLOAD' => array(
        'mimes'    => '', //允许上传的文件MiMe类型
        'maxSize'  => 2*1024*1024, //上传的文件大小限制 (0-不做限制)
        'exts'     => 'jpg,gif,png,jpeg', //允许上传的文件后缀
        'autoSub'  => true, //自动子目录保存文件
        'subName'  => array('date', 'Y-m-d'), //子目录创建方式，[0]-函数名，[1]-参数，多个参数使用数组
        'rootPath' => './Uploads/Picture/', //保存根路径
        'savePath' => '', //保存路径
        'saveName' => array('uniqid', ''), //上传文件命名规则，[0]-函数名，[1]-参数，多个参数使用数组
        'saveExt'  => '', //文件保存后缀，空则使用原后缀
        'replace'  => false, //存在同名是否覆盖
        'hash'     => true, //是否生成hash编码
        'callback' => false, //检测文件是否存在回调函数，如果存在返回文件信息数组
    ),
    //图片上传相关配置（文件上传类配置）
    'PICTURE_UPLOAD_DRIVER'=>'local',

    //本地上传文件驱动配置
    'UPLOAD_LOCAL_CONFIG'=>array(),

    'UPLOAD_BCS_CONFIG'=>array(
        'AccessKey'=>'',
        'SecretKey'=>'',
        'bucket'=>'',
        'rename'=>false
    ),
    'UPLOAD_QINIU_CONFIG'=>array(
        'accessKey'=>'__ODsglZwwjRJNZHAu7vtcEf-zgIxdQAY-QqVrZD',
        'secrectKey'=>'Z9-RahGtXhKeTUYy9WCnLbQ98ZuZ_paiaoBjByKv',
        'bucket'=>'onethinktest',
        'domain'=>'onethinktest.u.qiniudn.com',
        'timeout'=>3600,
    ),
);

<?php 

/***************************
|
| 字符串函数
|
***************************/

/**
 *	函数功能
 *  @param 	参数介绍
 * 	@return 返回值
 * 	@author 作者
 */

/**
 * 默认过滤函数
 * @param string $string
 * @author smh
 * @return string
 */
function filtration( $string )
{
	// TODO 过滤违禁词

	$string = htmlspecialchars( $string );
	
	return $string;
}

/**
 * 随机字符
 * @param int    验证码长度
 * @return string 
 */

function rand_string( $len = 10 )
{
	$code    = str_shuffle( "2345678abcdefhijkmnpqrstuvwxyzABCDEFGHJKLMNPQRTUVWXY" );
	$codeLen = mb_strlen( $code );
	$return  = '';
	for( $i  = 0; $i < $len; $i ++ )
	{
		$return .= $code[ mt_rand(0,$codeLen) ];
	}
	return $return;
}


/**
 * 字符串转换为数组，主要用于把分隔符调整到第二个参数
 * @param  string $str  要分割的字符串
 * @param  string $glue 分割符
 * @return array
 * @author 鬼国二少 <guiguoershao@163.com>
 */
function str2arr($str, $glue = ','){
    return explode($glue, $str);
}


/**
 * 字符串截取，支持中文和其他编码
 * @static
 * @access public
 * @param string $str 需要转换的字符串
 * @param string $start 开始位置
 * @param string $length 截取长度
 * @param string $charset 编码格式
 * @param string $suffix 截断显示字符
 * @return string
 */
function msubstr($str, $start=0, $length, $charset="utf-8", $suffix=true) {
    if(function_exists("mb_substr"))
        $slice = mb_substr($str, $start, $length, $charset);
    elseif(function_exists('iconv_substr')) {
        $slice = iconv_substr($str,$start,$length,$charset);
        if(false === $slice) {
            $slice = '';
        }
    }else{
        $re['utf-8']   = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|[\xe0-\xef][\x80-\xbf]{2}|[\xf0-\xff][\x80-\xbf]{3}/";
        $re['gb2312'] = "/[\x01-\x7f]|[\xb0-\xf7][\xa0-\xfe]/";
        $re['gbk']    = "/[\x01-\x7f]|[\x81-\xfe][\x40-\xfe]/";
        $re['big5']   = "/[\x01-\x7f]|[\x81-\xfe]([\x40-\x7e]|\xa1-\xfe])/";
        preg_match_all($re[$charset], $str, $match);
        $slice = join("",array_slice($match[0], $start, $length));
    }
    return $suffix ? $slice.'...' : $slice;
}


/**
 * 获取几小时前、几分钟前 ...
 * @param int $time
 * @return string
 */
function format_date( $time )
{
	$t = abs( $_SERVER['REQUEST_TIME'] - $time );

	$f = array(
			'31536000' => '年',
			'2592000'  => '个月',
			'604800'   => '星期',
			'86400'	   => '天',
			'3600'	   => '小时',
			'60'	   => '分钟',
			'1'		   => '秒'
		);
	foreach ($f as $k => $v) {
		if( 0 != $c = floor( $t/ (int) $k ) )
			return $c . $v . '前';
	}
}


/**
 * 获取年龄
 * @param  int 	$birth
 * @return int
 */
function getAge( $birth )
{
	if( empty( $birth ) || $_SERVER['REQUEST_TIME'] < $birth )
		return '--';
	
	$age = abs ( date('Y', $_SERVER['REQUEST_TIME'] ) - date('Y', $birth ) );

	return $age;
}

?>
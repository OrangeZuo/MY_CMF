<?php 
/***************************
|
| 数组函数	
|
|
***************************/

/**
 *	函数功能
 *  @param 	参数介绍
 * 	@return 返回值
 * 	@author 作者
 */

/**
 * 数组转换为字符串，主要用于把分隔符调整到第二个参数
 * @param  array  $arr  要连接的数组
 * @param  string $glue 分割符
 * @return string
 * @author 鬼国二少 <guiguoershao@163.com>
 */
if (!function_exists('arr2str')) {
    function arr2str($arr, $glue = ','){
        if (empty($arr) || !is_array($arr)) {
            return '';
        }
        return implode($glue, $arr);
    }
}

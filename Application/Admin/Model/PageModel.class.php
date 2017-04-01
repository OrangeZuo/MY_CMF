<?php
// +----------------------------------------------------------------------
// | Copyright (c) 齐力众信
// +----------------------------------------------------------------------
// | Author: 范思宇 
// +----------------------------------------------------------------------

namespace Admin\Model;
use Think\Model;

/**
 * 广告模型
 */
class PageModel extends Model{

    protected $_validate = array(
        array('title', 'require', '标题不能为空'),
        array('keywords', 'require', '关键字不能为空'),
        array('description', 'require', '详情描述不能为空'),
        array('content', 'require', '内容不能为空'),
        array('title', '1,20', '标题长度为1~20个字符', self::EXISTS_VALIDATE, 'length'),
        array('keywords', '1,120', '关键字长度为1~120个字符', self::EXISTS_VALIDATE, 'length'),
        array('description', '1,120', '详情描述长度为1~120个字符', self::EXISTS_VALIDATE, 'length'),
       
    );

    protected $_auto = array(
        array('updatetime', NOW_TIME, self::MODEL_INSERT),
    );
    

}
?>
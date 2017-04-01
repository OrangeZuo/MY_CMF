<?php
/**
 * Created by PhpStorm.
 * User: fengyan
 * Date: 2017/3/26
 * Time: 下午9:01
 */


/**
 * 获取图片地址
 * @param int $id
 * @return string
 */
function getPicture( $id ) {

    $model = M('Picture');

    $avatar = $model->getFieldById($id,'path');

    if( empty( $avatar ) )
        return __ROOT__ . '/Public/Home/images/default.png';
    else
        return __ROOT__ . $avatar;
}
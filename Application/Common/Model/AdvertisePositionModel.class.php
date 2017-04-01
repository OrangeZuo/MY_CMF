<?php
/**
 * Created by PhpStorm.
 * User: fengyan
 * Date: 2017/3/26
 * Time: 下午9:04
 */

namespace Common\Model;

use Think\Model;

class AdvertisePositionModel extends Model
{
    /**
     * 获取广告类型列表
     * @return mixed
     */
    public static function getAdvertiseTypeList()
    {
        return C('ADVERTISE_TYPE');
    }

    /**
     * 获取广告位列表
     * @return mixed
     */
    public static function getAdvertisePositionList()
    {
        return D('AdvertisePosition')->where('`status` = 1')->select();
    }

    /**
     * 根据id获取一条广告位信息
     * @param $id
     * @return mixed
     */
    public static function getAdvertisePositionInfoById($id)
    {
        return D('AdvertisePosition')->where('`status` = 1')->find($id);
    }
}
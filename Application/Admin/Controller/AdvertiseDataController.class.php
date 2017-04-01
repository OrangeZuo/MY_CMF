<?php
/**
 * Created by PhpStorm.
 * User: fengyan
 * Date: 2017/3/26
 * Time: 下午10:05
 */

namespace Admin\Controller;


use Common;

class AdvertiseDataController extends CrudController
{
    protected $templatePrefix = 'Advertise/data_';


    /**
     * 广告位信息
     * @var array
     */
    protected $advPositionInfo = [];

    public function _initialize(){

        $this->model = D('AdvertiseData');
        $this->model_title = ' 广告 ';
        parent::_initialize();

        if (I('get.position_id')) {
            self::$where['position_id'] = I('get.position_id');
            $this->advPositionInfo = Common\Model\AdvertisePositionModel::getAdvertisePositionInfoById(I('get.position_id'));
            $this->model_title = $this->advPositionInfo['title'].'>>广告 ';
        }

        $this->assign('advPositionInfo', $this->advPositionInfo);
    }


    /**
     * 更新之前的操作
     */
    public function updateBefore()
    {
        $type = I('post.type');

        if ($type == 2 || $type == 3) {
            $_POST['content'] = json_encode(['image'=>I('post.image'), 'image_url'=>I('post.image_url')]);
        }
    }



}
<?php
/**
 * Created by PhpStorm.
 * User: fengyan
 * Date: 2017/3/26
 * Time: 下午7:59
 */

namespace Admin\Controller;

use Common;

class AdvertisePositionController extends CrudController
{
    protected $templatePrefix = 'Advertise/position_';

    public function _initialize(){
        $this->model = D('AdvertisePosition');
        $this->model_title = '广告位 ';
        parent::_initialize();
    }

    /**
     * 广告位管理
     */
    public function index()
    {
        $list = $this->lists($this->model, [], '`id` ASC', [], '`id`, `title`, `parent_id`, `description`, `type`, `category_id`, `only_sign`, `create_time`, `update_time`, `status`');

        Cookie('__forward__',$_SERVER['REQUEST_URI']);

        $this->assign('list', $list);

        $this->assign('meta_title', $this->model_title . '管理');

        $this->display($this->templatePrefix.'index');
    }

}
<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 鬼国二少 <guiguoershao@163.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Model;
use Think\Model;

/**
 * 分类模型
 */
class ChannelModel extends Model{

	/**
	 * 获取导航列表，支持多级导航
	 * @param  boolean $field 要列出的字段
	 * @return array          导航树
	 * @author 鬼国二少 <guiguoershao@163.com>
	 */
	public function lists($field = true){
		$map = array('status' => 1,'master'=>1);
		$list = $this->field($field)->where($map)->order('sort')->select();
		return list_to_tree($list, 'id', 'pid', '_');
	}

    public function lists_foot($field = true){
        $map = array('status' => 1,'master'=>0);
        $list = $this->field($field)->where($map)->order('sort')->select();
        return list_to_tree($list, 'id', 'pid', '_');
    }

}

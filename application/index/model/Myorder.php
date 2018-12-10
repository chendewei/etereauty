<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Myorder extends Model
{
	public function getOrderList($id)
	{
		 $list=Db::name("order")->where("user_id",$id)->order("id desc")->limit(3)->select();
		
		 foreach ($list as $k => $v) {
			$pro=Db::name('pro')->where("id",$v['proid'])->field('proname,picid')->find();
			$pic=Db::name('files')->where("id in ({$pro['picid']}) and is_default = 1")->field('filepath')->find();
			if(!$pic){
			$pic=Db::name('files')->where("id in ({$pro['picid']})")->field('filepath')->find();	
		}
			$list[$k]['pic']=$pic;
			$list[$k]['pro']=$pro;
		}
		return $list;

	}
		
	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}
	
}
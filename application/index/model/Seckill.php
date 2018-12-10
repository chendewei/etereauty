<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Seckill extends Model
{
	public function getList()
	{
		$time=time();
		$list= Db::name('pro')->where("is_open",1)->where("dietime",">",$time)->select();
		foreach ($list as $k => $v) {
			$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->order('id desc')->field('filepath')->limit(1)->select();
			if(!$pic){
			$pic=Db::name('files')->where("id in ({$v['picid']})")->order('id desc')->field('filepath')->limit(1)->select();	
			}
			$list[$k]['pic']=$pic;
		}
		return $list;
	}



	

}	
<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Mycar extends Model
{
	public function getPro($id)
	{
		$list=Db::name('pro')->where("id in ($id)")->field('id,picid,proname,price,is_open,opentime,dietime,ms_price')->select();
		$time=time();	
		foreach($list as $k=>$v){
		if($v['is_open'] == 1 && $v['dietime'] > $time ){
				$list[$k]['price']= $v['ms_price'];
		}
		$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->field('filepath')->find();
		if(!$pic){
		$pic=Db::name('files')->where("id in ({$v['picid']})")->field('filepath')->find();	
		}
		$list[$k]['pic']=$pic['filepath'];
		}
	
		return $list;
	}	

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}
	

}
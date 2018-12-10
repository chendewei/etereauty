<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Big extends Model
{
	public function setList()
	{
		$pro=new Pro();
		$list=$pro->where('status',1)->where('is_lx',4)->paginate(6);
		$time=time();
		foreach ($list as $k => $v) {
			if($v['is_open'] == 1 && $v['dietime'] > $time ){
				$list[$k]['price']= $v['ms_price'];
			}
			$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->order('id desc')->field('filepath')->limit(1)->select();
			if(!$pic){
			$pic=Db::name('files')->where("id in ({$v['picid']})")->order('id desc')->field('filepath')->limit(1)->select();	
			}
			$list[$k]['pic']=$pic;
		}
	
		return $list;
	}
	
	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}
		

}
<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Gift extends Model
{
	public function setList()
	{
		$pro=new Pro();
		$list=$pro->where('status',1)->where('is_lx',3)->paginate(15);
		$time=time();
		foreach ($list as $k => $v) {
			if($v['is_open'] == 1 && $v['dietime'] > $time ){
				$list[$k]['price']= $v['ms_price'];
			}
			$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->order('id desc')->field('filepath')->limit(1)->find();
			if(!$pic){
			$pic=Db::name('files')->where("id in ({$v['picid']})")->order('id desc')->field('filepath')->limit(1)->find();	
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
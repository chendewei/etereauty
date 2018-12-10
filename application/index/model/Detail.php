<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Detail extends Model
{


	public function setInfo($id)
	{
		
		$list=Db::name('pro')->where("id",$id)->find();
		$time=time();
		if($list['is_open'] == 1 && $list['dietime'] > $time ){
				$list['gprice']=$list['price'];
				$list['price']= $list['ms_price'];
				if($list['opentime'] > time()){
				$list['stime']=$list['dietime']-$list['opentime'];
			}else{
				$list['stime']=$list['dietime']-$time;
			}
		}	

		$a=Db::name('files')->where("id in ({$list['picid']}) and is_default = 1")->order('id desc')->field('filepath')->select();
		
		if($a){
		$b=Db::name('files')->where("id in ({$list['picid']}) and is_default != 1")->order('id desc')->field('filepath')->select();
		
		$pic = array_merge($a,$b);		
		
		}else{
		$pic=Db::name('files')->where("id in ({$list['picid']})")->order('id desc')->field('filepath')->select();	
		}
		$list['pic']=$pic;
		
	
		return $list;
		/*return Db::name('pro')->order('id asc')->limit(8)->select();*/
	}


	public function setPro()
	{
		
		$list=Db::name('pro')->where('status',1)->order('id desc')->limit(4)->select();
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
		/*return Db::name('pro')->order('id asc')->limit(8)->select();*/
	}

	

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}	


	
		

}
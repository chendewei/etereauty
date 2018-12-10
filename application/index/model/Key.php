<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Key extends Model
{
	public function getKey($data)
	{
		$pro=new Pro();
		$list=$pro->where("proname",'like',"%{$data}%")->paginate(10,false,['query'=>request()->param()]);
			
		foreach ($list as $k => $v) {
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
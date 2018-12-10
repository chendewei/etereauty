<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Reg extends Model
{
	public function setReg($data)
	{
		
		$info=Db::name('users')->insertGetId($data);
		if($info){
			Cookie::set('user_id',$info,7200);
			Cookie::set('email',$info['email'],7200);
			return 1;
		}
	}

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}	

}
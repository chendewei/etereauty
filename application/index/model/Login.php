<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Login extends Model
{
	public function setLogin($data)
	{
		$pwd=md5($data['password']);
		$info=Db::name('users')->where("email","{$data['email']}")->where("pwd","{$pwd}")->find();
		if($info){
			Cookie::set('user_id',$info['id'],7200);
			Cookie::set('email',$info['email'],7200);
			return 1;
		}else{
			return 0;
		}
	}


	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}

		

}
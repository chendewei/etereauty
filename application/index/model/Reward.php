<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Reward extends Model
{
	public function setCodeList($id)
	{
		return Db::name("coupon")->where("user_id",$id)->select();
	}

	public function setAdd($data,$id)
	{
		return Db::name("coupon")->where("code","{$data}")->update(['user_id' => $id]);
	}

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}	

}
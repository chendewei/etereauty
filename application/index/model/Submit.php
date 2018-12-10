<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Submit extends Model
{

	public function getAddress($id)
	{
		$list=Db::name('customer')->where("parent_id",$id)->where("is_defult",2)->find();
		if(!$list){
		$list=Db::name('customer')->where("parent_id",$id)->find();	
		}
		$email=Db::name('users')->where("id",$id)->field('email')->find();
		$list['em']=$email['email'];
		return $list;
	}
	
	public function setDd($data)
	{
		return Db::name('order')->insert($data);
	}

	public function getPay()
	{

		return Db::name('pay')->find();

	}

	public function setDelOrder($userid)
	{
		return Db::name('cart')->where("user_id",$userid)->delete();
	}

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}

}
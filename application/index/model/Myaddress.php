<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Myaddress extends Model
{
	public function getCountryList()
	{
		return Db::name("country")->select();
	}

	public function setAdd($data)
	{
		return Db::name("customer")->insert($data);
	}

	public function getAddressList($id)
	{
		return Db::name('customer')->where("parent_id",$id)->select();
	}

	public function setDel($id)
	{
		return Db::name('customer')->where("id",$id)->delete();
	}

	public function setStatus($id,$userid)
	{
		$change=Db::name('customer')->where('parent_id', $userid)->update(['is_defult' => '1']);
		
		
		return Db::name('customer')->where('id', $id)->update(['is_defult' => '2']);
		
	}

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}
		

}
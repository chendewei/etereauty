<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Contact extends Model
{
	public function setAdd($data)
	{
		return Db::name('message')->insert($data);
	}	

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}	

	public function getInfo()
	{
		return Db::name('set')->find();
	}

}
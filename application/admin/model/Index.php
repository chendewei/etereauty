<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Index extends Model
{
	public function setList()
	{
		return Db::name('customer')->paginate(8,false,['query'=>request()->param()]);
	}

	public function setUserCount()
	{
		return Db::name('customer')->count();
	}

	public function setProCount()
	{
		return Db::name('pro')->count();
	}

	public function setOrderCount()
	{
		return Db::name('order')->count();
	}

	public function setBookCount()
	{
		return Db::name('book')->count();
	}
	
		

}
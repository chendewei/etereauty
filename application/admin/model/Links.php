<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Links extends Model
{
	public function setList()
	{
		return Links::all();
	}

	public function setAdd($data)
	{
		return Db::name("links")->insert($data);
	}

	public function setInfo($id)
	{
		return Links::get($id);
	}

	public function setEdit($data,$id)
	{
		return Db::name("links")->where("id",$id)->update($data);
	}

	public function setDel($id)
	{
		return Links::destroy($id);
	}

	public function setStatus($date,$id)
	{
		return Db::name("links")->where("id",$id)->update($date);
	}

	public function setDelAll($id)
	{
		return Db::name('links')->where("id in ($id)")->delete();
	}

		

}
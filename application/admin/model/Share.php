<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Share extends Model
{
	public function setList()
	{
		return Share::all();
	}

	public function setAdd($data)
	{
		return Db::name("Share")->insert($data);
	}

	public function setInfo($id)
	{
		return Share::get($id);
	}

	public function setEdit($data,$id)
	{
		return Db::name("Share")->where("id",$id)->update($data);
	}

	public function setDel($id)
	{
		return Share::destroy($id);
	}

	public function setStatus($date,$id)
	{
		return Db::name("Share")->where("id",$id)->update($date);
	}

	public function setDelAll($id)
	{
		return Db::name('Share')->where("id in ($id)")->delete();
	}

		

}
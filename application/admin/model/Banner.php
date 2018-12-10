<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Banner extends Model
{
	public function setList()
	{
		return Banner::paginate(20,false,['query'=>request()->param()]);
	}

	public function setAdd($data)
	{
		return Db::name('banner')->insert($data);
	}

	public function setInfo($id)
	{
		return Db::name('banner')->where("id",$id)->find();
	}

	public function setEdit($data,$id)
	{
		return Db::name('banner')->where("id",$id)->update($data);
	}

	public function setDel($id)
	{
		return Db::name('banner')->where("id",$id)->delete();
	}

	public function setDelAll($id)
	{
		return Db::name('banner')->where("id in ($id)")->delete();
	}

		

}
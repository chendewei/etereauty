<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Article extends Model
{
	public function setList($where)
	{
		return Db::name('article')->where($where)->paginate(20,false,['query'=>request()->param()]);
	}

	public function setAdd($data)
	{
		return Db::name('article')->insert($data);
	}

public function setInfo($id)
	{
		return Db::name('article')->where("id",$id)->find();
	}

	public function setEdit($data,$id)
	{
		return Db::name('article')->where("id",$id)->update($data);
	}

		public function setDel($id)
	{
		return Db::name('article')->where("id",$id)->delete();
	}

	public function setDelAll($id)
	{
		
		return Db::name('article')->where("id in ($id)")->delete();
	}

		

}
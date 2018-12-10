<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Commont extends Model
{
	public function getInfo($id)
	{

		return Db::name('commont')->where("pro_id",$id)->paginate(10,false,['query'=>request()->param()]);

	}

	public function getProUrl($id)
	{
		return Db::name('pro')->where("id",$id)->field('external')->find();
	}

	public function SetDiscuss($date){
		return Db::name('commont')->insertAll($date);

	}

	public function setAdd($data)
	{
		return Db::name('commont')->insert($data);
	}

	public function setEdit($data,$id)
	{
		return Db::name('commont')->where("id",$id)->update($data);
	}

	public function setInfo($id)
	{
		return Db::name('commont')->where("id",$id)->find();
	}


	public function setDel($id)
	{
		return Db::name('commont')->where("id",$id)->delete();
	}
		

}
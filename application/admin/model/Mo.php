<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Mo extends Model
{
	public function setList()
	{
		return Mo::all();
	}

	public function setAdd($data)
	{
		return Db::name("mo")->insert($data);
	}

	public function setInfo($id)
	{
		return Mo::get($id);
	}

	public function setEdit($data,$id)
	{
		if($data['is_check'] == 1){
		 $re=Db::name("mo")->where("id != $id")->update(['is_check' => '2']);
		}
		return Db::name("mo")->where("id",$id)->update($data);
	}

	public function setDel($id)
	{
		return Mo::destroy($id);
	}


	public function setDelAll($id)
	{
		return Db::name('mo')->where("id in ($id)")->delete();
	}

		

}
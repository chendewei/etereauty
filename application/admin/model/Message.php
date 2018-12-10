<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Message extends Model
{
	public function setList()
	{
		return Message::paginate(20,false,['query'=>request()->param()]);
	}

	public function setCheck($id)
	{
		return Db::name('message')->where("id",$id)->find();
	}

	public function setDel($id)
	{
		return Message::destroy($id);
	}

	public function setSmtp()
	{
		return Db::name('smtp')->find();
	}
	
	public function setEdit($data,$id)
	{
		return Db::name('message')->where("id",$id)->update($data);
	}


	public function setDelAll($id)
	{
		return Db::name('message')->where("id in ($id)")->delete();
	}

		

}
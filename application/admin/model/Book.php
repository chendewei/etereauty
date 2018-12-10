<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Book extends Model
{
	public function setList($where)
	{
		return Book::where($where)->paginate(20,false,['query'=>request()->param()]);
	}

	public function setEdit($data,$id)
	{ 
		return Db::name("book")->where("id",$id)->update($data);
	}

	public function setDel($id)
	{
		return Db::name("book")->where("id",$id)->delete();
	}

	public function setDelAll($id)
	{
		return Db::name('book')->where("id in ($id)")->delete();
	}



}
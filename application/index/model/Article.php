<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Article extends Model
{
	
	public function setInfo($id)
	{
		return Db::name('article')->where("id",$id)->find();
	}
	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}
	
	
}
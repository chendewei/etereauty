<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Book extends Model
{
	public function setAdd($data)
	{
		

		return Db::name('book')->insert($data);
	}	

	public function setExit($data)
	{
		$exit= Db::name('book')->where("email",$data)->find();
		if($exit)
			return 1;
		else
			return 0;
	}	


}
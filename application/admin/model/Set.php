<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Set extends Model
{
	public function setHost(){
		$host = Set::get(1);
		return $host;
	}

	public function setAdd($data){
		$set = new Set($_POST);
		$host=$set->find();

		if($host){
			
		$result=$set->where('host_id',$host['host_id'])->update($data);
			
		}else{
		$result=$set->allowField(true)->save();
		}
		return $result;
	}

	public function setSmtp()
	{
		return Db::name('smtp')->find();
	}
		

}
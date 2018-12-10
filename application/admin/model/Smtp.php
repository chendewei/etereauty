<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Smtp extends Model
{
	public function setInfo(){
		$smtp = Smtp::get(1);
		return $smtp;
	}

	public function setSmtp($data){
		$smtp = new Smtp($_POST);
		$exit=$smtp->find();

		if($exit)
			$result=$smtp->where('smtp_id',$exit['smtp_id'])->update($data);
		else
			$result=$smtp->allowField(true)->save();
		
		return $result;
		
	}
	

}
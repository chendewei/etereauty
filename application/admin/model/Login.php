<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Login extends Model
{
	public function isexit($data){
		$admin_info=Db::table('gw_admin_user')
					->where("admin_name","{$data['admin_name']}")
					->where("admin_pwd","{$data['admin_pwd']}")
					->find();
		
		return $admin_info;
	}
		

}
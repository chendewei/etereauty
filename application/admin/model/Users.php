<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Users extends Model
{
	public function setRole()
	{
		
		$result=Db::name("auth_group")->where('status',1)->paginate(10,false,['query'=>request()->param()]);
		return $result;
	}

	public function setRoleAdd($data)
	{
		return Db::name("auth_group")->insert($data);
	}

	public function setRoleEdit($data,$id)
	{
		return Db::name("auth_group")->where("id",$id)->update($data);
	}

	public function setRuleData()
	{
		return Db::name("auth_rule")->where("status",1)->order("id asc")->select();
	}

	public function setRoleDel($id)
	{
		return Db::name("auth_group")->where("id",$id)->delete();
	}

	public function setRdelAll($id)
	{
		return Db::name("auth_group")->where("id in ($id) ")->delete();
	}

	public function setList()
	{
		return Db::name("admin_user")->paginate(10);
	}

	public function setListData()
	{
		return Db::name("auth_group")->where("status",1)->select();
	}

	public function setIsExit($data)
	{
		return Db::name("admin_user")->where("admin_name","{$data['admin_name']}")->find();
	}

	public function setListAdd($data)
	{
		$res1=Db::name("admin_user")->insertGetId(['admin_name'=>$data['admin_name'],'admin_pwd'=>md5($data['admin_pwd']),'datetime'=>time()]);
		$group['group_id']=$data["group_id"];
		$group['uid']=$res1;
		$res2=Db::name("auth_group_access")->insert($group);
		if($res1 && $res2)
		return 1 ;
	}

	public function setIsCheck($data,$id)
	{
		return Db::name("admin_user")->where("id",$id)->find();
	}

	public function setListEdit($data,$id)
	{
		$res1=Db::name("admin_user")->where("id",$id)->update(['admin_name'=>$data['admin_name'],'admin_pwd'=>md5($data['admin_pwd']),'datetime'=>time()]);
		$group['group_id']=$data["group_id"];
		$group['uid']=$id;
		$res2=Db::name("auth_group_access")->where("uid",$id)->update($group);
		if($res1 && $res2)
		return 1 ;
	}

	public function setListDel($id)
	{
		return Db::name("admin_user")->where("id",$id)->delete();
	}

	public function setLdelAll($id)
	{
		return Db::name("admin_user")->where("id in ($id) ")->delete();
	}

	public function setPermission()
	{
		return Db::name("auth_rule")->paginate(20);
	}

	public function setPermissionAdd($data)
	{
		return Db::name('auth_rule')->insert($data);
	}

	public function setPermissionEdit($data,$id)
	{
		return Db::name('auth_rule')->where('id',$id)->update($data);
	}

	public function setPermissionDel($id)
	{
		return Db::name("auth_rule")->where("id",$id)->delete();
	}

	public function setPdelAll($id)
	{
		return Db::name("auth_rule")->where("id in ($id) ")->delete();
	}




}
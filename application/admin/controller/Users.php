<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Users as UsersModel;


class Users extends Base
{
	public function admin_role()
	{
		$users=new UsersModel();
		$list=$users->setRole();
		$page=$list->render();
		$data=$users->setRuleData();

		$this->assign('list', $list);
		$this->assign('data', $data);
		$this->assign('page', $page);
		return $this->fetch();
	}

	public function admin_role_add()
	{
		
		$users=new UsersModel();
		if(request()->isPost()){
			$form=input("post.");
			$date['title']=input("post.roleName");
			
			$date['rules']=implode(",",$form['check']);
			
			$date['status']=1;

			$result=$users->setRoleAdd($date);
			if($result)
				$msg=array('data'=>1,);	
			else
				$msg=array('data'=>'',);

			return json_encode($msg);
		}
	}


	public function admin_role_edit()
	{
		$users=new UsersModel();
		$id=input("id");
		if(request()->isPost()){
			$form=input("post.");
			$date['title']=input("post.roleName");
			
			$date['rules']=implode(",",$form['check']);	
			
			$date['status']=1;

			$result=$users->setRoleEdit($date,$id);
			if($result)
				$msg=array('data'=>1,);	
			else
				$msg=array('data'=>'',);

			return json_encode($msg);
		}
		
	}

	public function admin_role_del()
	{
		$id=input("id");
		$users=new UsersModel();

		$result=$users->setRoleDel($id);
    	if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);

	}

	public function rdel_all()
	{
		$id=input("post.");
		foreach ($id as $k => $v) {
			foreach ($v as $k1 => $v1) {
				$ids[]=$v1;
			}
		}
		$users=new UsersModel();
		$did=implode(",",$ids);
		$result=$users->setRdelAll($did);
		if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);
	}


	public function admin_list()
	{	
		$users=new UsersModel();
		$list=$users->setList();
		$page=$list->render();
		$num=input("page");
        if($num)
            $count=10*($num-1);
        else
            $count=0;
     
        $data=$users->setListData();

		$this->assign('list', $list);
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('count', $count);

		return $this->fetch();
	}

	public function admin_list_add()
	{
		$users=new UsersModel();
		if(request()->isPost()){
			$form=input("post.");
			$name=$users->setIsExit($form);
			
			if(!$name)
			$result=$users->setListAdd($form);
			
			if($result)
			$msg=array('data'=>1,);	
			
			return json_encode($msg);
		}
	}

	public function admin_list_edit()
	{
		$users=new UsersModel();
		$id=input("id");
		if(request()->isPost()){
			$form=input("post.");
			$name=$users->setIsCheck($form,$id);

			
			if(!$form['admin_pwd'])
				$data['admin_pwd']=$name['admin_pwd'];
			else
				$data['admin_pwd']=md5($form['admin_pwd']);

			$result=$users->setListEdit($form,$id);
			
			if($result)
			$msg=array('data'=>1,);	
			else
    		$msg=array('data'=>0,);	
    	
			return json_encode($msg);
		}
	}

	public function list_del()
	{
		$id=input("id");
		$users=new UsersModel();

		$result=$users->setListDel($id);
    	if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);
	}

	public function ldel_all()
	{
		$id=input("post.");
		foreach ($id as $k => $v) {
			foreach ($v as $k1 => $v1) {
				$ids[]=$v1;
			}
		}
		$users=new UsersModel();
		$did=implode(",",$ids);
		$result=$users->setLdelAll($did);
		if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);
	}

	public function admin_permission()
	{
		$users=new UsersModel();
		$list=$users->setPermission();
		$page=$list->render();
		$num=input("page");
        if($num)
            $count=20*($num-1);
        else
            $count=0;
     
		$this->assign('list', $list);
		$this->assign('page', $page);
		$this->assign('count', $count);

		return $this->fetch();
	}

	public function permission_add()
	{
		$users=new UsersModel();
		if(request()->isPost()){
			$data=input("post.");
			$data['type']=1;
			$data['status']=1;
			$data['condition']='';
			$result=$users->setPermissionAdd($data);
			if($result)
				$msg=array('data'=>1,);	
			else
				$msg=array('data'=>'',);

			return json_encode($msg);	

		}

	}
	public function permission_edit()
	{	
		$id=input("id");
		$users=new UsersModel();
		if(request()->isPost()){
			$data=input("post.");
			$data['type']=1;
			$data['status']=1;
			$data['condition']='';
			$result=$users->setPermissionEdit($data,$id);
			if($result)
				$msg=array('data'=>1,);	
			else
				$msg=array('data'=>0,);

			return json_encode($msg);	


		}
	}

	public function permission_del()
	{
		$id=input("id");
		$users=new UsersModel();

		$result=$users->setPermissionDel($id);
    	if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);

	}

	public function pdel_all()
	{
		$id=input("post.");
		foreach ($id as $k => $v) {
			foreach ($v as $k1 => $v1) {
				$ids[]=$v1;
			}
		}
		$users=new UsersModel();
		$did=implode(",",$ids);
		$result=$users->setPdelAll($did);
		if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);
	}




}
<?php 
namespace app\admin\controller;
use think\Controller;
use think\Model;
use think\Session;
use think\Db;
use app\admin\model\Proclass as ClassModel;


class Proclass extends Base
{
	public function index(){
		$class=new ClassModel();
		$class_list=$class->setList();
		$nav_list=$class->navList();
		

		$this->assign('nav_list',$nav_list);
		$this->assign('class_list',$class_list);
		return $this->fetch();
	}

	public function add(){
		if(request()->isPost()){
			$form=input("post.");
			$class=new ClassModel();
			$result=$class->addClass($form);

    		if($result)
    		$msg=array('data'=>0,);
    		else
			$msg=array('data'=>1,);
			return json_encode($msg);
			
		}
	}

	public function del()
	{
		$class=new ClassModel();
		$id=input("id");
		$result=$class->setDel($id);

		if($result)
    		$msg=array('data'=>1,);
    	else
			$msg=array('data'=>'',);
		return json_encode($msg);
	}


}
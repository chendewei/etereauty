<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Customer as CustomerModel;

class Customer extends Base
{
    public function index()
    {
    	$cus=new CustomerModel();
        $where="";
        if(input('key')){
            $key=input('key');
            $where="username = '{$key}' or phone = '{$key}' or email = '{$key}'";
        }
		$list=$cus->setList($where);
        
		$page=$list->render();
		$num=input("page");
        if($num)
            $count=10*($num-1);
        else
            $count=0;

		$this->assign('list', $list);
		$this->assign('count', $count);
		$this->assign('page', $page);

        return $this->fetch();
    }

    public function add()
    {
    	$cus=new CustomerModel();
    	if(request()->isPost()){
    		$form=input("post.");
    		$form['datetime']=time();
    		$form['status']=1;
    		$result=$cus->setAdd($form);

    		if($result)
			$msg=array('data'=>1,);	
			else
    		$msg=array('data'=>0,);	
    	
			return json_encode($msg);
    	}
    }

    public function edit()
    {
    	$cus=new CustomerModel();
    	$id=input("id");
    	if(request()->isPost()){
    		$form=input("post.");
    		$form['datetime']=time();
    		
    		$result=$cus->setEdit($form,$id);

    		if($result)
			$msg=array('data'=>1,);	
			else
    		$msg=array('data'=>0,);	
    	
			return json_encode($msg);
    	}
    }

    public function del()
    {
    $cus=new CustomerModel();
    $id=input("id");
    $result=$cus->setDel($id);
    if($result)
    $msg=array('data'=>1,);
    else
    $msg=array('data'=>0,);	

	return json_encode($msg);
	}

	public function del_all()
	{
		$id=input("post.");
		foreach ($id as $k => $v) {
			foreach ($v as $k1 => $v1) {
				$ids[]=$v1;
			}
		}
		$cus=new CustomerModel();
		$did=implode(",",$ids);
		$result=$cus->setDelAll($did);
		if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);
	}

	public function status()
	{
		$cus=new CustomerModel();
    	$id=input("id");
    	$status=$cus->setCheck($id);
    	if($status['status'] == 1)
    		$data=array('status'=>2 );
    	else
    		$data=array('status'=>1 );

    	$result=$cus->setStatus($data,$id);
    	if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	

		return json_encode($msg);
	}

}


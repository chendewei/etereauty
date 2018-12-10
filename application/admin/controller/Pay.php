<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Pay as PayModel;


class Pay extends Base
{
    public function index()
    {
    	$cus=new PayModel();
		$list=$cus->setList();
	
		$this->assign('list', $list);
		
        return $this->fetch();
    }

    public function edit()
    {
    	$cus=new PayModel();
    	$id=input("id");
    	if(request()->isPost()){
    		$result = $cus->setEdit($id);

    		if($result)
				$msg=array('data'=>1,);	
			else
				$msg=array('data'=>'',);

			return json_encode($msg);
		

    	}

    }
}

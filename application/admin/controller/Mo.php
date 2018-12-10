<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Mo as MoModel;


class Mo extends Base
{
    public function index()
    {
    	$mo=new MoModel();
		$list=$mo->setList();
	
		$this->assign('list', $list);
		
        return $this->fetch();
    }

    public function add()
    {
        $mo=new MoModel();
        if(request()->isPost()){
        $form=input("post.");

        $result=$mo->setAdd($form);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 

        return json_encode($msg);

        }
        
    }

    public function edit()
    {
        $mo=new MoModel();
        $id=input("id");
        
        if(request()->isPost()){
            $form=input("post.");

            $result=$mo->setEdit($form,$id);
            if($result)
            $msg=array('data'=>1,);
            else
            $msg=array('data'=>0,); 

            return json_encode($msg);

        }
        
    }

    public function del()
    {
        $mo=new MoModel();
        $id=input("id");
        
        $result=$mo->setDel($id);
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
        $mo=new MoModel();
        $did=implode(",",$ids);
        $result=$mo->setDelAll($did);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 
        return json_encode($msg);
    }

}

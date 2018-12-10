<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Links as linksModel;


class Links extends Base
{
    public function index()
    {
    	$link=new linksModel();
		$list=$link->setList();
	
		$this->assign('list', $list);
		
        return $this->fetch();
    }

    public function add()
    {
        $link=new linksModel();
        if(request()->isPost()){
            $form=input("post.");
            $form['pic']=saveBase64Image($form['img'][0]);
            $date['name']=$form['name'];
            $date['url']=$form['url'];
            $date['pic']=$form['pic']['url'];
            $date['status']=$form['status'];

            $result=$link->setAdd($date);
            if($result)
                $msg=array('data'=>1,); 
            else
                $msg=array('data'=>'',);

            return json_encode($msg);

        }
        
    }

    public function edit()
    {
        $link=new linksModel();
        $id=input("id");
        $info=$link->setInfo($id);
        
        if(request()->isPost()){
            $form=input("post.");
        
            if(isset($form['img'])){
            unlink("./"."{$info['pic']}");
            $form['pic']=saveBase64Image($form['img'][0]);
            $date['pic']=$form['pic']['url'];
            }else{
            $date['pic']=$info['pic'];   
            }
            $date['name']=$form['name'];
            $date['url']=$form['url'];
            
            $date['status']=$form['status'];

            $result=$link->setEdit($date,$id);
            if($result)
                $msg=array('data'=>1,); 
            else
                $msg=array('data'=>'',);

            return json_encode($msg);

        }
        
    }

    public function del()
    {
        $link=new linksModel();
        $id=input("id");
        
        $info=$link->setInfo($id);
        unlink("./"."{$info['pic']}");

        $result=$link->setDel($id);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 

        return json_encode($msg);
    }

    public function status()
    {
        $link=new linksModel();
        $id=input("id");
        $info=$link->setInfo($id);
        
        if($info['status'] == 1)
            $date['status']=2;
        else
            $date['status']=1;

        $result=$link->setStatus($date,$id);
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
        $link=new linksModel();
        $did=implode(",",$ids);
        $result=$link->setDelAll($did);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 
        return json_encode($msg);
    }

}

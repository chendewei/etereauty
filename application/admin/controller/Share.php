<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Share as shareModel;


class Share extends Base
{
    public function index()
    {
    	$share=new shareModel();
		$list=$share->setList();
	
		$this->assign('list', $list);
		
        return $this->fetch();
    }

    public function add()
    {
        $share=new shareModel();
        if(request()->isPost()){
            $form=input("post.");
            if(isset($form['img'])){
            $form['pic']=saveBase64Image($form['img'][0]);
            $date['pic']=$form['pic']['url'];
            }else{
            $date['pic']='';
            }
            $date['name']=$form['name'];
            $date['url']=$form['url'];
            
            $date['status']=$form['status'];

            $result=$share->setAdd($date);
            if($result)
                $msg=array('data'=>1,); 
            else
                $msg=array('data'=>'',);

            return json_encode($msg);

        }
        
    }

    public function edit()
    {
        $share=new shareModel();
        $id=input("id");
        $info=$share->setInfo($id);
        
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

            $result=$share->setEdit($date,$id);
            if($result)
                $msg=array('data'=>1,); 
            else
                $msg=array('data'=>'',);

            return json_encode($msg);

        }
        
    }

    public function del()
    {
        $share=new shareModel();
        $id=input("id");
        
        $info=$share->setInfo($id);
        if($info['pic']){
        unlink("./"."{$info['pic']}");
        }

        $result=$share->setDel($id);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 

        return json_encode($msg);
    }

    public function status()
    {
        $share=new shareModel();
        $id=input("id");
        $info=$share->setInfo($id);
        
        if($info['status'] == 1)
            $date['status']=2;
        else
            $date['status']=1;

        $result=$share->setStatus($date,$id);
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
        $share=new shareModel();
        $did=implode(",",$ids);
        $result=$share->setDelAll($did);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 
        return json_encode($msg);
    }

}

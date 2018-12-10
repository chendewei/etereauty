<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Cookie;
use think\Db;
use app\index\model\Reg as RegModel;

class Reg extends Common
{
    public function index()
    {   
        $reg=new RegModel();
        $mo=$reg->getMo();
        $user_id=Cookie::get('user_id');
        if($user_id){
            echo 0;die;
        }

        
        if(request()->isPost()){
            $form=input("post.");
            $data['pwd']=md5($form['pwd']);
            $data['email']=$form['email'];

            $result=$reg->setReg($data);
            if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
      
            return json_encode($msg);
        }
 
        return $this->fetch('reg/'.$mo['url']);
    }

    
}

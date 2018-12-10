<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Login as LoginModel;

class Login extends Common
{
    public function index()
    {
        
        $login=new LoginModel();
         $mo=$login->getMo();
    	if(request()->isPost()){
            $form=input("post.");
            $result=$login->setLogin($form);
            if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
      
            return json_encode($msg);


        }
 
        return $this->fetch('login/'.$mo['url']);
    }

    public function login_out()
    {
        Cookie::delete('user_id');
        Cookie::delete('email');
        echo "<script>alert('Withdraw from success');window.location.href='/'</script>";
    }
}

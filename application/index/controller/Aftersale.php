<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
/*use app\index\model\Aftersale as AftersaleModel;*/

class Aftersale extends Common
{
    public function index()
    {	
      if(request()->isPost()){
        $form=input("post.");
        $form['datetime']=time();

        $result=Db::name('aftersale')->insert($form);
        if($result)
        $msg=array('data'=>1,); 
        else
        $msg=array('data'=>0,); 
      
        return json_encode($msg);
      }

      return $this->fetch();
    }

   
}

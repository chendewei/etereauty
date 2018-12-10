<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Common as CommonModel;


class Common extends Controller
{
	  public function _initialize()
    {
    	$user_id=Cookie::get('user_id');


    	$com=new CommonModel();
    	$nav=$com->setNav();
        $share=$com->setShare();
        
        $set=$com->setHtml();
    	$link=$com->setLink();

        $this->assign("nav",$nav);  
        $this->assign("share",$share);  
    	$this->assign("set",$set);	
    	$this->assign("link",$link);	
    	$this->assign("user_id",$user_id);

    }

}
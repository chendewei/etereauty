<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Mycar as MycarModel;

class Mycar extends Common
{
    public function index()
    {	
    	$car=new MycarModel();
    	$user_id=Cookie::get('user_id');
  		if(!$user_id){
            echo "<script>alert('Please log in');window.location.href='/'</script>";die;
        }

        $proid=Cookie::get('proid');
    	$num=Cookie::get('num')?Cookie::get('proid'):1;
    	if(!$proid){
    	$list = array();
    	}else{
    	$list=$car->getPro($proid);	
    	}
         $mo=$car->getMo();

 		$this->assign("proid",$proid);
    	$this->assign("num",$num);
    	$this->assign('list',$list);
        return $this->fetch('mycar/'.$mo['url']);
    }

    public function del()
    {
    	$id=input("id");

    	$get_pro=Cookie::get('proid');
    	$get_num=Cookie::get('num');

    	
	
    	if(strpos($get_pro,",") !== false){
    		
    	$arr=explode(",", $get_pro);
    	$del_v=array_diff($arr,["$id"]);
    	$str=implode(",",$del_v);
    	Cookie::set('proid',$str,7200);
    	Cookie::set('num',1,7200);
    	echo "<script>window.location.href='/index/mycar/index.html'</script>";
    	}else{
    	
    	Cookie::delete('proid');
    	Cookie::delete('num');
    	echo "<script>window.location.href='/index/mycar/index.html'</script>";
    	}
    	
    }



}
<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Myorder as MyorderModel;

class Myorder extends Common
{
    public function index()
    {
        $order=new MyorderModel();
        $mo=$order->getMo();
        $user_id=Cookie::get('user_id');
        if(!$user_id){
            echo "<script>alert('Please log in');window.location.href='/'</script>";die;
        }
        $list=$order->getOrderList($user_id);
    	$this->assign("list",$list);
        return $this->fetch('myorder/'.$mo['url']);
    }



}
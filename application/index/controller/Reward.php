<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Reward as RewardModel;

class Reward extends Common
{
    public function index()
    {   
        $re=new RewardModel();
        $mo=$re->getMo();
        $user_id=Cookie::get('user_id');
        if(!$user_id){
            echo "<script>alert('Please log in');window.location.href='/'</script>";die;
        }
    	$list=$re->setCodeList($user_id);
        $this->assign('list',$list);
        return $this->fetch('reward/'.$mo['url']);
    }

    

    public function add()
    {
    	$re=new RewardModel();
    	$user_id=Cookie::get('user_id');
        if(request()->isPost()){
            $name=input("post.name");
          
    	   $result=$re->setAdd($name,$user_id);
    	   if($result){
    		echo "<script>window.location.href='/index/reward/index.html'</script>";die;
            }else{
            echo "<script>alert('Non-existent');window.location.href='/index/reward/index.html'</script>";die;    
            }
    	}	
    }

   

}
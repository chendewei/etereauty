<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Myaddress as MyaddressModel;
use app\index\model\Reward as RewardModel;
use app\index\model\Myorder as MyorderModel;
use app\index\model\User as UserModel;

class Myaddress extends Common
{
    public function index()
    {
    	$user_id=Cookie::get('user_id');
        if(!$user_id){
            echo "<script>alert('Please log in');window.location.href='/index/login/index.html'</script>";die;
        }
    	$add=new MyaddressModel();
        $re=new RewardModel();
        $order=new MyorderModel();
        $order=new MyorderModel();
        $user=new UserModel();
    	$gj_list=$add->getCountryList();
        $user_info=$user->getUserInfo($user_id);
    	$list=$add->getAddressList($user_id);
        $mo=$add->getMo();
        $r_list=$re->setCodeList($user_id);
        $o_list=$order->getOrderList($user_id);
  
        $this->assign("o_list",$o_list);   
        $this->assign("user_info",$user_info);
        $this->assign('r_list',$r_list);
    	$this->assign("gj_list",$gj_list);
    	$this->assign("list",$list);
        return $this->fetch('myaddress/'.$mo['url']);
    }

    public function add()
    {
    	$add=new MyaddressModel();

    	$email=Cookie::get('email');
    	$user_id=Cookie::get('user_id');
    	if(request()->isPost()){

    		$form=input("post.");
  
            if(!$form['name'] || !$form['phone'] || !$form['address'] ||!$form['zip']){
                $msg=array('data'=>0,); 
        
                return json_encode($msg);
            }

    		$data['username']=$form['f_name'].",".$form['l_name'];

    		$data['phone']=$form['phone'];
            $data['email']='';
            $data['country']=$form['country'];
            $data['province']=$form['province'];
            $data['city']=$form['city'];
            $data['address']=$form['address'];
    		$data['address1']=$form['address1'];
    		$data['datetime']=time();
    		$data['zip']=$form['zip'];
    		$data['parent_id']=$user_id;
    		$result=$add->setAdd($data);
           
    		if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
        
            return json_encode($msg);

    	}

    }

    public function address_del()
    {
    	$add=new MyaddressModel();
    	
    	$id=input('id');
    	$result=$add->setDel($id);
    	if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
        
            return json_encode($msg);
    		
    }

    public function defult()
    {
    	$add=new MyaddressModel();
    	$user_id=Cookie::get('user_id');
    	$id=input('id');
    	

    	$result=$add->setStatus($id,$user_id);
    	if($result){
    		echo "<script>window.location.href='/index/myaddress/index.html'</script>";die;
    	}
    }

    public function code_del()
    {
       $re=new RewardModel();
        
        $id=input('id');
        $result=$re->setDel($id);
    
        if($result)
        $msg=array('data'=>1,); 
        else
        $msg=array('data'=>0,); 
        
        return json_encode($msg);

            
    }

    public function user_pic()
    {
        if(request()->isPost()){
            $re=new UserModel();
            $pic=input('post.image');
            $user_id=Cookie::get('user_id');
            $result=$re->setUserPic($pic,$user_id);
            if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
        
            return json_encode($msg);

        }
    }

    public function users_edit()
    {
        $user_id=Cookie::get('user_id');
        if(request()->isPost()){

           $re=new UserModel(); 
           $pwd=md5(input("post.newPass"));
           $result=$re->setUserPwd($pwd,$user_id); 
           if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
        
            return json_encode($msg);

        }
    }


}
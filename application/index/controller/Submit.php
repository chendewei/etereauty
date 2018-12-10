<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Submit as SubmitModel;

class Submit extends Common
{
    public function index()
    {	
    	$sb=new SubmitModel();
      $mo=$sb->getMo();
    	$form=input("post.");

  		$shipping=input("post.shipping");
  		$user_id=Cookie::get('user_id');
  		$info=$sb->getAddress($user_id);

      $info['name']=explode(",",$info['username']);
  		$payinfo=$sb->getPay();
  		$num=$form['num'];
      $sku=$form['sku'];
  		$alltotal=$form['total'];
  		$proid=$form['proid'];
      $ddid=$payinfo['ddid'];
  		$pro_pic=$form['pro_pic'];
  		$price=$form['price'];

  		$pro_name=$form['pro_name'];
  		$str="";
  		$str2="";
   
      $toprice=0;
      $cn=count($num);
      for ($i=0; $i <$cn ; $i++) {
        $proname=substr($pro_name[$i],0,35);
         $str.="<li>
        <div class='name'>
        <span class='img'><img src='{$pro_pic[$i]}' style='width:14%'></span>
        <span class='title'>{$proname}...</span>
        </div>
        <div class='price'>$ {$price[$i]}</div>
        </li>";
        $toprice+=$price[$i];
    }
    
        		for ($i=0; $i <$cn; $i++) { 
			$y=$i+1;
			$str2.="<input value='etereauty-{$sku[$i]}-{$proid[$i]}-{$ddid}' type='hidden' name='item_name_{$y}'>
      <input value='{$num[$i]}' type='hidden' name='item_number_{$y}'>
			<input value='{$num[$i]}' type='hidden' name='quantity_{$y}'>
			<input type='hidden' value='{$price[$i]}' name='amount_{$y}'/>
			<input type='hidden' name='shipping_1' value='{$shipping}'>";
    }

  

  		//订单生成
  		$dd=rand(10000,19999).time();
  		$data['ordernum']=$dd;
  		$data['ordertime']=time();
  		$data['proname']=implode(",",$pro_name);
  		$data['buyer']=$info['username'];
      $data['alltotal']=$alltotal;
      $data['price']=implode(",",$price);
  		$data['ship']=$shipping;
  		$data['num']=implode(",",$num);
  		$data['paytype']='paypal';
      $data['status']=1;
  		$data['proid']=implode(",",$proid);
  		$data['truename']=$info['username'];
  		$data['phone']=$info['phone'];
  		$data['email']=$info['email'];
  		$data['address']=$info['address'];
  		$data['zip']=$info['zip'];
  		$data['user_id']=$user_id;

  		$result=$sb->setDd($data);
      if($result)
        Cookie::delete('Carts');
  		

  	
      $this->assign('dd',$dd);
      $this->assign('toprice',$toprice);
      $this->assign('cn',$cn);
  		$this->assign('alltotal',$alltotal);
  		$this->assign('str2',$str2);
  		$this->assign('payinfo',$payinfo);
  		$this->assign('info',$info);
  		$this->assign('shipping',$shipping);
  		$this->assign('str',$str);

        return $this->fetch('submit/'.$mo['url']);
    }

   
}

<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Order as OrderModel;

class Order extends Common
{
    public function index()
    {
        
        $order=new OrderModel();
        $mo=$order->getMo();
        $user_id=Cookie::get('user_id');
         
        
        $data=input("get.");
        
        $num=input("get.")['pn'];
        $proid=input("get.")['proid'];
        $price=input("get.")['price'];
     
       if($user_id){
        $user_info=$order->getUser($user_id);
        $address=$order->getAddress($user_id); 
        $address['name']=explode(",",$address['username']);
        $this->assign('user_info',$user_info);
        $this->assign('address',$address);
       }
       $country=$order->getCountry();

       $province=$order->getProvince();

        $get_pro=implode(",",$proid);

        $list=$order->getPro($get_pro,$num);

 
        
        $this->assign('user_id',$user_id);
        $this->assign('province',$province);
        $this->assign('country',$country);
        $this->assign('list',$list);
        return $this->fetch('order/'.$mo['url']);
    }



    public function change()
    {
        $order=new OrderModel();
        $user_id=Cookie::get('user_id');
        $id=input("post.id");
        $result=$order->setChange($id,$user_id);
        if($result){
            echo 1;die;
        }
    }

    public function code()
    {
        if(request()->IsPost()){
         
            $id=input("post.id");
            $total=input("post.total");
            $code=input("post.code");
            $id_arr=explode(",", $id);
            $num=count($id_arr);
            if($id_arr[$num-1] == ''){
                unset($id_arr[$num-1]);
            }
            $c=count($id_arr);

            $price=Db::name("coupon")->where("code",$code)->field("price,class,proid,is_use")->find();
            if($price['is_use'] == 1){
            if($c = 1){
                if($price['proid'] == 0 || $price['proid'] == $id_arr[$c-1]){
                    if($price['class'] == 1){
                        $total=$total-$price['price'];
                        if($total >= 0){
                            echo $total;die;
                        }else{
                            echo 0;die;
                            }
                        }
                    if($price['class'] == 2){
                       $total=$total*($price['price']/100);
                       echo round($total,2);die;
                    }

                    }
                }

            if($c > 1){
                if($price['proid'] == 0){

                if($price['class'] == 1){
                        $total=$total-$price['price'];
                        if($total >= 0){
                            echo $total;die;
                        }else{
                            echo 0;die;
                            }
                        }
                    if($price['class'] == 2){
                       $total=$total*($price['price']/100);
                       echo round($total,2);die;
                    }
                }
            }

            }
        }
    }

    public function address()
    {
        $order=new OrderModel();
        $form=input("post.");
        if($form['password'] != $form['cpassword']){
            echo  3;die;
        }

            $is_email=$order->setEmailExit($form['email']);
            if($is_email){
                $user['pwd']=md5($form['password']);
                $order->setChange($is_email['id']);
                $update_user=$order->setUpUser($user,$is_email['id']);
                Cookie::set('user_id',$is_email['id'],7200);
                Cookie::set('email',$is_email['email'],7200);
                $data['parent_id']=$is_email['id'];
            }else{
                $user['email']=$form['email']; 
                $user['pwd']=md5($form['password']);
                $add_user=$order->setAddUser($user);
                Cookie::set('user_id',$add_user,7200);
                Cookie::set('email',$user['email'],7200);
                $data['parent_id']=$add_user;
            }

        

        $data['username']=$form['f_name'].",".$form['l_name'];
        $data['phone']=$form['phone'];
        $data['email']='';
        $data['country']=$form['country'];
        if($data['country'] == 'United States'){
           $data['province']= $form['province'];
        }else{
            $data['province']= $form['province1'];
        }
        $data['city']=$form['city'];
        $data['address']=$form['address1'];
        $data['address1']=$form['address2'];
        $data['zip']=$form['zip'];
        $data['datetime']=time();
        $data['is_defult'] = 2;


       
        $result=$order->setAddress($data);

       if($result){
        echo 1;
       }else{
        echo 0;
       }
      
    }

   
}

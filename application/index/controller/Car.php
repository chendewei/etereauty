<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Car as CarModel;

class Car extends Common
{



    public function index()
    {
    	$car=new CarModel();
        $mo=$car->getMo();
        $num=input("post.num");
        $proid=input("post.proid");
       /*Cookie::delete('Carts');*/
        $cartUnSer =array();

        //查询之前是否加入产品
        if(Cookie::get('Carts')){

        $cookie = stripslashes ( Cookie::get('Carts') ); //去除addslashes添加的反斜杠
        $cartUnSer = unserialize ( $cookie );//反序列化cookie

        foreach ($cartUnSer as $key => $value) {
             
             $id_arr[]=$value['proid'];
             $num_arr[]=$value['num'];
        }
        
        $ids=implode(",",$id_arr);
        $nums=implode(",",$num_arr);

        $list=$car->getPro($ids,$nums);

        }else{
           $list=array(); 
        }

        if($num && $proid ){
          
        if(Cookie::get('Carts')){
        $cookie = stripslashes ( Cookie::get('Carts') ); //去除addslashes添加的反斜杠
        $cartUnSer = unserialize ( $cookie );//反序列化cookie  
        }  
        if(deep_in_array($proid,$cartUnSer)){
       
        $num=count($cartUnSer);
        for ($i=0; $i < $num ; $i++) { 
            if($cartUnSer[$i]['proid'] == $proid){
                $cartUnSer[$i]['num'] =$cartUnSer[$i]['num'] + 1;
            }
        }
        }else{
        
            $cartUnSer[]=array(
            'proid'=>$proid,
            'num'=>$num,
            );
        }
        
        //存入cookie
        $cartSer=serialize($cartUnSer);
        Cookie::set('Carts',$cartSer,3600);

        foreach ($cartUnSer as $key => $value) {
             
             $id_arr[]=$value['proid'];
             $num_arr[]=$value['num'];
        }
        
        $ids=implode(",",$id_arr);
        $nums=implode(",",$num_arr);

        $list=$car->getPro($ids,$nums);
        }


    	$this->assign("list",$list);
        return $this->fetch('car/'.$mo['url']);
    }

    public function del()
    {
        $car=new CarModel();
    	$id=input("reid");
        $cookie = stripslashes ( Cookie::get('Carts') );
        $cartUnSer = unserialize ( $cookie );
        
        $num=count($cartUnSer);
        for ($i=0; $i < $num ; $i++) { 
            if($cartUnSer[$i]['proid'] != $id){
                $new_arr[]=array(
                'proid'=>$cartUnSer[$i]['proid'],
                'num'=>$cartUnSer[$i]['num'],
                );
            }else{
                $new_arr=array();
            }
        }

        if($new_arr){
            $cartSer=serialize($new_arr);
            Cookie::set('Carts',$cartSer,3600);
        }else{
            Cookie::delete('Carts');
        }
   

        /*
    	if($result)
        $msg=array('data'=>1,); 
        else
        $msg=array('data'=>'',);  
        return json_encode($msg);
    	*/
    }

   public function del_all()
    {
        $car=new CarModel();
        $id=input("post.");

        foreach ($id as $k => $v) {
            foreach ($v as $k1 => $v1) {
                $ids[]=$v1;
            }
        }

        $cookie = stripslashes ( Cookie::get('Carts') );
        $cartUnSer = unserialize ( $cookie );

        $num=count($cartUnSer);
        $count=count($ids); 
       for ($y=0; $y < $count ; $y++) { 
            for ($i=0; $i < $num ; $i++) { 
                if($cartUnSer[$i]['proid'] != $ids[$y]){
                $new_arr[]=array(
                'proid'=>$cartUnSer[$i]['proid'],
                'num'=>$cartUnSer[$i]['num'],
                );
                }else{
                $new_arr=array();
                } 
            }
            
        }
            var_dump($new_arr);
        
        /* if($new_arr){
            $cartSer=serialize($new_arr);
            Cookie::set('Carts',$cartSer,3600);
        }else{
            Cookie::delete('Carts');
        }*/
        
    }


}

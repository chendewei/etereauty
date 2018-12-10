<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Order extends Model
{
	public function getAddress($id)
	{
		return Db::name('customer')->where("parent_id",$id)->where("is_defult",2)->find();
			
	
		
	}	

	public function getPro($id,$num)
	{
		$list=Db::name('pro')->where("id in ($id)")->field('id,picid,proname,price,sku,is_open,opentime,dietime,ms_price')->select();
		$time=time();	
		foreach($list as $k=>$v){
		if($v['is_open'] == 1 && $v['dietime'] > $time ){
				$list[$k]['price']= $v['ms_price'];
		}
		$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->field('filepath')->find();
		if(!$pic){
		$pic=Db::name('files')->where("id in ({$v['picid']})")->field('filepath')->find();	
		}	
		
		$list[$k]['pic']=$pic['filepath'];
		$list[$k]['num']=$num[$k];
		}
	
		return $list;
	}
	
	public function setChange($userid)
	{

			return Db::name('customer')->where("parent_id",$userid)->update(['is_defult' => 1]);
		
			

	}

	public function setPrice($code,$price)
	{
		$info=Db::name('coupon')->where("code",$code)->find();
		Db::name('coupon')->where("code",$code)->update(['is_use' => 2]);

		if($info['class'] == 1){

		
			return $price-$info['price'];

		}else{
			$pre=$info['price']/100;
			return rand($price*$pre ,2);
		}

	}

	public function setAddress($data)
	{
		return Db::name('customer')->insertGetId($data);	
	}

	public function setEmailExit($email)
	{
		return Db::name('users')->where("email",$email)->find();
	}

	public function setUpUser($data,$id)
	{
		return Db::name("users")->where("id",$id)->update($data);
	}

	public function setAddUser($data)
	{
		return Db::name('users')->insertGetId($data);
	}

	public function setExit($id)
	{
		return Db::name('customer')->where("parent_id",$id)->find();
	}

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}

	public function getCountry()
	{
		return Db::name('country')->select();
	}

	public function getProvince()
	{
		return Db::name('province')->select();
	}

	public function getUser($id)
	{
		return Db::name("users")->where("id",$id)->field("email,pwd")->find();
	}
}
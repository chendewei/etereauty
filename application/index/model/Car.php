<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class Car extends Model
{
	/*public function getPro($id)
	{
		$list=Db::name('cart')->where("user_id",$id)->select();
		foreach ($list as $k1 => $v1) {
		$pro=Db::name('pro')->where("id",$v1['pro_id'])->field('id,picid,proname,price,is_open,opentime,dietime,ms_price')->select();
		$time=time();
		foreach($pro as $k=>$v){
		if($v['is_open'] == 1 && $v['dietime'] > $time ){
				$pro[$k]['price']= $v['ms_price'];
		}	
		$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->field('filepath')->find();
		if(!$pic){
		$pic=Db::name('files')->where("id in ({$v['picid']})")->field('filepath')->find();	
		}
		$pro[$k]['pic']=$pic['filepath'];
		}
		$list[$k1]['pro']=$pro;

	}
		
		echo "<pre>";
		print_r($list);die;
	
		return $list;
	}*/

	public function getPro($id,$num)
	{
		$num_arr=explode(",",$num);
		$list=Db::name('pro')->where("id in ($id)")->field('id,picid,proname,price,is_open,opentime,dietime,ms_price')->select();
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
		$list[$k]['num']=$num_arr[$k];
		}
	
		return $list;
	}

	public function getExit($proid,$userid)
	{
		return Db::name('cart')->where("pro_id",$proid)->where("user_id",$userid)->find();
	}

	public function setCar($data)
	{
		return Db::name('cart')->insert($data);
	}

	public function setUpCar($id,$ynum,$anum)
	{
		return Db::name('cart')->where('id', $id)->update(['num' => $ynum]);
	}

	public function setDel($id)
	{
		return Db::name('cart')->where('id',$id)->delete();
	}

	public function setAllDel($id)
	{
		return Db::name('cart')->where("id in ($id)")->delete();
	}

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}

	

}
<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Index extends Model
{
	public function setBannerLIst()
	{
		return Db::name('banner')->where('is_type',1)->cache(true)->order("id asc")->select();
	}

	public function setBannerName()
	{
		return Db::name('banner')->where('is_type',3)->cache(true)->select();
	}

	public function setOtherList()
	{
		return Db::name('banner')->where('is_type',2)->cache(true)->select();
	}

	public function setOtherPic($id)
	{
		return Db::name('banner')->where('id',$id)->cache(true)->find($id);
	}

	public function setPro()
	{
		
		$list=Db::name('pro')->where('status',1)->where("is_tj",2)->cache(true)->orderRaw('rand()')->limit(4)->select();
		$time=time();
		foreach ($list as $k => $v) {

			if($v['is_open'] == 1 && $v['dietime'] > $time ){
				$list[$k]['price']= $v['ms_price'];
	
			}

			$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->order('id desc')->field('filepath')->limit(1)->select();
			if(!$pic){
			$pic=Db::name('files')->where("id in ({$v['picid']})")->order('id desc')->field('filepath')->limit(1)->select();	
			}
			$list[$k]['pic']=$pic;

		}
	
		return $list;
		/*return Db::name('pro')->order('id asc')->limit(8)->select();*/
	}

	public function setHotPro()
	{
		
		$list=Db::name('pro')->where('status',1)->where("is_tj",2)->cache(true)->cache(true)->orderRaw('rand()')->limit(3)->select();
		$time=time();
		foreach ($list as $k => $v) {
			if($v['is_open'] == 1 && $v['dietime'] > $time ){
				$list[$k]['price']= $v['ms_price'];
			}
			$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->order('id desc')->field('filepath')->limit(1)->select();
			if(!$pic){
			$pic=Db::name('files')->where("id in ({$v['picid']})")->order('id desc')->field('filepath')->limit(1)->select();	
			}
			$class=Db::name('proclass')->where("id ",$v['tid'])->find();
			$list[$k]['pic']=$pic;
			$list[$k]['class']=$class;
		}
		
	
		return $list;
		/*return Db::name('pro')->order('id asc')->limit(8)->select();*/
	}

	public function setTimePro()
	{
		
		$list=Db::name('pro')->where('status',1)->where("is_tj",2)->cache(true)->order('datetime desc')->limit(3)->select();
		$time=time();
		foreach ($list as $k => $v) {
			if($v['is_open'] == 1 && $v['dietime'] > $time ){
				$list[$k]['price']= $v['ms_price'];
			}
			$pic=Db::name('files')->where("id in ({$v['picid']}) and is_default = 1")->order('id desc')->field('filepath')->limit(1)->select();
			if(!$pic){
			$pic=Db::name('files')->where("id in ({$v['picid']})")->order('id desc')->field('filepath')->limit(1)->select();	
			}
			$class=Db::name('proclass')->where("id ",$v['tid'])->find();
			$list[$k]['pic']=$pic;
			$list[$k]['class']=$class;
		}
	
		return $list;
		/*return Db::name('pro')->order('id asc')->limit(8)->select();*/
	}

	public function getMo()
	{
		return Db::name('mo')->where("is_check",1)->find();
	}

	
	
		

}
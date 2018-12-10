<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Detail as DetailModel;

class Detail extends Common
{
	public function index()
	{
		$pro=new DetailModel();
		$id=input("id");
		$info=$pro->setInfo($id);
		$pro=$pro->setPro();

		$discuss=Db::name('commont')->where('pro_id',$id)->limit(10)->select();;

		$time=time();
		
		$mo= Db::name('mo')->where("is_check",1)->find();
		
		$this->assign("pro",$pro);
		$this->assign("discuss",$discuss);
		$this->assign("time",$time);
		$this->assign("info",$info);
		$this->assign("list",$info['pic']);
		return $this->fetch('detail/'.$mo['url']);
	}

}
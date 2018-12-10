<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Index as IndexModel;

class Index extends Common
{
    public function index()
    {
    	$index=new IndexModel();
        $banner=$index->setBannerLIst();
        $classname=$index->setBannerName();
    	/*$pic=$index->setOtherList();
    	$pro=$index->setPro();*/
        $pic1=$index->setOtherPic(29);
        $pic2=$index->setOtherPic(30);
        $pic3=$index->setOtherPic(31);
        $pic4=$index->setOtherPic(32);
        $pic5=$index->setOtherPic(33);
        $pic6=$index->setOtherPic(34);
      /* 
    	$hot=$index->setHotPro();
    	$time=$index->setTimePro();*/
        $mo=$index->getMo();
        /*$this->assign("pro",$pro);
        $this->assign("pic",$pic);*/
        $this->assign("pic1",$pic1);
        $this->assign("pic2",$pic2);
        $this->assign("pic3",$pic3);
        $this->assign("pic4",$pic4);
        $this->assign("pic5",$pic5);
    	$this->assign("pic6",$pic6);
    	/*$this->assign("hot",$hot);
    	$this->assign("time",$time);*/
        $this->assign('banner',$banner);
    	$this->assign('classname',$classname);
        return $this->fetch('index/'.$mo['url']);
    }
}

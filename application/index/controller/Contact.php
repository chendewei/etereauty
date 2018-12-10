<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Contact as ContactModel;
class Contact extends Common
{
	public function index()
	{	
		$contact=new ContactModel();
        $mo=$contact->getMo();
        $set=$contact->getInfo();


        $this->assign('set',$set);
		return $this->fetch('contact/'.$mo['url']);
	}

	public function reply()
	{
		$contact=new ContactModel();
		if(request()->isPost()){
			$form=input("post.");
			$form['datetime']=time();
			$form['ip']=$_SERVER['REMOTE_ADDR'];
			$result=$contact->setAdd($form);
			if($result)
				echo "<script>alert('Send success');window.location.href='/';</script>";
			else
				echo "<script>alert('fail in send');window.location.href='/index/contact/index.html'";


		}

	}

}
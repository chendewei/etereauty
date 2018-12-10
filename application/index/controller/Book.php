<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Book as BookModel;

class Book extends Common
{
    public function index()
    {
    	$book=new BookModel();
    	if(request()->isPost()){
    		$form=input('post.');
    		$form['datetime']=time();
    		if(!$book->setExit($form['email'])){

    		$result=$book->setAdd($form);
			if($result)
				echo "<script>alert('Subscribe success');window.location.href='/';</script>";
			else
				echo "<script>alert('Subscribe failure');window.location.href='/';</script>";
			}else{
				echo "<script>alert('Subscribed');window.location.href='/';</script>";
			}
    	}
        return $this->fetch();
    }
}

<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Index as IndexModel;

class Index extends Base
{
    public function index()
    {	
    	$index=new IndexModel();
    	$users_count=$index->setUserCount();
    	$pro_count=$index->setProCount();
    	$order_count=$index->setOrderCount();
    	$book_count=$index->setBookCount();
    	$list=$index->setList();
    	$page=$list->render();
    	$num=input("page");

        if($num)
            $count=10*($num-1);
        else
            $count=0;


    	$this->assign('list',$list);
    	$this->assign('count',$count);
    	$this->assign('page',$page);
    	$this->assign('users_count',$users_count);
    	$this->assign('pro_count',$pro_count);
    	$this->assign('order_count',$order_count);
    	$this->assign('book_count',$book_count);
        return $this->fetch();
    }
}

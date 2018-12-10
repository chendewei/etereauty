<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Newr as NewrModel;

class Newr extends Common
{
    public function index()
    {
    	$newr=new NewrModel();
    	
    	$list=$newr->setList();
    	$page=$list->render();
        $mo=$newr->getMo();

    	$this->assign('list',$list);
    	$this->assign('page',$page);
        return $this->fetch();
    }
}

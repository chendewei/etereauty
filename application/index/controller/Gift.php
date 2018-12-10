<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Gift as GiftModel;

class Gift extends Common
{
    public function index()
    {
    	$gift=new GiftModel();
    	
    	$list=$gift->setList();
    	$page=$list->render();
        $mo=$gift->getMo();

    	$this->assign('list',$list);
    	$this->assign('page',$page);
        return $this->fetch();
    }
}

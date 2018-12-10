<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Big as BigModel;

class Big extends Common
{
    public function index()
    {
    	$big=new BigModel();
    	
    	$list=$big->setList();
    	$page=$list->render();
        $mo=$big->getMo();

    	$this->assign('list',$list);
    	$this->assign('page',$page);
        return $this->fetch();
    }
}

<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Prolist as ProlistModel;

class Prolist extends Common
{
    public function index()
    {
    	$class=new ProlistModel();
    	$id=input("id");
    	$list=$class->setList($id);

    	$page=$list->render();
        $mo=$class->getMo();

       
    	$this->assign('list',$list);
    	$this->assign('page',$page);
        return $this->fetch();
    }
}

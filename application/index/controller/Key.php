<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Key as KeyModel;

class Key extends Common
{
    public function index()
    {
    	$k=new KeyModel();
        $key=htmlspecialchars(input("get.key"));
        $list=$k->getKey($key);
        $page=$list->render();
        $mo=$k->getMo();
        $this->assign('list',$list);
    	$this->assign('page',$page);
        return $this->fetch('key/'.$mo['url']);
    }


}

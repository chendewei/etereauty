<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
use app\index\model\Seckill as SeckillModel;

class Seckill extends Common
{
    public function index()
    {
    	$s=new SeckillModel();
        $list=$s->getList();
        
        
        $this->assign('list',$list);
      
        return $this->fetch();
    }


}

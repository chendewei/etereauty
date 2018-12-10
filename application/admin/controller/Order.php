<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Order as OrderModel;


class Order extends Base
{
    public function index()
    {
    	$order=new OrderModel();
        $where="";
        if(input('key')){
            $key=input('key');
            $where="email= '{$key}' or buyer = '{$key}' ";
        }
      
		$list=$order->setList($where);
        $page=$list->render();
        $p_num=input("page");
        if($p_num)
            $count=10*($p_num-1);
        else
            $count=0;
	
        $this->assign('count', $count);
		$this->assign('list', $list);
        $this->assign('page', $page);
		
        return $this->fetch();
    }

    public function del()
    {
        $order=new OrderModel();
        $id=input('id');
        if(request()->isPost()){
          
            $result=$order->setDel($id);

            if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
        
            return json_encode($msg);

        }
    }

    public function del_all()
    {
        $id=input("post.");
        foreach ($id as $k => $v) {
            foreach ($v as $k1 => $v1) {
                $ids[]=$v1;
            }
        }
        $order=new OrderModel();
        $did=implode(",",$ids);
        $result=$order->setDelAll($did);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 
        return json_encode($msg);
    }

  
}

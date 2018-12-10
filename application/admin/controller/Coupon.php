<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Coupon as CouponModel;


class Coupon extends Base
{
    public function index()
    {
    	$con=new CouponModel();
        $where="is_use = 1";
        if(input('name')){
            $name=input('name');
            $where.=" and name = '{$name}'";
        }
		$list=$con->setList($where);
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

    public function add(){
        $con=new CouponModel();
        if(request()->isPost()){
            $form=input("post.");
            $form['dealline']=strtotime($form['dealline']);
            $result=$con->setAdd($form);

            if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
        
            return json_encode($msg);

        }

    }

    public function edit(){
        $con=new CouponModel();
        $id=input('id');
        if(request()->isPost()){
            $form=input("post.");
            $form['dealline']=strtotime($form['dealline']);
            $result=$con->setEdit($form,$id);

            if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>0,); 
        
            return json_encode($msg);

        }

    }

    public function del()
    {
        $con=new CouponModel();
        $id=input('id');
        if(request()->isPost()){
          
            $result=$con->setDel($id);

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
        $con=new CouponModel();
        $did=implode(",",$ids);
        $result=$con->setDelAll($did);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 
        return json_encode($msg);
    }

  
}

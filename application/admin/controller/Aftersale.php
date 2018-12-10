<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Aftersale as AftersaleModel;


class Aftersale extends Base
{
    public function index()
    {
    	$after=new AftersaleModel();
        $where="";
        if(input('key')){
            $key=input('key');
            $where="orderno= '{$key}'";
        }
      
		$list=$after->setList($where);
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
        $after=new AftersaleModel();
        $id=input('id');
        if(request()->isPost()){
          
            $result=$after->setDel($id);

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
        $after=new AftersaleModel();
        $did=implode(",",$ids);
        $result=$after->setDelAll($did);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 
        return json_encode($msg);
    }

  
}

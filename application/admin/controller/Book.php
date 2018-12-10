<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Book as bookModel;

class Book extends Base
{
    public function index()
    {
    	$book=new bookModel();
        $where="";
        if(input('email')){
            $email=input('email');
            $where="email = '{$email}' " ;
        }
		$list=$book->setList($where);
		$page=$list->render();
		$num=input("page");
        if($num)
            $count=10*($num-1);
        else
            $count=0;

		$this->assign('list', $list);
		$this->assign('count', $count);
		$this->assign('page', $page);

        return $this->fetch();
    }


    public function edit()
    {
    	$book=new bookModel();
    	$id=input("id");
    	if(request()->isPost()){
    		$form=input("post.");
    		
    		$result=$book->setEdit($form,$id);

    		if($result)
			$msg=array('data'=>1,);	
			else
    		$msg=array('data'=>0,);	
    	
			return json_encode($msg);
    	}
    }

    public function del()
    {
    $book=new bookModel();
    $id=input("id");
    $result=$book->setDel($id);
    if($result)
    $msg=array('data'=>1,);
    else
    $msg=array('data'=>0,);	

	return json_encode($msg);
	}

	public function del_all()
	{
		$id=input("post.");
		foreach ($id as $k => $v) {
			foreach ($v as $k1 => $v1) {
				$ids[]=$v1;
			}
		}
		$book=new bookModel();
		$did=implode(",",$ids);
		$result=$book->setDelAll($did);
		if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);
	}



}


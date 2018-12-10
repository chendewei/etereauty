<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Article as ArticleModel;

class Article extends Base
{
    public function index()
    {
    	$article=new ArticleModel();
        $where="";
        if(input('title')){
            $title=input('title');
            $where="title = '{$title}'";
        }
		$list=$article->setList($where);
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

    public function add()
    {
    	$article=new ArticleModel();
    	if(request()->isPost()){
    		$form=input("post.");
    	    $data['title']=$form['title'];
            $data['content']=htmlspecialchars($form['content']);
            $data['datetime']=time();
            $result=$article->setAdd($data);

    		if($result)
			$msg=array('data'=>1,);	
			else
    		$msg=array('data'=>0,);	
    	
			return json_encode($msg);
    	}
    }

    public function edit()
    {
    	$article=new ArticleModel();
    	$id=input("id");
    	if(request()->isPost()){
    		$form=input("post.");
            $data['title']=$form['title'];
            $data['content']=htmlspecialchars($form['content']);
            $data['datetime']=time();
    		
    		$result=$article->setEdit($data,$id);

    		if($result)
			$msg=array('data'=>1,);	
			else
    		$msg=array('data'=>0,);	
    	
			return json_encode($msg);
    	}
    }

    public function del()
    {
    $article=new ArticleModel();
    $id=input("id");
    $result=$article->setDel($id);
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
     
		$article=new ArticleModel();
		$did=implode(",",$ids);
		$result=$article->setDelAll($did);
		if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);
	}


}


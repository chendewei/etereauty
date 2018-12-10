<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Banner as BannerModel;

class Banner extends Base
{
    public function index()
    {
    	$banner=new BannerModel();
		$list=$banner->setList();
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
    	$banner=new BannerModel();
    	if(request()->isPost()){
    		$form=input("post.");
    		$form['pic']=saveBase64Image($form['img'][0]);
            $date['title']=$form['title'];
            $date['url']=$form['url'];
            $date['is_type']=$form['is_type'];
            $date['remark']=$form['remark'];
            $date['pic']=$form['pic']['url'];
    		$result=$banner->setAdd($date);

    		if($result)
			$msg=array('data'=>1,);	
			else
    		$msg=array('data'=>0,);	
    	
			return json_encode($msg);
    	}
    }

    public function edit()
    {
    	$banner=new BannerModel();
    	$id=input("id");
        $info=$banner->setInfo($id);
    	if(request()->isPost()){
    		$form=input("post.");
    		if(isset($form['img'])){
            unlink("./"."{$info['pic']}");
            $form['pic']=saveBase64Image($form['img'][0]);
            $date['pic']=$form['pic']['url'];
            }else{
            $date['pic']=$info['pic'];   
            }
            $date['title']=$form['title'];
            $date['url']=$form['url'];
            $date['is_type']=$form['is_type'];
            $date['remark']=$form['remark'];
    		
    		$result=$banner->setEdit($date,$id);

    		if($result)
			$msg=array('data'=>1,);	
			else
    		$msg=array('data'=>0,);	
    	
			return json_encode($msg);
    	}
    }

    public function del()
    {
    $banner=new BannerModel();
    $id=input("id");
    $info=$banner->setInfo($id);
    unlink("./"."{$info['pic']}");
    $result=$banner->setDel($id);
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
		$banner=new BannerModel();
		$did=implode(",",$ids);
		$result=$banner->setDelAll($did);
		if($result)
    	$msg=array('data'=>1,);
    	else
    	$msg=array('data'=>0,);	
		return json_encode($msg);
	}


}


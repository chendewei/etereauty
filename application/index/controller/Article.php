<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use app\index\model\Article as ArticleModel;

class Article extends Common
{
    public function index()
    {

        $art=new ArticleModel();
        $mo=$art->getMo();
        $id=input("id");
        $info=$art->setInfo($id);
        $this->assign('info',$info);
        return $this->fetch('article/'.$mo['url']);
    }
}

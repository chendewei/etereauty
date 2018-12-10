<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use think\Loader;
class Base extends Controller
{
    protected $current_action;
    public function _initialize()
    {
        
        $user_id=Session::get('user_id');
        $user_name=Session::get('user_name');

        if(!$user_id){
             $this->error("请登录","login/login");
        }
        $this->assign('user_name',$user_name);

        $auth = new \Auth\Auth();
        $request = Request::instance();

        if (!$auth->check($request->module() . '/' . $request->controller() . '/' . $request->action(), $user_id)) {// 第一个参数是规则名称,第二个参数是用户UID
       
            $this->error('你没有权限',"admin/index/index");
        }
      
       /*    return array('status'=>'error','msg'=>'有权限！');*/
      }
}


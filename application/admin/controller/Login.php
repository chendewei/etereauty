<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Login as LoginModel;

class Login extends Controller
{
    public function login()
    {
    	if(request()->isPost()){
			$login = new LoginModel();
			$data=input('post.');
			$data['admin_pwd']=md5($data['admin_pwd']);
			$admin_info=$login->isexit($data);
			if($admin_info){
			session::set('user_id',$admin_info['id']);
			session::set('user_name',$admin_info['admin_name']);
			$msg=array(
					'data'=>0,
				);
    		return json_encode($msg);
			}else{
				$msg=array(
					'data'=>1,
				);
			return json_encode($msg);
			}
		}
        return $this->fetch();
    }

    public function login_out(){
		Session::delete('user_id');
		Session::delete('user_name');
		echo "<script>alert('登出成功');window.location.href='/admin.php/login/login.html'</script>";
	}
}

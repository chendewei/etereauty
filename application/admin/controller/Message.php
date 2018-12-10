<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Message as messageModel;

class Message extends Base
{
    public function index()
    {
    	$message=new messageModel();
		$list=$message->setList();
		$page = $list->render();
	
		$this->assign('list', $list);
		$this->assign('page', $page);
		
        return $this->fetch();
    }
    public function del()
    {
        $message=new messageModel();
        $id=input("id");
        $result=$message->setDel($id);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>'',); 

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
        $message=new messageModel();
        $did=implode(",",$ids);
        $result=$message->setDelAll($did);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>'',); 
        return json_encode($msg);
    }

    public function reply()
    {
    	$message=new messageModel();
    	$id=input("id");
    	$info=$message->setCheck($id);
    	$smtp=$message->setSmtp();
    	if(request()->isPost()){
    		$form=input("post.");
    		$tomail=$info['email'];
    		$name=$info['name'];
    		$host=$smtp['smtp_host'];
    		$port=$smtp['smtp_port'];
    		$user=$smtp['smtp_user'];
    		$pwd=$smtp['smtp_pwd'];
    		$sname=$smtp['smtp_sendname'];
    		$subject=$form['title'];
    		$body=$form['reply'];
    		$result=send_mail($tomail,$name,$host,$port,$user,$pwd,$sname,$subject,$body);
    		if($result){

    			$form['is_send']=1;
    			$re=$message->setEdit($form,$id);
    			if($re)
    				$msg=array('data'=>1,);
       			else
        			$msg=array('data'=>'',); 
        		return json_encode($msg);
    		}else{
    			$msg=array('data'=>'',); 
        		return json_encode($msg);
    		}

    	}
    	
    	/*$toemail='724165502@qq.com';
        $name='dewei';
        $subject='QQ邮件发送测试';
        $content='恭喜你，邮件测试成功。';
        dump(send_mail($toemail,$name,$subject,$content));*/
 
    }

}

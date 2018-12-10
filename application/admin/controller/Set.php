<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Set as SetModel;
use app\admin\model\Smtp as SmtpModel;

class Set extends Base
{
    public function index()
    {	
    	$set=new SetModel();
    	$smtp=new SmtpModel();
    	$host_info=$set->SetHost();
    	$smtp_info=$smtp->setInfo();

    	$this->assign('host_info',$host_info);
    	$this->assign('smtp_info',$smtp_info);
        return $this->fetch();
    }
    public function host()
    {
    	if(request()->isPost()){
    		$set=new SetModel();
    		$form=input("post.");
    	
    		
    		$result=$set->setAdd($form);

    		if($result){
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
    }
    public function smtp()
    {
    	if(request()->isPost()){
    		$set = new SmtpModel();
    		$form = input("post.");

    		$result = $set->setSmtp($form);

    		if($result){
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
    	
    }

    public function send()
    {
        $set=new SetModel();
        $smtp=$set->setSmtp();
        if(request()->isPost()){
            $form = input("post.");
           
            $tomail=$form['tomail'];
            $name=$form['name'];
            $host=$smtp['smtp_host'];
            $port=$smtp['smtp_port'];
            $user=$smtp['smtp_user'];
            $pwd=$smtp['smtp_pwd'];
            $sname=$smtp['smtp_sendname'];
            $subject=$form['subject'];
            $body=$form['sent_text'];
            $result=send_mail($tomail,$name,$host,$port,$user,$pwd,$sname,$subject,$body);

            if($result)
                $msg=array('data'=>0,);
                else
                $msg=array('data'=>1,);
            return json_encode($msg);
        }

    }
}

<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Commont as CommontModel;

class Commont extends Base
{
    public function index()
    {
        $id=input("id");
        $com=new CommontModel();
        $info=$com->getInfo($id);
        $page = $info->render();
     
        $this->assign('info',$info);
        $this->assign('page',$page);
    	$this->assign('id',$id);
        return $this->fetch();
    }

    public function add()
    {
    	$com=new CommontModel();
        $id=input("id");
        if(request()->isPost()){
            $form=input("post.");
            $result=$com->setAdd($form);
            if($result){
                 echo "<script>alert('添加成功');window.location.href='/admin.php/commont/index/id/{$id}.html';</script>";die; 
            }else{
                 echo "<script>alert('添加失败');window.location.href='/admin.php/commont/index/id/{$id}.html';</script>";die; 
            }
        }



        $this->assign('id',$id);
        return $this->fetch('add');
    }

    public function edit()
    {
        $com=new CommontModel();
        $id=input("id");
        $info=$com->setInfo($id);
         if(request()->isPost()){
            $form=input("post.");
            $result=$com->setEdit($form,$id);
            if($result){
                 echo "<script>alert('编辑成功');window.location.href='/admin.php/commont/index/id/{$info["pro_id"]}.html';</script>";die; 
            }else{
                 echo "<script>alert('编辑失败');window.location.href='/admin.php/commont/index/id/{$info["pro_id"]}.html';</script>";die; 
            }
        }

        $this->assign('info',$info);
        return $this->fetch('edit');
    }



  


    public function del()
    {
    	$com=new CommontModel();
        $id=input("id");

        $result=$com->setDel($id);
        if($result){
         echo "<script>alert('成功');history.go(-1);location.reload();</script>";  
        }else{
          echo "<script>alert('失败');history.go(-1);location.reload();</script>";  
        }    
    	
    }


    
    public function cj()
    {
        
        
            $id=input("id");
            $com=new CommontModel();
            $info=$com->getProUrl($id);

            $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
            $headers[] = 'Accept-Encoding: deflate';
            $headers[] = 'Accept-Language: en-US,en;q=0.5';
            $headers[] = "Content-type: application/x-www-form-urlencoded";
            $UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($curl, CURLOPT_URL, $info['external']);
            curl_setopt($curl, CURLOPT_HEADER, 0);  //0表示不输出Header，1表示输出
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_ENCODING, '');
            curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            $data = curl_exec($curl);
            curl_close($curl);
        

           /* preg_match('|<div id="cr-medley-top-reviews-wrapper" class="a-row">([\s\S]*?)<div id="giveaway_feature_div"|i',$data,$a);*/

            preg_match_all('|a-profile-name">(.*?)</sp[\s\S]*?<i data-hook=.*?&ASIN=\w{10}">(.*?)</a></div><span data-hook[\s\S]*?review-date">(.*?)<[\s\S]*?partial-collapse-content">(.*?)</|i',$data,$f);

     /*       preg_match_all('|<div class="a-profile-content"><span class="a-profile-name">\s+(.*?)\s+</span></div>|i',$c[1],$f);*/

    
           /* print_r($f[1]);
            echo "<br />";
            print_r($f[2]);
            echo "<br />";
            print_r($f[3]);
            echo "<br />";
            print_r($f[4]);die;*/

            if(!$f[1]){
                 echo "<script>alert('没有评论采集');window.location.href='/admin.php/commont/index/id/{$id}.html';</script>";die; 
            }

            $num=count($f[1]);
            for ($i=0; $i <$num ; $i++) { 
                $date[]=array(
                    'name'=>stripslashes($f[1][$i]),
                    'title'=>stripslashes($f[2][$i]),
                    'datetime'=>$f[3][$i],
                    'content'=>stripslashes($f[4][$i]),
                    'pro_id'=>$id,
                    );
                
            }
            $result=$com->SetDiscuss($date);
            if($result){
                echo "<script>alert('采集成功');window.location.href='/admin.php/commont/index/id/{$id}.html';</script>";
            }


   

    }

}
	
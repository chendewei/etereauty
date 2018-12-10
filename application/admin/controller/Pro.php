<?php
namespace app\admin\controller;
use think\Controller;
use think\request;
use think\Session;
use think\Db;
use app\admin\model\Pro as ProModel;

class Pro extends Base
{
    public function index()
    {
    	$pro=new ProModel();
    	$nav_list=$pro->setNavList();
        $minid=$pro->setMin();
        
    	$where="";
		if(input('tid')){
			$where="tid=".input('tid');
		}else{
            $where="tid=".$minid;
        }
        if(input('sku')){
            $where="sku=".input('sku');
        }
		$num=input("page");

        if($num)
            $count=10*($num-1);
        else
            $count=0;
        
		$list=$pro->setProList($where);
	
		$page = $list->render();
		//
		$class_list=$pro->setClassList();

		$this->assign('page', $page);
		$this->assign('count',$count);
		$this->assign('list',$list);
		$this->assign('class_list',$class_list);
		$this->assign('nav_list',$nav_list);
        return $this->fetch();
    }

    public function add()
    {
    	$pro=new ProModel();
    	if(request()->isPost()){
    		$form=input("post.");
            
    		$data['proname']=$form['proname'];
    		$str=explode(",",$form['tid']);
            $data['tid']=$str[0];
            $data['tpid']=$str[1];
            $data['sku']=$form['sku'];
            $data['price']=$form['price'];
            $data['yprice']=$form['yprice'];
            $data['inventory']=$form['inventory'];
            $data['external']=$form['external'];
            $data['abstract']=nl2br($form['abstract']);
            $data['is_open']=$form['is_open'];
            $data['is_show']=$form['is_show'];
            $data['is_lx']=$form['is_lx'];
            $data['opentime']=strtotime($form['opentime']);
            $data['ms_price']=$form['ms_price'];
            $data['color']=$form['color'];
            $data['dietime']=strtotime($form['dietime']);
            $data['status']=1;
            $data['datetime']=time();
            if(isset($form['content']))
            $data['text']=htmlspecialchars($form['content']);
            if(isset($form['img'])){
            $picid=$pro->setPicId($form['img']);
            }else{
             $picid='';   
            }
            if($picid && $form['cpicid']){
    		$data['picid']=$form['cpicid'].",".$picid;
            }else if(!$picid && $form['cpicid']){
            $data['picid']=$form['cpicid'];    
            }else if($picid && !$form['cpicid']){
            $data['picid']=$picid;        
            }else{
            $data['picid']="";
            }


    		$result=$pro->setAdd($data);
    		if($result)
                $msg=array('data'=>2,); 
            else
                $msg=array('data'=>'',);

            return json_encode($msg);
    	}


    }

    public function edit()
    {
    	$pro=new ProModel();
    	$id=input("id");
    	$info=$pro->setInfo($id);
    	if(request()->isPost()){
    		$form=input("post.");
    		$data['proname']=$form['proname'];
    		$str=explode(",",$form['tid']);
            $data['tid']=$str[0];
            $data['tpid']=$str[1];
            $data['sku']=$form['sku'];
            $data['price']=$form['price'];
            $data['yprice']=$form['yprice'];
            $data['inventory']=$form['inventory'];
            $data['external']=$form['external'];
            $data['abstract']=nl2br($form['abstract']);
            $data['is_open']=$form['is_open'];
            $data['is_show']=$form['is_show'];
            $data['is_lx']=$form['is_lx'];
            $data['color']=$form['color'];
            $data['opentime']=strtotime($form['opentime']);
            $data['ms_price']=$form['ms_price'];
            $data['dietime']=strtotime($form['dietime']);
            $data['status']=$info['status'];
            $data['datetime']=time();
            $data['text']=htmlspecialchars($form['content']);

            if(isset($form['img'])){
            $picid=$pro->setPicId($form['img']);

            if($info['picid']){
    		$data['picid']=$info['picid'].",".$picid;
           
            }else{
            $data['picid']=$picid;
           
            }
         }
    		$result=$pro->setEdit($data,$id);
    		if($result)
                $msg=array('data'=>2,); 
            else
                $msg=array('data'=>'',);

            return json_encode($msg);
    	}


    }



    public function pic_del()
    {
    	$pro=new ProModel();
    	$id=input("imgid");
    	
    	$result=$pro->setPicDel($id);
    	if($result)
            $msg=array('data'=>1,); 
        else
            $msg=array('data'=>'',);

        return json_encode($msg);
    }


    public function del()
    {
    	$pro=new ProModel();
    	$id=input("id");

    	$info=$pro->setInfo($id);
    	$pic_del=$pro->setPicDelAlot($info['picid']);

        if($pic_del){
            $result=$pro->setDel($id);
            if($result)
            $msg=array('data'=>1,); 
            else
            $msg=array('data'=>'',);

            return json_encode($msg);

        }
    	
    }

    public function status()
    {
        $pro=new ProModel();
        $id=input("id");

        $info=$pro->setInfo($id); 

        if($info['status'] == 1)
            $date['status']=2;
        else
            $date['status']=1;

        $result=$pro->setStatus($date,$id);
        if($result)
            $msg=array('data'=>2,); 
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
        $pro=new ProModel();
        $did=implode(",",$ids);
        $result=$pro->setDelAll($did);
        if($result)
        $msg=array('data'=>1,);
        else
        $msg=array('data'=>0,); 
        return json_encode($msg);
    }

    public function pic_watch()
    {
        $pro=new ProModel();
        $id=input("post.");
        $arr=explode(",",$id['id']);
        $info=$pro->setInfo($arr[1]);
        $pro->setPicWatch($info['picid'],$arr[0]);
    }

    public function tj()
    {
       $id=input("post.");
        foreach ($id as $k => $v) {
            foreach ($v as $k1 => $v1) {
                $ids[]=$v1;
            }
        }
        $pro=new ProModel();
        $did=implode(",",$ids);
        $result=$pro->setTjAll($did);
        if($result)
        $msg=array('data'=>2,);
        else
        $msg=array('data'=>0,); 
        return json_encode($msg); 
        
    }
    
    public function cj()
    {
        $pro=new ProModel();
        if(request()->isPost()){
            $url=input("post.url");

            $headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8';
            $headers[] = 'Accept-Encoding: deflate';
            $headers[] = 'Accept-Language: en-US,en;q=0.5';
            $headers[] = "Content-type: application/x-www-form-urlencoded";
            $UserAgent = 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0; SLCC1; .NET CLR 2.0.50727; .NET CLR 3.0.04506; .NET CLR 3.5.21022; .NET CLR 1.0.3705; .NET CLR 1.1.4322)';
            $curl = curl_init();

            curl_setopt($curl, CURLOPT_HTTPHEADER,$headers);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_HEADER, 0);  //0表示不输出Header，1表示输出
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_ENCODING, '');
            curl_setopt($curl, CURLOPT_USERAGENT, $UserAgent);
            curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
            $data = curl_exec($curl);
            curl_close($curl);
            preg_match('|<span id="productTitle" class="a-size-large">([\s\S]*?)</span>|i',$data,$a);
            preg_match('|<span id="priceblock_ourprice" class="a-size-medium a-color-price">([\s\S]*?)</span>|i',$data,$b);
            preg_match('|<ul class="a-unordered-list a-vertical a-spacing-none">([\s\S]*?)</ul>|i',$data,$c);


            $str="";
            if($c){
            preg_match_all('|<li><span class="a-list-item">\s+(.*?)\s+</span></li>|i',$c[1],$f);
            $num=count($f[1]);
            for ($i=0; $i <$num ; $i++) { 
            $str.=$f[1][$i]."\r\n";
            } 
            
            if(!$f[1]){
            preg_match_all('|<li class="showHiddenFeatureBullets"><span class="a-list-item">\s+(.*?)\s+</span></li>|i',$c[1],$z);
            $num=count($z[1]);
                for ($i=0; $i <$num ; $i++) { 
                $str.=$z[1][$i]."\r\n";
                }       
            }   
                
            }

            

            $re=preg_match_all('|<input class="a-button-input" type="submit"><span class="a-button-text" aria-hidden="true">\s+<img alt="" src="(.*?)"|i',$data,$d);

            

            preg_match('|<div id="productDescription" class="a-section a-spacing-small">([\s\S]*?)<style type=|i',$data,$e);

         
            if(!$b)
                $price='';
            else
                $price=substr($b[1],1);

            if(!$e){

                preg_match('|<div id="aplus" class="a-section a-spacing-extra-large bucket">([\s\S]*?)<div id="detail-bullets">|i',$data,$h);
                
                if(!$h){
                    $content="";
                }else{
                    $content=htmlspecialchars($h[1]);
                }
            }else{
                $content=htmlspecialchars($e[1]);
            }


            $one=$pro->setOne();
           
            $date['status']=1;  

            $picid=$pro->setCPicid($d[1]);
            
  
          
              
            
                $msg=array(
                'proname'=>trim($a[1]),
                'price'=>$price,
                'content'=>htmlspecialchars_decode($content),
                'abstract'=>$str,
                'external'=>$url,
                'picid'=>$picid,
                );
               echo json_encode($msg);
        }

    }

}
	
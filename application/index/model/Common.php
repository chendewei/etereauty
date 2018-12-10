<?php
namespace app\index\model;
use think\Model;
use think\Db;
class Common extends Model
{
	public function setNav()
	{
		$result=Db::name('proclass')->where("level",1)->select();

		foreach ($result as $k => $v) {

				$pro=Db::name('pro')->where("tid",$v['id'])->field('picid,id')->find();

					if($pro){
					
						
						$pid=$pro['picid'];

						$pic=Db::name('files')->where("id in ($pid)")->limit(1)->find();
						$pro['pic']=$pic['filepath'];
						$pro['pro_id']=$pro['id'];

						

					}

			
				$result[$k]['son']=$pro;
				
				
		}
		/*echo "<pre>";
		print_r($result);die;*/
		
		return $result;

	}

	public function setLink()
	{
		return Db::name('links')->where('status',1)->select();		
	}

	public function setHtml()
	{
		return Db::name('set')->find();
	}

	public function setShare()
	{
		return Db::name('share')->where('status',1)->find();		
	}
	
}
<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Pro extends Model
{
	public function setProList($where)
	{
		$pro = new Pro(); 
		$list=$pro->where($where)->order('datetime desc')->paginate(10,false,['query'=>request()->param()]);
		foreach ($list as $key => $v) {
			$picid=$v['picid'];
			$pic=Db::name('files')->where("id in ($picid)")->select();
			$list[$key]['picture']=$pic;

		}

		return $list;
	}

	public function setMin()
	{
		return Db::name('proclass')->min('id');
	}

	public function setNavList()
	{
		$class = new Proclass();
		$result=$class->where('url IS NULL or url = " "')->select();

		foreach ($result as $k => $v) {
			
				$son=$class->where("pid",$v['id'])->select();
				$result[$k]['son']=$son;
			
		}
		return $result;
	}

	public function setClassList(){
		$class = new Proclass();
	
		$result=$class->field("*,concat(path,'.',id) as paths")->order('paths')->select();

		foreach ($result as $k => $v) {
			$result[$k]['name']=str_repeat("|------",$v['level']).$v['name'];
		}
		return $result;

	}

	public function setPicId($data){
		$num=count($data);
		

		for ($i=0; $i <$num ; $i++) { 
			$pic=saveBase64Image($data[$i]);
			
			$date['filepath']=$pic['url'];
			$picid=Db::name('files')->insertGetId($date);
			$ids[]=$picid;
		}
			return implode(',',$ids);
	}

	public function setCPicid($data){
		$num=count($data);
		for ($i=0; $i <$num ; $i++) { 
			$pic=$data[$i];
			$repic=str_replace("SS40","SS500",$pic);
			$date['filepath']=$repic;
			$picid=Db::name('files')->insertGetId($date);

			$ids[]=$picid;
		}
			return implode(',',$ids);
	}


	public function setAdd($data)
	{
		return Db::name('pro')->insert($data);
	}

	public function setEdit($data,$id)
	{
		return Db::name('pro')->where("id",$id)->update($data);
	}

	public function setPicDel($id)
	{

		return Db::name('files')->where("id",$id)->delete();
	}

	public function setInfo($id)
	{
		return Db::name('pro')->where("id",$id)->find();
	}


	public function setStatus($data,$id)
	{
		return Db::name('pro')->where("id",$id)->update($data);
	}

	public function setPicDelAlot($id)
	{
		return Db::name('files')->where("id in ($id)")->delete();
	}

	public function setDel($id)
	{
		return Db::name('pro')->where("id",$id)->delete();
	}

	public function setDelAll($id)
	{
			
		return Db::name('pro')->where("id in ($id)")->delete();
	}

	public function setOne()
	{
		return Db::name('pro')->find();
	}

	public function setPicWatch($data,$id)
	{

		$check=Db::name('files')->where("id in ($data)")->field("id,is_default")->select();
		foreach ($check as $k => $v) {
			Db::name('files')->where("id",$v['id'])->update(['is_default' => '2']);
			Db::name('files')->where("id",$id)->update(['is_default' => '1']);

		}

	}

	public function setTjAll($id)
	{
		$arr=explode(",",$id);
		$num=count($arr);
		for ($i=0; $i < $num ; $i++) {
			$check=DB::name('pro')->where("id",$arr[$i])->field('is_tj')->find();
			if($check['is_tj'] == 1){
				$re=Db::name('pro')->where("id",$arr[$i])->update(['is_tj' => '2']);
			}else{
				$re=Db::name('pro')->where("id",$arr[$i])->update(['is_tj' => '1']);
			}
			
		}
		if($re)
			return 1;
	}
		

}
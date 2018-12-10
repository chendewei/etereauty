<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;

class Proclass extends Model
{
	public function setList(){
		$class = new Proclass();
	
		$result=$class->field("*,concat(path,'.',id) as paths")->order('paths')->select();

		foreach ($result as $k => $v) {
			$result[$k]['name']=str_repeat("|------",$v['level']).$v['name'];
		}
		return $result;

	}

	public function navList(){
		$class = new Proclass();
		$result=$class->select();

		foreach ($result as $k => $v) {
			
				$son=$class->where("pid",$v['id'])->select();
				$result[$k]['son']=$son;
			
		}
		return $result;
	}

	public function addClass($date){
		$class = new Proclass();
		

		if($date['name'] != "" && $date['pid'] != 0){
			$path=$class->where("id = {$date['pid']}")->field("path")->find();
			$date['path']=$path['path'];
			$date['level']=substr_count($date['path'],".");
			$re=Proclass::create($date);
			//加上自身id
			$up['id']=$re->id;
			$up['path']=$date['path'].'.'.$re->id;
			$up['level']=substr_count($up['path'],".");
			$result=$class->where("id = {$up['id']}")->update($up);
		}else if($date['name'] != "" && $date['pid'] == 0){
			$date['path'] = $date['pid'];
			$date['level'] = 1;
			
			$re=Proclass::create($date);
			//加上自身id
			$up['id']=$re->id;
			$up['path']=$date['path'].'.'.$re->id;
			$result=$class->where("id = {$up['id']}")->update($up);

		}


		return $result;
	}

	public function setDel($id)
	{
		return Db::name('proclass')->where("id",$id)->delete();
	}
	
	
}
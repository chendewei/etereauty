<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Customer extends Model
{
	public function setList($where)
	{
		$list=Customer::where($where)->paginate(20,false,['query'=>request()->param()]);
		foreach ($list as $k => $v) {
			$info=Db::name('users')->where("id",$v['parent_id'])->field('email')->find();
			$list[$k]['email']=$info['email'];
		}
		return $list;
	}

	public function setAdd($data)
	{
		return Db::name('customer')->insert($data);
	}

	public function setEdit($data,$id)
	{
		return Db::name('customer')->where("id",$id)->update($data);
	}

	public function setDel($id)
	{
		return Db::name('customer')->where("id",$id)->delete();
	}

	public function setDelAll($id)
	{
		return Db::name('customer')->where("id in ($id)")->delete();
	}

	public function setCheck($id)
	{
		return Db::name('customer')->where("id in ($id)")->find();
	}

	public function setStatus($data,$id)
	{
		return Db::name('customer')->where("id",$id)->update($data);
	}
		

}
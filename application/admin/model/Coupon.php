<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Coupon extends Model
{
	public function setList($where)
	{
		return  Db::name('coupon')->where($where)->paginate(20,false,['query'=>request()->param()]);
	}

	public function setAdd($data)
	{
		return Db::name("coupon")->insert($data);
	}

	public function setEdit($data,$id)
	{
		return DB::name("coupon")->where("id",$id)->update($data);
	}

	public function setDel($id)
	{
		return DB::name("coupon")->delete($id);
	}

	public function setDelAll($id)
	{
		return DB::name("coupon")->where("id in ($id)")->delete();
	}

	
}
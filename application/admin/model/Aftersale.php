<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Aftersale extends Model
{
	public function setList($where)
	{
		return  Db::name('aftersale')->where($where)->paginate(10,false,['query'=>request()->param()]);
	}

	/*public function setAdd($data)
	{
		return Db::name("order")->insert($data);
	}

	public function setEdit($data,$id)
	{
		return DB::name("order")->where("id",$id)->update($data);
	}
*/
	public function setDel($id)
	{
		return DB::name("aftersale")->delete($id);
	}

	public function setDelAll($id)
	{
		return DB::name("aftersale")->where("id in ($id)")->delete();
	}

	
}
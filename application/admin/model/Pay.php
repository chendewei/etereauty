<?php
namespace app\admin\model;
use think\Model;
use think\Session;
use think\Db;
class Pay extends Model
{
	public function setList()
	{
		return  Pay::all(1);
	}

	public function setEdit($id)
	{
		$pay = new Pay();
		// 过滤post数组中的非数据表字段数据
		return $pay->allowField(true)->save($_POST,['id' => $id]);
	}
}
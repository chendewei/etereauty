<?php
namespace app\index\model;
use think\Model;
use think\Db;
use think\Cookie;
class User extends Model
{
	public function setUserPic($data,$id)
	{
			$pic=saveBase64Image($data);
			return Db::name('users')->where('id', $id)->update(['pic' => $pic['url']]);; 
	}

	public function getUserInfo($id)
	{
		return Db::name('users')->where('id',$id)->find();
	}

	public function setUserPwd($data,$id)
	{
		return Db::name('users')->where('id', $id)->update(['pwd' => $data]);; 
	}
	

}
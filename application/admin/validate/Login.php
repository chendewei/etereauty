<?php 
namespace app\amdin\validate;
use think\Validate;

class Login extends validate
{
	protected $rule =[
		'admin_name'=>'require|max:10',
		'admin_password'=>'require',
	];
}


 ?>
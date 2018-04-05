<?php
namespace app\index\validate;
use think\Validate;
class FormValid extends Validate
{
	protected $rule=
	[
		'name'=>'require',
		'passwd'=>'require',
		'email'=>'require|email'
	];
}
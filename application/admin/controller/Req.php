<?php
namespace app\admin\controller;
use think\Request;
class Re 
{
	public function index()
	{
		$res=Request::instance();
		dump($res->has('id','get'));
		dump($res->param());
		dump(input(''));
		echo $res->ext();
	}
}
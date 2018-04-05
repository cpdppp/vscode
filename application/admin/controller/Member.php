<?php
namespace app\admin\controller;
use think\Controller;
class Member extends Controller
{
	public function list()
	{
		return $this->fetch('member-list');
	}
	public function add()
	{
		return $this->fetch('member-add');
	}
	public function save()
	{
		print_r($_POST);
	} 
}
<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
class Admin extends Controller
{
	public function add()
	{
		return $this->fetch('admin-add');
	}
	public function list()
	{
		return $this->fetch('admin-list');
	}
	public function passwdEdit()
	{
		return $this->fetch('admin-password-edit');
	}
	public function permission()
	{
		return $this->fetch('admin-permission');
	}
	public function roleAdd()
	{
		return $this->fetch('admin-role-add');
	}
	public function adminrole()
	{

		return $this->fetch('admin-role');
	}
	public function dbcon()
	{
		$res=Db::connect('db_admin')->query('select * from user');
	}			
}
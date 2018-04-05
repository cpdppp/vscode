<?php
namespace app\admin\controller;
use think\Controller;
use think\Request;
class Index extends Controller
{
	public function index()
	{
		return $this->fetch();
	}
	public function welcome()
	{
		return $this->fetch();
	}
	public function login()
	{
		return $this->fetch();
	}
	public function miss()
	{
		return 'url_miss-page';
	}
	public function succ()
	{
		return $this->success('成功!','index/index');
	}
	public function err()
	{
		return $this->error('失败!');
	}
	public function red()
	{
		$this->redirect('index/welcome',302);
	}
	public function _empty()
	{
		return 'empty method';
	}
	public function req($name='world')
	{
		echo $this->request->url().'<br/>';
		return 'hello'.$name;
	}
	public function req2(Request $request,$name='world')
	{
		echo $request->url().'<br/>';
		return $name;
	}
	public function hello(Request $request)
	{
		dump($request->param());
		return $request->param('id');
	}
	public function form()
	{
		print_r($_POST);
	}
}
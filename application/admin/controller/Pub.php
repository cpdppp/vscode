<?php
namespace app\admin\controller;
use think\Controller;
class Pub extends Controller
{
	public function menu()
	{
		return $this->fetch('_menu');
	}
	public function blank()
	{
		return $this->fetch('_blank');
	}
}

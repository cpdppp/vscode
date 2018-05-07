<?php
namespace app\admin\controller;
use think\Controller;
class Pic extends Controller
{
	public function list()
	{	
		return $this->fetch('picture-list');
	}
		public function add()
	{	
		return $this->fetch('picture-add');
	}
}
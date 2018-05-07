<?php
namespace app\admin\controller;
use think\Controller;
class System extends Controller
{
	public function base()
	{
		return $this->fetch('system-base');
	}
	public function category()
	{
		return $this->fetch('system-category');
	}
}
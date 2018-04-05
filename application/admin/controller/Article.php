<?php
namespace app\admin\controller;
use think\Controller;
class Article extends Controller
{
	public function add()
	{
		return $this->fetch('article-add');
	}
	public function list()
	{
		return $this->fetch('article-list');
	}
}
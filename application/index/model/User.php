<?php
namespace app\index\model;
use think\Model;
class User extends Model
{
	protected $autoWriteTimestamp= true;
	protected $auto=['status'];
	public function setStatusAttr()
	{
		return 1;
	}
	public function add($data)
	{
		$data['passwd']=123;
		$save=Model::save($data);
		if($save)
		{
			return true;
		}else return false;
	}
	public function show()
	{
		$user=new User();
		$query=$user
		->order('id','DESC')
		->select();
		return $query;
	} 
}
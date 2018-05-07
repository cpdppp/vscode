<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Article as Art;
class Article extends Controller
{
	//文章添加页面
	public function add()
	{
		return $this->fetch('article-add');
	}
	//文章列表页面
	public function list()
	{
		$list=Art::where('status',1)->paginate(5);
		$page=$list->render();
		$this->assign('page',$page);
		$this->assign('list',$list);
		return $this->fetch('article-list');
	}
	//批量删除
	public function batch_del()
	{
		$arr=input('post.');
		$ids=implode(',',$arr['id']);
		echo $ids;
		$article=new Art;
		$del=$article->delete($ids);
		echo $article->getLastSql();
/*		if($del){
			return json(['code'=>'0','msg'=>'删除成功！']);
		}else return json(['code'=>'1','msg'=>'删除失败！']);*/

	}
	//添加文章
	public function art_add()
	{
		$article=new Art;
		$data=input('post.');
		$article->data($data);
		$exc=$article->save();
		if($exc){
			$this->success('添加成功,正在跳转...','article/add');
		}else $this->error('添加失败，正在跳转...','article/add');
	}
	//删除文章
	public function art_del()
	{
		$id=input('post.id');
		// echo $id;
		$article=Loader::model('article');
		$exc=$article
		->where(['id'=>$id])
		->delete();
		if($exc){
			return json(['code'=>'0','msg'=>'删除成功！']);
		}else 			return json(['code'=>'1','msg'=>'删除失败！']);

	}
	public function demo_add()
	{
		$article=Loader::model('article');
		for ($i=0; $i <20 ; $i++) { 
			$data[]=
			[
				'title'=>'文章'.$i,
				'type'=>'1',
				'from'=>'自拟',
				'content'=>'MEMO',
				'author'=>'普子',
				'abstract'=>'摘要',
				'status'=>'1'
			];
		}
		$article->saveAll($data);
	}
}
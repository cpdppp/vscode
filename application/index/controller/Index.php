<?php
namespace app\index\controller;
use think\Controller;
use think\Request;
use think\Loader;
use app\index\model\User;
use think\Session;
class Index extends Controller
{

  public function index()
  {
    return $this->fetch();
  }
  public function aboutme()
  {
    return $this->fetch();
  }
  public function pictures()
  {
    return $this->fetch();
  }
  public function articles()
  {
    return $this->fetch();
  }
    public function detail()
  {
    return $this->fetch('article-detail');
  }
  public function code_sharing()
  {
    return $this->fetch();
  }
  public function msg_board()
  {
    return $this->fetch();
  } 
  public function form()
  {

        // $this->assign('a','2123');
    return $this->fetch();
        // return $this->fetch('form',['a'=>'thinkphp']);
  }
  public function valid()
  {
    $post=Request::instance()->post();
    dump($post);
  }
  public function inser()
  {
    $res=Request::instance();
    $post=$res->post();
    $val=Loader::validate('FormValid');
    if(!$val->batch()->check($post))
    {
              // dump($val->getError());
              // $err['err']=$val->getError();
      $err['err']=$val->getError();
      $data=array_diff_key($post,$err['err']);
      Session::set('err',$err['err']);
      Session::set('data',$data);
      $this->redirect('index/form');
              // dump(session('err.passwd'));
              // dump(is_array($val->getError()));

    }
    $user=new User;
    $ins=$user->add($post);
    if($ins)
    {
      $this->success('添加成功','index/form');
    }else $this->error('添加失败','index/form');
  }
}

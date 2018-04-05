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
    return '<style type="text/css">*{ padding: 0; margin: 0; } .think_default_text{ padding: 4px 48px;} a{color:#2E5CD5;cursor: pointer;text-decoration: none} a:hover{text-decoration:underline; } body{ background: #fff; font-family: "Century Gothic","Microsoft yahei"; color: #333;font-size:18px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.6em; font-size: 42px }</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>TP 5.0.6<br/><span style="font-size:30px">小普子</span></p><span style="font-size:22px;">[github.think]</span></div><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_bd568ce7058a1091"></thinkad>';
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
  public function showdata()
  {
    $data=model('user')->paginate(3);
    return $this->fetch('showdata',['data'=>$data]);
  }
}

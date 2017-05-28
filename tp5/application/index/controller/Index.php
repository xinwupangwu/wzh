<?php
namespace app\index\controller;
use app\common\controller\Index as commonIndex;
use think\Request;
use think\Controller;
use think\Db;
use think\Jump;
class Index extends Controller
{
    protected $flag ;
   
	public function conf()
	{
		dump(config());
	}

    public function common()
    {
         $a = new commonIndex();
         return $a->index();
    }


    public function demo(Request $request)
    {
        //dump($request);
        //浏览器输入框的值
        dump($request->domain());
        dump($request->pathinfo() .".html");
        dump($request->path());
        //请求类型
        dump($request->method());
        //isGet isPost isAjax
        //请求参数
        dump($request->get());
        dump($request->param());

        dump($request->post());

        dump($request->session());
        dump($request->cookie());


        dump($request->get('name'));

        //模块 控制器 方法
        dump($request->module());
        dump($request->controller());
        dump($request->action());

        $rea = $request->session('email' ,'imooc@qq.com' ,'trim');

        $res = input('post.id' , 100 ,'intval');
        dump(url('index/index/refister'));
        echo url('index/index/refister');

        $data = Db::query('select * from user where id =?',[1]);
        dump($data);


    }


    public function index()
    {

       //return view();
        $this->redirect(url('index/index/login'));
      
    }
 
    public function login()
    {   
            	
            return view();
   			
    }

    public function checklogin(Request $request)
    {
        //dump($request->post('name')); 
        //dump($request->post('pwd')); 
        $map['name'] = $request->post('name');
        $map['pwd'] = $request->post('pwd');
        $data = $map['name'];
        $this->flag = $data;

        // 把查询条件传入查询方法
        $result = Db::table('user')->where($map)->find(); 
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            //$this->success('登入成功','index/index/zhuye',array('map' =>$map));
            $this->redirect('index/index/zhuye',array('name'=>$data));
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('登入失败');
        }
            //dump($result);        


    }

    public function refister()
    {
       
        return view();
    }

    public function checkrefister(Request $request)
    {
         //dump($request->post());
        $map['name'] = $request->post('name');
        $check = Db::table('user')->where($map)->find();
        if($request->post('pwd') != $request->post('respwd'))
        {
            //alter("两次密码不一致");
            //$this->redirect(url('index/index/refister'));
             $this->error("两次密码不一致");
        }
        else if($check)
        {
          
             //$this->redirect(url('index/index/refister'));
            $this->error("用户名已存在");
          
        }
        else
        {

          $data =[
        'name' => $request->post('name'),
        'pwd' =>$request->post('pwd'),
        'eamil' =>$request->post('eamil'),
        'qq' =>$request->post('qq'),
        'tel' =>$request->post('tel'),
        'sex' =>$request->post('sex')
        ] ;
       $result =  Db::table('user')->insert($data);
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('注册成功','index/index/login');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('新增失败');
        }  
        }
        

    }

    public function zhuye($name = "")
    {
       
       //$name ="admin";
        $resultday1 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',1)
        ->select();

        $resultday2 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',2)
        ->select();

        $resultday3 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',3)
        ->select();

        $resultday4 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',4)
        ->select();

        $resultday5 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',5)
        ->select();

        $resultday6 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',6)
        ->select();

        $resultday7 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',7)
        ->select();

    $this->assign('name',$name);
    $this->assign('resultday1',$resultday1);
    $this->assign('resultday2',$resultday2);
    $this->assign('resultday3',$resultday3);
    $this->assign('resultday4',$resultday4);
    $this->assign('resultday5',$resultday5);
    $this->assign('resultday6',$resultday6);
    $this->assign('resultday7',$resultday7);


    return $this->fetch('zhuye');

    }
    

    public function message()
    {
        $name ="admin";
        $resultcli = Db::table('message')
        ->where('mrec',$name)
        ->where('mstatus','Clients')
        ->select();

        $resultfri = Db::table('message')
        ->where('mrec',$name)
        ->where('mstatus','Friends')
        ->select();
       
        $this->assign('name',$name);
        $this->assign('resultcli',$resultcli);
        $this->assign('resultfri',$resultfri);

        return $this->fetch('message');
    }

    public function agenda()
    {
        $name ="admin";
        $resultday1 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',1)
        ->select();

        $resultday2 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',2)
        ->select();

        $resultday3 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',3)
        ->select();

        $resultday4 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',4)
        ->select();

        $resultday5 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',5)
        ->select();

        $resultday6 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',6)
        ->select();

        $resultday7 = Db::table('agenda')
        ->where('username',$name)
        ->where('day',7)
        ->select();

    $this->assign('name',$name);
    $this->assign('resultday1',$resultday1);
    $this->assign('resultday2',$resultday2);
    $this->assign('resultday3',$resultday3);
    $this->assign('resultday4',$resultday4);
    $this->assign('resultday5',$resultday5);
    $this->assign('resultday6',$resultday6);
    $this->assign('resultday7',$resultday7);

        return $this->fetch('agenda');
    }

    public function contacts()
    {
        $name ="admin";
        $this->assign('name',$name);
        return $this->fetch('contacts');
    }
    
    public function medias()
    {
       $name ="admin";
        $this->assign('name',$name);
        return $this->fetch('medias');
    }
}

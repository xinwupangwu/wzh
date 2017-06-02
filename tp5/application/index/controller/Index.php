<?php
namespace app\index\controller;
use app\common\controller\Index as commonIndex;
use think\Request;
use think\Controller;
use think\Db;
use think\Jump;
use think\Session;
class Index extends Controller
{
    
   
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

       Session::set('name','thinkphp');
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

        echo date('w');

        dump(Session::get('resultnow'));


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
        $data = $request->post('name');
        //session 获得 name
       Session::set('name',$data);

        // 把查询条件传入查询方法
        $result = Db::table('user')->where($map)->find(); 

        //session 获得 id
        Session::set('uid',$result['id']);

        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            //$this->success('登入成功','index/index/zhuye',array('map' =>$map));
            $this->redirect('index/index/zhuye');
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

    public function zhuye()
    {
       
        $name =  Session::get('name');

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

        $resultnow = Db::table('agenda')
        ->where('username',$name)
        ->where('day',date('w')+1)
        ->select();

        //session 获得agendanow
        Session::set('resultnow',$resultnow);


    $this->assign('name',$name);
    $this->assign('resultday1',$resultday1);
    $this->assign('resultday2',$resultday2);
    $this->assign('resultday3',$resultday3);
    $this->assign('resultday4',$resultday4);
    $this->assign('resultday5',$resultday5);
    $this->assign('resultday6',$resultday6);
    $this->assign('resultday7',$resultday7);
    $this->assign('resultnow',$resultnow);


    return $this->fetch('zhuye');

    }
    

    public function message()
    {
        $name =Session::get('name');
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
        $this->assign('resultnow',Session::get('resultnow'));

        return $this->fetch('message');
    }

    public function agenda()
    {
        $name =Session::get('name');
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
    $this->assign('resultnow',Session::get('resultnow'));
        return $this->fetch('agenda');
    }

    public function contacts()
    {

        $result = Db::table('user')
        ->select();
        $name =Session::get('name');
        $this->assign('name',$name);
        $this->assign('result',$result);
        $this->assign('resultnow',Session::get('resultnow'));
        return $this->fetch('contacts');

    }
    
    public function medias()
    {
       $name =Session::get('name');
        $this->assign('name',$name);
        $this->assign('resultnow',Session::get('resultnow'));


        $result = Db::table('file')
        ->select();
        $this->assign('result',$result);
        return $this->fetch('medias');
    }



    public function addagenda(Request $request)
    {
        
         $data =[
        'username' => Session::get('name'),
        'day' =>$request->post('day'),
        'timestart' =>'-'.$request->post('timestart'),
        'timeend' =>'-'.$request->post('timeend'),
        'timeprocess' =>$request->post('timeprocess'),
        'thing' =>$request->post('thing'),
        'status'=>$request->post('status')
        ];

        $result =  Db::table('agenda')->insert($data);
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('新增成功','index/index/agenda');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('新增失败');
        }    
    }

    public function decagenda(Request $request)
    {
        $map['day']=$request->post('day');
        $map['timeprocess']=$request->post('timeprocess');
        $map['username']=Session::get('name');        
        $map['thing']=$request->post('thing');
        $result = Db::table('agenda')
        ->where($map)
        ->delete();
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('删除成功','index/index/agenda');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('删除失败');
        }   
    }

       public function cleanagenda()
    {
      
        $map['username']=Session::get('name');        
        $result = Db::table('agenda')
        ->where($map)
        ->delete();
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('日程全部清空成功','index/index/agenda');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('日程清空失败');
        }   
    }

     public function updateuser(Request $request)
    {
        
         $data =[
        'name' => $request->post('name'),
        'ustatus' => $request->post('ustatus'),
        'tag'=>$request->post('tag')
        ];

        $id = $request->post('id');

        $result =  Db::table('user')
        ->where('id',$id)
        ->update($data);
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('修改成功','index/index/contacts');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('修改失败');
        }    
    } 

     public function deluser(Request $request)
    {
        $map['id']=$request->post('id');
        $map['name']=$request->post('name');
        //$map['ustatus']=$request->post('ustatus');        
       
        $result = Db::table('user')
        ->where($map)
        ->delete();
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('删除成功','index/index/contacts');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('删除失败');
        }   

    }

        public function personal()
    {   
        $name =Session::get('name');
        $this->assign('name',$name);
        $result = Db::table('user')
        ->where('name',$name)
        ->find();
        $this->assign('result',$result);
        $this->assign('resultnow',Session::get('resultnow'));
        return $this->fetch('personal');
            
    }

    public function updatapersonal(Request $request)
    {
        $id = $request->post('id');
        $data =[
        'name' => $request->post('name'),
        'sex' =>$request->post('sex'),
        'eamil'=>$request->post('email'),
        'qq'=>$request->post('qq'),
        'tel'=>$request->post('tel')
        ];

        $result =  Db::table('user')
        ->where('id',$id)
        ->update($data);
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('个人信息修改成功','index/index/personal');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('个人信息修改失败');
        }    

    }

     public function updatapwd(Request $request)
    {
        $id = Session::get('uid');
        $data =[
        'pwd'=>$request->post('xpwd')
        ];

        $result =  Db::table('user')
        ->where('id',$id)
        ->update($data);
        if($result){
            //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
            $this->success('密码修改成功','index/index/personal');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('密码修改失败');
        }    

    }


    public function upfile(Request $request)
    {
         $file = request()->file('file');
    // 移动到框架应用根目录/public/uploads/ 目录下
    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');

        if($info){
            $data =[
        'filename'=>$info->getFilename(),
        'filezui'=>$info->getExtension(),
        'status'=>'公共'

        ];

        $result =  Db::table('file')->insert($data);
        if($result){
        $this->success('上传成功','index/index/medias');
        } else {
            //错误页面的默认跳转页面是返回前一页，通常不需要设置
            $this->error('上传失败');
        }
    }
        
    }

    public function download(){


        echo 2333;
    }


}

<?php
namespace Home\Controller;

use Think\Controller;

class PublicController extends Controller
{   
    /**
    * 登录页面渲染
    */
    public function login()
    {
        $admin_id = session("ADMIN_ID");
        if (!empty($admin_id)){
            $this->display('Index:index');
            
        }else{
            $this->display();
        }
    }

    /**
    *  登出函数
    */
    public function logout(){
        session('ADMIN_ID', null);
        $this->display('Public:login');
    }

    /**
    * 登录操作
    */
    public function dologin(){
       $name = I("post.username");
       if (empty($name)){
            $this->error('未输入用户名');
       } 
       $pass = I("post.password");
       if (empty($pass)){
            $this->error('未输入密码');
       }
       $user = M("User");

       $where['username'] = $name;

       $result = $user->where($where)->find();

       if (!empty($result) && $result['type'] == 1){
            if (md5($pass) == $result['pwd']){
                session('ADMIN_ID', $result['id']);
                session('name', $result['username']);
                $result['lasttime'] =date("Y-m-d H:i:s");
                $user->save($result);
                cookie("admin_suername", $name, 3600*24*30);
                $this->success("登录成功", U("Index/index"));
            }else{
                $this->error("密码不正确");
            }
        }else{
            $this->error("用户名不存在");
        }
    }
}

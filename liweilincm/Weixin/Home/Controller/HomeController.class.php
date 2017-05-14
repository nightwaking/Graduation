<?php
namespace Home\Controller;

use Think\Controller;

class HomeController extends Controller{

    public function Index(){
        $this->display();
    }
    
    public function home(){
        $this->display();
    }

    public function register(){
        $user_model = M("user");

        $rules = array(
            //array(验证字段,验证规则,错误提示,验证条件,附加规则,验证时间)
            array('username', 'require', '用户名不能为空！', 1 ),
            array('username','','用户名已被注册！！',0,'unique',3),
            array('password','require','密码不能为空！',1),
            array('repassword','require','重复密码不能为空！',1),
            array('password','5,20',"密码长度至少5位，最多20位！",1,'length',3),
            array('repassword','5,20',"重复密码长度至少5位，最多20位！",1,'length',3),
        );

        if ($user_model->validate($rules)->create() === false){
            $this->error($user_model->getError());
        }

        $repassword = I('post.repassword');

        $password = I('post.password');
        $username = I('post.username');

        if ($repassword != $password){
            $this->error("两次密码不同!");
        }

        $users_model = M("user");
        $data = array(
            'username' => $username,
            'pwd' => md5($password),
            'regtime' => date("Y-m-d H:i:s"),
            'type' => 0,
            'email' => 'xxxxxxxxx@xx.com',
            'lasttime' => date("Y-m-d H:i:s"),
        );

        $result = $user_model->add($data);

        if ($result){
            $data['id'] = $result;
            session('user', $data);
            $this->success("注册成功", U('Home/dologin'));
        }else{
            $this->error("注册失败", U('Home/home'));
        }

    }

    public function dologin(){
        $this->display("login");
    }

    public function login(){

        $name = I("post.username");
        if (empty($name)){
            $this->error("未输入用户名");
        }

        $password = I("post.password");

        if (empty($password)){
            $this->error("未输入密码");
        }

        $user = M("User");

        $where['username'] = $name;

        $result = $user->where($where)->find();

        if (!empty($result)){
            if (md5($password) == $result['pwd']){
                session('USER_ID', $result['uid']);
                session('name', $result['username']);
                $result['lasttime'] = date("Y-m-d H:i:s");
                $user->save($result);
                cookie("username", $name, 3600*24*30);
                $this->success("登录成功", U("Store/index"));
            }else{
                $this->error("密码不正确", U("Home/dologin"));
            }
        }else{
            $this->error("用户名不存在", U("Home/dologin"));
        }
        
    }

    public function logout(){
        session('USER_ID', null);
        $this->display("login");
    }
}

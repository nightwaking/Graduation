<?php
namespace Home\Controller;

use Think\Controller;

class UserController extends Controller{
    public function index(){
        $this->display();
    }

    public function edit(){
        $this->user_model = M('User');
        $id = session('USER_ID');
        if (IS_GET){
            if (empty($id)){
                $this->error('请先登录');
            }

            $where['uid'] = $id;
            $user = $this->user_model->where($where)
            ->select();

            $this->assign('kind', $user);
            $this->display();
        }else{
            $where['uid'] = $id;

            $rules = array(
                array('email','email','邮箱格式不正确！',1),
            );
            if ($this->user_model->validate($rules)->create()===false){
                $this->error($this->user_model->getError());
            }

            $mobile = I('post.mobile');
            $username = I('post.username');
            $email = I('post.email');
            if (empty($username)){
                $this->error('用户名不能为空');
            }

            $data['mobile'] = $mobile;
            $data['username'] = $username;
            $data['email'] = $email;

            $ls=$this->user_model->where($where)->save($data);
            if ($ls){
                $this->success("修改成功", U('User/index'));
            }else{
                $this->error("修改失败失败!");
            }
        }
    }

    public function changePassword(){
        $this->user_model = M('User');
        $id = session('USER_ID');
        if (IS_GET){
            $where['uid'] = $id;
            $user = $this->user_model->where($where)
            ->select();
            $this->assign('kind', $user);
            $this->display();  
        }else{
            $where['uid'] = $id;
            $username = I('post.username');
            $oldPassword = md5(I('post.old_password'));
            $newPassword = I('post.new_password');
            $renewPassword = I('post.renew_password');

            $member = $this->user_model->where(array('username' => $username))->find();

            $password = $this->user_model->where(array('pwd' => $oldPassword))->find();
            if (empty($member)){
                $this->error('用户未注册,请先注册');
            }

            if (empty($password)){
                $this->error('用户旧密码不正确,不能修改');
            }

            if ($newPassword != $renewPassword){
                $this->error('两次输入的新密码不相同');
            }

            if (md5($newPassword) == $oldPassword){
                $this->error('新密码与旧密码相同');
            }
            $data['pwd'] = md5($renewPassword);

            $ls=$this->user_model->where($where)->save($data);
            if ($ls){
                $this->success("修改成功", U('Home/dologin'));
            }else{
                $this->error("修改失败失败!");
            }
        } 
    }
}
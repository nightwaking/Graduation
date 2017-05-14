<?php
namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
    public function index()
    {
     if (!empty(session("name"))){
       $this->display();
     }else{
       $this->display('Public:login');
     }
    }

    public function home(){
        $this->user_model = M('user');
        $user_id = I('request.user_id');

        if (!empty($user_id)){
            $where['uid'] = $user_id; 
        }

        $user_name = I('request.user_name');
        if ($user_name != ""){
            $where['username'] = array('like', "%$user_name%");
        }

        $count = $this->user_model->where($where)->count();

        $page = new \Think\Page($count,20);

        $kind = $this->user_model
        ->where($where)
        ->limit($page->firstRow, $page->listRows)
        ->order("uid")
        ->select();
        $this->assign("page", $page->show());
        $this->assign("formget", array_merge($_GET, $_POST));
        $this->assign("kind", $kind);


        $this->display();
    }
    
    /**
    * 后台商品管理
    */

    public function store(){
        $settlesRes = array();
        $kind = M("kind")->select();
        foreach ($kind as $value){
            $nameFirstChar = getFirstChar($value['kname']);
            $setKey = $nameFirstChar.sp_random_string(5);
            $settlesRes[$setKey] = $value;
        }
        
        $this->assign('settlesRes', $settlesRes);
        $this->_lists();
        $this->display();
    }


    private function _lists($where=array()){
        $store_id = I('request.store_id');

        $this->store_model = M("store");

        if (!empty($store_id)){
            $where['sid'] = $store_id; 
        }

        $store_name = I('request.store_name');
        if ($store_name != ""){
            $where['storename'] = $store_name;
        }

        $kind_id = I('request.kind_id');
        if (!empty($kind_id)){
            $where['kdid'] = $kind_id;
        }

        $kind_name = I('request.kind_name');
        if (!empty($kind_name)){
            $where['kname'] = $kind_name;
        }

        $count = $this->store_model->where($where)->count();

        $page = new \Think\Page($count,20);

        $kind = $this->store_model->join('__KIND__ ON __KIND__.kid = __STORE__.kdid')
        ->where($where)
        ->limit($page->firstRow, $page->listRows)
        ->order("sid")
        ->select();


        $this->assign("page", $page->show());
        $this->assign("formget", array_merge($_GET, $_POST));
        $this->assign("kind", $kind);
    }

    /**
    * 后台商品编辑
    */
    public function edit(){
        if (IS_GET){
            $id = I('get.id', 0, 'intval');
            $this->store_model = M("store");
            $kind = $this->store_model
            ->join('__KIND__ ON __KIND__.kid = __STORE__.kdid')
            ->where(array('sid'=>$id))
            ->find();
            $this->assign('kind', $kind);
            $this->display();
        }else{
            $info = upload($upload);
            if(!$info){
                $this->error('上传失败！');
            }else{// 上传成功 获取上传文件信息
                $this->success('上传成功！');
            }

            foreach($info as $file){
                $data['storeimage'] = $file['savepath'].$file['savename'];
            };
            $where['sid'] = I('post.store_id');
            $data['storename'] = I('post.store_name');
            $data['storeamount'] = I('post.store_amount');
            $data['storeprice'] = I('post.store_price');
            $data['storedescription'] = I('post.store_description');

            $ls=M('store')->where($where)->save($data);
            if ($ls){
                $this->success("修改成功", U('Index/store'));
            }else{
                $this->error("修改失败!");
            }
        }

    }

    /**
    * 后台商品删除
    */

    public function delete(){
        $id = I('get.id', 0, 'intval');
        $this->store_model = M("store");
        if ($this->store_model->delete($id)!= false){
            $this->success("删除成功", U('Index/store'));
        }else{
            $this->error("删除失败");
        }
    }

    /**
    * 后台商品添加
    */

    public function add(){
        if (IS_GET){
            $this->kind_model = M("kind");
            $kind = $this->kind_model
            ->select();

            $this->assign("kind", $kind);
            $this->display();
        }else{
            $this->store_model = M("store");
            $info = upload($upload);
            if(!$info){
                $this->error('上传失败！');
            }else{// 上传成功 获取上传文件信息
                $this->success('上传成功！');
            }

            foreach($info as $file){
                $data['storeimage'] = $file['savepath'].$file['savename'];
            };

            $kind_id = I('post.kind_id');
            if (empty($kind_id)){
                $this->error('必须选择种类');
            }

            $data['storename'] = I('post.store_name');
            $data['storeamount'] = I('post.store_amount');
            $data['storeprice'] = I('post.store_price');
            $data['storedescription'] = I('post.store_description');
            $data['kdid'] = $kind_id;
            $ls = $this->store_model->add($data);
            if ($ls){
                $this->success("添加成功", U('Index/store'));
            }else{
                $this->error("添加失败");
            }
        }
    }

    public function userDelete(){
        $id = I('get.id', 0, 'intval');
        $this->user_model = M("user");
        if ($this->user_model->delete($id)!= false){
            $this->success("删除成功", U('Index/home'));
        }else{
            $this->error("删除失败");
        }
    }
}

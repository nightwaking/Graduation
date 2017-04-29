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

    public function exchange(){
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
            $data['storename'] = I('post.store_name');
            $data['storeamount'] = I('post.store_amount');
            $data['storeprice'] = I('post.store_price');
            $data['storedescription'] = I('post.store_description');
            $data['kdid'] = I('post.kind_id');
            $ls = $this->store_model->add($data);
            if ($ls){
                $this->success("添加成功", U('Index/store'));
            }else{
                $this->error("添加失败");
            }
        }
    }
}

<?php
namespace Home\Controller;

use Think\Controller;

class KindController extends Controller{
    public function kind(){
        $this->_list();
        $this->display();
    }

    private function _list($where=array()){
        $this->kind_model = M("kind");
        $kind_id = I('request.kind_id');
        if (!empty($kind_id)){
            $where['kid'] = $kind_id;
        }

        $kind_name = I('request.kind_name');
        if (!empty($kind_name)){
            $where['kname'] = array('like', "%$kind_name%");
        }

        $count = $this->kind_model->where($where)->count();

        $page = new \Think\Page($count,20);

        $kind = $this->kind_model
        ->where($where)
        ->limit($page->firstRow, $page->listRows)
        ->order("kid")
        ->select();
        $this->assign("page", $page->show());
        $this->assign("formget", array_merge($_GET, $_POST));
        $this->assign("kind", $kind);
    }

    public function delete(){
        $id = I('get.id', 0, 'intval');
        $this->kind_model = M("kind");
        if ($this->kind_model->delete($id)!= false){
            $this->success("删除成功", U('Kind/kind'));
        }else{
            $this->error("删除失败");
        }
    }

    public function add(){
        if (IS_GET){
            $this->display();
        }else{
            $this->kind_model = M("kind");
            $data['kname'] = I('post.kind_name');
            $data['kdescription'] = I('post.kind_description');
            $ls = $this->kind_model->add($data);
            if ($ls){
                $this->success("添加成功", U('Kind/kind'));
            }else{
                $this->error("添加失败");
            }
        }
    }
}
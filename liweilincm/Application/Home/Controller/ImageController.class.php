<?php
namespace Home\Controller;

use Think\Controller;

class ImageController extends Controller{
	public function index(){
		$this->_list();
		$this->display();
	}

	private function _list($where=array()){
		$this->img_model = M('images');
		$count = $this->img_model->where($where)->count();

        $page = new \Think\Page($count,20);

		$kind = $this->img_model
		->where($where)
		->order("imgid")
		->select();
		$this->assign("page", $page->show());
        $this->assign("formget", array_merge($_GET, $_POST));
        $this->assign("kind", $kind);
	}

	public function add(){
		$this->img_model = M('images');
		if (IS_GET){
			$kind = $this->img_model
            ->select();

            $this->assign("kind", $kind);
            $this->display();
		}else{
			$info = upload($upload);
			foreach($info as $file){
                $data['image'] = $file['savepath'].$file['savename'];
            };

            $data['create_time'] = date("Y-m-d H:i:s");
            $data['type'] = I('post.pic_type');
            $ls = $this->img_model->add($data);
            if ($ls){
                $this->success("添加成功");
            }else{
                $this->error("添加失败");
            }
		}
		
	}

	public function delete(){
		$this->img_model = M('images');
		$id = I('get.id', 0, 'intval');
        if ($this->img_model->delete($id)!= false){
            $this->success("删除成功");
        }else{
            $this->error("删除失败");
        }
	}
}
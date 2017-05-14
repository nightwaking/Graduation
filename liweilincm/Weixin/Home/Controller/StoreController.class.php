<?php
namespace Home\Controller;

use Think\Controller;

class StoreController extends Controller{
    public function index(){
        $this->_list();
        $this->img_model = M("images");
        $picture = $this->img_model
        ->where($where)
        ->order("imgid")
        ->select();
        $this->assign("picture", $picture);
        $this->display();
    }

    private function _list($where=array()){
        $this->kind_model = M("kind");
        
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

    public function store(){
        if (IS_GET){
            $id = I('get.id', 0, 'intval');
            $this->store_model = M('store');

            if (!empty($id)){
                $where['kdid'] = $id;
            }
            $kind = $this->store_model->where($where)
            ->order("sid")
            ->select();

            $this->assign("kind", $kind);
            $this->display();
        }else{
            $this->store_model = M('store');
            $name = I('request.store_name');

            if (!empty($name)){
                $where['storename'] = array('like', "%$name%");
            }

            $kind = $this->store_model->where($where)
            ->order('sid')
            ->select();
            $this->assign("kind", $kind);
            $this->assign("formget", array_merge($_GET, $_POST));
            $this->display();
        }
    }


    public function detail(){
        if (IS_GET){
            $id = I('get.id', 0, 'intval');
            $this->store_model = M('store');

            if (!empty($id)){
                $where['sid'] = $id;
            }

            $kind = $this->store_model->where($where)
            ->order('sid')
            ->select();
            $this->assign("kind", $kind);
            $this->display();
        }
    }

    /**
    *   添加到购物车
    */
    public function basket(){
        $sid = I('get.id', 0, 'intval');
        $this->basket_model = M('basket');
        $uid = session('USER_ID');

        if (!empty($uid)){
            $data['user_uid'] = $uid;
        }else{
            $this->error("请先登录");
        }

        if (!empty($sid)){
            $data['store_sid'] = $sid;
        }

        $ls = $this->basket_model->add($data);
        if ($ls){
            $this->success("添加成功", U('Store/detail' ,array('id'=>$sid)));
        }else{
            $this->error("添加失败");
        }
    }

    /**
    *  购物车列表
    */

    public function showBasket(){
        $this->basket_model = M('basket');
        $uid = session('USER_ID');
        $where['user_uid'] = $uid;
        $basket = $this->basket_model->join('__USER__ ON __USER__.uid = __BASKET__.user_uid')
        ->join('__STORE__ ON __STORE__.sid = __BASKET__.store_sid')
        ->where($where)
        ->order('bid')
        ->select();

        $this->assign('kind', $basket);
        $this->display('Store:basket');
    }

    public function delete(){
        $id = I('get.id', 0, 'intval');
        $this->basket_model = M("basket");
        if ($this->basket_model->delete($id)!= false){
            $this->success("移除成功", U('Store/showBasket'));
        }else{
            $this->error("移除失败");
        }
    }


    public function exchange(){
        if (IS_GET){
            $this->basket_model = M('basket');
            $uid = session('USER_ID');
            $where['user_uid'] = $uid;
            $basket = $this->basket_model->join('__USER__ ON __USER__.uid = __BASKET__.user_uid')
            ->join('__STORE__ ON __STORE__.sid = __BASKET__.store_sid')
            ->where($where)
            ->order('bid')
            ->select();
            
            $sumScore = $this->basket_model
            ->join('__STORE__ as g ON g.sid = __BASKET__.store_sid')
            ->where($where)
            ->sum('g.storeprice');

            $this->assign('kind', $basket);
            $this->assign('sum',$sumScore);
            $this->display();
        }else{
            $this->exchange_model = M('exchange');

            $address = I('post.order_address');

            if (empty($address)){
                $this->error("地址不能为空");
            }
            
            $data['user_id'] = session('USER_ID');
            $data['e_time'] = date("Y-m-d H:i:s");
            $data['e_mobile'] = I('post.order_moblie');
            $data['e_address'] = $address;
            $data['e_notice'] = I('post.order_notice');
            $data['e_price'] = I('post.sum_price');
            $data['e_order'] = strtotime(date("Y-m-d H:i:s"));

            $ls = $this->exchange_model->add($data);
            if ($ls){
            $this->success("添加成功", U('Store/exchangeShow' ,array('id'=>$e_id)));
            }else{
                $this->error("添加失败");
            }
        }
    }

    public function exchangeShow(){
        if (IS_GET){
            $this->exchange_model = M('exchange');
            $uid = session('USER_ID');
            $where['user_id'] = $uid;
            $exchange = $this->exchange_model->where($where)
            ->order('e_id')
            ->select();

            $this->assign('kind', $exchange);
            $this->display();
        }
    }

    public function orderCannel(){
        $this->exchange_model = M('exchange');
        $id = I('get.id', 0, 'intval');
        $where['e_id'] = $id;
        $data['status'] = 1;
            
        $ls=$this->exchange_model->where($where)->save($data);

        if ($ls){
            $this->success("取消成功", U('Store/exchangeShow'));
        }else{
            $this->error("取消失败!");
        }
    }
}
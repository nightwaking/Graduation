<?php
namespace Home\Controller;

use Think\Controller;

class ExchangeController extends Controller{

    /**
    *后台订单管理
    */
    public function exchange(){
        $this->_list();
        $this->display();
    }

    public function _list($where = array()){
        $this->exchange_model = M("exchange");
        $start_time = I('request.start_time');
        if (!empty($start_time)){
            $where['e_time'] = array(array('EGT', $start_time));
        }

        $end_time = I('request.end_time');
        if (!empty($end_time)){
            if (empty($where['e_time'])){
                $where['e_time'] = array();
            }
            array_push($where['e_time'], array('ELT', $end_time));
        }

        $order_id = I('request.exchange_id');
        if (!empty($order_id)){
            $where['e_id'] = $order_id;
        }

        $order_order = I('request.exchange_order');
        if (!empty($order_order)){
            $where['e_order'] = $order_order;
        }

        $count = $this->exchange_model->where($where)->count();
        $page = new \Think\Page($count,20);
        $exchange = $this->exchange_model->join('__USER__ ON __USER__.uid = __EXCHANGE__.user_id')
        ->where($where)
        ->limit($page->firstRow, $page->listRows)
        ->order("e_id")
        ->select();

        $page = new \Think\Page($count,20);
        $this->assign("page", $page->show());
        $this->assign("formget", array_merge($_GET, $_POST));
        $this->assign("exchange", $exchange);
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/10/16
 * Time: 2:58
 */

class Order extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('woocommerce');
        $this->woo = $this->woocommerce->request();
        $this->load->model('OrderModel');
    }

    public function index()
    {
        $orders = $this->woo->get('orders');
        $data['order'] = $orders;
        $this->template('order/index', $data);

//        $data = [];
//        $data['order'] = $this->OrderModel->get_all_orders();
//        $this->data['content'] = $this->load->view('order/index', $data, true);
//
//        $this->template();
    }

    public function add()
    {
        $name = $this->input->post('name');
        $amount = $this->input->post('amount');
        $orders = $this->woo->post('orders', array());
//        $count = $this->OrderModel->get_category_count($name);
//        if($count > 0) {
//            echo 1;
//        } else {
//            $this->CategoryModel->add($name, $description);
//            echo 0;
//        }
    }

    public function getlist($data=NULL)
    {
        $data['order'] = $this->woo->get('orders');;
        $this->template('order/list', $data);
//        $this->data['content'] = $this->load->view('category/list', $data, true);
//
//        $this->template();
    }

    public function  delete() {
        $id = $this->input->post('id');
        $this->CategoryModel->delete($id);
        echo 1;
    }

    public function  edit() {
        $id = $this->input->get('id');
        $data['category'] = $this->CategoryModel->get_with_id($id);
        $this->data['content'] = $this->load->view('category/edit', $data, true);

        $this->template();
    }

    public function update() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('description');
        $this->CategoryModel->update($id, $name, $desc);
        echo 1;
    }
}
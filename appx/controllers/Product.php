<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/10/16
 * Time: 2:58
 */

class Product extends BaseController
{
    protected $woo;
    public function __construct()
    {
        parent::__construct();

        $this->load->library('woocommerce');
        $this->woo = $this->woocommerce->request();
        $this->load->model('ProductModel');
        $this->load->model('CategoryModel');
    }

    public function index($data=NULL)
    {
        //$data['category'] = $this->CategoryModel->get_all_category();
//        $category = $this->woo->products->get_categories();
        $data['product'] = array();//$category->product_categories;
        $data['category'] =array();
//        $this->data['content'] = $this->load->view('product/index', $data, true);
//        $this->template();
        $this->template('product/index', $data);
    }

    public function add()
    {
        $short_description = $this->input->post('short_description');
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $sale_price = $this->input->post('sale_price');
        $sku = $this->input->post('sku');
        $stock_status = $this->input->post('stock_status');
        $sold_individually = $this->input->post('sold_individually');
        $weight = $this->input->post('weight');
        $length = $this->input->post('length');
        $width = $this->input->post('width');
        $height = $this->input->post('height');
        $upsells = $this->input->post('upsells');
        $cross_sells = $this->input->post('cross_sells');
        $purchase_note = $this->input->post('purchase_note');
        $enable_reviews = $this->input->post('enable_reviews');
        $menu_order = $this->input->post('menu_order');
        $comment = $this->input->post('comment');
        $category = $this->input->post('category');
        $sale_date_from = $this->input->post('sale_date_from');
        $sale_date_to = $this->input->post('sale_date_to');

        if(!is_dir( './uploads/products/'))
            mkdir( './uploads/products/' , 0755,true);
        $config['upload_path']          = './uploads/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048576;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('photoFile')) {
            //$this->ProductModel->insert($category_id, $name, $description,$old_price,
            //    $new_price, $amount, $this->upload->data('file_name'));
            //$this->woo->products->create( array( 'title' => $name, 'type' => 'simple', 'regular_price' => $new_price, 'description' => $description ,'old_price' => $old_price, 'amount' => $amount ) ) ;


            echo 1;
        } else {
            echo 0;
        }
    }

    public function getlist($data=NULL)
    {
//        $product = $this->woo->products->get();
        $data['product'] = array();//$product->products;
//        $this->data['content'] = $this->load->view('product/list', $data, true);
//        $this->template();
        $this->template('product/list', $data);
    }

    public function page()
    {
        $data['ticket_page'] = $this->input->post("ticket_page");
        $allProduct = $this->ProductModel->get_all_product();
        $data['product'] = $this->ProductModel->get_product($data['ticket_page']);
        $data['total_cnt'] = count($allProduct);
        $data['total_pages'] = ceil($data['total_cnt'] / 8);
        echo $data;
    }

    public function  delete() {
        $id = $this->input->post('id');
        $this->ProductModel->delete($id);
        echo 1;
    }

    public function  edit() {
        $id = $this->input->get('id');
        $data['product'] = $this->ProductModel->get_with_id($id);
        $data['category'] = $this->CategoryModel->get_all_category();
//        $this->data['content'] = $this->load->view('product/edit', $data, true);
//
//        $this->template();
        $this->template('product/edit', $data);
    }

    public function  detail() {
        $id = $this->input->get('id');
        $data['product'] = $this->ProductModel->get_with_id($id);
        $data['category'] = $this->CategoryModel->get_all_category();
//        $this->data['content'] = $this->load->view('product/detail', $data, true);
//
//        $this->template();
        $this->template('product/detail', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        $category_id = $this->input->post('category_id');
        $name = $this->input->post('name');
        $image = $this->input->post('image');
        $description = $this->input->post('description');
        $old_price = $this->input->post('old_price');
        $new_price = $this->input->post('new_price');
        $amount = $this->input->post('amount');

        if(!is_dir( './uploads/products/'))
            mkdir( './uploads/products/' , 0755,true);
        $config['upload_path']          = './uploads/products/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 2048576;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        if($image == "") {
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ($this->upload->do_upload('photoFile')) {
                $this->ProductModel->update($id, $category_id, $name, $description,$old_price,
                    $new_price, $amount, $this->upload->data('file_name'));
                echo 1;
            } else {
                echo 0;
            }
        } else {
            $this->ProductModel->update($id, $category_id, $name, $description,$old_price,
                $new_price, $amount, $image);
            echo 1;
        }
    }
}
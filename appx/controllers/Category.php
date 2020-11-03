<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/10/16
 * Time: 2:58
 */

class Category extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('woocommerce');
        $this->woo = $this->woocommerce->request();
        $this->load->model('CategoryModel');
    }

    public function index($data=NULL)
    {
//        $this->data['content'] = $this->load->view('category/index', $data, true);
//        $new = $this->woo->products->get_categories();

        $this->template('category/index');
    }

    public function add()
    {
        $name = $this->input->post('name');
        $description = $this->input->post('description');
        $category = $this->woo->post('products/categories', array('name'=>$name, 'description'=>$description)/*array('product_category'=>array('name'=>$name, 'description'=>$description))*/);
        if (isset($category))
        {
            echo 0;
        }
        else
        {
            echo 1;
        }
        //$count = $this->CategoryModel->get_category_count($name);

//        if($count > 0) {
//            echo 1;
//        } else {
//            $this->CategoryModel->add($name, $description);
//            echo 0;
//        }
    }

    public function getlist($data=NULL)
    {
        //$data['category'] = $this->CategoryModel->get_all_category();
        $categories = $this->woo->get('products/categories');
        $data['category'] = $categories;
        $this->template('category/list', $data);
    }

    public function  delete() {
        $id = $this->input->post('id');
//        $this->CategoryModel->delete($id);
        $category = $this->woo->delete('products/categories/'.$id, array('force' => true));
        echo 1;
    }

    public function  edit() {
        $id = $this->input->get('id');
//        $data['category'] = $this->CategoryModel->get_with_id($id);
//        $this->data['content'] = $this->load->view('category/edit', $data, true);

        $category = $this->woo->get('products/categories/'.$id);
        $data['category'] = $category;
        $this->template('category/edit', $data);

    }

    public function update() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('description');
        $this->woo->put('products/categories/'.$id, array('name'=>$name, 'description'=>$desc));
//        $this->CategoryModel->update($id, $name, $desc);
        echo 1;
    }
}
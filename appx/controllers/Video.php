<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/10/16
 * Time: 2:58
 */

class Video extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('CategoryModel');
        $this->load->model('ProductModel');
        $this->load->model('VideoModel');
    }

    public function index($data=NULL)
    {
        $data['products'] = $this->ProductModel->get_all_product();
//        $this->data['content'] = $this->load->view('video/index', $data, true);
//
//        $this->template();
        $this->template('video/index', $data);
    }

    public function add()
    {
        $product_id = $this->input->post('product_id');
        $name = $this->input->post('name');
        $description = $this->input->post('description');

        if(!is_dir( './uploads/videos/'))
            mkdir( './uploads/videos/' , 0755,true);
        $config['upload_path']          = './uploads/videos/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 2048576;
        $config['encrypt_name']         = true;
        $this->load->library('upload', $config);

        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('photoFile')) {
            $this->VideoModel->add($product_id, $name, $description, $this->upload->data('file_name'));
            echo 1;
        } else {
            echo 0;
        }
    }

    public function getlist()
    {
        $data['video'] = $this->VideoModel->get_all_video();
//        $this->data['content'] = $this->load->view('video/list', $data, true);
//
//        $this->template();
        $this->template('video/list', $data);
    }

    public function  delete() {
        $id = $this->input->post('id');
        $this->CategoryModel->delete($id);
        echo 1;
    }

    public function  edit() {
        $id = $this->input->get('id');
        $data['category'] = $this->CategoryModel->get_with_id($id);
//        $this->data['content'] = $this->load->view('video/edit', $data, true);
//
//        $this->template();
        $this->template('video/edit', $data);
    }

    public function update() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $desc = $this->input->post('description');
        $this->CategoryModel->update($id, $name, $desc);
        echo 1;
    }

    public function  detail() {
        $id = $this->input->get('id');
        $data['video'] = $this->VideoModel->get_with_id($id);
//        $this->data['content'] = $this->load->view('video/detail', $data, true);
//
//        $this->template();
        $this->template('video/detail', $data);
    }
}
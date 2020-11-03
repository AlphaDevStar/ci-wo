<?php


class Dashboard extends BaseController
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('DashboardModel');
    }

    public function index($data=NULL)
    {
		$data['categories'] = $this->DashboardModel->get_categories();
        $data['products'] = $this->DashboardModel->get_products();
        $data['videos'] = $this->DashboardModel->get_videos();
        $data['orders'] = $this->DashboardModel->get_orders();
        $this->template('dashboard/index', $data);
        //$this->data['content'] = $this->load->view('dashboard/index', $data, true);

        //$this->template();
    }
	public function detail($data=NULL)
	{
	    $id = $this->input->get('id');
		$data['tasks'] = $this->DashboardModel->get_tasks($id);
		$data['medication'] = $this->DashboardModel->get_medication($id);
        $this->template('dashboard/detail', $data);
//		$this->data['content'] = $this->load->view('dashboard/detail', $data, true);
//
//		$this->template();
	}

    public function search() {
        $index = $this->input->post('index');
        $isFirst = $this->input->post('isfirst');
        $patient_id = $this->input->post('patient_id');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $provider = $this->input->post('provider');
        $from_date = $this->input->post('from_date');
        $to_date = $this->input->post('from_date');
        $data['open_patients'] = [];
        $data['complete_patients'] = [];
        if($this->session->userdata('isFirst') == 0) {
            if($isFirst != 0) {
                $data['open_patients'] = $this->DashboardModel->get_search_data(0, $patient_id, $first_name, $last_name,
                    $provider, $from_date, $to_date, $this->session->userdata('adminId'));
                $data['complete_patients'] = $this->DashboardModel->get_search_data(1, $patient_id, $first_name, $last_name,
                    $provider, $from_date, $to_date, $this->session->userdata('adminId'));
                $this->session->set_userdata('isFirst', 1);
            }
        } else {
            $data['open_patients'] = $this->DashboardModel->get_search_data(0, $patient_id, $first_name, $last_name,
                $provider, $from_date, $to_date, $this->session->userdata('adminId'));
            $data['complete_patients'] = $this->DashboardModel->get_search_data(1, $patient_id, $first_name, $last_name,
                $provider, $from_date, $to_date, $this->session->userdata('adminId'));
        }

        if($index == 1) {
            //$this->load->view('dashboard/patient', $data);
            $this->template('dashboard/patient', $data);
        } else {
            //$this->load->view('dashboard/completePatient', $data);
            $this->template('dashboard/completePatient', $data);
        }
    }

    public function edit() {
		$id = $this->input->get('id');
		$data['user'] = $this->DashboardModel->get_user($id);
//		$this->data['content'] = $this->load->view('dashboard/edit', $data, true);
//
//		$this->template();
        $this->template('dashboard/edit', $data);
	}

    public function  delete() {
		$id = $this->input->post('id');
		$result = $this->DashboardModel->delete($id);
		echo 1;
	}

	public function update() {
    	$id = $this->input->post('id');
		$name	=	$this->input->post('name');
		$email		=	$this->input->post('email');
		$role		=	$this->input->post('role');
		$this->DashboardModel-> update($id, $name, $email, $role);
		echo 1;
	}

}

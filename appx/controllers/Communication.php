<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Communication extends REST_Controller
{
	public $IsCloud = false;
	public $RESULT_SUCCESS = 201;
	public $RESULT_FAILED = 202;
	public $RESULT_DUPLICATED = 203;
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('CommunicationModel');
	}
	public function getResultData($returnCode, $resultData) {
		$returnData = [];

		$returnData['code'] = $this->RESULT_SUCCESS;
		$returnData['data'] = [];

		if ($returnCode < 0)
			$returnData['code'] = $returnCode;
		$returnData['code'] = $returnCode;


		if (!empty($resultData))
			$returnData['data'] = $resultData;

		return $returnData;
	}

	public function tryLogin_get(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$email = $this->get('email');
			$password = $this->get('password');
			if(!empty($email) && !empty($password)) {
				$resultData = $this->CommunicationModel->try_login($email, $password);
				if(empty($resultData))
					$returnCode = $this->RESULT_FAILED;
			} else {
				$returnCode = $this->RESULT_FAILED;
			}
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}


	public function loginWithFirebase_get() {
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$firebaseId = $this->get('firebase_id');
			if(!empty($firebaseId)) {
				$resultData = $this->CommunicationModel->login_firebase($firebaseId);
				if(empty($resultData))
					$returnCode = $this->RESULT_FAILED;
			} else {
				$returnCode = $this->RESULT_FAILED;
			}
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}

	public function tryRegister_post(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$email = $this->post('email');
			$password = $this->post('password');
			$name = $this->post('name');
			$role = $this->post('role');
			$firebase_id = $this->post('firebase_id');
			if(!empty($email) && !empty($password)) {
				$resultData =  $this->CommunicationModel->check_email($email);
				if (empty($resultData)) {
					$resultData = $this->CommunicationModel->try_register($email, $password, $name, $role, $firebase_id);
				} else {
					$returnCode = $this->RESULT_DUPLICATED;
				}
			} else {
				$returnCode = $this->RESULT_FAILED;
			}
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}

	public function changePassword_put(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$id = $this->put('firebase_id');
			$password = $this->put('password');
			if(!empty($id) && !empty($password)) {
				$resultData =  $this->CommunicationModel->change_password($id, $password);
			} else {
				$returnCode = $this->RESULT_FAILED;
			}
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}

	public function changePassword_post(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$id = $this->post('firebase_id');
			$password = $this->post('password');
			if(!empty($id) && !empty($password)) {
				$resultData =  $this->CommunicationModel->change_password($id, $password);
			} else {
				$returnCode = $this->RESULT_FAILED;
			}
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}

	public function changeMainInfo_post(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$id = $this->post('firebase_id');
			$name = $this->post('name');
			$email = $this->post('email');
			if(!empty($id) && !empty($name)) {
				$resultData =  $this->CommunicationModel->update_user($id, $name, $email);

			} else {
				$returnCode = $this->RESULT_FAILED;
			}
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}
	public function changeMainInfo_put(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$id = $this->put('firebase_id');
			$name = $this->put('name');
			$email = $this->put('email');
			if(!empty($id) && !empty($name)) {
				if(!empty($id) && !empty($name)) {
					$resultData =  $this->CommunicationModel->update_user($id, $name, $email);
				} else {
					$returnCode = $this->RESULT_FAILED;
				}
			} else {
				$returnCode = $this->RESULT_FAILED;
			}
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}

	public function getEvents_get(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
				$resultData =  $this->CommunicationModel->get_events();
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}

	public function getCabins_get(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$resultData =  $this->CommunicationModel->get_cabins();
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}

	public function getServices_get(){
		$returnCode = $this->RESULT_SUCCESS;
		$resultData = [];

		try {
			$resultData =  $this->CommunicationModel->get_services();
		} catch (Exception $e) {
			$returnCode = $this->RESULT_FAILED;
		}

		$result = $this->getResultData($returnCode, $resultData);
		$this->response($result,200);

		exit();
	}
}

<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2020/3/17
 * Time: 14:54
 */

class CommunicationModel extends BaseModel
{
	public function __construct()
	{
		parent::__construct();
	}


	public function try_login($email, $password) {
		$sql = "select * from user where email = '".$email."' and password = '".$password."' and status != 1";
		$result = $this->db->query($sql);
		return $result->row();
	}
	public function login_firebase($firebaseId){
		$sql = "select * from user where firebase_id = '".$firebaseId."' and status != 1";
		$result = $this->db->query($sql);
		return $result->row();
	}

	public function try_register($email, $password, $name, $role, $firebaseId) {
		$sql = "Insert into user (email, password, name, role, firebase_id, reg_date) values ('".$email."', '"
					.$password."', '".$name."', $role, '".$firebaseId."' ,'".date("Y-m-d h:i:s")."')";
		$result = $this->db->query($sql);
	}

	public function check_email($email) {
		$sql = "select * from user where email = '".$email."' and status != 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function change_password($id, $password) {
		$sql = "update user set password = '".$password."' where firebase_id = '".$id."'";
		$result = $this->db->query($sql);
	}

	public function update_user($id, $name, $email) {
		$sql = 'update user set name = "'.$name.'", email = "'.$email.'" where firebase_id = "'.$id.'"';
		$result = $this->db->query($sql);
	}

	public function get_events() {
		$sql = "select * from event where status != 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function get_services() {
		$sql = "select * from service where status != 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}

	public function get_cabins() {
		$sql = "select * from cabin where status != 1";
		$result = $this->db->query($sql);
		return $result->result_array();
	}
}

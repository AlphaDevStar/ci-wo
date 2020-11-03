<?php

class Login extends BaseController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('LoginModel');
    }

    public function index()
    {
        // phpinfo();
        $this->load->view('login/index');
    }

    public function logout()
    {
        $sessionArray = array('id', 'name', 'email', 'password','first_name', 'last_name');

        $this->session->unset_userdata($sessionArray);
//        session_destroy();
		$this->load->view('login/index');
    }

    public function tryLogin()
    {
        $userAccount = $this->input->post('userId');
        //$userPassword = $this->encrypt_decrypt('encrypt', $this->input->post('pwd'));
        $userPassword = md5($this->input->post('pwd'));

        if ($this->isIncludeSpaceCharacter($userAccount) || $this->isIncludeSpaceCharacter($userPassword)) {
            echo json_encode('0');
        }
        else {
            $admins = $this->LoginModel->getMember($userAccount, $userPassword);

            if ($admins) {
                $sessionArray = array(
                	"id" => $admins->id,
					"name" => $admins->username,
					"email" => $admins->email,
                    "first_name" => $admins->first_name,
                    "last_name" => $admins->last_name,
					"password" => $admins->password
                );

                $this->session->set_userdata($sessionArray);

                if ($admins->role == "1") {
                    echo json_encode('1');
				} else {
                    echo json_encode('2');
				}
            }
            else
                echo json_encode('0');
        }
    }


	function encrypt_decrypt($action, $string) {
		$output = false;

		$encrypt_method = "AES-256-CBC";
		$secret_key = 'c4ca4238a0b923820dcc';
		$secret_iv = 'c4ca4238a0b923820dcc';

		// hash
		$key = hash('sha256', $secret_key);

		// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
		$iv = substr(hash('sha256', $secret_iv), 0, 16);

		if ( $action == 'encrypt' ) {
			$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
			$output = base64_encode($output);
		} else if( $action == 'decrypt' ) {
			$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
		}

		return $output;
	}
}

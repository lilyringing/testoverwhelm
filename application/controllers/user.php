<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function login(){
		$this->load->view('login', Array(
					"pageTitle" => "Login"));
	}
	
	public function logout(){
		$this->session->unset_userdata('user');
		$this->load->view('_navbar');
	}
	
	public function authenticate(){
		$wrong = 0;//init => account and password are not wrong
		$account = trim($this->input->post("userID"));
		$password = trim($this->input->post("password"));
		
		$this->load->model('user_model');
		$user = $this->user_model->getUser($account, $password);
		if($user != NULL){
			$this->session->set_userdata('user', $user);
			$this->load->view('_navbar');
		}else{
			$wrong = 1; //In view: _navbar, tell user something wrong 
			$this->load->view('_navbar', Array(
						'userID' => $account,
						"wrong" => $wrong));

		}
		
	}
	
	public function register(){
		$this->load->view('register', Array(
						"pageTitle" => "Regist a new account"));
	}
	
	public function createUser(){
////////// Load validation library ///////////////
		$this->load->library('form_validation');

		$this->form_validation->set_rules('userID', 'Username', 'trim|required|min_length[5]|max_length[12]|is_unique[user.account]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|matches[passconf]|md5');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
		
		
//////////////////////////////////////////////////
		$account = trim($this->input->post("userID"));
		$password = trim($this->input->post("password"));
		
		$this->load->model('user_model');
		$answer =  $this->user_model->checkUser($account);

		if ($this->form_validation->run() == FALSE){
			$this->load->view('register', Array(
								"pageTitle" => "Regist a new account",
								"alert" => "TROLL has been registered"));
		}
			
		else{
			/////////////////PASSWORD以 MD5 加密存進資料庫//////////////////
			$info = Array('account' => $account, 'password' => md5($password));


		
			$this->user_model->newUser($info);
			redirect(site_url("/"));	// redirect to homepage
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
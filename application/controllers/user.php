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
		redirect(site_url("/"));	// redirect to homepage
	}
	
	public function authenticate(){
		$account = trim($this->input->post("userID"));
		$password = trim($this->input->post("password"));
		
		$this->load->model('user_model');
		$user = $this->user_model->getUser($account, $password);
		
		if($user != NULL){
			$this->session->set_userdata('user', $user);
			redirect(site_url("/"));	// redirect to homepage
		}else{
			$this->load->view('login', Array(
						"pageTitle" => "Login",
						"userID" => $account));
		}
		
	}
	
	public function register(){
		$this->load->view('register', Array(
						"pageTitle" => "Regist a new account"));
	}
	
	public function createUser(){
		$account = trim($this->input->post("userID"));
		$password = trim($this->input->post("password"));
		$info = Array('account' => $account, 'password' => $password);
		
		$this->load->model('user_model');
		$this->user_model->newUser($info);
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */
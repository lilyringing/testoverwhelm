<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$this->load->view('homepage', Array(
				"pageTitle" => "Welcome to testoverwhelm" ));
	}

	public function loginerror(){
		$this->load->view('loginerror',Array(
				"pageTitle" => "Sorry" ));
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
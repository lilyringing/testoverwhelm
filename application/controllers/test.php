<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller{
	public function _construct(){
		parent::_construct();
	}
	
	public function testing(){
		$fileID = $this->uri->segment(3);
		
		$this->load->model('question_model');
		$data['question'] = $this->question_model->getQuestion($fileID);
		
		$this->load->view('_header', Array(
						'pageTitle' => "Test starts"));
		$this->load->view('_navbar');		
		$this->load->view('testsheet', $data);
		
	}
}
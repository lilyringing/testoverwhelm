<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function search_load()
	{
		$this->load->view("search_view", Array( 'pageTitle' => "Search" ));
	}
	
	public function searching(){
		$this->load->model('file_model');
		
		$subject = trim($this->input->post("subject"));
		$teacher = trim($this->input->post("teacher"));
		$year = trim($this->input->post("year"));
		$data;
		if( $subject != NULL )
		{
			$data['subject'] = trim($this->input->post("subject"));
		}
		if( $teacher != NULL )
		{
			$data['teacher'] = trim($this->input->post("teacher"));
		}
		if( $year != NULL )
		{
			$data['year'] = trim($this->input->post("year"));
		}
		
	
		$files = $this->file_model->getFile($data);
	
		if( $files != NULL )
		{
			echo "yoyo";
			$this->load->view("search_result", Array( 'files' => $files ));
		}
	}
	
}


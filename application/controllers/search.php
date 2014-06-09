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
		
		$keyword = trim($this->input->post("subject"));
		$teacher = trim($this->input->post("teacher"));
		$year = trim($this->input->post("year"));
		$data;
		if( $keyword != NULL )
		{
			$this->load->model('keyword_model');
			$subject = $this->keyword_model->getSubject($keyword);
			$data['subject'] = $subject->subject;
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
	
	public function search_all(){
		$this->load->model('file_model');
		$this->load->view('_header.php');
		$this->load->view('_navbar.php');
		$data = $this->file_model->getAllFiles();
		$this->load->view("testsheet_list", Array('pageTitle' => "List", 'info' => $data ));
	}
}


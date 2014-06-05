<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller{
	public function _construct(){
		parent::_construct();
	}
	
	public function testing(){
		$fileID = $this->uri->segment(3);
		
		$this->load->model('question_model');
		$data['quest'] = $this->question_model->getQuestion($fileID);
		$id = $this->question_model->getQuestionID($fileID);
		
		$this->load->model('answer_model');
		foreach($id as $rows){
			$qid = $rows->questionid;
			$data['answer'][$qid] = $this->answer_model->getAnswer($qid);
		}
		
		$this->load->view('_header', Array(
						'pageTitle' => "Test starts"));
		$this->load->view('_navbar');		
		$this->load->view('testsheet', $data);
		
	}
}
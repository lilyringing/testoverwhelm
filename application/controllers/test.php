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
	
	public function upload_text_ans(){
		$session_account = $this->session->userdata('user');
		$questionID = trim($this->uri->segment(3));
		$answer = trim($this->input->post("content"));
		$data = Array('questionid' => $questionID, 'answer' => $answer,
					  'userid' => $session_account->userid);
		
		$this->load->model('question_model');
		$fileID = $this->question_model->getFileID($questionID);
		
		$this->load->model('answer_model');
		$this->answer_model->upload($data);
		
		redirect(site_url("test/testing/".$fileID->fileid));
	}
	
	public function upload_picture_ans(){
		$config['upload_path'] = './upload/';
		$config['allowed_types'] = 'png|gif|jpg';
		$config['max_size']	= '1024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$confing['filename'] = 'userfile';
		
		$this->load->library('upload',$config);
		
		if (!$this->upload->do_upload()){
			$error = $this->upload->display_errors();
			//$error = array('error' => $this->upload->display_errors());
			echo $error;
			//testing($error);
			//$this->load->view('testsheet',$error);
			
		}else{
			$data = $this->upload->data();
			echo $data;
			
			//testing();
			//$this->load->view('upload_success'，$data);
		}	
	}
}
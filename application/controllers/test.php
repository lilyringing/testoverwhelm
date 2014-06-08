<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller{
	public function _construct(){
		parent::_construct();
	}

	public function testing(){
		$session_account = $this->session->userdata('user');
		$fileID = $this->uri->segment(3);

		$this->load->model('question_model');
		$data['quest'] = $this->question_model->getQuestion($fileID);
		$id = $this->question_model->getQuestionID($fileID);

		$this->load->model('answer_model');
		$this->load->model('vote_model');
		foreach($id as $rows){
			$qid = $rows->questionid;
			$data['answer'][$qid] = $this->answer_model->getAnswer($qid);
			$data['vote'][$qid] = $this->vote_model->checkVote($session_account->userid, $qid);
		}

		$this->load->model('comment_model');
		$data['comment'] = $this->comment_model->getComment($fileID);

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
			$this->load->view('_header', Array(
									'pageTitle' => "Upload error"));
			$this->load->view('_navbar');
			$this->load->view('testsheet', $error);


		}else{
			$session_account = $this->session->userdata('user');
			$picture = $this->upload->data();
			$questionID = trim($this->uri->segment(3));
			$data = Array('questionid' => $questionID, 'answer' => $picture["full_path"],
								  'userid' => $session_account->userid);

			$this->load->model('answer_model');
			$this->answer_model->upload($data);

			$this->load->model('question_model');
			$fileID = $this->question_model->getFileID($questionID);

			redirect(site_url("test/testing/".$fileID->fileid));
		}
	}

	public function upload_comment(){
		$session_account = $this->session->userdata('user');
		$fileID = trim($this->uri->segment(3));
		$comment = trim($this->input->post("comment"));
		$data = Array('fileid' => $fileID, 'comment' => $comment,
							  'userid' => $session_account->userid);

		$this->load->model('comment_model');
		$this->comment_model->givecomment($data);

		redirect(site_url("test/testing/".$fileID));
	}

	public function add_good_bad($questionID, $gb){
		$session_account = $this->session->userdata('user');

		$this->load->model('vote_model');
		$vote = $this->vote_model->checkVote($session_account->userid, $questionID);

		if($vote == null){	// add a new vote
			$data = Array('userid' => $session_account->userid,
						  'questionid' => $questionID,
						  'gb' => $gb);
			$this->vote_model->vote();
		}else{
			if($vote->gb == $gb){	// cancel the vote
				$this->vote_model->deleteVote($session_account->userid, $questionID);
			}else{
				$data = Array('gb' => $gb);	// change the vote
				$this->vote_model->changeVote($session_account->userid, $questionID, $data);
			}
		}
	}
}
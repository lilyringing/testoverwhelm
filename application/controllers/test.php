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
		if($id[0] != null){
			foreach($id as $rows){
				$qid = $rows->questionid;
				$data['answer'][$qid] = $this->answer_model->getAnswer($qid);

				if($session_account){
					$data['vote'][$qid] = $this->vote_model->checkVote($session_account->userid, $qid);
				}
			}
		}

		$this->load->model('comment_model');
		$data['comment'] = $this->comment_model->getComment($fileID);

		$this->load->model('file_model');
		$data['info'] = $this->file_model->getFileInfo($fileID);


		if($data['info'] === -1)
		{
			redirect(site_url());
		}

		$this->load->view('_header', Array(
						'pageTitle' => "Test starts"));
		$this->load->view('_navbar', Array(
						'fileID' => $fileID));
		$this->load->view('testsheet', $data);
	}

	public function upload_page(){
		$this->load->view('_header', Array(
								'pageTitle' => "Upload question"));
		$this->load->view('_navbar');
		$this->load->view('upload_question');
	}

	public function upload_question(){
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
			require_once './tesseract-ocr-for-php/TesseractOCR/TesseractOCR.php';
			$picture = $this->upload->data();
			$tesseract = new TesseractOCR($picture['full_path']);
			$text = $tesseract->recognize();
			//echo $text;
			//this line is used to delete the upload picture
			//haven't test if there's some problem delete it.
			delete_files($picture['full_path']);
			$this->load->view('ocr_text', array('text' => $text));
		}
	}

	public function upload_file()

	{
		if(!($this->session->userdata('user'))){
			redirect(site_url('/welcome/loginerror'));
		}

		$this->load->view('_header', Array(
				'pageTitle' => "Upload file"));
		$this->load->view('_navbar');
		$size = $this->uri->segment(3, 1);
		$this->load->view('upload_file', array('size'=>$size));
	}

	public function upload_test()
	{
		if(!($this->session->userdata('user'))){
			redirect(site_url('/welcome/loginerror'));
		}

		////////// Load validation library ///////////////
		$this->load->library('form_validation');

		$this->form_validation->set_rules('subject', 'Subject', 'required|xss_clean');
		$this->form_validation->set_rules('professor', 'Professor', 'required|xss_clean');
		$this->form_validation->set_rules('year', 'Year', 'required|xss_clean');
		$this->form_validation->set_rules('semester', 'Semester', 'required|xss_clean');
		$this->form_validation->set_rules('times', 'Times', 'required|xss_clean');


		//////////////////////////////////////////////////

		if ($this->form_validation->run() == FALSE){
			$this->load->view('_header', Array(
				'pageTitle' => "Upload file"));
			$this->load->view('_navbar');
			$this->load->view('upload_file',array('error'=>validation_errors()));
			$this->load->view('_footer');
		}

		else{
			$subject = trim($this->input->post("subject"));
			$professor = trim($this->input->post("professor"));
			$year = trim($this->input->post("year"));
			$semester = trim($this->input->post("semester"));
			$times = trim($this->input->post("times"));

			$timeid = 100 * $year + 10 * $semester + $times;
			$session_account = $this->session->userdata('user');
			//upload file
			$this->load->model('file_model');
			$fileid = $this->file_model->uploadFile(array( 'timeid' => $timeid, 'subject' => $subject, 'professor' => $professor, 'userid' => $session_account->userid));

			//upload question
			$i=0;
			$this->load->model('question_model');
			while(true)

			{
				$number = trim($this->input->post("number".$i));
				if($number == NULL)
				{
					break;
				}

				//input number and question into database
				$question = trim($this->input->post("question".$i));
				$reg = '/[\n\r]+/';//regular expression for 換行
				$question = html_escape($question);//防止html tag, script
				$question = preg_replace($reg, '<br>', $question);//換行
				$this->question_model->uploadQuestion(array( 'fileid' => $fileid, 'question' => $question, 'number' => $number ));
				$i++;
			}
			redirect(site_url("test/testing/".$fileid));
		}

	}

	public function upload_text_ans(){
		$session_account = $this->session->userdata('user');
		$questionID = trim($this->uri->segment(3));

		$answer1 = trim($this->input->post("content"));

		$answer = html_escape($answer1);//防止html tag, script
		if($answer1 != $answer)
		{
			redirect('http://www.google.com');
		}
		$reg = '/[\n\r]+/';//regular expression for 換行
		$answer = preg_replace($reg, '<br>', $answer);//換行

		$data = Array('questionid' => $questionID, 'answer' => $answer,
					  'userid' => $session_account->userid);

		$this->load->model('question_model');
		$fileID = $this->question_model->getFileID($questionID);

		$this->load->model('answer_model');
		$answerid = $this->answer_model->upload($data);

		$this->load->model('list_model');
		$this->list_model->upload(array('answerid' => $answerid, 'fileid' => $fileID->fileid, 'account' => $session_account->account));

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
		$comment = html_escape($comment);
		$data = Array('fileid' => $fileID, 'comment' => $comment,
							  'userid' => $session_account->userid);

		$this->load->model('comment_model');
		$this->comment_model->givecomment($data);

		redirect(site_url("test/testing/".$fileID));
	}

	public function edit_test(){
		$session_account = $this->session->userdata('user');
		if($session_account){
			$fileID = trim($this->uri->segment(3));
			$this->load->model('question_model');
			$question_number = $this->question_model->getQuestionNumber($fileID);

			// get question array
			$question_arr = $_POST['questionArray'];
			$question_id = $_POST['questionid'];

			if($question_number == sizeof($question_id)){
				for($i = 0; $i < $question_number; $i++){
					$this->question_model->editQuestion($fileID,
									$question_id[$i], $i, $question_arr[$i]);
				}
			}else{
				// do nothing
			}

		}

		$data['quest'] = $this->question_model->getQuestion($fileID);

	}

	public function add_good_bad(){
		$answerID = trim($this->input->post("answerID"));
		$gb = trim($this->input->post("gb"));
		$session_account = $this->session->userdata('user');

		$this->load->model('vote_model');
		$this->load->model('answer_model');
		$vote = $this->vote_model->checkVote($session_account->userid, $answerID);
		if($gb!=0 && $gb!=1)
		{
			echo "3";
		}
		else if($vote == null){	// add a new vote
			$data = Array('userid' => $session_account->userid,
						  'answerid' => $answerID,
						  'gb' => $gb);
			$this->vote_model->vote($data);
			$this->answer_model->add_gb($answerID, $gb);
			echo "0";
		}else{
			if($vote->gb == $gb){	// cancel the vote
				$this->vote_model->deleteVote($session_account->userid, $answerID);
				$this->answer_model->delete_gb($answerID, $gb);
				echo "1";
			}else{
				$data = Array('gb' => $gb);	// change the vote
				$this->vote_model->changeVote($session_account->userid, $answerID, $data);
				$this->answer_model->change_gb($answerID, $gb);
				echo "2";
			}
		}
	}
}
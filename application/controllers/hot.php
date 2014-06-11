<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Hot extends CI_Controller{
	public function _construct(){
		parent::_construct();
	}
	
	public function hot_list()
	{
		$this->load->model('file_model');
		$this->load->model('list_model');
		$this->list_model->checkTime("newanswer");
		if( $answer = $this->list_model->getNewAnswer())
		{
			$data['answer'] = $answer;
			$answerSize = count($answer);
			for( $i=0; $i < $answerSize; $i++ )
			{
				$data['subject']['answer'][$i] = $this->file_model->getFileInfo($answer[$i]->fileid);
			} 
		}
		
		
		
		$this->load->view('hot_list_view', $data);
	}
}
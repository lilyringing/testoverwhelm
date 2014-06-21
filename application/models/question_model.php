<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Question_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}

	public function getQuestion($fileID){
		$this->db->select('questionid, question, number');
		$this->db->order_by('number', 'asc');
		$query = $this->db->get_where('question', Array(
								'fileid' => $fileID));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return null;
		}
	}

	public function getQuestionNumber($fileID){
		$this->db->select('questionid');
		$query = $this->db->get_where('question', Array(
								'fileid' => $fileID));
		return $query->num_rows();
	}

	public function getQuestionID($fileID){
		$this->db->select('questionid');
		$query = $this->db->get_where('question', Array(
									'fileid' => $fileID));

		if($query->num_rows > 0){
			return $query->result();
		}else{
			return null;
		}
	}

	public function getFileID($questionID){
		$this->db->select('fileid');
		$query = $this->db->get_where('question', Array('questionid' => $questionID));

		if($query->num_rows() >0){
			return $query->row();
		}else{
			return null;
		}
	}

	public function uploadQuestion($data)
	{
		$this->db->insert("question", $data);
		return $this->db->insert_id();
	}

	public function editQuestion($fileID, $questionID, $number, $question){
		$this->db->where('fileid', $fileID);
		$this->db->where('questionid', $questionID);
		//$this->db->where('number', $number);
		$this->db->update('question', Array('question' => $question));
	}
}
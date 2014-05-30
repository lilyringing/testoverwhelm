<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Question_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	public function getQuestion($fileID){
		$this->db->select('question, number');
		$this->db->order_by('number', 'asc');
		$query = $this->db->get_where('question', Array(
								'fileid' => $fileID));
		if($query->num_rows > 0){
			return $query->result();
		}else{
			return null;
		}
	}
}
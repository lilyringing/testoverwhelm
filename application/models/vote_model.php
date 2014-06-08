<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vote_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	public function checkVote($userID, $answerID){
		$this->db->select('gb');
		$query = $this->db->get_where('vote', Array('userid' => $userID,
								'answerid' => $answerID));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return null;
		}
	}
	
	public function vote($data){
		$this->db->insert('vote', $data);
	}
	
	public function deleteVote($userID, $answerID){
		$this->db->delete('vote', Array('userid' => $userid, 'answerid' => $answerID));
	}
	
	public function changeVote($userID, $answerID){
		$this->db->where('userid', $userID);
		$this->db->where('answerid', $answerID);
		$this->db->update('vote', $data);
	}
}
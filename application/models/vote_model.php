<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vote_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}

	public function checkVote($userID, $questionID){
		$this->db->select('gb');
		$query = $this->db->get_where('vote', Array('userid' => $userID,
								'questionid' => $questionID));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return null;
		}
	}

	public function vote($data){
		$this->db->insert('vote', $data);
	}

	public function deleteVote($userID, $questionID){
		$this->db->delete('vote', Array('userid' => $userid, 'questionid' => $questionID));
	}

	public function changeVote($userID, $questionID){
		$this->db->where('userid', $userID);
		$this->db->where('questionid', $questionID);
		$this->db->update('vote', $data);
	}
}
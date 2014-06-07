<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Answer_model extends CI_Model{
	function _construct(){
		parent:: _construct();
	}
	
	public function getAnswer($questionID){
		$this->db->select('answer, good, bad, userid');
		$query = $this->db->get_where('answer', Array(
							'questionid' => $questionID));
		
		if($query->num_rows >0){
			return $query->result();
		}else{
			return null;
		}
		
	}
	
	public function upload($questionID, $answer){
		$this->db->insert('answer', $data);
	}
}
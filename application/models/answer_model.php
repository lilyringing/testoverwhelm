<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Answer_model extends CI_Model{
	function _construct(){
		parent:: _construct();
	}
	
	public function getAnswer($questionID){
		$this->db->select('*');
		$this->db->from('answer');
		$this->db->where('questionid', $questionID);
		$this->db->join('user', 'user.userid = answer.userid');
		$query = $this->db->get();
		
		if($query->num_rows() >0){
			return $query->result();
		}else{
			return null;
		}
		
	}
	
	public function upload($data){
		$this->db->insert('answer', $data);
	}
	
}
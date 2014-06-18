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
		return $this->db->insert_id();
	}
	
	public function add_gb($answerID, $gb){
		if($gb == '1'){ // good
			$this->db->select('good');
			$query = $this->db->get_where('answer', Array('answerid' => $answerID));
			$good = ($query->row()->good) + 1;
			
			$this->db->where('answerid', $answerID);
			$this->db->update('answer', Array('good' => $good));
		}else{
			$this->db->select('bad');
			$query = $this->db->get_where('answer', Array('answerid' => $answerID));
			$bad = ($query->row()->bad) + 1;
			
			$this->db->where('answerid', $answerID);
			$this->db->update('answer', Array('bad' => $bad));
		}
	}
	
	public function delete_gb($answerID, $gb){
		if($gb == '1'){	// good
			$this->db->select('good');
			$query = $this->db->get_where('answer', Array('answerid' => $answerID));
			$good = ($query->row()->good) - 1;
			
			$this->db->where('answerid', $answerID);
			$this->db->update('answer', Array('good' => $good));
		}else{
			$this->db->select('bad');
			$query = $this->db->get_where('answer', Array('answerid' => $answerID));
			$bad = ($query->row()->bad) - 1;
			
			$this->db->where('answerid', $answerID);
			$this->db->update('answer', Array('bad' => $bad));
		}
	}
	
	public function change_gb($answerID, $gb){
		if($gb == '1'){
			// good
			$this->db->select('good, bad');
			$query = $this->db->get_where('answer', Array('answerid' => $answerID));
			$good = ($query->row()->good) + 1;
			$bad = ($query->row()->bad) - 1;
			
			$this->db->where('answerid', $answerID);
			$this->db->update('answer', Array('good' => $good, 'bad' => $bad));
		}else{
			$this->db->select('good, bad');
			$query = $this->db->get_where('answer', Array('answerid' => $answerID));
			$good = ($query->row()->good) - 1;
			$bad = ($query->row()->bad) + 1;
			
			$this->db->where('answerid', $answerID);
			$this->db->update('answer', Array('good' => $good, 'bad' => $bad));
		}
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Keyword_model extends CI_Model{
	function _construct(){
		parent:: _construct();
	}
	
	public function getSubject($keyword){
		$this->db->select('subject');
		$thid->db->from('keyword');
		$this->db->like('keyword.subject_nickname', $keyword);
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return null;
		}
	}
}
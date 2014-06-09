<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Keyword_model extends CI_Model{
	function _construct(){
		parent:: _construct();
	}
	
	public function getSubject($keyword){
		$this->db->select('subject');
		$query = $this->db->get_where('keyword', Array('subject_nickname' => $keyword));
		
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return null;
		}
	}
}
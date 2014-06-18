<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class List_model extends CI_Model{
	function _construct(){
		parent:: _construct();
	}
	
	public function upload($data)
	{
		$this->db->insert('newanswer',$data);
	}
	
	public function getNewAnswer()
	{
		$this->db->select("*");
		$this->db->from("newanswer");
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return NULL;
		}
	} 
	
	public function checkTime($database)
	{
		$where = "DATE_SUB(NOW(), INTERVAL 7 DAY) > ".$database.".updatetime";
		$this->db->where($where);
		$this->db->delete($database);
	}
}
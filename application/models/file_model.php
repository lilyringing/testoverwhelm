<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class File_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	
	//one should input an data array with subject, teacher, or year
	//the function would return the result it gets
	public function getFile( $data )
	{
		$this->db->select("*");
		$this->db->from("file");
		if( isset($data["subject"]) )
		{
			$this->db->like('file.subject', $data["subject"]);
			echo "hi1";
		}
		if( isset($data["teacher"]) )
		{
			$this->db->like('file.professor', $data["teacher"]);
			echo "hi2";
		}
		if( isset($data["year"]) )
		{
			$timeid = $data["year"] * 100;
			$this->db->where('file.timeid >', $timeid);
			$this->db->where('file.timeid <', ($timeid+100));
		}
		
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return -1;
		}
	}
	
	public function getAllFiles(){
		$this->db->select('timeid, subject, professor');
		$this->db->from('file');
		$this->db->order_by('subject', 'asc');
		$this->db->order_by('timeid', 'asc');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return null;
		}
	}
	
}
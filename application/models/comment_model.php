<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Comment_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
	}
	
	public function getComment($fileID){
		$this->db->select('*');
		$this->db->from('comment');
		$this->db->where('fileid', $fileID);
		$this->db->order_by('commentid', 'asc');
		$this->db->join('user','user.userid = comment.userid');
		$query = $this->db->get();
		
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return null;
		}
		
	}
	
	public function giveComment($data){
		$this->db->insert('comment', $data);
	}
}
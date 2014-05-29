
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getUser($account,$password){
		$this->db->select("account");
		$query = $this->db->get_where("user", Array(
				"account" => $account,
				"password" => $password ));
		
		/* If there are tuples */
		if ($query->num_rows() > 0){
			return $query->row();	// return first tuple  
		}
		else{
			return null;
		}
	}
	
	public function newUser($info){
		$this->db->insert('user', $info);
	}
	
	public function checkUser($account){
		$this->db->select("account");
		$query = $this->db->get_where("user", Array(
								"account" => $account));
		if ($query->num_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
}
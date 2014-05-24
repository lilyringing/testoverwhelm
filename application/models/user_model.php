
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_model extends CI_Model {

	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function getUser($account,$password){
		$this->db->select("Account");
		$query = $this->db->get_where("zookeeper", Array(
				"Account" => $account,
				"Password" => $password ));
		/* If there are tuples */
		if ($query->num_rows() > 0){
			return $query->row();	// return first tuple  
		}
		else{
			return null;
		}
	}
}
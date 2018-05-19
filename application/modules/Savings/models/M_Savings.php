<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Savings extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_savings()
		{
		    $this->db->where('account_transaction.deleted',0);
		    $this->db->join('users','users.user_id = account_transaction.user_id');
		    $this->db->join('clients','users.user_id = clients.user_id');
			$query = $this->db->get('account_transaction');
			return $query->result_array();
		}

	
 
}


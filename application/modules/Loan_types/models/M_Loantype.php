<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Loantype extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_loantype()
		{
		    $this->db->where('deleted',0);
		    $this->db->order_by('loan_type_id','DESC');
			$query = $this->db->get('loan_types');
			return $query->result_array();
		}
	
 
}


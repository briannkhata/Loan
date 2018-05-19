<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Branch extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_branch()
		{
		    $this->db->where('deleted',0);
			$query = $this->db->get('branch');
			return $query->result_array();
		}
	
 
}


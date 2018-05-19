<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Company extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}

		 function get_company()
		{
			$query = $this->db->get('company');
			return $query->result_array();
		}
	
 
}


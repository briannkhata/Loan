<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Email_setting extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}

		 function get_email_setting()
		{
			$query = $this->db->get('email_settings');
			return $query->result_array();
		}
	
 
}


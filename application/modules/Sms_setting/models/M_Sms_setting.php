<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Sms_setting extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_sms_setting()
		{
			$query = $this->db->get('sms_settings');
			return $query->result_array();
		}
 
}


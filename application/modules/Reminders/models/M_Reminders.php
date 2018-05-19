<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Reminders extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_reminders()
		{
		    $this->db->where('deleted',0);
		    $this->db->order_by('reminder_id','DESC');
			$query = $this->db->get('reminders');
			return $query->result_array();
		}
	
 
}


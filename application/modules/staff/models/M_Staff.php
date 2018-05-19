<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Staff extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_staffs()
		{//
			$this->db->where('users.deleted',0);
			$this->db->where('users.user_id !=',$this->session->userdata('user_id'));
		    $this->db->order_by('staff_id','DESC');
		    $this->db->join('staff','users.user_id = staff.user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}


	    function get_staff($update_id)
		{//
			$this->db->where('users.deleted',0);
			$this->db->where('users.user_id',$update_id);
		    $this->db->order_by('staff_id','DESC');
		    $this->db->join('staff','users.user_id = staff.user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}
	
 
}


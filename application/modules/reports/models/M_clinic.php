<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_clinic extends CI_Model {

		function __construct()
		{
			parent::__construct();
		}

	   function get_active_clinics()
		{
		   $this->db->where('deleted',0);
		   $query = $this->db->get('clinic');
		   return $query->result();
		}
		
}

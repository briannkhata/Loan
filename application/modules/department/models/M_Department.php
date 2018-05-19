<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Department extends CI_Model {
		function __construct()
		{
			parent::__construct();
		}

		function get_departments()
		{
			$this->db->where('deleted',0);
			return $this->db->get('department');
		}
	
		
	}

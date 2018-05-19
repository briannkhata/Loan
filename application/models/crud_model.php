<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Crud_model extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
		function clear_cache()
		{
			$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
			$this->output->set_header('Pragma: no-cache');
		}
		function send_message($data)
		{
			$this->db->insert('messages',$data);
			return $this->db->insert_id();
		}
		function volunteer($data)
		{
			$this->db->insert('volunteer',$data);
			return $this->db->insert_id();
		}
        function donate($data)
		{
			$this->db->insert('donations',$data);
			return $this->db->insert_id();
		}
 
}


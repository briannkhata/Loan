<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Client extends CI_Model {
		function __construct()
		{
			parent::__construct();
		}

		function get_clients()
		{
			return $this->db->order_by('client_id','DESC')
					->where('users.deleted',0)
			        ->join('users','users.user_id = clients.user_id')
			       ->get('clients')->result_array();
		}

		 function get_client($update_id)
		{//
			$this->db->where('users.deleted',0);
			$this->db->where('users.user_id',$update_id);
		    $this->db->order_by('client_id','DESC');
		    $this->db->join('clients','users.user_id = clients.user_id');
			$query = $this->db->get('users');
			return $query->result_array();
		}

		function get_clientt($update_id)
		{//
			//$this->db->where('users.deleted',0);
			$this->db->where('cfinance_id',$update_id);
			$query = $this->db->get('client_finance');
			return $query->result_array();
		}
	
	}

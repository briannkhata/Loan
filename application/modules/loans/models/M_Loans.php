<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_Loans extends CI_Model {

		function __construct()
		{
			parent::__construct();
		}

	   function get_loans(){
		   $this->db->where('loans.deleted',0);
		   $this->db->join('users','users.user_id = loans.user_id');
		   $this->db->join('clients','clients.user_id = users.user_id');
		   $query = $this->db->get('loans');
		   return $query->result_array();
		}
		 function get_overdueloans(){
		   $this->db->where('loans.deleted',0);
		   $this->db->where('loans.payment_date <=',strtotime(date('Y-m-d')));
		   $this->db->where('loans.cash_in <=',0);
		   $this->db->where('loans.status',2);
		   $this->db->join('users','users.user_id = loans.user_id');
		   $this->db->join('clients','clients.user_id = users.user_id');
		   return $query = $this->db->get('loans');
		   //return $query->result_array();
		}

		 function get_total_overdueloans(){
		   $this->db->select_sum('balance');
		   $this->db->from('loans');
		   $this->db->where('deleted',0);
		   $this->db->where('payment_date <',strtotime(date('Y-m-d')));
		   $this->db->where('cash_in < balance');
		   $this->db->where('status',2);
		   return $query = $this->db->get();
		}

		 function get_total_loans(){
		   $this->db->select_sum('balance');
		   $this->db->from('loans');
		   $this->db->where('deleted',0);
		   $this->db->where('status',2);
		   return $query = $this->db->get();
		}
		 function get_client_loans($user_id){
		   $this->db->where('loans.deleted',0);
		   $this->db->where('loans.user_id',$user_id);
		   $this->db->join('users','users.user_id = loans.user_id');
		   $this->db->join('clients','clients.user_id = users.user_id');
		   $query = $this->db->get('loans');
		   return $query->result_array();
		}
		
}

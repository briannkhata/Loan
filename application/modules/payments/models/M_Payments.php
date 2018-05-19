<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Payments extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_payments()
		{
			$this->db->where('payments.deleted',0);
		    $this->db->order_by('payment_id','DESC');
		    $this->db->join('loans','loans.loan_id = payments.loan_id');		   
		    $this->db->join('users','users.user_id = loans.user_id');
		    $this->db->join('clients','clients.user_id = users.user_id');
			$query = $this->db->get('payments');
			return $query->result_array();
		}
		
		 function get_m_payments(){
			$today = strtotime(date('Y-M-d'));
			$this->db->select_sum('balance');
			$this->db->from('loans');
			$this->db->where('deleted',0);
			$this->db->where('status',2);
			$this->db->where('balance < total_amount');
			$this->db->where('payment_date <=',$today);
			return $query = $this->db->get();
		}

		 function get_total_payments(){
			$today = strtotime(date('Y-m-d'));
			$this->db->select_sum('payment_amount');
			$this->db->from('payments');
			$this->db->where('payments.deleted',0);
			$this->db->where('payment_date',$today);
			return $query = $this->db->get();
		}
	
 
}


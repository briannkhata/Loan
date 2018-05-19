<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Wallet extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_wallet(){
		    $this->db->where('wallet.deleted',0);
		    $this->db->where('wallet_transaction.deleted',0);
		    $this->db->join('users','wallet.user_id = users.user_id');
		    $this->db->join('wallet_transaction','wallet.wallet_id = wallet_transaction.wallet_id');
			$query = $this->db->get('wallet');
			return $query->result_array();
		}

		 function get_deleted(){
		    $this->db->where('wallet.deleted',0);
		    $this->db->where('wallet_transaction.deleted',1);
		    $this->db->join('users','wallet.user_id = users.user_id');
		    $this->db->join('wallet_transaction','wallet.wallet_id = wallet_transaction.wallet_id');
			$query = $this->db->get('wallet');
			return $query->result_array();
		}

		 function get_total_transfers(){
		 	$user_id = $this->session->userdata('user_id');
		 	$wallet =   $this->db->query("SELECT * FROM wallet WHERE user_id='$user_id' AND deleted='0'");
			$row = $wallet->row();
				if (isset($row))
				{	
				    $wallet_id   =	$row->wallet_id;
				
				   $this->db->select_sum('tr_amount');
				   $this->db->from('wallet_transaction');
				   $this->db->where('tr_type',3);
				   $this->db->where('wallet_transaction.deleted',0);
				   $this->db->where('tr_date ',strtotime(date('Y-m-d')));
				   $this->db->where('wallet_id',$wallet_id);
				   return $query = $this->db->get();
				 
				  }
		}

		function get_total_credits(){
			$user_id = $this->session->userdata('user_id');
		 	$wallet =   $this->db->query("SELECT * FROM wallet WHERE user_id='$user_id' AND deleted='0'");
			$row = $wallet->row();
				if (isset($row))
				{	
				    $wallet_id   =	$row->wallet_id;
				
				   $this->db->select_sum('tr_amount');
				   $this->db->from('wallet_transaction');
				   $this->db->where('tr_type',1);
				   $this->db->where('wallet_transaction.deleted',0);
				   $this->db->where('tr_date ',strtotime(date('Y-m-d')));
				   $this->db->where('wallet_id',$wallet_id);
				   return $query = $this->db->get();
				}
		}

		function get_total_debts(){
			$user_id = $this->session->userdata('user_id');
		 	$wallet =   $this->db->query("SELECT * FROM wallet WHERE user_id='$user_id' AND deleted='0'");
			$row = $wallet->row();
				if (isset($row))
				{	
				   $wallet_id   =	$row->wallet_id;
				   $this->db->select_sum('tr_amount');
				   $this->db->from('wallet_transaction');
				   $this->db->where('tr_type',2);
				   $this->db->where('wallet_transaction.deleted',0);
				   $this->db->where('tr_date ',strtotime(date('Y-m-d')));
				   $this->db->where('wallet_id',$wallet_id);
				   return $query = $this->db->get();
				}

		}
	
 
}


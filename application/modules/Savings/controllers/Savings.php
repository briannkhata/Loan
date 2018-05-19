<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Savings extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

	    function index()
		{
		    $data['page_title']  = 'Savings Transactions';
			$data['module_id']   = 'savings';
			$data['user_id']  = $this->session->userdata('user_id');
            $data['savings']      = $this->M_Savings->get_savings();
		    $data['content']     = 'Savings/savings';
			echo Modules::run('template/admin_v',$data);
		}

		 function transact()
		{
		    $data['page_title']  = 'New Savings Transaction';
			$data['module_id']   = 'savings';
			$data['user_id']  = $this->session->userdata('user_id');
            $data['savings']      = $this->M_Savings->get_savings();
		    $data['content']     = 'Savings/transact';
			echo Modules::run('template/admin_v',$data);
		}

		function submit(){
			$tr_type = $this->input->post('tr_type', TRUE);
			$user_id = $this->input->post('user_id', TRUE);
			$tr_amount = $this->input->post('tr_amount', TRUE);
			$data['teller']  = $this->session->userdata('user_id');

			$account_balance = $this->db->get_where('clients',array('user_id' =>$user_id))->row()->account_balance;
			$client_id = $this->db->get_where('clients',array('user_id' =>$user_id))->row()->client_id;

			if($tr_type == 1){
				$new_amount = $account_balance + $tr_amount;
				$doo['account_balance'] = $new_amount;

				$data['tr_type'] = $tr_type;
				$data['user_id'] = $user_id;
				$data['tr_id'] = 'TxID - '.rand();
				$data['tr_amount'] = $tr_amount;
				$data['tr_date'] =date('Y-m-d H:i:s');
				$this->db->insert('account_transaction',$data);
				$this->db->where('client_id',$client_id);
				$this->db->update('clients',$doo);

			}

			if($tr_type == 2){
				$new_amount = $account_balance - $tr_amount;
				$doo['account_balance'] = $new_amount;
				
				$data['tr_type'] = $tr_type;
				$data['user_id'] = $user_id;
				$data['tr_id'] = 'TxID - '.rand();
				$data['tr_amount'] = $tr_amount;
				$data['tr_date'] =date('Y-m-d H:i:s');
				$this->db->insert('account_transaction',$data);
				$this->db->where('client_id',$client_id);
				$this->db->update('clients',$doo);

			}

			/*if($tr_type == 3){//transfer
				$to = $this->input->post('user_id', TRUE);
			    $to_wallet_id = $this->db->get_where('wallet',array('user_id' =>$to))->row()->wallet_id;
			    $to_total_amount = $this->db->get_where('wallet',array('user_id' =>$to))->row()->total_amount;//new account

				$new_amount = $total_amount - $tr_amount;
				$doo['total_amount'] = $new_amount;

				$neww_amount = $to_total_amount + $tr_amount;
				$dooo['total_amount'] = $neww_amount;
				
				$data['tr_type'] = $tr_type;
				$data['tr_amount'] = $tr_amount;
				$data['wallet_id'] = $wallet_id;
				$data['tr_desc'] = $tr_desc;
				$data['tr_date'] =date('Y-m-d H:i:s');
				$this->db->insert('wallet_transaction',$data);

				$this->db->where('wallet_id',$wallet_id);
				$this->db->update('wallet',$doo);

				$this->db->where('wallet_id',$to_wallet_id);
				$this->db->update('wallet',$dooo);

			}*/
			redirect('Savings');
		}

		function delete(){
			$account_transaction_id = $this->input->post('account_transaction_id');
			foreach($account_transaction_id as $value)
			{
				$data['deleted'] = 1;
				$this->db->where('account_transaction_id',$value);
           		$this->db->update('acount_transaction',$data);
        	}
           redirect('Savings');
		}

		function view($param='',$param1=''){		
			$data['module_id']   = 'savings';
		    $data['page_title']  = 'Account Transaction Details |';
		    $data['account_transaction_id']  = $param;
		    $data['content']     = 'Savings/savings_info';
			echo Modules::run('template/admin_v',$data);
		}
		
		
		
	
}

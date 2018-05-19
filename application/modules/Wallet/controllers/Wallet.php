<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Wallet extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

	    function index()
		{
		    $data['page_title']  = 'My Wallet';
			$data['module_id']   = 'wallet';
			$user_id   = $this->session->userdata('user_id');
			$data['total_amount']   = $this->db->get_where('wallet',array('user_id' =>$user_id))->row()->total_amount;
		    $data['user_id']   = $user_id;
            $data['wallet']      = $this->M_Wallet->get_wallet();
		    $data['content']     = 'Wallet/wallet';
			echo Modules::run('template/admin_v',$data);
		}

		 function deleted()
		{
		    $data['page_title']  = 'My Wallet';
			$data['module_id']   = 'wallet';
			$data['page_name']   = 'deleted';
			$user_id   = $this->session->userdata('user_id');
			$data['total_amount']   = $this->db->get_where('wallet',array('user_id' =>$user_id))->row()->total_amount;
		    $data['user_id']   = $user_id;
            $data['wallet']      = $this->M_Wallet->get_deleted();
		    $data['content']     = 'Wallet/deleted_wallet';
			echo Modules::run('template/admin_v',$data);
		}

		 function transact()
		{
		    $data['page_title']  = 'Wallet Transaction';
			$data['module_id']   = 'wallet';
			$user_id   = $this->session->userdata('user_id');
			$data['total_amount']   = $this->db->get_where('wallet',array('user_id' =>$user_id))->row()->total_amount;
		    $data['user_id']   = $user_id;
		    $data['content']     = 'Wallet/transact';
			echo Modules::run('template/admin_v',$data);
		}

		function submit(){
			$tr_type = $this->input->post('tr_type', TRUE);
			$tr_amount = $this->input->post('tr_amount', TRUE);


			$user_id = $this->session->userdata('user_id');
			$total_amount = $this->db->get_where('wallet',array('user_id' =>$user_id))->row()->total_amount;
			$wallet_id = $this->db->get_where('wallet',array('user_id' =>$user_id))->row()->wallet_id;
			$data['tr_date'] =strtotime(date('Y-m-d'));
			$data['tr_desc'] = $this->input->post('tr_desc', TRUE);

			if($tr_type == 1){
				$new_amount = $total_amount + $tr_amount;
				$doo['total_amount'] = $new_amount;

				$data['tr_type'] = $tr_type;
				$data['tr_amount'] = $tr_amount;
				$data['wallet_id'] = $wallet_id;
				$this->db->insert('wallet_transaction',$data);
				$this->db->where('wallet_id',$wallet_id);
				$this->db->update('wallet',$doo);

			}

			if($tr_type == 2){
				$new_amount = $total_amount - $tr_amount;
			    $doo['total_amount'] = $new_amount;

				$data['tr_type'] = $tr_type;
				$data['tr_amount'] = $tr_amount;
				$data['wallet_id'] = $wallet_id;
				$this->db->insert('wallet_transaction',$data);
				$this->db->where('wallet_id',$wallet_id);
				$this->db->update('wallet',$doo);

			}

			if($tr_type == 3){//transfer
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
				$this->db->insert('wallet_transaction',$data);

				$this->db->where('wallet_id',$wallet_id);
				$this->db->update('wallet',$doo);

				$this->db->where('wallet_id',$to_wallet_id);
				$this->db->update('wallet',$dooo);

			}
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Transaction done successfully
                                           						 </span></div>');
			redirect('Wallet/transact');
		}

		function delete(){
			$wallet_transaction_id = $this->input->post('wallet_transaction_id',TRUE);

			$data['deleted'] = 1;
			$data['deleted_by'] = $this->session->userdata('user_id');
			$data['delete_date'] = date('Y-m-d H:i:s');
			foreach($wallet_transaction_id as $value)
			{
				$this->db->where('wallet_transaction_id',$value);
           		$this->db->update('wallet_transaction',$data);
        	}
        	redirect('Wallet');


		}
		
		
		
	
}

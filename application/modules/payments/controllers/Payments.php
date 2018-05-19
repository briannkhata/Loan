<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payments extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

	    function index(){
		    $data['page_title']  = 'List of Payments';
		    $data['module_id']   = 'payments';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['payments']    = $this->M_Payments->get_payments();
		    $data['content']     = 'Payments/payments';
			echo Modules::run('template/admin_v',$data);

		}

		function create(){		
			$data['module_id']   = 'payments';
		    $data['page_title']  = 'New Payment';
		    $data['content']     = 'Payments/new_payment';
			echo Modules::run('template/admin_v',$data);
		}

		function missed_payments(){
			
		 	$data['page_title']  = 'Missed Payments';
		    $data['module_id']   = 'payments';
		    $data['page_name']   = 'missed_payments';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['mpayments']    = $this->M_Payments->get_m_payments();
		    $data['content']     = 'Payments/missed_payments';
			echo Modules::run('template/admin_v',$data);

		}

			function delete(){
			$payment_id = $this->input->post('payment_id');
			$data['deleted'] = 1;
			foreach($payment_id as $value)
			{
				$this->db->where('payment_id',$value);
           		$this->db->update('payments',$data);
        	}
        	redirect('Payments');
		}
			function view($param='',$param1=''){		
			$data['module_id']   = 'payments';
		    $data['page_title']  = 'Payment Details';
		    $data['payment_id']  = $param;
		    $data['loan_id']  = $param1;
		    $data['content']     = 'Payments/payment_info';
			echo Modules::run('template/admin_v',$data);
		}

		
	
}

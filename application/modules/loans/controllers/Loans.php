<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loans extends MY_Controller {

		function __construct()
		{
			parent::__construct();
		}

		  function index(){
			
 			$data['page_title']  = 'Loan List';
   			$data['module_id']   = 'loans';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['loans']      = $this->M_Loans->get_loans();
   		    $data['content']     = 'Loans/loans';
			echo Modules::run('template/admin_v',$data);
		}

		  function overdue(){
 			$data['page_title']  = 'Overdue Loans';
   			$data['module_id']   = 'loans';
   			$data['page_name']   = 'overdue';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['loans']      = $this->M_Loans->get_overdueloans();
   		    $data['content']     = 'Loans/overdue';
			echo Modules::run('template/admin_v',$data);
		}

		function create($param=''){		
			$data['module_id']   = 'loans';
		    $data['page_title']  = 'New Loan';
		    $data['user_ido']  = $param;
		    $data['content']     = 'Loans/new_loan';
			echo Modules::run('template/admin_v',$data);
		}
		function add_fees($param=''){		
			$data['module_id']   = 'loans';
			$data['loan_id']   = $param;
		    $data['page_title']  = 'Additional Fees';
		    $data['content']     = 'Loans/add_fees';
			echo Modules::run('template/admin_v',$data);
		}
		function add_attachment($param=''){		
			$data['module_id']   = 'loans';
			$data['loan_id']   = $param;
		    $data['page_title']  = 'Add Loan Attachment';
		    $data['content']     = 'Loans/add_attachment';
			echo Modules::run('template/admin_v',$data);
		}
		function add_collateral($param=''){		
			$data['module_id']   = 'loans';
			$data['loan_id']   = $param;
		    $data['page_title']  = 'Add Loan Collateral';
		    $data['content']     = 'Loans/add_collateral';
			echo Modules::run('template/admin_v',$data);
		}
		function add_payment($param=''){		
			$data['module_id']   = 'loans';
			$data['loan_id']   = $param;
			$data['balance'] = 	$this->db->get_where('loans',array('loan_id' =>$data['loan_id']))->row()->balance;

		    $data['page_title']  = 'New Loan Payment';
		    $data['content']     = 'Loans/add_payment';
			echo Modules::run('template/admin_v',$data);
		}
		function status_change($param=''){		
			$data['module_id']   = 'loans';
			$data['loan_id']   = $param;
		    $data['page_title']  = 'Change Loan Status';
		    $data['content']     = 'Loans/status_change';
			echo Modules::run('template/admin_v',$data);
		}

		function attach_download($param=''){
            $file = 'uploads/attachments/'.$param;
            $data = file_get_contents($file);
            force_download($file, $data);
        }

        function file1_download($param=''){
            $file = 'uploads/collaterals/'.$param;
            $data = file_get_contents($file);
            force_download($file, $data);
        }
        function file2_download($param=''){
            $file = 'uploads/collaterals/'.$param;
            $data = file_get_contents($file);
            force_download($file, $data);
        }

		

		function create_loan()
		{
			$data['user_id']  = $this->input->post('user_id',TRUE);
			$data['loan_type_id']  = $this->input->post('loan_type_id',TRUE);
			$rate = ($this->db->get_where('loan_types',array('loan_type_id' =>$data['loan_type_id']))->row()->type_rate)/100;
			$data['amount']  = trim($this->input->post('amount',TRUE));
			$data['agent']  = $this->input->post('agent',TRUE);
			$data['desc']  = $this->input->post('desc',TRUE);
			$data['payment_date']  = strtotime($this->input->post('payment_date',TRUE));
			$data['total_amount']  = $data['amount'] + ($data['amount'] * $rate);
			$data['balance']  = $data['total_amount'];
			$data['teller']  = $this->session->userdata('user_id');
			$data['date_applied']  = date('Y-m-d H:m:s');
			$this->db->insert('loans',$data);
			$loan_id = $this->db->insert_id();

			$baba['loan_id']     = $loan_id;
			$baba['g_phone']     = $this->input->post('g_phone',TRUE);
			$baba['g_email']  = $this->input->post('g_email',TRUE);
			$baba['g_address']  = $this->input->post('g_address',TRUE);
			$baba['relationship']  = $this->input->post('relationship',TRUE);
			$baba['g_name']  = $this->input->post('g_name',TRUE);
			$baba['remarks']  = $this->input->post('remarks',TRUE);
			$baba['g_id']  = $this->input->post('g_id',TRUE);
			//$baba['g_photo']  = $this->input->post('g_photo',TRUE);
			$baba['g_photo'] = $_FILES['g_photo']['name'];
			$this->db->insert('guaranta',$baba);
			move_uploaded_file($_FILES['g_photo']['tmp_name'],'uploads/guaranta/'.$baba['g_photo']);
			redirect('Loans');
		}

		function fee_add()
		{
			$data['loan_id']  = $this->input->post('loan_id',TRUE);
			$data['fee_amount']  = $this->input->post('fee_amount',TRUE);
			$data['fee_title']  = $this->input->post('fee_title',TRUE);
			$this->db->insert('addional_fees',$data);
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Fee added successfully
                                           						 </span></div>');
			redirect('Loans/add_fees/'.$data['loan_id']);
		}

	

		function attachment_add(){

			$data['loan_id']  = $this->input->post('loan_id',TRUE);
			$data['title']  = $this->input->post('title',TRUE);

		    $file_dir  = "uploads/attachments";  
			for ($x = 0; $x < count($_FILES['file']['name']); $x++) {               
	      		$file_name   = $_FILES['file']['name'][$x];
	      		$file_tmp    = $_FILES['file']['tmp_name'][$x];
	      		$data['file'] = $file_name;
	      		$this->db->insert('attachments',$data);
	      		$file_target = $file_dir . DIRECTORY_SEPARATOR . $file_name; /* DIRECTORY_SEPARATOR = / or \ */
			    if (move_uploaded_file($file_tmp, $file_target)) {                        
				  $this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Files added successfully
                                           						 </span></div>');
			      } else {                      
				  $this->session->set_flashdata('message','<div class="alert alert-danger display-hide">
				                                            <button class="close" data-close="alert"></button>
				                                            	<span>Error uploading files</span> </div>');
			      }        
		 	 }
			redirect('Loans/add_attachment/'.$data['loan_id']);
		}

		function change_status()
		{
			$loan_id  = $this->input->post('loan_id',TRUE);
			$data['status']  = $this->input->post('status',TRUE);
			$data['reason']  = $this->input->post('reason',TRUE);
			$data['approved_by']  = $this->session->userdata('user_id');
			$data['date_approved']  = date('Y-m-d H:m:s');
			$this->db->where('loan_id',$loan_id);
			$this->db->update('loans',$data);
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Loan status changed successfully
                                           						 </span></div>');
			redirect('Loans/status_change/'.$loan_id);
		}

		function payment_add()
		{
			$data['loan_id']  = $this->input->post('loan_id',TRUE);
			$data['payment_amount']  = $this->input->post('payment_amount',TRUE);
			$data['comment']  = $this->input->post('comment',TRUE);
			$data['payment_date']  = strtotime(date('Y-m-d'));
			$data['received_by']  = $this->session->userdata('user_id');

			$balance = $this->db->get_where('loans',array('loan_id' =>$data['loan_id']))->row()->balance;
			$cash_in = $this->db->get_where('loans',array('loan_id' =>$data['loan_id']))->row()->cash_in;
			$bobo['balance'] = $balance - $data['payment_amount'];
			$bobo['cash_in'] = $cash_in + $data['payment_amount'];
			$this->db->where('loan_id',$data['loan_id']);
			$this->db->update('loans',$bobo);
			$this->db->insert('payments',$data);
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Payment done successfully
                                           						 </span></div>');
			redirect('Loans/add_payment/'.$data['loan_id']);
		}


		function pay_schedule_add()
		{
			$data['date']  = $this->input->post('date',TRUE);
			$data['rate']  = $this->input->post('rate',TRUE);
			$data['loan_id']  = $this->input->post('loan_id',TRUE);
			$data['desc']  = $this->input->post('desc',TRUE);
			$this->db->insert('pay_schedule',$data);
			redirect('Loans/view/'.$data['loan_id']);
		}

		function collateral_add()
		{
			$data['loan_id']  = $this->input->post('loan_id',TRUE);
			$data['name']  = $this->input->post('name',TRUE);
			$data['file']  =  $_FILES['file']['name'];
			$data['model']  = $this->input->post('model',TRUE);
			$data['type']  = $this->input->post('type',TRUE);
			$data['make']  = $this->input->post('make',TRUE);
			$data['s_no']  = $this->input->post('s_no',TRUE);
			$data['price']  = $this->input->post('price',TRUE);
			$data['proof']  = $_FILES['proof']['name'];
			$this->db->insert('collaterals',$data);
			if (move_uploaded_file($_FILES['file']['tmp_name'],'uploads/collaterals/'.$data['file']) && move_uploaded_file($_FILES['proof']['tmp_name'],'uploads/collaterals/'.$data['proof'])) {                        
				  $this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Files added successfully
                                           						 </span>
                                           						 </div>');
			      } else {                      
				  $this->session->set_flashdata('message','<div class="alert alert-danger display-hide">
				                                            <button class="close" data-close="alert"></button>
				                                            	<span>Error uploading files</span> </div>');
			      }  
			redirect('Loans/add_collateral/'.$data['loan_id']);
		}

		function view($param=''){		
			$data['module_id']   = 'loans';
		    $data['page_title']  = 'Loan Details';
		    $data['loan_id']  = $param;
		    $data['content']     = 'Loans/loan_info';
			echo Modules::run('template/admin_v',$data);
		}
		
}

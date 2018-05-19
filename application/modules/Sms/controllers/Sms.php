<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sms extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

	    function index()
		{
		    $data['page_title']  = 'SMS List';
			$data['module_id']   = 'sms';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['sms']      = $this->M_Sms->get_sms();
		    $data['content']     = 'Sms/sms';
			echo Modules::run('template/admin_v',$data);
		}

		 function sms_setting()
		{
		    $data['page_title']  = 'SMS Setting';
			$data['sub_module_id']   = 'sms_setting';
			$data['user_id']   = $this->session->userdata('user_id');
		    $data['content']     = 'Sms/sms_setting';
			echo Modules::run('template/admin_v',$data);

		}



		function get_data_from_post()
		{
			$receiver_number = $this->input->post('receiver_number', TRUE);
			$message = $this->input->post('message', TRUE);
			$data['receiver_number'] = $receiver_number;
			$data['message'] = $message;
			$data['date_sent'] = strtotime(date('Y-m-d H:i:s'));
			$data['sending_number'] = $this->db->get_where('sms_settings')->row()->twilio_sender_phone_number;
			$this->M_Sms->send_sms($message, $receiver_number);
			return $data;
		}


		function submit(){
			$data = $this->get_data_from_post();
			$this->db->insert('sms',$data);
			redirect('Sms');
		}

		function send_reminder_sms(){
			$all = $this->M_payments->get_m_payments();
			foreach ($all as $row) {
			 $receiver_number = $row['phone'];
			 $message = $this->db->get('company')->row()->missed_payment_message;
			 $this->M_Sms->send_sms($message, $receiver_number);
			}
			return;
			//$this->db->insert('sms',$data);
			//redirect('Sms');
		}


		function sms_bulk_send()
		{
				
            $receiver = $this->input->post('receiver');
            $message = $this->input->post('message');
            $data['message'] = $message;
            $data['date_sent'] = strtotime(date('Y-m-d H:i:s'));
			$data['sending_number'] = $this->db->get_where('sms_settings')->row()->twilio_sender_phone_number;

					if($receiver == 1){//staff
						$this->db->join('staff','users.user_id = staff.user_id');
				       $users = $this->db->get_where('users',array('deleted' =>0))->result_array();
					   foreach ($users as $row0) 
							{	
								$receiver_number = $row0['phone'];
								$data['receiver_number'] =$receiver_number;
								$this->M_Sms->send_sms($message, $receiver_number);
			     				$this->db->insert('sms',$data);
							}
			            }

			        if($receiver == 2) {//clients
			        	$this->db->join('clients','users.user_id = clients.user_id');
			            $clients = $this->db->get_where('users',array('deleted' =>0))->result_array();
					    foreach ($clients as $row0) 
							{	
								$receiver_number = $row0['phone'];
								$data['receiver_number'] = $receiver_number;
								$this->M_Sms->send_sms($message, $receiver_number);
			     				$this->db->insert('sms',$data);

							}
			            }
			redirect('Sms');
		}
		

		
		function create(){	
		    $data['page_title']  = 'Create SMS';
		    $data['content']     = 'Sms/new_sms';
			echo Modules::run('template/admin_v',$data);
		}

		function bulk(){	

		    $data['page_title']  = 'Create Bulk SMS';
		    $data['content']     = 'Sms/bulk_sms';
			echo Modules::run('template/admin_v',$data);
		}

		function delete(){
			$sms_id = $this->input->post('sms_id');
			foreach($sms_id as $value)
			{
				$data['deleted'] = 1;
				$this->db->where('sms_id',$value);
           		$this->db->update('sms',$data);
        	}
        	redirect('Sms');


		}
		
		
		
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Reminders extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

	    function index(){
		    $data['page_title']  = 'Reminders';
			$data['sub_module_id'] = 'reminders';
			$data['module_id'] = 'config';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['reminders'] = $this->M_Reminders->get_reminders();
		    $data['content']   = 'Reminders/reminders';
			echo Modules::run('template/admin_v',$data);

		}

		function get_data_from_post(){
			$data['reminder_name']     = $this->input->post('reminder_name');
			$data['days_before']    = $this->input->post('days_before');
			$data['message'] = $this->input->post('message');
			return $data;
		}

		function get_data_from_db($update_id){
			$query = $this->db->get_where('reminders',array('reminder_id' =>$update_id))->result_array();
			foreach ($query as $row) {
			$data['reminder_name']     = $row['reminder_name'];
			$data['days_before']    = $row['days_before'];
			$data['message'] = $row['message'];
			}
			return $data;
		}

		function submit(){
			$data = $this->get_data_from_post();
			$update_id = $this->input->post('update_id', TRUE);
			if (is_numeric($update_id))
				{
					$this->db->where('reminder_id',$update_id);
					$this->db->update('reminders',$data);
				}
				else
				{
					$this->db->insert('reminders',$data);
				}
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Reminder added/saved successfully
                                           						 </span></div>');
			redirect('Reminders/create');
		}

		function create(){
			$update_id = $this->uri->segment(3);
			if(!isset($update_id)){
				$update_id = $this->input->post('update_id',$update_id);
			}
			if(is_numeric($update_id)){
				$data = $this->get_data_from_db($update_id);
				$data['update_id'] = $update_id;
			}
			else{
				$data = $this->get_data_from_post();
			}

			$data['sub_module_id']   = 'reminders';
			$data['module_id']   = 'config';
		    $data['page_title']  = 'New Reminder';
		    $data['content']     = 'Reminders/new_reminder';
			echo Modules::run('template/admin_v',$data);
		}

		function send_reminder(){

			$reminder_id = $this->db->get_where('reminders',array('deleted' =>0))->row()->reminder_id;
			$days_before = $this->db->get_where('reminders',array('reminder_id' =>$reminder_id))->row()->days_before;
			$message = $this->db->get_where('reminders',array('reminder_id' =>$reminder_id))->row()->message;
			$reminder_name = $this->db->get_where('reminders',array('reminder_id' =>$reminder_id))->row()->reminder_name;

			$today = strtotime(date('Y-m-d H:m:i'));
			$to_date = $today + ($days_before * 86400);

			$this->db->join('users','users.user_id = loans.user_id');
			$loans = $this->db->get_where('loans',array('deleted' =>0,'payment_date <='=>$today))->result_array();
			foreach ($loans as $value) {
				$receiver_number = $value['phone'];
				$this->M_Sms->send_sms($message,$receiver_number);
			}

		    /*$start_date = strtotime($start_date);
			$end_date = strtotime($end_date);
			
			$day = floor($rem / 86400);
			$hr  = floor(($rem % 86400) / 3600);
			$min = floor(($rem % 3600) / 60);
			$sec = ($rem % 60);
			if($day) echo "$day Days ";
			if($hr) echo "$hr Hours ";
			if($min) echo "$min Minutes ";
			if($sec) echo "$sec Seconds ";
			echo "Remaining...";*/
		}


			function delete(){
			$reminder_id = $this->input->post('reminder_id');
			foreach($reminder_id as $value){
				$data['deleted'] = 1;
				$this->db->where('reminder_id',$value);
           		$this->db->update('reminders',$data);
        	}
        	redirect('Reminders');
		}
		
		
		
	
}

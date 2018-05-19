<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Emails extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

	    function index()
		{
		    $data['page_title']  = 'Email List';
			$data['module_id']   = 'emails';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['emails']      = $this->M_Emails->get_emails();
		    $data['content']     = 'Emails/emails';
			echo Modules::run('template/admin_v',$data);

		}



		function get_data_from_post()
		{
			$data['receiver_email'] = $this->input->post('receiver_email', TRUE);
			$data['subject'] = $this->input->post('subject', TRUE);
			$data['message'] = $this->input->post('message', TRUE);
			$data['date_sent'] = strtotime(date('Y-m-d H:i:s'));
			$data['user_id'] = $this->session->userdata('user_id');			
			return $data;
		}

		function send_email(){

			$email = $this->input->post('receiver_email', TRUE);
			$subject = $this->input->post('subject', TRUE);
			$message = $this->input->post('message', TRUE);

			$data['receiver_email'] = $email;
			$data['subject'] = $subject;
			$data['message'] = $message;
			$data['date_sent'] = strtotime(date('Y-m-d H:i:s'));
			$data['user_id'] = $this->session->userdata('user_id');	
		    $data['sending_email'] = $this->db->get('email_settings')->row()->email;
			$this->M_Emails->send_email($message,$subject,$email);		
		}

		function submit(){
			$email = $this->input->post('receiver_email', TRUE);
			$subject = $this->input->post('subject', TRUE);
			$message = $this->input->post('message', TRUE);

			$data['receiver_email'] = $email;
			$data['subject'] = $subject;
			$data['message'] = $message;
			$data['date_sent'] = strtotime(date('Y-m-d H:i:s'));
			$data['user_id'] = $this->session->userdata('user_id');	
		    $data['sending_email'] = $this->db->get('email_settings')->row()->email;
			$this->M_Emails->send_email($message,$subject,$email);
			$this->db->insert('emails',$data);
			  if($this->email->send()){
                $this->session->set_flashdata("email_sent","Email sent successfully.");
            redirect('Emails');
          }else{
        	$this->session->set_flashdata("email_sent","Email not sent,You have encountered an error");
			redirect('Emails');
		  }
		}

		function email_bulk_send()
		{
				
            $receiver = $this->input->post('receiver');
            $message = $this->input->post('message');
            $subject = $this->input->post('subject');
            $data['message'] = $message;
            $data['subject'] = $subject;
            $data['date_sent'] = strtotime(date('Y-m-d H:i:s'));
			$data['sending_email'] = $this->db->get_where('email_settings')->row()->email;

					if($receiver == 1){//staff
						$this->db->join('staff','users.user_id = staff.user_id');
				       $users = $this->db->get_where('users',array('deleted' =>0))->result_array();
					   foreach ($users as $row0) 
							{	
								$email = $row0['email'];
								$data['receiver_email'] = $email;
								$this->M_Emails->send_email($message,$subject,$email);		
			     				$this->db->insert('emails',$data);
							}
			            }

			        if($receiver == 2) {//clients
			        	$this->db->join('clients','users.user_id = clients.user_id');
			            $clients = $this->db->get_where('users',array('deleted' =>0))->result_array();
					    foreach ($clients as $row0) 
							{	
								$email = $row0['email'];
								$data['receiver_email'] = $email;
								$this->M_Emails->send_email($message,$subject,$email);		
			     				$this->db->insert('emails',$data);
							}
			            }

				if($this->email->send()){
	                $this->session->set_flashdata("email_sent","Emails sent successfully.");
	            redirect('Emails');
	          }else{
	        	$this->session->set_flashdata("email_sent","Emails not sent,You have encountered an error");
				redirect('Emails');
			  }
		}

		
		function create(){	
		    $data['page_title']  = 'Create Email';
		    $data['content']     = 'Emails/new_email';
			echo Modules::run('template/admin_v',$data);
		}

		function bulk(){	

		    $data['page_title']  = 'Create Bulk Emails';
		    $data['content']     = 'Emails/bulk_emails';
			echo Modules::run('template/admin_v',$data);
		}

		function delete(){
			$email_id = $this->input->post('email_id');
			foreach($email_id as $value)
			{
				$data['deleted'] = 1;
				$this->db->where('email_id',$value);
           		$this->db->update('emails',$data);
        	}
          redirect('Emails');


		}
		
		
		
	
}

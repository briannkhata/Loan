<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Email_setting extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Email_setting/M_Email_setting');

		}

		 function index()
		{
		    $data['page_title']  = 'Email Setting';
			$data['sub_module_id']   = 'email_setting';
			$data['module_id']   = 'Config';
			$data['user_id']   = $this->session->userdata('user_id');
			$data['email_setting']      = $this->M_Email_setting->get_email_setting();
		    $data['content']     = 'Email_setting/email_setting';
			echo Modules::run('template/admin_v',$data);

		}


		function save_email_setting()
		{
			$settings_id = $this->input->post('settings_id', TRUE);
			$data['port'] = $this->input->post('port', TRUE);
			$data['email'] = $this->input->post('email', TRUE);
			$data['password'] = $this->input->post('password', TRUE);
			$data['host'] = $this->input->post('host', TRUE);
			$this->db->where('settings_id',$settings_id);
			$this->db->update('email_settings',$data);
			redirect('Email_setting');
		}

}

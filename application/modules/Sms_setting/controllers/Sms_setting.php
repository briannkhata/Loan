<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sms_setting extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Sms_setting/M_Sms_setting');

		}


		 function index()
		{
		    $data['page_title']  = 'SMS API Settings';
			$data['sub_module_id']   = 'sms_setting';
			$data['module_id']   = 'Config';
			$data['user_id']   = $this->session->userdata('user_id');
			$data['sms_setting']  = $this->M_Sms_setting->get_sms_setting();
		    $data['content']     = 'Sms_setting/sms_setting';
			echo Modules::run('template/admin_v',$data);

		}

		function save_sms_setting()
		{
			$settings_id = $this->input->post('settings_id', TRUE);
			$data['twilio_sender_phone_number'] = $this->input->post('twilio_sender_phone_number', TRUE);
			$data['twilio_auth_token'] = $this->input->post('twilio_auth_token', TRUE);
			$data['twilio_account_sid'] = $this->input->post('twilio_account_sid', TRUE);
			$this->db->where('settings_id',$settings_id);
			$this->db->update('sms_settings',$data);
			redirect('Sms_setting');

		}
	
}

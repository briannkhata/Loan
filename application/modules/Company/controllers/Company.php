<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Company extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

		 function index(){
		    $data['page_title']  = 'Company Details';
			$data['sub_module_id']   = 'company';
			$data['module_id']   = 'Config';
			$data['user_id']   = $this->session->userdata('user_id');
			$data['company_setting']      = $this->M_Company->get_company();
		    $data['content']     = 'Company/company_setting';
			echo Modules::run('template/admin_v',$data);
		}


		function save_company_setting(){
			$company_id = $this->input->post('company_id', TRUE);
			$data['company_name'] = $this->input->post('company_name', TRUE);
			$data['company_email'] = $this->input->post('company_email', TRUE);
			$data['company_phone'] = $this->input->post('company_phone', TRUE);
		//$destination = './uploads/logo/'.$data['company_name'];
			//$company_logo = '';

			//if($_FILES['company_logo']['tmp_name'] !=''){
			$data['company_logo'] = 'logo'.'.'.'png';
			$data['stamp'] = 'stamp'.'.'.'png';
			$destination = 'uploads/logo/'.$data['company_name'];
			$destination1 = 'uploads/logo/'.$data['stamp'];

				//move_uploaded_file($_FILES['company_logo']['tmp_name'],$destination);
				//}else{

				//}
			//if($_FILES['company_logo']['tmp_name'] !=''){
				///$this->db->where('company_id',$company_id);
				//$this->db->update('company',$data);
				//}else{
	
			$this->db->where('company_id',$company_id);
			$this->db->update('company',$data);
			move_uploaded_file($_FILES['company_logo']['tmp_name'],$destination);
			move_uploaded_file($_FILES['stamp']['tmp_name'],$destination1);
				//}
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Settings added/saved successfully
                                           						 </span></div>');
			redirect('Company');
		}

}

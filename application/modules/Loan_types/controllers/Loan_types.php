<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Loan_types extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

	    function index(){
		    $data['page_title']  = 'Loan Categories';
			$data['sub_module_id']   = 'loan_types';
			$data['module_id']   = 'config';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['type']        = $this->M_Loantype->get_loantype();
		    $data['content']     = 'Loan_types/loantypes';
			echo Modules::run('template/admin_v',$data);

		}

		function get_data_from_post(){
			$data['loan_type']     = $this->input->post('loan_type');
			$data['type_desc']    = $this->input->post('type_desc');
			$data['type_amount'] = $this->input->post('type_amount');
			$data['type_rate'] = $this->input->post('type_rate');
			return $data;
		}

		function get_data_from_db($update_id){
			$query = $this->db->get_where('loan_types',array('loan_type_id' =>$update_id))->result_array();
			foreach ($query as $row) {
			$data['loan_type']     = $row['loan_type'];
			$data['type_desc']    = $row['type_desc'];
			$data['type_amount'] = $row['type_amount'];
			$data['type_rate'] = $row['type_rate'];
			}
			return $data;
		}

		function submit(){
			$data = $this->get_data_from_post();
			$update_id = $this->input->post('update_id', TRUE);
			if (is_numeric($update_id))
				{
					$this->db->where('loan_type_id',$update_id);
					$this->db->update('loan_types',$data);
				}
				else
				{
					$this->db->insert('loan_types',$data);
				}
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Loan Category added/saved successfully
                                           						 </span></div>');
			redirect('Loan_types/create');
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

			$data['sub_module_id']   = 'loan_types';
			$data['module_id']   = 'config';
		    $data['page_title']  = 'New Loan type';
			$data['description'] = 'Add Loan Category';
		    $data['content']     = 'Loan_types/new_loantype';
			echo Modules::run('template/admin_v',$data);
		}


			function delete(){
			$loan_type_id = $this->input->post('loan_type_id');
			foreach($loan_type_id as $value){
				$data['deleted'] = 1;
				$this->db->where('loan_type_id',$value);
           		$this->db->update('loan_types',$data);
        	}
        	redirect('Loan_types');
		}
		
		
		
	
}

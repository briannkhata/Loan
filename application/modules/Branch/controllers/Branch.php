<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Branch extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Branch/M_Branch');

		}

	    function index()
		{
		    $data['page_title']  = 'Branch List';
			$data['sub_module_id']   = 'branch';
			$data['module_id']   = 'config';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['branch']      = $this->M_Branch->get_branch();
		    $data['content']     = 'Branch/branches';
			echo Modules::run('template/admin_v',$data);

		}


		function get_data_from_post(){
			$data['branch_name']     = $this->input->post('branch_name',TRUE);
			$data['branch_phone']     = $this->input->post('branch_phone',TRUE);
			$data['branch_email']  = $this->input->post('branch_email',TRUE);
			$data['branch_address']  = $this->input->post('branch_address',TRUE);
			return $data;
		}

		function get_data_from_db($update_id){
			$query = $this->db->get_where('branch',array('branch_id' =>$update_id))->result_array();
			foreach ($query as $row) {
			  $data['branch_name'] = $row['branch_name'];
			  $data['branch_email'] = $row['branch_email'];
			  $data['branch_phone'] = $row['branch_phone'];
			  $data['branch_address'] = $row['branch_address'];

			}
			return $data;
		}

		function submit(){
			$data = $this->get_data_from_post();
			$update_id = $this->input->post('update_id', TRUE);
			if (is_numeric($update_id))
				{
					$this->db->where('branch_id',$update_id);
					$this->db->update('branch',$data);
				}
				else
				{
					$this->db->insert('branch',$data);
				}
			 $this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Branch added/saved successfully
                                           						 </span></div>');
			redirect('Branch/create');
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

			$data['sub_module_id']   = 'branch';
			$data['module_id']   = 'config';
		    $data['page_title']  = 'New Branch';
			$data['description'] = 'Add new Branch';
		    $data['content']     = 'Branch/new_branch';
			echo Modules::run('template/admin_v',$data);
		}

		function delete(){
			$branch_id = $this->input->post('branch_id');
			foreach($branch_id as $value){
				$data['deleted'] = 1;
				$this->db->where('branch_id',$value);
           		$this->db->update('branch',$data);
        	}
        	redirect('Branch');
		}
		
		
		
	
}

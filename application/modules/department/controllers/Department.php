<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Department extends MY_Controller {
	    private $limit = 10;
		function __construct()
		{
			parent::__construct();
			$this->load->model('M_Department','department');
		}

	    function index(){
		    $data['page_title']  = 'Departments List';
            $data['departments'] = $this->department->get_departments();
            $data['user_id']   = $this->session->userdata('user_id');
            $data['sub_module_id']   = 'department';
			$data['module_id']   = 'department';
   		    $data['content']     = 'Department/departments';
			echo Modules::run('template/admin_v',$data);

		}

		function get_data_from_post(){
			$data['department_name']     = $this->input->post('department_name',TRUE);
			$data['department_head']     = $this->input->post('department_head',TRUE);
			$data['department_details']  = $this->input->post('department_details',TRUE);
			return $data;
		}

		function get_data_from_db($update_id){
			$query = $this->db->get_where('department',array('department_id' =>$update_id))->result_array();
			foreach ($query as $row) {
			  $data['department_name'] = $row['department_name'];
			  $data['department_head'] = $row['department_head'];
			  $data['department_details'] = $row['department_details'];
			}
			return $data;
		}

		function submit(){
			$data = $this->get_data_from_post();
			$update_id = $this->input->post('update_id', TRUE);
			if (is_numeric($update_id))
				{
					$this->db->where('department_id',$update_id);
					$this->db->update('department',$data);
				}
				else
				{
					$this->db->insert('department',$data);
				}
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Department added/saved successfully
                                           						 </span></div>');
			redirect('Department/create');
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

			$data['sub_module_id']   = 'departments';
			$data['module_id']   = 'department';
		    $data['page_title']  = 'New Department';
			$data['description'] = 'Add new Department';
		    $data['content']     = 'Department/new_department';
			echo Modules::run('template/admin_v',$data);
		}

		function delete(){

			$department_id = $this->input->post('department_id');
			foreach($department_id as $id){
			$data['deleted']= 1;
			$this->db->where('department_id',$id);
			$this->db->update('department',$data);
			}
			redirect('Department');
		}
		
	
	
}

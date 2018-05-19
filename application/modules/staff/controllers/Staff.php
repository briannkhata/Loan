<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends MY_Controller {

		function __construct()
		{
			parent::__construct();
		}

	    function index(){
			
		    $data['page_title']  = 'Staff List';
			$data['module_id']   = 'staff';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['staffs']      = $this->M_Staff->get_staffs();
		    $data['content']     = 'Staff/staffs';
			echo Modules::run('template/admin_v',$data);

		}

		
		function get_data_from_post(){
			$data['name']     = $this->input->post('name',TRUE);
			$data['phone']     = $this->input->post('phone',TRUE);
			$data['email']  = $this->input->post('email',TRUE);
			$data['username']  = $this->input->post('phone',TRUE);
			$data['password']  = MD5($this->input->post('phone',TRUE));
			$data['address1']  = $this->input->post('address1',TRUE);
			$data['national_id']  = $this->input->post('national_id',TRUE);
			$data['address2']  = $this->input->post('address2',TRUE);
			$data['gender']  = $this->input->post('gender',TRUE);
			$data['branch_id']  = $this->input->post('branch_id',TRUE);
			$data['jobtitle']  = $this->input->post('jobtitle',TRUE);
			$data['department_name']  = $this->input->post('department_name',TRUE);
			return;
		}


		function submit(){
			$data['name']     = $this->input->post('name',TRUE);
			$data['phone']     = $this->input->post('phone',TRUE);
			$data['email']  = $this->input->post('email',TRUE);
			$data['username']  = $this->input->post('phone',TRUE);
			$data['password']  = MD5($this->input->post('phone',TRUE));
			$data['address1']  = $this->input->post('address1',TRUE);
			$data['national_id']  = $this->input->post('national_id',TRUE);
			$data['address2']  = $this->input->post('address2',TRUE);
			$data['gender']  = $this->input->post('gender',TRUE);
			$data['branch_id']  = $this->input->post('branch_id',TRUE);
			$photo1 = $this->input->post('photo1',TRUE);

			$new_name = rand().'.'.'jpg';
			if($photo1 !=''){
			    $data['photo'] = $photo1;
			}else{
			    $data['photo'] = $new_name;
			}

			$dataa['jobtitle']  = $this->input->post('jobtitle',TRUE);
			$dataa['department']  = $this->input->post('department_name',TRUE);

			$dataa['jobtitle']  = $this->input->post('jobtitle',TRUE);
			$dataa['department']  = $this->input->post('department_name',TRUE);
			$dataaa['total_amount']  = 0;

			$update_id = $this->input->post('update_id', TRUE);
			if (is_numeric($update_id))
				{
					$this->db->where('user_id',$update_id);
					$this->db->update('users',$data);
					$this->db->update('wallet',$dataaa);
					$this->db->update('staff',$dataa);
    				move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/staff/'.$photo1);
				}
				else
				{
					$this->db->insert('users',$data);
					$user_id = $this->db->insert_id();
					$dataaa['user_id'] = $user_id;
					$this->db->insert('wallet',$dataaa);
					$dataa['user_id'] = $user_id;
					$this->db->insert('staff',$dataa);
				    move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/staff/'.$new_name);

				}	
			redirect('Staff');
		}

		function get_data_from_db($update_id){

			$staff = $this->M_Staff->get_staff($update_id);
			foreach ($staff as $row) {
				$data['name']= $row['name'];
				$data['email']= $row['email'];
				$data['phone']= $row['phone'];
				$data['gender']= $row['gender'];
				$data['department']= $row['department'];
				$data['branch_id']= $row['branch_id'];
				$data['national_id']= $row['national_id'];
				$data['jobtitle']= $row['jobtitle'];
				$data['address1']= $row['address1'];
				$data['address2']= $row['address2'];
				$data['photo']= $row['photo'];

			}
			return $data;

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

			$data['module_id']   = 'staff';
		    $data['page_title']  = 'New Staff';
			$data['description'] = 'Add new Staff';
		    $data['content']     = 'Staff/new_staff';
			echo Modules::run('template/admin_v',$data);
		}

		function delete(){
			$user_id = $this->input->post('user_id');
			$data['deleted'] = 1;
			foreach($user_id as $value){
				$this->db->where('user_id',$value);
           		$this->db->update('users',$data);
        	}
        	redirect('Staff');
		}

		 function view(){
			
		    $data['page_title']  = 'Staff Demographics';
			$data['module_id']   = 'staff';
			$data['user_id']   = $this->session->userdata('user_id');
		    $data['content']     = 'Staff/staff_info';
			echo Modules::run('template/admin_v',$data);

		}
		
	
}

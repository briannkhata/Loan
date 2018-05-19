<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends MY_Controller {

		function __construct()
		{
			parent::__construct();
		}

	    function index(){
			
		    $data['page_title']  = 'My Profile';
			$data['module_id']   = 'profile';
			$data['user_id']   = $this->session->userdata('user_id');
		    $data['content']     = 'Profile/profile';
			echo Modules::run('template/admin_v',$data);

		}


		function submit(){
			$data['username']     = $this->input->post('username',TRUE);
			$data['password']  = MD5($this->input->post('password',TRUE));
			$user_id = $this->input->post('user_id', TRUE);

			if ($_FILES['photo']['name'] !=''){
				$data['photo'] = $_FILES['photo']['name'];
				move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/staff/'.$data['photo']);

			}else{
				$data['photo'] = $this->input->post('photo1',TRUE);
			}
			$this->db->where('user_id',$user_id);
			$this->db->update('users',$data);
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Changes saved successfully
                                           						 </span></div>');
			redirect('Profile');
		}

		
		
	
}

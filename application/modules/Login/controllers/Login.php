<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends MY_Controller {

		function __construct()
		{
			parent::__construct();

		}

		
		function index()
		{
			if($this->M_Login->is_logged_in()){
					redirect('dashboard');
				}else{
	   			 $this->load->view('login');
				}

		}

		function signin()
	   {   

			$username	=	$this->input->post('username');
		    $password	=	MD5($this->input->post('password'));		  
			$admin      =   $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password' AND deleted='0'");
			$row = $admin->row();
				if (isset($row))
				{	
					$username   =	$row->username;
					$password	=	$row->password;
					$user_id	=	$row->user_id;
					$name	=	$row->name;
					$branch_id	=	$row->branch_id;
																					
					$this->session->set_userdata('user_login', '1');
					$this->session->set_userdata('name',$name);
					$this->session->set_userdata('branch_id',$branch_id);
					$this->session->set_userdata('user_id',$user_id);
					$this->session->set_userdata('password',$password);
					redirect('dashboard');
				}
				elseif ($username = '') {
					$this->session->set_flashdata('message','Enter Username');
					redirect('login');
				}
				elseif ($password = '') {
					$this->session->set_flashdata('message','Enter Password');
					redirect('login');
				}
				elseif ($username = '' || $password = '') {
					$this->session->set_flashdata('message','Both fields are required');
					redirect('login');
				}
					else{
				$this->session->set_flashdata('message','Invalid Username or Password');
				redirect('login');
		    }
	}


	function logout()
	{
		$this->M_Login->logout();
	}
	
		
		
	
}

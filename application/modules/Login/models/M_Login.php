<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class M_Login extends CI_Model {
		function __construct()
		{
			parent::__construct();
		}
		
	  /*
	Attempts to login employee and set session. Returns boolean based on outcome.
	*/
	function login($username, $password)
	{
		$query = $this->db->get_where('users', array('username' => 1,'password'=>md5($password), 'deleted'=>0), 1);
		if ($query->num_rows() ==1)
		{
			$row=$query->row();
			$this->session->set_userdata('user_id', $row->user_id);
			return true;
		}
		return false;
	}
	
	/*
	Logs out a user by destorying all session data and redirect to login
	*/
	function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
	
	/*
	Determins if a employee is logged in
	*/
	function is_logged_in()
	{
		return $this->session->userdata('user_id')!=false;
	}
	
	/*
	Gets information about the currently logged in employee.
	*/
	function get_logged_in_user_info()
	{
		if($this->is_logged_in())
		{
			return $this->get_info($this->session->userdata('user_id'));
		}
		
		return false;
	}
	
	
 
}


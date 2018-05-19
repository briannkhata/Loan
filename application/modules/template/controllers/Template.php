<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {
	function __construct()
	{
		parent::__construct();
	}
	
	function admin_v($data = NULL)
	{
		$this->load->view('content',$data);
	}
}

/* End of file Template.php */
/* Location: ./application/modules/template/controllers/Template.php */
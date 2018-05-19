<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			//$this->load->module(['patient']);
		}

		
		function index()
		{

			$data['page_title'] = 'Dashboard';
		    $data['description'] = 'Statistics and Reports';
		    $data['content'] = 'Dashboard/dashboard';
		   echo Modules::run('template/admin_v',$data); //run a template
		}
		
	
		
		
}

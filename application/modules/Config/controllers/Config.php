<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Config extends MY_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Config/M_Config');

		}

	
}

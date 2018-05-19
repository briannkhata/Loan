<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MY_Controller extends MX_Controller {

		function __construct()
		{
			parent::__construct();
			$this->load->model('Department/M_Department');
			$this->load->model('Branch/M_Branch');
			$this->load->model('Client/M_Client');
			$this->load->model('Sms/M_Sms');
			$this->load->model('Emails/M_Emails');
			$this->load->model('Wallet/M_Wallet');
			$this->load->model('Staff/M_Staff');
			$this->load->model('Savings/M_Savings');
			$this->load->model('Login/M_Login');
			$this->load->model('Loans/M_Loans');
			$this->load->model('Payments/M_Payments');
			$this->load->model('Company/M_Company');
			$this->load->model('Loan_types/M_Loantype');
			$this->load->model('Reminders/M_Reminders');
			//$this->load->model('Profile/M_Profile');



		}
}

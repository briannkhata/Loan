<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Clinic extends MY_Controller {

		function __construct()
		{
			parent::__construct();
		}

		function display_patients()
		{
		  $data['page_header'] = "Patients";
		  $data['description'] = "Displays all Patients - All Clinics";
		  $data['content_view'] = "Patient/patients_display_v";
		  $this->template->admin($data);
		}

		function add_patient()
		{
		  $data['page_header'] = "Add Patient";
		  $data['description'] = "Add New patient to the system";
		  $data['content_view'] = "Patient/add_patient_v";
		  $this->template->admin($data);
		}
		
}

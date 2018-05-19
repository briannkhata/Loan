<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends MY_Controller {
		function __construct()
		{
			parent::__construct();
		}

		  function index(){
			
 			$data['page_title']  = 'Client List';
   			$data['module_id']   = 'client';
			$data['user_id']   = $this->session->userdata('user_id');
            $data['clients']      = $this->M_Client->get_clients();
   		    $data['content']     = 'Client/clients';
			echo Modules::run('template/admin_v',$data);
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
			$data['branch_id']  = $this->session->userdata('branch_id');
			$data['type']  = 2;
			$dataa['profession']  = $this->input->post('profession',TRUE);
			$dataa['account_number']  = $this->input->post('account_number',TRUE);
			$photo1 = $this->input->post('photo1',TRUE);

			$new_name = rand().'.'.'jpg';
			//if($_FILES['photo']['tmp_name'] !=''){
			    //$data['photo'] = $photo1;
			   // $data['photo'] = $new_name;

			//}else{
			    //$data['photo'] = $new_name;
			  //  $data['photo'] = $photo1;
			//}
			
			if($photo1 !=''){
			    $data['photo'] = $photo1;
			}else{
			    $data['photo'] = $new_name;
			}

			$update_id = $this->input->post('update_id', TRUE);
			if (is_numeric($update_id))
				{
					$this->db->where('user_id',$update_id);
					$this->db->update('users',$data);
					$this->db->update('clients',$dataa);
    				move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/client/'.$photo1);
				}
				else
				{
					$this->db->insert('users',$data);
					$user_id  = $this->db->insert_id();
					$dataa['user_id']  = $user_id;
					$this->db->insert('clients',$dataa);
				    move_uploaded_file($_FILES['photo']['tmp_name'],'uploads/client/'.$new_name);

				}	
			redirect('Client');
		}


			function get_data_from_db($update_id){
			$client = $this->M_Client->get_client($update_id);
			foreach ($client as $row) {
				$data['name']= $row['name'];
				$data['email']= $row['email'];
				$data['phone']= $row['phone'];
				$data['gender']= $row['gender'];
				$data['branch_id']= $row['branch_id'];
				$data['national_id']= $row['national_id'];
				$data['profession']= $row['profession'];
				$data['address1']= $row['address1'];
				$data['address2']= $row['address2'];
				$data['photo']= $row['photo'];
				$data['account_number'] = $row['account_number'];

			}
			return $data;

		}

	
		function get_data_from_post(){
				$data['name']  = $this->input->post('name',TRUE);
				$data['phone']     = $this->input->post('phone',TRUE);
				$data['email']  = $this->input->post('email',TRUE);
				$data['username']  = $this->input->post('phone',TRUE);
				$data['password']  = MD5($this->input->post('phone',TRUE));
				$data['address1']  = $this->input->post('address1',TRUE);
				$data['address2']  = $this->input->post('address2',TRUE);
				$data['gender']  = $this->input->post('gender',TRUE);
				$data['profession']  = $this->input->post('profession',TRUE);
				$data['account_number']  = $this->input->post('account_number',TRUE);
				return;
		}

		function get_data_from_post1(){
				$data['income']  = $this->input->post('income',TRUE);
				$data['occupation'] = $this->input->post('occupation',TRUE);
				$data['user_id']  = $this->input->post('user_id',TRUE);
				return $data;
		}
		function get_data_from_db1($update_id){
			$finance = $this->M_Client->get_clientt($update_id);
			foreach ($finance as $row) {
				$data['income']= $row['income'];
				$data['occupation']= $row['occupation'];
				$data['user_id']= $row['user_id'];
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

			
			$data['module_id']   = 'client';
		    $data['page_title']  = 'New Client';
		    $data['content']     = 'Client/new_client';
			echo Modules::run('template/admin_v',$data);
		}

		function income_create($param='',$param1=''){
			//$update_id = $this->uri->segment(3);
			$update_id = $param1;

			if(!isset($update_id)){
				$update_id = $this->input->post('update_id',$update_id);
			}

			if(is_numeric($update_id)){
				$data = $this->get_data_from_db1($update_id);
				$data['update_id'] = $update_id;

			}
			else{
				$data = $this->get_data_from_post1();
			}

			$data['cfinance_id']   = $param1;
			$data['user_id']   = $param;
			$data['module_id']   = 'client';
		    $data['page_title']  = 'New Income |  '.$this->db->get_where('users',array('user_id' =>$param))->row()->name;
		    $data['content']     = 'Client/new_income';
			echo Modules::run('template/admin_v',$data);
		}

		function income_add(){


			$data['income']  = $this->input->post('income',TRUE);
			$data['occupation'] = $this->input->post('occupation',TRUE);
			$data['user_id']  = $this->input->post('user_id',TRUE);
			$update_id = $this->input->post('update_id', TRUE);
			if (is_numeric($update_id))
				{
					$this->db->where('cfinance_id',$update_id);
					$this->db->update('client_finance',$data);
				}
				else
				{
					$this->db->insert('client_finance',$data);

				}
			$this->session->set_flashdata('message','<div class="alert alert-info display-hide">
                                           					 <button class="close" data-close="alert"></button>
                                           						 <span>
                                           						 	Income added successfully
                                           						 </span></div>');
			redirect('Client/income_create/'.$data['user_id']);
		}

	
		 function view($param='')
		{
		    $data['page_title']  = 'Client Information';
		    $data['user_id']=$param;
		    $data['module_id']='client';
   		    $data['content']     = 'Client/client_info';
			echo Modules::run('template/admin_v',$data);
		}

		function delete(){
			$user_id = $this->input->post('user_id');
			$data['deleted'] = 1;
			foreach($user_id as $value)
			{
				$this->db->where('user_id',$value);
           		$this->db->update('users',$data);
        	}
        	redirect('Client');
		}

		/*function income_delete()
		{
			$cfinance_id = $this->input->post('cfinance_id');
			$data['deleted'] = 1;
			foreach($cfinance_id as $value)
			{
				$user_id = $this->db->get_where('client_finance',array('cfinance_id' =>$value))->row()->user_id;
				$this->db->where('cfinance_id',$cfinance_id);
				$this->db->update('client_finance',$data);
			}
        	redirect('Client/view/'.$user_id);
		}*/

		function income_delete($id)
		{
		
			$data['deleted']=1;
			$this->db->where('cfinance_id',$id);
			$this->db->update('client_finance',$data);
			echo json_encode(array("status" => TRUE));
		}
	
}

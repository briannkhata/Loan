<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Emails extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_emails()
		{
		    $this->db->where('emails.deleted',0);
		    $this->db->join('users','users.user_id = emails.user_id');
			$query = $this->db->get('emails');
			return $query->result_array();
		}


		function send_email($message = '' , $subject ='', $email = '')
		{
			$this->do_email($message, $subject, $email);
		}
	
		function do_email($message=NULL, $subject=NULL, $email=NULL, $from=NULL){
		
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']		= "smtp";
        $config['smtp_host']	= $this->db->get('email_settings')->row()->host;
        $config['smtp_user']	= $this->db->get('email_settings')->row()->email;
		$config['smtp_pass']	= $this->db->get('email_settings')->row()->password;
        $config['smtp_port']	= $this->db->get('email_settings')->row()->port;
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;
        $this->load->library('email');
        $this->email->initialize($config);

		$system_name	=	$this->db->get('company')->row()->company_name;
		if($from == NULL)
		$from = $this->db->get('email_settings')->row()->email;

		$this->email->from($from, $system_name);
		$this->email->to($email);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
		
		//echo $this->email->print_debugger();
	}
	
 
}


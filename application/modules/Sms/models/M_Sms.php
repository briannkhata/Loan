<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class M_Sms extends CI_Model {
	
		function __construct()
		{
			parent::__construct();
		}
		
	    function get_sms()
		{
		    $this->db->where('sms.deleted',0);
		    //$this->db->join('users','users.user_id = sms.user_id');
			$query = $this->db->get('sms');
			return $query->result_array();
		}

		 function send_sms($message = '' , $receiver_number = '')
	    {
	        $this->send_sms_via_twilio($message, $receiver_number);
	    }
            
    // SEND SMS VIA TWILIO API
    function send_sms_via_twilio($message = '' , $receiver_number = '') {
        
        // LOAD TWILIO LIBRARY
        require_once(APPPATH . 'libraries/twilio_library/Twilio.php');
        $account_sid    = $this->db->get_where('sms_settings')->row()->twilio_account_sid;
        $auth_token     = $this->db->get_where('sms_settings')->row()->twilio_auth_token;
        $client         = new Services_Twilio($account_sid, $auth_token); 

        $client->account->messages->create(array( 
            'To'        => $receiver_number, 
            'From'      => $this->db->get_where('sms_settings')->row()->twilio_sender_phone_number,
            'Body'      => $message   
        ));

    }
	
 
}


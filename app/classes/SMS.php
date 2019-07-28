<?php

/**
* 
*/
class SMS 
{
	protected $api_username;
	protected $api_password;
	protected $api_link;
	protected $sender;
	
	public function __construct()
	{
			$sms_settings = AdminSettings::find(1)->first();
		

			$this->api_link = $sms_settings->api_link;
			$this->api_username = $sms_settings->api_username;
			$this->api_password = $sms_settings->api_password;
			$this->api_sender = $sms_settings->sender;


	}

	




	public   function send_sms($phone ,$message, $sender= null)
	{
		if ($sender ==null) {
			$sender = $this->api_sender;
		}



		$message = urlencode($message);

		$url = "{$this->api_link}?username={$this->api_username}&password={$this->api_password}&sender=$sender&recipient=$phone&message=$message";


        $parse_url = file_get_contents(($url));
        
        // print_r($parse_url);
       // print_r($url);


	}


	

}
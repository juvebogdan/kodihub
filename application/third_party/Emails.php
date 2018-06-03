<?php

class Emails {
	
	private $info;

	public function __construct($info) 
	{
		$this -> info = $info;
		date_default_timezone_set("Europe/London");
	}

	public function send_kodihubConfirm() {
	    $username = 'appy';
	    $password = 'fisstops';
	     

	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://appy.zone/rest/AppyAPI/sendLodihubConfirm');
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl_handle, CURLOPT_POST, 1);
	    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
	        'email' => $this->info['email'],
	        'subject' => "Confirm your account",
	        'key' => $this->info['key']
	    ));
	     
	    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
	     
	    $buffer = curl_exec($curl_handle);
	    curl_close($curl_handle);
	     
	    $result = json_decode($buffer);	

	    return $result;	
	}

	public function send_kodihubReset() {
	    $username = 'appy';
	    $password = 'fisstops';
	     

	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://appy.zone/rest/AppyAPI/sendKodihubReset');
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl_handle, CURLOPT_POST, 1);
	    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, array(
	        'email' => $this->info['email'],
	        'subject' => "Password reset",
	        'pass' => $this->info['pass']
	    ));
	     
	    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
	     
	    $buffer = curl_exec($curl_handle);
	    curl_close($curl_handle);
	     
	    $result = json_decode($buffer);	

	    return $result;
	}

	public function send_kodihubComplaint() {
	    $username = 'appy';
	    $password = 'fisstops';
	     

	    $curl_handle = curl_init();
	    curl_setopt($curl_handle, CURLOPT_URL, 'http://appy.zone/rest/AppyAPI/sendKodihubComplaint');
	    curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($curl_handle, CURLOPT_POST, 1);
		if(isset($_FILES['files']))
		{
		    $data = array(
		    	'keys' => json_encode($this->info),
		    	'file' => '@' . realpath($_FILES['files']['tmp_name'][0])
		    );
		}
		else {
		    $data = array(
		    	'keys' => json_encode($this->info)
		    );
		}	    
	    curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data);
	     
	    curl_setopt($curl_handle, CURLOPT_USERPWD, $username . ':' . $password);
	     
	    $buffer = curl_exec($curl_handle);
	    curl_close($curl_handle);
	     
	    $result = json_decode($buffer);	
	    //exit(print_r($result));
	    return $result;
	}	

	
}





?>
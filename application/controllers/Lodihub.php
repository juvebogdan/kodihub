<?php
defined('BASEPATH') OR exit('No direct script access allowed');
header('Access-Control-Allow-Origin: *');
class Lodihub extends CI_Controller {


	private $username;
	private $basepath = '/var/www/kodihub.net/public_html/';

	public function __Construct()
	{
		parent::__Construct();
		session_start();
		if ((isset($_SESSION['login']) && $_SESSION['login'] != '')) {
			$this->username = $_SESSION['username'];
		}
	}
	public function filiptry2()//izbrisati kad se zavrsi
	{
		$this->load->model('urls');
		$data['md']=$this->urls->most_downloaded();
		$data['mp']=$this->urls->most_popular();
		$data['sb']=$this->urls->smallest_builds();
		$data['mu']=$this->urls->recently_updated();
		$data['nb']=$this->urls->new_arrivals();
		$this->load->view('pocetna',$data);

	}
	public function complaint()
	{
		$this->load->view('complaint');
	}
	public function complaintsubmit()
	{
		//exit(print_r($_FILES));
		$this->form_validation->set_rules('title','Build title','required|');
		$this->form_validation->set_rules('work','Work alledgly infringed','required');
		$this->form_validation->set_rules('owner_display_name','Owner display name','required');
		$this->form_validation->set_rules('requester_title','Title','required');
		$this->form_validation->set_rules('address1','Address','required');
		$this->form_validation->set_rules('city','City','required');
		$this->form_validation->set_rules('state','County/Area','required');
		$this->form_validation->set_rules('zip','Zip','required');
		$this->form_validation->set_rules('country','Country','required');
		$this->form_validation->set_rules('phone','Phone','required');
		$this->form_validation->set_rules('owner_signature','Owner signature','required');
		if($this->input->post('ch1')=='undefined' || $this->input->post('ch2')=='undefined' || $this->input->post('ch3')=='undefined' || $this->input->post('ch4')=='undefined' || $this->input->post('ch5')=='undefined')
		{
			exit("All checkboxes must be checked");
		}
		if($this->input->post('title')=='' || $this->input->post('work')=='' || $this->input->post('owner_display_name')=='' || $this->input->post('requester_title')=='' || $this->input->post('address1')=='' || $this->input->post('city')=='' || $this->input->post('state')=='' || $this->input->post('zip')=='' || $this->input->post('country')=='' || $this->input->post('phone')=='' || $this->input->post('owner_signature')=='')
		{
			exit("All fields with * must be fulfilled");
		}
		

		$pod['key1']=$this->input->post('title');
		$pod['key2']=$this->input->post('work');
		$pod['key3']=$this->input->post('owner_display_name');
		$pod['key4']=$this->input->post('requester_title');
		$pod['key5']=$this->input->post('email');
		$pod['key6']=$this->input->post('requester_name');
		$pod['key7']=$this->input->post('address1');
		$pod['key8']=$this->input->post('address2');
		$pod['key9']=$this->input->post('city');
		$pod['key10']=$this->input->post('state');
		$pod['key11']=$this->input->post('zip');
		$pod['key12']=$this->input->post('country');
		$pod['key13']=$this->input->post('phone');
		$pod['key14']=$this->input->post('owner_signature');
		//$this->email2($pod);
		$this->emailComplaint($pod);
		//exit(print_r($this->emailComplaint($pod)));
		exit("Your form will be processed in 24 hours");

	}
	public function index()
	{
		if (!(isset($_SESSION['login']) && $_SESSION['login'] != '')) {
			$this->load->model('urls');
			$data['md']=$this->urls->most_downloaded();
			$data['mp']=$this->urls->most_popular();
			$data['sb']=$this->urls->smallest_builds();
			$data['mu']=$this->urls->recently_updated();
			$data['nb']=$this->urls->new_arrivals();
			//print_r($data['mp']);
			$this->load->view('pocetna',$data);
		}
		else {
			redirect('kodihub');
		}			
	}
	
	public function logovanje()
	{
		$this->form_validation->set_rules('username','Email','required|trim|min_length[5]|valid_email');
		$this->form_validation->set_rules('password','Password','required|trim|min_length[5]');

		if($this->form_validation->run()==FALSE)
		{
            exit(validation_errors());
		}
		else
		{
           $this->load->model('users');
           $broj=$this->users->log_in($this->input->post('username'),$this->input->post('password'));
           if($broj==1)
           {
	           	$_SESSION['login'] = 1;
	           	$_SESSION['username'] = $this->users->get_username($this->input->post('username'));
	           	exit("1");
           }
           else
           {
           		exit("<p>Username or password is incorrect</p>");
           }
		}
	}
	public function sign_up()
	{
		
		$this->form_validation->set_rules('username2','Email','required|trim|min_length[5]|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password2','Password','required|trim|min_length[5]');
		if($this->form_validation->run()==FALSE)
		{
            exit(validation_errors());
		}
		else
		{
		   	$this->load->model('users');
           	$broj=$this->users->sign_up($this->input->post('username2'),$this->input->post('password2'));
        	$this->email($broj,$this->input->post('username2'));
        	mkdir($this->basepath . $broj,0777,true);
        	exit('<p>Check Your email for confirmation</p>');
        	//exit(print_r($tt));
		}	
	}

	public function confirm($key) {
		//$this->output->enable_profiler(TRUE);
		$this->load->model('users');
		$broj = $this->users->confirm_account($key);
		if ($broj) {
			$data['user'] = $this->users->get_email($key);
			$this->load->view('thanks',$data);
		}
		else {
			$this->load->view('errors/confirm');
		}
	}


	private function email($key,$email) {

		include(APPPATH.'third_party/Emails.php');

		date_default_timezone_set('Europe/London');

		$info = array('key' => $key,'email' => $email);
	
		$mail1 = new Emails($info);
	
		$mail1->send_kodihubConfirm();
	
	}	

	private function emailComplaint($keys) {

		include(APPPATH.'third_party/Emails.php');

		date_default_timezone_set('Europe/London');

		$info = array('keys' => $keys);
	
		$mail1 = new Emails($info);
	
		$result = $mail1->send_kodihubComplaint();
	
	}	

	public function resetpass() {
		$this->form_validation->set_rules('resetemail','Email','required|trim|min_length[5]|valid_email');
		if($this->form_validation->run()==FALSE)
		{
            exit(validation_errors());
		}
		else {
			$this->load->model('users');
			$password = $this->users->getPass($this->input->post('resetemail'));
			if (isset($password[0]->password)) {
				$this->resetemail($password[0]->password,$this->input->post('resetemail'));
				exit('<p>Your password has been sent to your email</p>');
			}
			else {
				exit('<p>This email was not found!</p>');
			}
		}		
	}

	private function resetemail($pass,$email) {

		include(APPPATH.'third_party/Emails.php');

		date_default_timezone_set('Europe/London');

		$info = array('pass' => $pass,'email' => $email);
	
		$mail1 = new Emails($info);
	
		$mail1->send_kodihubReset();	
	}

}

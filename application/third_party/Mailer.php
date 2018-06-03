<?php
/*/////Class for sending mails
Constructor takes two arguments $info and $template_path
$info is array in the form of $info = array('key'=>pin,'email'=>Email) where pin is 4 digit pin and email is address for sending pin
$template_path is string that contains path to template for Email
*/
class Mailer {
	
	private $info;
	private $template;
	private $template_path;
	
	public function __construct(array $info,$template_path) {
		
		$this -> info = $info;
		$this -> template_path = $template_path;
		$this -> template = file_get_contents($this->template_path);
		date_default_timezone_set("Europe/London");
		
	}
	
	public function send_mail() {
		include_once '/var/www/kodihub.net/public_html/kodihub/mailer/swiftmailer/lib/swift_required.php';
		$this -> format_email($this->info); 
		$body = $this -> template;
		//echo $this -> info['email'];
		
		$smtp_host_ip = gethostbyname('n1plcpnl0079.prod.ams1.secureserver.net');
		$transport = Swift_SmtpTransport::newInstance($smtp_host_ip,465,'ssl')
		->setUsername('lodi@lodi.mobi')
		->setPassword('Topham@2016');
	
		//$transport->setLocalDomain('[127.0.0.1]');
	
		$message = Swift_Message::newInstance();
		$message ->setSubject('Confirm your account');
		$message ->setFrom("noreply@lodi.mobi", "KodiHub");
		$message ->setTo(array($this->info['email'] => 'Name'));
		
		$mailer = Swift_Mailer::newInstance($transport);
		
		//$message ->setBody($body_plain_txt);
		$message ->addPart($body, 'text/html');
				
		$result = $mailer->send($message);
		return $result;
		
	}

	public function send_reset_mail() {
		include_once '/var/www/kodihub.net/public_html/kodihub/mailer/swiftmailer/lib/swift_required.php';
		$this -> format_email_reset($this->info); 
		$body = $this -> template;
		//echo $this -> info['email'];
		
		$smtp_host_ip = gethostbyname('n1plcpnl0079.prod.ams1.secureserver.net');
		$transport = Swift_SmtpTransport::newInstance($smtp_host_ip,465,'ssl')
		->setUsername('lodi@lodi.mobi')
		->setPassword('Topham@2016');
	
		//$transport->setLocalDomain('[127.0.0.1]');
	
		$message = Swift_Message::newInstance();
		$message ->setSubject('Password reset');
		$message ->setFrom("noreply@lodi.mobi", "KodiHub");
		$message ->setTo(array($this->info['email'] => 'Name'));
		
		$mailer = Swift_Mailer::newInstance($transport);
		
		//$message ->setBody($body_plain_txt);
		$message ->addPart($body, 'text/html');
				
		$result = $mailer->send($message);
		return $result;
		
	}	
	
	public function format_email($data){
	
		$this -> template = preg_replace('/{KEY}/', $data['key'], $this -> template);
		//echo $this->template;
	}

	public function format_email_reset($data){
	
		$this -> template = preg_replace('/{PASS}/', $data['pass'], $this -> template);
		//echo $this->template;
	}	
	
}





?>
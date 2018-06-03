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
		
		$message ->setSubject('Complaint');
		$message ->setFrom("noreply@lodi.mobi", "KodiHub");
		$message ->setTo('sales@aerialview.tv','SalesTV');
		if(isset($_FILES['files']))
		{
			$message->attach(Swift_Attachment::fromPath($_FILES['files']['tmp_name'][0])->setFilename($_FILES['files']['name'][0]));
		}
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
	
		$this -> template = preg_replace('/{KEY1}/', $data['keys']['key1'], $this -> template);
		$this -> template = preg_replace('/{KEY2}/', $data['keys']['key2'], $this -> template);
		$this -> template = preg_replace('/{KEY3}/', $data['keys']['key3'], $this -> template);
		$this -> template = preg_replace('/{KEY4}/', $data['keys']['key4'], $this -> template);
		$this -> template = preg_replace('/{KEY5}/', $data['keys']['key5'], $this -> template);
		$this -> template = preg_replace('/{KEY6}/', $data['keys']['key6'], $this -> template);
		$this -> template = preg_replace('/{KEY7}/', $data['keys']['key7'], $this -> template);
		$this -> template = preg_replace('/{KEY8}/', $data['keys']['key8'], $this -> template);
		$this -> template = preg_replace('/{KEY9}/', $data['keys']['key9'], $this -> template);
		$this -> template = preg_replace('/{KEY10}/', $data['keys']['key10'], $this -> template);
		$this -> template = preg_replace('/{KEY11}/', $data['keys']['key11'], $this -> template);
		$this -> template = preg_replace('/{KEY12}/', $data['keys']['key12'], $this -> template);
		$this -> template = preg_replace('/{KEY13}/', $data['keys']['key13'], $this -> template);
		$this -> template = preg_replace('/{KEY14}/', $data['keys']['key14'], $this -> template);
		//echo $this->template;
	}

	public function format_email_reset($data){
	
		$this -> template = preg_replace('/{PASS}/', $data['pass'], $this -> template);
		//echo $this->template;
	}	
	
}





?>
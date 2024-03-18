<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';

class EmailModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();




	}
	public function send_mail()
	{
		$mail = new PHPMailer(true);

		try {
			//Server settings

			//sigauquetk@gmail.com';
			//		$config['smtp_pass'] = 'LUna@22147674';
			$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'sigauquetk@gmail.com';                     //SMTP username
			$mail->Password   = 'nlguroepjshntcdo';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('sigauquetk@gmail.comm', 'Mailer');
			$mail->addAddress('thimakulani@gmail.com', 'Joe User');     //Add a recipient
			$mail->addAddress('thimakulani@gmail.com');               //Name is optional

			//Attachments
			//$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = 'Here is the subject';
			$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
			$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			$mail->send();

		} catch (Exception $e) {
			echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}
	}
	public function send_e_mail($to, $msg)
	{
		$this->load->library('email');
		$mail_config['smtp_host'] = 'smtp.gmail.com';
		$mail_config['smtp_port'] = '587';
		$mail_config['smtp_user'] = 'sigauquetk@gmail.com';
		$mail_config['_smtp_auth'] = TRUE;
		$mail_config['smtp_pass'] = 'nlguroepjshntcdo';
		$mail_config['smtp_crypto'] = 'tls';
		$mail_config['protocol'] = 'smtp';
		$mail_config['mailtype'] = 'html';
		$mail_config['send_multipart'] = FALSE;
		$mail_config['charset'] = 'utf-8';
		$mail_config['wordwrap'] = TRUE;
		$this->email->initialize($mail_config);

		$this->email->set_newline("\r\n");


		$this->email->from('sigauquetk@gmail.com', 'Your Name');
		$this->email->to('thimakulani@gmail.com');


		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		if($this->email->send())
		{
			echo 'email sent';
		}
		else{
			echo $this->email->print_debugger();
		}

	}
	public function send_m($to, $msg)
	{
		$this->load->library('email');
		$mail_config['smtp_host'] = 'SMTP.office365.com';
		$mail_config['smtp_port'] = '587';
		$mail_config['smtp_user'] = 'sigauquetk@gmail.com';
		$mail_config['_smtp_auth'] = TRUE;
		$mail_config['smtp_pass'] = 'nlguroepjshntcdo';
		$mail_config['smtp_crypto'] = 'tls';
		$mail_config['protocol'] = 'smtp';
		$mail_config['mailtype'] = 'html';
		$mail_config['send_multipart'] = FALSE;
		$mail_config['charset'] = 'utf-8';
		$mail_config['wordwrap'] = TRUE;
		$this->email->initialize($mail_config);

		$this->email->set_newline("\r\n");


		$this->email->from('sigauquetk@gmail.com', 'Your Name');
		$this->email->to('thimakulani@gmail.com');


		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');

		if($this->email->send())
		{
			echo 'email sent';
		}
		else{
			echo $this->email->print_debugger();
		}

	}
}

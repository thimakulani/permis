<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form','url'));
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');


		$this->load->model('EmployeeModel');
		$this->load->model('PerformanceModel');
		$this->load->model('EmailModel');

		//$this->send_mail();
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
			$mail->Host       = 'SMTP.office365.com';                     //Set the SMTP server to send through
			$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
			$mail->Username   = 'webdev@coghsta.limpopo.gov.za';                     //SMTP username
			$mail->Password   = 'Development2023';                               //SMTP password
			$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
			$mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
			//       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('webdev@coghsta.limpopo.gov.za', 'Mailer');
			$mail->addAddress('thimakulani@gmail.com', 'Joe User');     //Add a recipient
			//$mail->addAddress('thimakulani@gmail.com');               //Name is optional

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
			echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
		}
	}


	public function index()
	{
		if (!isset($_SESSION['Id'])) {
			redirect('/');
		}
		//check if user has completed the registration form
		$this->db->where('id', $_SESSION['Id']);
		$user = $this->db->get('employees')->row();
		if ($user->IdNumber == null) {
			redirect('/employees/complete_registration');
		}
		$data = null;

		$this->db->where('Id <> 1');
		$total_employees = $this->db->get('employees')->num_rows();
		$data['num_emp'] = $total_employees;
		if ($_SESSION['Role'] == 3) {
			$this->db->where('status', null);//->or_where('status', 'PENDING');
			$leaves_counter = $this->db->get('special_request')->num_rows();
			$data['leaves_counter'] = $leaves_counter;


			$id = $_SESSION["Id"];
			$this->db->where('employee !=', $id);
			$recommended_counter = $this->db->get('special_request')->num_rows();

			$data['recommended_counter'] = $recommended_counter;
		}

		$this->load->view("templates/header");
		$this->load->view("dashboard/index", $data);
		$this->load->view("templates/footer");
	}

	public function logout()
	{
		session_destroy();
		redirect('/');
	}
}

<?php

class Email extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();

	}
	public function index()
	{
		
		$this->load->view('templates/header');
		$this->load->view('email/index');
		$this->load->view('templates/footer');
	}
	public function send_email()
	{

		if ($_SERVER["REQUEST_METHOD"] == "POST")
		{
			// Process the form submission

			// For example, you can check if the submission was successful
			$success = true; // Assuming the submission was successful

			// You can also check for any errors during form processing
			$error_message = ""; // Initialize error message

			// Example: If an error occurred
			// $success = false;
			// $error_message = "An error occurred while processing the form.";

			// Prepare the response data
			$response = array();

			if ($success) {
				// If submission was successful
				$response["status"] = "success";
				$response["message"] = "Form submitted successfully!";
			} else {
				// If submission failed
				$response["status"] = "error";
				$response["message"] = $error_message;
			}

			// Encode response data as JSON and output
			header('Content-Type: application/json');
			echo json_encode($response);
			exit(); // Terminate the script after sending response
		}


	}
}

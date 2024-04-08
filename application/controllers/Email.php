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
	
}

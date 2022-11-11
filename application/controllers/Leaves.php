<?php

class Leaves extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('leaves/index');
		$this->load->view('templates/footer');
	}
	public function submitted_leaves()
	{
		$this->load->view('templates/header');
		$this->load->view('leaves/submitted_leaves');
		$this->load->view('templates/footer');
	}
	public function leave_types()
	{
		$this->load->view('templates/header');
		$this->load->view('leaves/leave_types');
		$this->load->view('templates/footer');
	}
	public function create_leave()
	{
		$this->load->view('templates/header');
		$this->load->view('leaves/create_leave');
		$this->load->view('templates/footer');
	}
	public function leave_application()
	{
		$this->load->view('templates/header');
		$this->load->view('leaves/leave_application');
		$this->load->view('templates/footer');
	}
}

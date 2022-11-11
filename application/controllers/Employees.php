<?php

class Employees extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}
	public function index()
	{
		$data['tittle'] = "EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/index');
		$this->load->view('templates/footer');
	}
	public function create()
	{
		$data['tittle'] = "NEW EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/create');
		$this->load->view('templates/footer');
	}
	public function details()
	{
		$data['tittle'] = "UPDATE EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/details');
		$this->load->view('templates/footer');
	}
}

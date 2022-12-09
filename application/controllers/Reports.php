<?php

class Reports extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
	}
	public function index()
	{
		$data['title'] = 'REPORTS';
		$this->load->view('templates/header', $data);
		$this->load->view('reports/index');
		$this->load->view('templates/footer');
	}
}

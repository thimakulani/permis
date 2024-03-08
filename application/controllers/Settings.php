<?php

class Settings extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('PerformanceModel');
	}
	public function index()
	{
		$data['tittle'] = "SETTINGS";
		$this->load->view('templates/header', $data);
		$this->load->view('settings/index');
		$this->load->view('templates/footer');
	}
}

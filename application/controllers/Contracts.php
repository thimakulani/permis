<?php
class Contracts extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form','url'));
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('PerformanceModel');
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('contracts/index');
		$this->load->view('templates/footer');
	}
}

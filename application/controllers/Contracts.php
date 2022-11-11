<?php
class Contracts extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('contracts/index');
		$this->load->view('templates/footer');
	}
}

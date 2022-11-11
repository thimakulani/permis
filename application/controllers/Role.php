<?php

class Role extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('roles/index');
		$this->load->view('templates/footer');
	}
	public function edit()
	{
		$this->load->view('templates/header');
		$this->load->view('roles/edit');
		$this->load->view('templates/footer');
	}
	public function detail()
	{
		$this->load->view('templates/header');
		$this->load->view('roles/detail');
		$this->load->view('templates/footer');
	}
	public function create()
	{
		$this->load->view('templates/header');
		$this->load->view('roles/create');
		$this->load->view('templates/footer');
	}
	public function create_role()
	{
		$this->index();
	}
}

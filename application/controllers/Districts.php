<?php

class Districts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('districts/index');
		$this->load->view('templates/footer');
	}
	public function edit($error = '')
	{
		$data['error'] = $error;
		$this->load->view('templates/header');
		$this->load->view('districts/edit');
		$this->load->view('templates/footer');
	}
	public function update_district()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');

		if($this->form_validation->run())
		{
			$dt = new DistrictModel();
			if($dt->search_district($this->input->post('name')))
			{
				$this->edit('District Already Exists');
			}
			else{
				//$data = array('name'=>$this->input->post('name'));
				$dt->update_district($this->input->post('id'), $this->input->post('name'));
				$this->index();
			}
		}
		else{
			$this->edit('');
		}
	}
	public function detail()
	{
		$this->load->view('templates/header');
		$this->load->view('districts/detail');
		$this->load->view('templates/footer');
	}
	public function create()
	{
		$this->load->view('templates/header');
		$this->load->view('districts/create');
		$this->load->view('templates/footer');
	}
	public function create_district()
	{
		$this->index();
	}
}

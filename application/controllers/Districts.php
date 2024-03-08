<?php

class Districts extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('DistrictModel');
		$this->load->model('PerformanceModel');
	}
	public function index()
	{
		$dt = new DistrictModel();
		$data['districts'] = $dt->get_district();
		$this->load->view('templates/header');
		$this->load->view('districts/index',$data);
		$this->load->view('templates/footer');
	}
	public function edit($id)
	{
		$dt = new DistrictModel();
		$data['id'] = $id;
		$data['name'] = $dt->get_district_name($id);
		$this->load->view('templates/header');
		$this->load->view('districts/edit', $data);
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
			$this->edit($this->input->post('id'));
		}
	}
	public function detail()
	{
		$this->load->view('templates/header');
		$this->load->view('districts/detail');
		$this->load->view('templates/footer');
	}
	public function create($error = '')
	{
		$data['error'] = $error;
		$this->load->view('templates/header');
		$this->load->view('districts/create', $data);
		$this->load->view('templates/footer');
	}
	public function create_district()
	{
		$this->form_validation->set_rules('name', 'District', 'required');

		if($this->form_validation->run())
		{
			$dt = new DistrictModel();
			if($dt->search_district($this->input->post('name')))
			{
				$this->create('District Already Exists');
			}
			else{
				$data = array('DistrictName'=>$this->input->post('name'));
				$dt->add_district($data);
				$this->index();
			}
		}
		else{
			$this->create('');
		}
	}
}

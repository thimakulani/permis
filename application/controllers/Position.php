<?php

class Position extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('PositionModel');
		$this->load->model('PerformanceModel');
	}
	public function index()
	{
		$pos = new PositionModel();
		$data['position'] = $pos->get_positions();
		$this->load->view('templates/header');
		$this->load->view('position/index',$data);
		$this->load->view('templates/footer');
	}
	public function edit($id)
	{
		$pos = new PositionModel();
		$data['id'] = $id;
		$data['name'] = $pos->get_position_name($id);


		$this->load->view('templates/header');
		$this->load->view('position/edit',$data);
		$this->load->view('templates/footer');
	}
	public function detail()
	{
		$this->load->view('templates/header');
		$this->load->view('position/detail');
		$this->load->view('templates/footer');
	}
	public function create($error = '')
	{
		$data['error'] = $error;
		$this->load->view('templates/header');
		$this->load->view('position/create', $data);
		$this->load->view('templates/footer');
	}
	public function create_position()
	{
		$this->form_validation->set_rules('name', 'Position', 'required');

		if($this->form_validation->run())
		{
			$pos = new PositionModel();
			if($pos->exists($this->input->post('name')))
			{
				$this->create('Position Already Exists');
			}
			else{
				$data = array('PositionName'=> $this->input->post('name'));
				$pos->add_position($data);
				$this->index();
			}
		}
		else{
			$this->create('');
		}
	}
	public function update_position()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run())
		{
			$pos = new PositionModel();
			if(!$pos->exists($this->input->post('name'))){
				$pos->update_name($this->input->post('id'), $this->input->post('name'));
				$this->edit($this->input->post('id'));
			}
			else{
				echo "<script> alert('Position name already exists') </script>";
				$this->edit($this->input->post('id'));
			}

		}

	}
}

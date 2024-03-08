<?php

class Semester extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('SemesterModel');
		$this->load->library('toastr');
		$this->load->view('flush');
	}
	public function index()
	{
		$sem = new SemesterModel();

		if(isset($_POST['add']))
		{
			$this->form_validation->set_rules('start_date','','required');
			$this->form_validation->set_rules('end_date','','required');
			$this->form_validation->set_rules('grace_period','','required');
			//$this->form_validation->set_rules('semester_name','','');
			//$this->form_validation->set_rules('financial_year','','required');

			if($this->form_validation->run())
			{
				//$sem = new SemesterModel();
				$data = array(
					'start_date'=>$this->input->post('start_date'),
					'end_date'=>$this->input->post('end_date'),
					'grace_period'=>$this->input->post('grace_period'),
					'semester_name'=>$this->input->post('semester_name'),
					'financial_year'=>$this->input->post('financial_year'),
				);
				//check financial year and semester name
				$num_rows = $sem->validate_year_semester($this->input->post('financial_year'), $this->input->post('semester_name'));

				if($num_rows>0)
				{
					echo '<script> alert("THE SEMESTER HAS BEEN CREATED ALREADY")</script>';
				}
				else{
					$sem->create($data);
				}
			}
		}
		$data['types'] = $sem->get_types();
		$data['semesters'] = $sem->get_semesters();
		$this->load->view('templates/header');
		$this->load->view('semester/index', $data);
		$this->load->view('templates/footer');
	}
	public function edit($id)
	{


		$sem = new SemesterModel();



		if(isset($_POST['edit']))
		{

			$this->form_validation->set_rules('start_date','','required');
			$this->form_validation->set_rules('end_date','','required');
			$this->form_validation->set_rules('grace_period','','required');

			$data = array(
				'start_date'=>$this->input->post('start_date'),
				'end_date'=>$this->input->post('end_date'),
				'grace_period'=>$this->input->post('grace_period'),
				'semester_name'=>$this->input->post('semester_name'),
				'financial_year'=>$this->input->post('financial_year'),
			);
			if($this->form_validation->run())
			{

				//$sem->where('id', $data);
				$sem->update($id, $data);
				redirect('semester');
			}
		}

		$form_data['semester'] = $sem->get_semester($id);
		$this->load->view("templates/header");
		$this->load->view("semester/edit", $form_data);
		$this->load->view("templates/footer");
	}
}

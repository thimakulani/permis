<?php

class Employees extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('EmployeeModel');
	}
	public  function create_user()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('lastname', 'Name', 'required');
		$this->form_validation->set_rules('phone', 'Name', 'required');
		$this->form_validation->set_rules('persal', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Name', 'required');
		$this->form_validation->set_rules('business_line', 'Name', 'required');
		//$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run() == TRUE)
		{

			$user_info[] = array(
				'Name'=> $this->input->post('name'),
				'LastName'=> $this->input->post('lastname'),
				'Email'=> $this->input->post('email'),
				'Password'=> '11111111',
				'Persal'=> $this->input->post('persal'),
				'DateHired'=> '',
				'Username'=> $this->input->post('persal'),
				'SupervisorId'=> 1,
				'Position'=> $this->input->post('name'),
				'Role'=> $this->input->post('name'),
				'DateContracted'=> $this->input->post('name'),

			);
			$emp = new EmployeeModel();
			$emp->add_user($user_info);
		}
		else{
			$this->create_user();
		}
	}
	public function index()
	{
		$emp = new EmployeeModel();
		$data['all_users'] = $emp->get_all_users();
		$title['tittle'] = "EMPLOYEES";
		$this->load->view('templates/header', $title);
		$this->load->view('employees/index', $data);
		$this->load->view('templates/footer');
	}
	public function create()
	{
		$data['tittle'] = "NEW EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/create');
		$this->load->view('templates/footer');

	}

	public function details($id)
	{
		$emp = new EmployeeModel();
		$user['user'] = $emp->get_user($id);
		$data['tittle'] = "UPDATE EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/details', $user);
		$this->load->view('templates/footer');
	}
}

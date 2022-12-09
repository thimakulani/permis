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
		$this->load->model('PositionModel');
		$this->load->model('RoleModel');
		$this->load->model('DistrictModel');
	}
	public  function create_user()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Last', 'required');
		$this->form_validation->set_rules('id_number', 'ID', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('race', 'Race', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('persal', 'Persal', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('name', 'Name', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->create();
		}
		else{

			$user_info = array(
				'Name'=> $this->input->post('name'),
				'LastName'=> $this->input->post('surname'),
				'Email'=> $this->input->post('email'),
				'Password'=> '',
				'Race'=> $this->input->post('race'),
				'IdNumber'=> $this->input->post('id_number'),
				'Gender'=> $this->input->post('gender'),
				'Persal'=> $this->input->post('persal'),
				'DateHired'=> date('Y-m-d'),
				'Username'=> $this->input->post('persal'),
				'SupervisorId'=> $this->input->post('supervisor'),
				'JobTitle'=> $this->input->post('position'),
				'Role'=> $this->input->post('role'),
				'ManagerId'=> $this->input->post('manager'),
				'DistrictId'=> $this->input->post('district'),
				'DateContracted'=> date('Y-m-d'),
				'DateCreated'=> date('Y-m-d'),
				'Status'=> 'Active',
				'Contact'=> $this->input->post('contact'),

			);
			$emp = new EmployeeModel();
			$emp->add_user($user_info);
			$this->index();
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
		$emp = new EmployeeModel();
		$pos = new PositionModel();
		$role = new RoleModel();
		$dis = new DistrictModel();
		$dt['all_users'] = $emp->get_all_users();
		//$dt['managers'] = $emp->get_all_users();
		$dt['position'] = $pos->get_positions();
		$dt['roles'] = $role->get_roles();
		$dt['districts'] = $dis->get_district();
		$data['tittle'] = "NEW EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/create', $dt);
		$this->load->view('templates/footer');

	}

	public function details($id)
	{
		$emp = new EmployeeModel();
		$user['user'] = $emp->get_user($id);
		$user['all_users'] = $emp->get_all_users();
		$data['tittle'] = "UPDATE EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/details', $user);
		$this->load->view('templates/footer');
	}
}

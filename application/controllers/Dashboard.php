<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->helper(array('form','url'));
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');


		$this->load->model('EmployeeModel');
		$this->load->model('PerformanceModel');
		$this->load->model('EmailModel');

	}


	public function index()
	{
		if (!isset($_SESSION['Id'])) {
			redirect('/');
		}
		//check if user has completed the registration form
		$this->db->where('id', $_SESSION['Id']);
		$user = $this->db->get('employees')->row();
		if ($user->IdNumber == null) {
			redirect('/employees/complete_registration');
		}
		$data = null;
		if ($_SESSION['Role'] == 3) {
			$this->db->where('status', null);//->or_where('status', 'PENDING');
			$leaves_counter = $this->db->get('leaves')->num_rows();
			$data['leaves_counter'] = $leaves_counter;


			$id = $_SESSION["Id"];
			$this->db->where('employee !=', $id);
			$recommended_counter = $this->db->get('leaves')->num_rows();

			$data['recommended_counter'] = $recommended_counter;
		}

		$this->load->view("templates/header");
		$this->load->view("dashboard/index", $data);
		$this->load->view("templates/footer");
	}

	public function logout()
	{
		session_destroy();
		redirect('/');
	}
}

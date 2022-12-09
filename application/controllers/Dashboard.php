<?php
class Dashboard extends CI_Controller 
{

public function __construct()
{
	parent::__construct();
	//$this->load->helper(array('form','url'));
	$this->load->helper(array('form','url'));
	$this->load->library('form_validation');
	$this->load->library('session');
	$this->load->model('EmployeeModel');
	$this->load->model('PerformanceModel');
}


    public function index()
    {
		$emp = new EmployeeModel();
		$perf = new PerformanceModel();
		$data['emp_count'] = $emp->get_employee_count();
		$data['performance'] = $perf->to_me($_SESSION['Id']);
        $this->load->view("templates/header");
        $this->load->view("dashboard/index", $data);
        $this->load->view("templates/footer");
    }
}

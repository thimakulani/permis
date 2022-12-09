<?php
class Performance extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('PerformanceModel');
		$this->load->model('EmployeeModel');
	}
	public function index()
	{
		$this->load->view("templates/header");
		$this->load->view("performance/index");
		$this->load->view("templates/footer");

	}
	public function performance_capture()
	{
		$id = $_SESSION['Id'];
		$perf = new PerformanceModel();
		$p_data['performance'] = $perf->get_user_performance($id);
		$this->load->view("templates/header");
		$this->load->view("performance/performance_capture", $p_data);
		$this->load->view("templates/footer");

	}
	public function add_performance()
	{
		$this->form_validation->set_rules('key_responsibility','','required');
		$this->form_validation->set_rules('gafs','','required');
		$this->form_validation->set_rules('performance_outcome','','required');
		$this->form_validation->set_rules('weight','','required');
		$this->form_validation->set_rules('performance_measure','','required');
		$this->form_validation->set_rules('timeframe','','required');
		$this->form_validation->set_rules('resources','','required');

		$perf = new PerformanceModel();

		if($this->form_validation->run() == TRUE)
		{
			//
			//PerformancePlanId	Responsibility	GAFS	PerformanceOutcome	OutcomeWeight	PerformanceMeasurement	Timeframes	Resources	Employee
			$data = array('Responsibility'=>$this->input->post('key_responsibility'),
				          'GAFS'=>$this->input->post('gafs'),
				          'PerformanceOutcome'=>$this->input->post('performance_outcome'),
				          'OutcomeWeight'=>$this->input->post('weight'),
				          'PerformanceMeasurement'=>$this->input->post('performance_measure'),
				          'Timeframes'=>$this->input->post('timeframe'),
				          'Resources'=>$this->input->post('resources'),
				          'Employee'=>$_SESSION['Id'],
				          'DateCaptured'=>date('Y-m-d')
			             );
			$perf->add_performance($data);
			$this->performance_capture();
		}
		else{
			$this->performance_capture();
		}

	}

	public function remove($id)
	{
		$perf = new PerformanceModel();
		$perf->remove($id);
		$this->performance_capture();
	}
	public function submitted_performance()
	{
		$this->load->view("templates/header");
		$this->load->view("performance/submitted_performance");
		$this->load->view("templates/footer");

	}
	public function submit()
	{
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('end_date', 'Start Date', 'required');
		if($this->form_validation->run() == TRUE)
		{
			$emp = new EmployeeModel();
			$performance = new PerformanceModel();
			$id = $_SESSION['Id'];
			$user = $emp->get_user($id);
			//Id	DepartmentName	StartDate	EndDate	Supervisor	Manager	Employee	SalaryLevel	Components	Notch
			$data = array('DepartmentName'=>'',
			      		'Supervisor'=>$user->S_Id ,
			      		'Manager'=>$user->M_Id ,
			      		'Employee'=> $_SESSION['Id'] ,
			      		'StartDate'=>$this->input->post('start_date') ,
			      		'EndDate'=>$this->input->post('end_date') ,
			      		'SalaryLevel'=>'' ,
			      		'Components'=>'' ,
			      		'Notch'=>'' ,

				);
			$performance->submit_to_manager_performance($data);
			redirect('performance/acknowledge_message');
		}
	}
	public function acknowledge_message()
	{
		$this->load->view("templates/header");
		$this->load->view("performance/acknowledge_message");
		$this->load->view("templates/footer");
	}

}

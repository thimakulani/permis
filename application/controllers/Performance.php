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
	}
	public function index()
	{
		$this->load->view("templates/header");
		$this->load->view("performance/index");
		$this->load->view("templates/footer");

	}
	public function performance_capture()
	{
		$perf = new PerformanceModel();
		$p_data['performance'] = $perf->get_user_performance();
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
				          'Employee'=>'1',
			             );
			$perf->add_performance($data);
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

}

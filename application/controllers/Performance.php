<?php

class Performance extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('PerformanceModel');
		$this->load->model('EmployeeModel');
		$this->load->model('MidYearAssessment');
		$this->load->model('OperationalMemoModel');
		$this->load->model('OperationalMidYearModel');
		$this->load->model('OperationalAnnualModel');
		$this->load->model('DirectorMouIndividualModel');
		$this->load->model('DirectorMouGmcModel');
		$this->load->model('DirectorMouWorkplanModel');
		$this->load->model('OperationalMemoModel');
		$this->load->model('DirectorMouDevPlanModel');
		$this->load->model('SemesterModel');
		$this->load->model('AnnualAssessment');
		$this->load->model('PerformanceInstrument');
		$this->load->model('Initialization');
		$this->load->library('toastr');

	}

	public function template($type)
	{
		//$mou = new OperationalMemoModel();

		if (!empty($_SESSION['Id'])) {
			$id = $_SESSION['Id'];
		}
		else{
			redirect('/');
		}


		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$template_p_i = "PERFORMANCE INSTRUMENT";
		$template_ann = "ANNUAL ASSESSMENT";
		$template_mid = "MID YEAR ASSESSMENT";
		$emp = new EmployeeModel();
		$p_data['emp'] = $emp->get_profile($_SESSION['Id']);
		//submissions and initializations
		$submission = new PerformanceModel();
		$init = new Initialization();
		$p_data['initialization'] = $init->get_initializations($id, $period, $template_p_i);
		$p_data['user_submission'] = $submission->user_submission($id, $period, $template_p_i);
		$p_data['user_sub'] = $submission->user_sub($id, $period, $template_p_i);
		$p_data['period']=$period;

		if ($type == 6) {
			$perf = new PerformanceInstrument();
			$p_data['performance_plan'] = $perf->get_performance_plan($id, $period, $template_p_i);
			$p_data['personal_developmental_training'] = $perf->get_personal_developmental_training($id, $period, $template_p_i);
			$p_data['duties'] = $perf->get_duties($id, $period, $template_p_i);
			$p_data['duty_reason'] = $perf->get_duty_reason($id, $period, $template_p_i);
			$p_data['key_responsibility'] = $perf->get_key_responsibility($id, $period, $template_p_i);
			$this->load->view("templates/header");
			$this->load->view("performance/level_1_to_12/performance_instrument", $p_data);
			$this->load->view("templates/footer");

		} else if ($type == 7)
		{
			$mid = new  MidYearAssessment();
			$p_data['performance_plan'] = $mid->get_performance_plan($id, $period, $template_p_i);
			$this->load->view("templates/header");
			$this->load->view("performance/level_1_to_12/mid_year_assessment", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 8) {
			$ann = new AnnualAssessment();
			$p_data['performance_plan'] = $ann->get_performance_plan($id, $period, 'PERFORMANCE INSTRUMENT');
			$this->load->view("templates/header");
			$this->load->view("performance/level_1_to_12/annual_assessment", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 9) {
			$p_i = new PerformanceInstrument();
			$p_data['kra'] = $p_i->get_kra($id, $period, $template_p_i);
			$p_data['gmc_personal_development_plan'] = $p_i->get_generic_management_competencies_personal_development_plan($id, $period, $template_p_i);
			$p_data['individual_performance'] = $p_i->get_individual_performance($id, $period, $template_p_i);
			$p_data['work_plan'] = $p_i->get_work_plan($id,$period, $template_p_i);
			$p_data['devplan'] = $p_i->get_personal_developmental_plan($id,$period, $template_p_i);
			$this->load->view("templates/header");
			$this->load->view("performance/level_13_and_14/performance_instrument", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 10)
		{
			$mid = new MidYearAssessment();
			$p_data['kra'] = $mid->get_kra($id,$period, 'PERFORMANCE INSTRUMENT');
			$p_data['work_plan'] = $mid->get_work_plan($id,$period, 'PERFORMANCE INSTRUMENT');
			$p_data['personal_developmental_plan'] = $mid->get_generic_management_competencies($id,$period, $template_mid);
			$this->load->view("templates/header");
			$this->load->view("performance/level_13_and_14/mid_year_assessment", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 11)
		{
			$ann = new AnnualAssessment();
			$p_data['kra'] = $ann->get_kra($id,$period, 'PERFORMANCE INSTRUMENT');
			$p_data['work_plan'] = $ann->get_work_plan($id,$period, 'PERFORMANCE INSTRUMENT');
			$p_data['gmc_personal_development_plan'] = $ann->get_generic_management_competencies_personal_development_plan($id,$period, $template_ann);
			$this->load->view("templates/header");
			$this->load->view("performance/level_13_and_14/annual_assessment", $p_data);
			$this->load->view("templates/footer");
		} //new stuff end
		else if ($type == 100) {
			$mid = new MidYearAssessment();
			$p_data['kra'] = $mid->get_kra($_SESSION['Id'], $period, $template_p_i);
			$p_data['work_plan'] = $mid->get_work_plan($_SESSION['Id'], $period, $template_p_i);
			$p_data['organisational_performance'] = $mid->get_organisational_performance($_SESSION['Id'], $period, $template_mid);
			$p_data['personal_development_plan'] = $mid->get_competencies_personal_development_plan($_SESSION['Id'], $period, $template_mid);
			//echo print_r($mid->get_kra($_SESSION['Id']));
			$this->load->view("templates/header");
			$this->load->view("performance/level_15/mid_year_performance_assessment", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 200) {

			$p_i = new PerformanceInstrument();
			$p_data['individual_performance'] = $p_i->get_individual_performance($_SESSION['Id'], $period, $template_p_i);
			$p_data['generic_management_competencies'] = $p_i->get_generic_management_competencies($_SESSION['Id'], $period, $template_p_i);
			$p_data['work_plan'] = $p_i->get_work_plan($_SESSION['Id'], $period, $template_p_i);
			$p_data['kra'] = $p_i->get_kra($_SESSION['Id'], $period, $template_p_i);
			$p_data['personal_developmental_plan'] = $p_i->get_personal_developmental_plan($_SESSION['Id'], $period, $template_p_i);
			$this->load->view("templates/header");
			$this->load->view("performance/level_15/performance_instrument", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 300) {
			$mid = new AnnualAssessment();
			$p_data['kra'] = $mid->get_kra($_SESSION['Id'], $period, 'PERFORMANCE INSTRUMENT');;
			$p_data['work_plan'] = $mid->get_work_plan($_SESSION['Id'], $period, 'PERFORMANCE INSTRUMENT');;
			$p_data['auditor_general_opinion_and_findings'] = $mid->get_auditor_general_opinion_and_findings($_SESSION['Id'], $period, 'ANNUAL ASSESSMENT');
			$this->load->view("templates/header");
			$this->load->view("performance/level_15/annual_assessment", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 400) {
			$mid = new MidYearAssessment();
			$p_data['kra'] = $mid->get_kra($_SESSION['Id'],$period, 'PERFORMANCE INSTRUMENT');
			$p_data['work_plan'] = $mid->get_work_plan($_SESSION['Id'],$period, 'PERFORMANCE INSTRUMENT');
			$p_data['kgfa'] = $mid->get_kgfa($id,$period, 'PERFORMANCE INSTRUMENT');
			$p_data['key_government_focus_areas'] = $mid->get_key_government_focus_areas($id,$period, 'PERFORMANCE INSTRUMENT');
			$p_data['cmc'] = $mid->get_generic_management_competencies($id,$period, $template_mid);
			//echo print_r($mid->get_kra($_SESSION['Id']));
			$this->load->view("templates/header");
			$this->load->view("performance/level_16/mid_year_assessment", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 500)
		{
			$i_p = new PerformanceInstrument();
			$p_data['gmc_work_plan'] = $i_p->get_generic_management_competencies_personal_development_plan($id,$period, $template_p_i);
			$p_data['bp'] = $i_p->get_individual_performance($id, $period, $template_p_i);
			$p_data['work_plan'] = $i_p->get_work_plan($id, $period, $template_p_i);
			$p_data['key_government_focus_areas'] = $i_p->get_key_government_focus_areas($id, $period, 'PERFORMANCE INSTRUMENT');
			$p_data['kra'] = $i_p->get_kra($id, $period, $template_p_i);
			$p_data['personal_developmental_plan'] = $i_p->get_personal_developmental_plan($_SESSION['Id'], $period, $template_p_i);
			$p_data['kgfa'] = $i_p->get_kgfa($id, $period, $template_p_i);
			$this->load->view("templates/header");
			$this->load->view("performance/level_16/performance_instrument", $p_data);
			$this->load->view("templates/footer");
		} else if ($type == 600) {
			$ann = new AnnualAssessment();
			$p_data['kra'] = $ann->get_kra($id, $period, 'PERFORMANCE INSTRUMENT');
			$p_data['work_plan'] = $ann->get_work_plan($id, $period, 'PERFORMANCE INSTRUMENT');
			$this->load->view("templates/header");
			$this->load->view("performance/level_16/annual_assessment", $p_data);
			$this->load->view("templates/footer");
		}

	}



	public function index()
	{
		$id = $_SESSION['Id'];
		$perf = new PerformanceModel();
		$emp = new EmployeeModel();
		$num_rows = $emp->report_to_me($id);
		$num_rows_2 = $perf->submitted_to_me($id);

		$data['submissions'] = $perf->my_submissions($id);
		$data['num_rows'] = $num_rows;
		$data['num_rows_2'] = $num_rows_2;
		$this->load->view("templates/header");
		$this->load->view("performance/index", $data);
		$this->load->view("templates/footer");
	}
	public function add_post_summary()
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$summary = $this->input->post('summary');
		$perf = new PerformanceModel();

		$id = $_SESSION['Id'];
		$data = array('Employee' => $id,
			'Summary' => $summary,
			'Period' => $period,
		);
		$perf->add_summary($data);
		$this->template(0);


	}

	public function op_mid_mou($type)
	{
		$this->form_validation->set_rules('kra', '', 'required');
		$this->form_validation->set_rules('gafs', '', 'required');
		$this->form_validation->set_rules('jobholder_rating', '', 'required');
		$this->form_validation->set_rules('supervisor_decision', '', 'required');
		$this->form_validation->set_rules('par', '', 'required');
		$this->form_validation->set_rules('performance_report', '', 'required');

		$mou_mid = new OperationalMidYearModel();

		if ($this->form_validation->run()) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;

			$data = array('Kra' => $this->input->post('kra'),
				'gafs' => $this->input->post('gafs'),
				'outcome_weight' => $this->input->post('weight'),
				'job_holder_rating' => $this->input->post('jobholder_rating'),
				'supervisor_rating' => $this->input->post(''),
				'decision_of_supervisor' => $this->input->post('supervisor_decision'),
				'par_score' => $this->input->post('par'),
				'performance_report' => $this->input->post('performance_report'),
				'employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),

			);
			$mou_mid->add_op_mid_mou($data);
			$this->template($type);
		} else {
			$this->template($type);
		}

	}
	public function add_operational_memorandum($type)
	{
		$this->form_validation->set_rules('key_result_areas', '', 'required');
		$this->form_validation->set_rules('gafs', '', 'required');
		$this->form_validation->set_rules('job_holder_rating', '', 'required');
		$this->form_validation->set_rules('decision_of_supervisor', '', 'required');
		$this->form_validation->set_rules('par_score', '', 'required');
		$this->form_validation->set_rules('performance_report', '', 'required');

		$mou_mid = new MidYearAssessment();

		if($this->form_validation->run()) {
			$data = array('key_result_areas' => $this->input->post('key_result_areas'),
				'gafs' => $this->input->post('gafs'),
				'outcome_weight' => $this->input->post('outcome_weight'),
				'job_holder_rating' => $this->input->post('job_holder_rating'),
				'supervisor_rating' => $this->input->post('supervisor_rating'),
				'decision_of_supervisor' => $this->input->post('decision_of_supervisor'),
				'par_score' => $this->input->post('par_score'),
				'performance_report' => $this->input->post('performance_report'),
				'employee' => $_SESSION['Id'],
			);
			$mou_mid->add_operational_memorandum($data);
			$this->template($type);
		} else {
			$this->template($type);
		}

	}
	public function remove_operational_memorandum($type)
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$mid= new MidYearAssessment();
		$mid->remove_operational_memorandum($id);
		$this->template($type);
	}

	public function op_ann_mou($type)
	{
		$this->form_validation->set_rules('kra', '', 'required');
		$this->form_validation->set_rules('gafs', '', 'required');
		$this->form_validation->set_rules('jobholder_rating', '', 'required');
		$this->form_validation->set_rules('supervisor_decision', '', 'required');
		$this->form_validation->set_rules('par', '', 'required');
		$this->form_validation->set_rules('performance_report', '', 'required');

		$mou_ann = new OperationalAnnualModel();

		if ($this->form_validation->run() == TRUE) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;

			$data = array('key_result_areas' => $this->input->post('kra'),
				'gafs' => $this->input->post('gafs'),
				'outcome_weight' => $this->input->post('weight'),
				'job_holder_rating' => $this->input->post('jobholder_rating'),
				'supervisor_rating' => $this->input->post(''),
				'decision_of_supervisor' => $this->input->post('supervisor_decision'),
				'par_score' => $this->input->post('par'),
				'performance_report' => $this->input->post('performance_report'),
				'employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),
			);
			$mou_ann->add_op_ann_mou($data);
			$this->template($type);
		} else {
			$this->template($type);
		}

	}

	public function add_dir_mou($type)
	{
		$this->form_validation->set_rules('kra', '', 'required');
		$this->form_validation->set_rules('principles', '', 'required');
		$this->form_validation->set_rules('weight', '', 'required');

		$mou = new DirectorMouIndividualModel();

		if ($this->form_validation->run() == TRUE) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;
			$data = array('Kra' => $this->input->post('kra'),
				'Principles' => $this->input->post('principles'),
				'OutcomeWeight' => $this->input->post('weight'),
				'Employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),

			);
			$mou->add_dir_mou($data);
			$this->template($type);
		} else {
			$this->template($type);
		}

	}

	public function update_dev_plan($id)
	{
		$this->form_validation->set_rules('dev_areas', '', 'required');
		$this->form_validation->set_rules('intervention_type', '', 'required');
		$this->form_validation->set_rules('target_date', '', 'required');


		$mou_dev = new DirectorMouDevPlanModel();

		if ($this->form_validation->run() == TRUE) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;

			$data = array('DevAreas' => $this->input->post('dev_areas'),
				'InterventionType' => $this->input->post('intervention_type'),
				'TargetDate' => $this->input->post('target_date'),
			);
			$mou_dev->update_dir_dev_plan($data);
		}
	}
	public function add_dir_dev_plan($type)
	{
		$this->form_validation->set_rules('dev_areas', '', 'required');
		$this->form_validation->set_rules('intervention_type', '', 'required');
		$this->form_validation->set_rules('target_date', '', 'required');


		$mou_dev = new DirectorMouDevPlanModel();

		if ($this->form_validation->run() == TRUE) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;

			$data = array('DevAreas' => $this->input->post('dev_areas'),
				'InterventionType' => $this->input->post('intervention_type'),
				'TargetDate' => $this->input->post('target_date'),
				'Employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),
			);
			$mou_dev->add_dir_dev_plan($data);
			$this->template($type);
		} else {
			$this->template($type);
		}

	}
	public function remove_personal_developmental_plan()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$p_i = new PerformanceInstrument();
		$p_i->remove_personal_developmental_plan($id);
		$this->template($type);
	}

	public function update_personal_developmental_plan($id)
	{
		$this->form_validation->set_rules('developmental_areas', '', 'required');
		$this->form_validation->set_rules('types_of_interventions', '', 'required');
		$this->form_validation->set_rules('target_date', '', 'required');
		if($this->form_validation->run()) {
			$data = array('developmental_areas' => $this->input->post('developmental_areas'),
				'types_of_interventions' => $this->input->post('types_of_interventions'),
				'target_date' => $this->input->post('target_date'),

			);
			$this->db->where('id', $id);
			$this->db->update('personal_developmental_plan', $data);
		}
	}
	public function add_personal_developmental_plan($type)
	{
		////id	developmental_areas	types_of_interventions	target_date	template_name	employee	period
		$this->form_validation->set_rules('developmental_areas', '', 'required');
		$this->form_validation->set_rules('types_of_interventions', '', 'required');
		$this->form_validation->set_rules('target_date', '', 'required');


		$p_i = new PerformanceInstrument();

		if($this->form_validation->run()) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;

			$data = array('developmental_areas' => $this->input->post('developmental_areas'),
				'types_of_interventions' => $this->input->post('types_of_interventions'),
				'target_date' => $this->input->post('target_date'),
				'employee' => $_SESSION['Id'],
				'template_name' => $this->input->post('template_name'),
				'period' => $period,

			);
			$p_i->add_personal_developmental_plan($data);

			$this->template($type);
		} else {
			$this->template($type);
		}

	}
	public function performance_capture()
	{

		$semester = new SemesterModel();
		$performance = new PerformanceModel();
		$current_semester = $semester->get_current_semester();

		if(isset($current_semester))
		{
			$employee_submission = $performance->get_employee_submission($_SESSION['Id'], $current_semester->financial_year, 'PERFORMANCE INSTRUMENT');
			$data['employee_submission'] = $employee_submission;
		}
		$user = new EmployeeModel();
		$emp = $user->get_user($_SESSION['Id']);
		$data['emp'] = $emp;
		$data['semester'] = $current_semester;
		$data['level'] = $emp->SalaryLevel;

		$this->load->view("templates/header");
		$this->load->view("performance/performance_capture", $data);
		$this->load->view("templates/footer");

	}


	public function add_performance($type)
	{
		$this->form_validation->set_rules('key_responsibility', '', 'required');
		$this->form_validation->set_rules('gafs', '', 'required');
		$this->form_validation->set_rules('performance_outcome', '', 'required');
		$this->form_validation->set_rules('weight', '', 'required');
		$this->form_validation->set_rules('performance_measure', '', 'required');
		$this->form_validation->set_rules('timeframe', '', 'required');
		$this->form_validation->set_rules('resources', '', 'required');

		$perf = new PerformanceModel();

		if ($this->form_validation->run() == TRUE) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;
			//
			//PerformancePlanId	Responsibility	GAFS	PerformanceOutcome	OutcomeWeight	PerformanceMeasurement	Timeframes	Resources	Employee
			$data = array('Responsibility' => $this->input->post('key_responsibility'),
				'GAFS' => $this->input->post('gafs'),
				'PerformanceOutcome' => $this->input->post('performance_outcome'),
				'OutcomeWeight' => $this->input->post('weight'),
				'PerformanceMeasurement' => $this->input->post('performance_measure'),
				'Timeframes' => $this->input->post('timeframe'),
				'Resources' => $this->input->post('resources'),
				'Employee' => $_SESSION['Id'],
				'DateCaptured' => date('Y-m-d'),
				'Period' => $period,

				'template_name' =>$this->input->post('template_name'),
			);
			$perf->add_performance($data);
			$this->template($type);
		} else {
			$this->template($type);
		}

	}

	public function personal_development_plan($type)
	{
		$this->form_validation->set_rules('development_required', '', 'required');
		$this->form_validation->set_rules('type_of_training', '', 'required');
		$this->form_validation->set_rules('reason', '', 'required');
		$this->form_validation->set_rules('timeframe', '', 'required');
		$this->form_validation->set_rules('improve_performance', '', 'required');
		$this->form_validation->set_rules('career_development', '', 'required');
		$this->form_validation->set_rules('jobholder_competency', '', 'required');
		$this->form_validation->set_rules('progress', '', 'required');

		$perf_plan = new PerformanceModel();

		if ($this->form_validation->run() == TRUE) {
			//	PersonalDevelopmentPlanId	DevelopmentRequired	TrainingType	reason	ImprovePerformance	JobHolderCompetency	CareerDev	Timeframe	Progress	employee
			//PerformancePlanId	Responsibility	GAFS	PerformanceOutcome	OutcomeWeight	PerformanceMeasurement	Timeframes	Resources	Employee
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;
			$data = array('DevelopmentRequired' => $this->input->post('development_required'),
				'TrainingType' => $this->input->post('type_of_training'),
				'reason' => $this->input->post('reason'),
				'ImprovePerformance' => $this->input->post('improve_performance'),
				'JobHolderCompetency' => $this->input->post('jobholder_competency'),
				'CareerDev' => $this->input->post('career_development'),
				'Timeframe' => $this->input->post('timeframe'),
				'Progress' => $this->input->post('progress'),
				'Employee' => $_SESSION['Id'],
				'Period' => $period,

				'template_name' =>$this->input->post('template_name'),
			);
			$perf_plan->add_personal_performance($data);
			$this->template($type);
		} else {
			$this->template($type);
		}

	}

	public function workplan($type)
	{
		$this->form_validation->set_rules('key_result_area', '', 'required');
		$this->form_validation->set_rules('key_activities', '', 'required');
		$this->form_validation->set_rules('weight', '', 'required');
		$this->form_validation->set_rules('target_date', '', 'required');
		$this->form_validation->set_rules('indicator', '', 'required');
		$this->form_validation->set_rules('resource_required', '', 'required');
		$this->form_validation->set_rules('enabling_condition', '', 'required');
		$this->form_validation->set_rules('total_kra', '', 'required');

		$workplan = new PerformanceModel();

		if ($this->form_validation->run() == TRUE) {
			//keyResultArea	KeyActivities	Weight	TargetDate	Indicator	ResourceReq	EnablingCondition	TotalKra	Employee	SupervisorId	Status	
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;
			$data = array('keyResultArea' => $this->input->post('key_result_area'),
				'KeyActivities' => $this->input->post('key_activities'),
				'Weight' => $this->input->post('weight'),
				'TargetDate' => $this->input->post('target_date'),
				'Indicator' => $this->input->post('indicator'),
				'ResourceReq' => $this->input->post('resource_required'),
				'EnablingCondition' => $this->input->post('enabling_condition'),
				'TotalKra' => $this->input->post('total_kra'),
				'Employee' => $_SESSION['Id'],
				'Period' => $period,
			);
			$workplan->add_workplan($data);
			$this->template($type);
		} else {
			$this->template($type);
		}

	}

	public function employee_performance_plan($type)
	{
		$this->form_validation->set_rules('key_result_area', '', 'required');
		$this->form_validation->set_rules('weight', '', 'required');
		$this->form_validation->set_rules('total_hod_kra', '', 'required');

		$empWorkplan = new PerformanceModel();

		if ($this->form_validation->run()) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;
			// EmpPlanId	EmpKeyResultArea	EmpWeight	EmpTotalKRA
			$data = array('EmpKeyResultArea' => $this->input->post('key_result_area'),
				'EmpWeight' => $this->input->post('weight'),
				'EmpTotalKRA' => $this->input->post('total_hod_kra'),
				'Employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),
			);
			$empWorkplan->add_employee_plan($data);
			$this->template($type);
		} else {
			$this->template($type);
		}
	}


	public function government_performance_plan($type)
	{
		$this->form_validation->set_rules('key_result_area', '', 'required');
		$this->form_validation->set_rules('weight', '', 'required');
		$this->form_validation->set_rules('total_hod_kra', '', 'required');

		$govWorkplan = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		if ($this->form_validation->run()) {
			// GovKeyResultArea	GovWeight	GovTotalKRA
			$data = array('GovKeyResultArea' => $this->input->post('key_result_area'),
				'GovWeight' => $this->input->post('weight'),
				'GovTotalKRA' => $this->input->post('total_hod_kra'),
				'Employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),
			);
			$govWorkplan->add_government_plan($data);
			$this->template($type);
		} else {
			$this->template($type);
		}
	}

	public function auditor_performance_plan($type)
	{
		$this->form_validation->set_rules('key_result_area', '', 'required');
		$this->form_validation->set_rules('weight', '', 'required');
		$this->form_validation->set_rules('total_hod_kra', '', 'required');

		$audWorkplan = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		if ($this->form_validation->run() == TRUE) {
			// AudKeyResultArea	AudWeight	AudTotalKRA
			$data = array('AudKeyResultArea' => $this->input->post('key_result_area'),
				'AudWeight' => $this->input->post('weight'),
				'AudTotalKRA' => $this->input->post('total_hod_kra'),
				'Employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),
			);
			$audWorkplan->add_auditor_plan($data);
			$this->template($type);
		} else {
			$this->template($type);
		}
	}

	public function organization_performance_plan($type)
	{
		$this->form_validation->set_rules('key_result_area', '', 'required');
		$this->form_validation->set_rules('weight', '', 'required');
		$this->form_validation->set_rules('total_hod_kra', '', 'required');

		$orgWorkplan = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		if ($this->form_validation->run()) {
			// OrgKeyResultArea	OrgWeight	OrgTotalKRA
			$data = array('OrgKeyResultArea' => $this->input->post('key_result_area'),
				'OrgWeight' => $this->input->post('weight'),
				'OrgTotalKRA' => $this->input->post('total_hod_kra'),
				'Employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),
			);
			$orgWorkplan->add_organization_plan($data);
			$this->template($type);
		} else {
			$this->template($type);
		}
	}


	public function add_generic_management_competencies($type)
	{
		$this->form_validation->set_rules('core_management', '', 'required');
		$this->form_validation->set_rules('process_competencies', '', 'required');
		$gmcWorkplan = new PerformanceInstrument();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		if ($this->form_validation->run()) {
			$data = array('core_management' => $this->input->post('core_management'),
				'process_competencies' => $this->input->post('process_competencies'),
				'dev_required_cmcs' => $this->input->post('dev_required_cmcs'),
				'dev_required_pcs' => $this->input->post('dev_required_pcs'),
				'dev_required' => $this->input->post('dev_required'),
				'employee' => $_SESSION['Id'],
				'period' => $period,
				'template_name' => $this->input->post('template_name'),
			);
			$gmcWorkplan->add_generic_management_competencies($data);
			$this->template($type);
		} else {
			$this->template($type);
		}
	}

	public function remove()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$perf = new PerformanceModel();
		$perf->remove($id);
		$this->template($type);
	}


	public function remove_submission_pp()
	{
		$pt_id = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$perf = new PerformanceModel();
		$perf->remove($id);
		$this->edit_my_submission($pt_id);
	}

	public function remove_plan($id)
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$perf = new PerformanceModel();
		$perf->remove_plan($id);
		$this->template($type);
	}

	public function remove_workPlan()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$perf = new PerformanceModel();
		$perf->remove_workplan($id);
		$this->template($type);
	}

	public function remove_employee_Plan($id)
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$perf = new PerformanceModel();
		$perf->remove_employee_plan($id);
		$this->template($type);
	}

	public function remove_government_Plan($id)
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$perf = new PerformanceModel();
		$perf->remove_government_plan($id);
		$this->template($type);
	}

	public function remove_auditor_Plan($id)
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$perf = new PerformanceModel();
		$perf->remove_auditor_plan($id);
		$this->template($type);
	}

	public function remove_organization_Plan($id)
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$perf = new PerformanceModel();
		$perf->remove_organization_plan($id);
		$this->template($type);
	}

	public function remove_gmc_Plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('generic_management_competencies');
	}


	public function submitted_performance()
	{
		$perf = new PerformanceModel();

		$data['performance'] = $perf->to_me_new($_SESSION['Id']);
		$this->load->view("templates/header");
		$this->load->view("performance/submitted_performance", $data);
		$this->load->view("templates/footer");

	}

	public function submit()
	{

		$emp = new EmployeeModel();
		$performance = new PerformanceModel();
		$id = $_SESSION['Id'];
		$user = $emp->get_single_user($id);

		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'Status_Final' => 'PENDING',
			'comment' => '',
			'template_name' =>$this->input->post('template_name'),
		);

		$job_level = $_SESSION['SalaryLevel'];
		$rows_count = $performance->check_submission($id, $period);

		if ($rows_count > 0) {
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->performance_capture();
		} else {
			$performance->submit_to_manager_performance($data);
			$this->acknowledge_message();
		}
	}

	public function update_pp($pt_id, $id)
	{
		$this->form_validation->set_rules('key_responsibility', '', 'required');
		$this->form_validation->set_rules('gafs', '', 'required');
		$this->form_validation->set_rules('performance_outcome', '', 'required');
		$this->form_validation->set_rules('weight', '', 'required');
		$this->form_validation->set_rules('performance_measure', '', 'required');
		$this->form_validation->set_rules('timeframe', '', 'required');
		$this->form_validation->set_rules('resources', '', 'required');
		if ($this->form_validation->run()) {
			$perf = new PerformanceModel();
			$data = array('Responsibility' => $this->input->post('key_responsibility'),
				'GAFS' => $this->input->post('gafs'),
				'PerformanceOutcome' => $this->input->post('performance_outcome'),
				'OutcomeWeight' => $this->input->post('weight'),
				'PerformanceMeasurement' => $this->input->post('performance_measure'),
				'Timeframes' => $this->input->post('timeframe'),
				'Resources' => $this->input->post('resources'),
			);
			$perf->update_pp($id, $data);
		}

		$this->edit_my_submission($pt_id);
	}

	public function acknowledge_message()
	{
		$this->load->view("templates/header");
		$this->load->view("performance/acknowledge_message");
		$this->load->view("templates/footer");
		$this->load->model('PerformanceModel');
	}

	public function permis_official_submissions()
	{
		$branch = null;
		if(isset($_POST['filter_branch']))
		{
			$branch = $this->input->post('branch');
			$_SESSION['branch'] = $this->input->post('branch');
		}
		else{
			if(isset($_SESSION['branch']))
			{
				$branch = $_SESSION['branch'];
			}
		}
		$perf = new PerformanceModel();
		$br = $this->db->get('branch')->result_array();
		$data['performance'] = $perf->get_submissions($branch);
		$data['branch'] = $br;
		$this->load->view("templates/header");
		$this->load->view("performance/permis_official_submissions", $data);
		$this->load->view("templates/footer");
	}
	public function edit_my_submission($id)
	{
		$perf = new PerformanceModel();
		$data['performance'] = $perf->get_user_performance($_SESSION['Id']);
		$data['perfm'] = $perf->get_specific_submission($id);
		$this->load->view("templates/header");
		$this->load->view("performance/edit_my_submission", $data);
		$this->load->view("templates/footer");
	}


	///submitted
	public function view_submitted($_id)
	{

		$mou = new OperationalMemoModel();
		$submission = new PerformanceModel();
		$submission_row = $submission->get_user_submission($_id);
		$id = $submission_row->emp_id;
		$p_data['submission_row'] = $submission_row;
		$emp = new EmployeeModel();
		$p_data['emp'] = $emp->get_profile($_SESSION['Id']);
		$p_data['mou'] = $mou->get_op_mou($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
		if ($submission_row->salarylevel <= 12)
		{
			$this->load->view("templates/header");

			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT')
			{
				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$perf = new PerformanceInstrument();
				$p_data['performance_plan'] = $perf->get_performance_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['personal_developmental_training'] = $perf->get_personal_developmental_training($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['duties'] = $perf->get_duties($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['duty_reason'] = $perf->get_duty_reason($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['key_responsibility'] = $perf->get_key_responsibility($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view('performance/submitted/level_1_to_12/performance_instrument',$p_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {

				$perf = new PerformanceInstrument();
				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['performance_plan'] = $perf->get_performance_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view('performance/submitted/level_1_to_12/annual_assessment',$p_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {
				$mid = new  MidYearAssessment();
				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['performance_plan'] = $mid->get_performance_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/submitted/level_1_to_12/mid_year_assessment",$p_data);
			}
			$this->load->view("templates/footer");
		}
		if ($submission_row->salarylevel == 13 || $submission_row->salarylevel == 14) {

			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$mou_dir = new DirectorMouIndividualModel();
				$mou_gmc = new DirectorMouGmcModel();
				$p_i = new PerformanceInstrument();

				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$p_data['gmc_personal_development_plan'] = $p_i->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['kra'] = $p_i->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['individual_performance'] = $p_i->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['mou'] = $mou_dir->get_dir_mou($id, $submission_row->period, $submission_row->template_name);
				$p_data['gmcWorkplan'] = $mou_gmc->get_dir_gmc($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['work_plan'] = $p_i->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['devplan'] = $p_i->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submitted/level_13_and_14/performance_instrument",$p_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {

				$ann = new AnnualAssessment();

				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$p_data['kra'] = $ann->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['work_plan'] = $ann->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['gmc_personal_development_plan'] = $ann->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submitted/level_13_and_14/annual_assessment",$p_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {

				$mid = new MidYearAssessment();

				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$p_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['personal_developmental_plan'] = $mid->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submitted/level_13_and_14/mid_year_assessment",$p_data);
			}
			$this->load->view("templates/footer");
		}
		if ($submission_row->salarylevel == 15) {
			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$p_i = new PerformanceInstrument();


				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');


				$p_data['kra'] = $p_i->get_kra($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['individual_performance'] = $p_i->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['generic_management_competencies'] = $p_i->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['work_plan'] = $p_i->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['personal_developmental_plan'] = $p_i->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submitted/level_15/performance_instrument",$p_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {
				$mid = new MidYearAssessment();
				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$p_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['emp_perf'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/submitted/level_15/annual_assessment",$p_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {

				$mid = new MidYearAssessment();

				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$p_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['emp_perf'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['organisational_performance'] = $mid->get_organisational_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['personal_development_plan'] = $mid->get_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);

				$this->load->view("performance/submitted/level_15/mid_year_performance_assessment",$p_data);
			}
			$this->load->view("templates/footer");
		}

		if ($submission_row->salarylevel == 16) {

			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$i_p = new PerformanceInstrument();
				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$p_data['gmc_work_plan'] = $i_p->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['bp'] = $i_p->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['kra'] = $i_p->get_kra($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['kgfa'] = $i_p->get_kgfa($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['key_government_focus_areas'] = $i_p->get_key_government_focus_areas($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['personal_developmental_plan'] = $i_p->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$p_data['work_plan'] = $i_p->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submitted/level_16/performance_instrument",$p_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {

				$ann = new AnnualAssessment();
				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$p_data['kgfa'] = $ann->get_kgfa($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['kra'] = $ann->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['key_government_focus_areas'] = $ann->get_key_government_focus_areas($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['work_plan'] = $ann->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['cmc'] = $ann->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/submitted/level_16/annual_assessment",$p_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {
				$mid = new MidYearAssessment();
				$init = new Initialization();
				$p_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$p_data['personal_developmental_plan'] = $mid->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['kgfa'] = $mid->get_kgfa($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['key_government_focus_areas'] = $mid->get_key_government_focus_areas($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['cmc'] = $mid->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$this->load->view("performance/submitted/level_16/mid_year_assessment",$p_data);
			}
			$this->load->view("templates/footer");
		}


	}

	public function update_individual_performance($id = null)
	{
		$this->form_validation->set_rules('key_results_area', '', 'required');
		$this->form_validation->set_rules('batho_pele_principles', '', 'required');
		$this->form_validation->set_rules('weight_of_outcome', '', 'required');
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		if ($this->form_validation->run()) {

			$data = array(
				'key_results_area' => $this->input->post('key_results_area'),
				'batho_pele_principles' => $this->input->post('batho_pele_principles'),
				'weight_of_outcome' => $this->input->post('weight_of_outcome'),
			);
			$this->db->where('id', $id);
			$this->db->update('individual_performance', $data);
		}
	}


	public function edit_submission($sub_id)
	{
		$e = new EmployeeModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$emp = $e->get_profile($_SESSION['Id']);
		$perf = new PerformanceModel();
		$submission = $perf->get_specific_submission($sub_id);
		$form_data['submission'] = $submission;
		$form_data['period'] = $period;
		$form_data['emp'] = $emp;
		//$form_data['sub_id'] = $sub_id;
		$init = new Initialization();
		$form_data['initialization'] = $init->get_initializations($emp->id, $period, 'PERFORMANCE INSTRUMENT');

		$template = 'PERFORMANCE INSTRUMENT';
		$this->load->view("templates/header");
		if($submission->template_name == $template)
		{
			if($emp->SalaryLevel == 13 || $emp->SalaryLevel == 14)
			{
				$p_i = new PerformanceInstrument();
				//$form_data['data'] = $submission_row;
				$form_data['kra'] = $p_i->get_kra($emp->id, $period, $template);
				$form_data['gmc_personal_development_plan'] = $p_i->get_generic_management_competencies_personal_development_plan($emp->id, $period, $template);
				$form_data['individual_performance'] = $p_i->get_individual_performance($emp->id, $period, $template);
				$form_data['work_plan'] = $p_i->get_work_plan($emp->id, $period, $template);
				$form_data['devplan'] = $p_i->get_personal_developmental_plan($emp->id, $period, $template);
				$this->load->view("performance/edit_submission/level_13_and_14/performance_instrument",$form_data);
			}
			if($emp->SalaryLevel <= 12)
			{
				$perf = new PerformanceInstrument();
				//$form_data['data'] = $submission_row;
				$form_data['performance_plan'] = $perf->get_performance_plan($emp->id, $period, $template);
				$form_data['personal_developmental_training'] = $perf->get_personal_developmental_training($emp->id, $period, $template);
				//$form_data['submission_row'] = $submission_row;

				$form_data['duties'] = $perf->get_duties($emp->id, $period, $template);
				$form_data['duty_reason'] = $perf->get_duty_reason($emp->id, $period, $template);
				$form_data['key_responsibility'] = $perf->get_key_responsibility($emp->id, $period, $template);

				$this->load->view("performance/edit_submission/level_1_to_12/performance_instrument",$form_data);
			}
			if($emp->SalaryLevel == 15)
			{
				$p_i = new PerformanceInstrument();
				$form_data['individual_performance'] = $p_i->get_individual_performance($emp->id, $period, $template);
				$form_data['generic_management_competencies'] = $p_i->get_generic_management_competencies($emp->id, $period, $template);
				$form_data['work_plan'] = $p_i->get_work_plan($emp->id, $period, $template);
				$form_data['kra'] = $p_i->get_kra($emp->id, $period, $template);
				$form_data['personal_developmental_plan'] = $p_i->get_personal_developmental_plan($emp->id, $period, $template);

				$this->load->view("performance/edit_submission/level_15/performance_instrument",$form_data);
			}
		}
		$this->load->view("templates/footer");
	}

	public function edit_submission_mid($sub_id)
	{
		$e = new EmployeeModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$emp = $e->get_profile($_SESSION['Id']);
		$perf = new PerformanceModel();
		$submission = $perf->get_specific_submission($sub_id);
		$form_data['submission'] = $submission;
		$form_data['period'] = $period;
		$form_data['emp'] = $emp;
		//$form_data['sub_id'] = $sub_id;
		$init = new Initialization();
		$form_data['initialization'] = $init->get_initializations($emp->id, $period, 'MID YEAR ASSESSMENT');

		$template = 'MID YEAR ASSESSMENT';
		$this->load->view("templates/header");
		if($submission->template_name == $template)
		{
			if($emp->SalaryLevel == 13 || $emp->SalaryLevel == 14)
			{
				$p_i = new PerformanceInstrument();
				$form_data['kra'] = $p_i->get_kra($emp->id, $period, $template);
				$form_data['gmc_personal_development_plan'] = $p_i->get_generic_management_competencies_personal_development_plan($emp->id, $period, $template);
				$form_data['individual_performance'] = $p_i->get_individual_performance($emp->id, $period, $template);
				$form_data['work_plan'] = $p_i->get_work_plan($emp->id, $period, $template);
				$form_data['devplan'] = $p_i->get_personal_developmental_plan($emp->id, $period, $template);
				$this->load->view("performance/edit_submission/level_13_and_14/mid_year_assessment",$form_data);
			}
			if($emp->SalaryLevel <= 12)
			{
				$perf = new PerformanceInstrument();
				$form_data['data'] = $submission;
				$form_data['performance_plan'] = $perf->get_performance_plan($emp->id, $period, 'PERFORMANCE INSTRUMENT');
				$form_data['personal_developmental_training'] = $perf->get_personal_developmental_training($emp->id, $period, $template);
				//$form_data['submission_row'] = $submission_row;
				$form_data['duties'] = $perf->get_duties($emp->id, $period, $template);
				$form_data['duty_reason'] = $perf->get_duty_reason($emp->id, $period, $template);
				$form_data['key_responsibility'] = $perf->get_key_responsibility($emp->id, $period, $template);

				$this->load->view("performance/edit_submission/level_1_to_12/mid_year_assessment",$form_data);
			}
			if($emp->SalaryLevel == 15)
			{
				$p_i = new PerformanceInstrument();
				$form_data['individual_performance'] = $p_i->get_individual_performance($emp->id, $period, $template);
				$form_data['generic_management_competencies'] = $p_i->get_generic_management_competencies($emp->id, $period, $template);
				$form_data['work_plan'] = $p_i->get_work_plan($emp->id, $period, $template);
				$form_data['kra'] = $p_i->get_kra($emp->id, $period, $template);
				$form_data['personal_developmental_plan'] = $p_i->get_personal_developmental_plan($emp->id, $period, $template);

				$this->load->view("performance/edit_submission/level_15/mid_year_assessment",$form_data);
			}
		}
		$this->load->view("templates/footer");
	}


	public function resubmit_changes($id)
	{
		$this->db->where('id', $id);
		if($_POST['status'] == 'REJECTED')
		{
			$data = array('status'=> 'PENDING');
			$this->db->update('performance_assessment', $data);
		}
		else if($_POST['status_final'] == 'REJECTED')
		{
			$data = array('status_final'=> 'PENDING');
			$this->db->update('performance_assessment', $data);
		}
		$this->acknowledge_message();
	}

	public function view_submission($id, $submission_id )
	{

		if(!isset($id) && !isset($submission_id)){
			$id = $this->uri->segment(3); //emp id
			$submission_id = $this->uri->segment(4); //submitted id

		}


		//$mou_ann = new OperationalAnnualModel();
		$mou = new OperationalMemoModel();
		$submission = new PerformanceModel();

		$emp = new EmployeeModel();
		$form_data['emp'] = $emp->get_profile($id);
		$submission_row = $submission->get_user_submission($submission_id);
		$form_data['submission_id'] = $submission_id;


		$init = new Initialization();
		$form_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
		$form_data['submission_row'] = $submission_row;


		if ($submission_row->salarylevel <= 12)
		{
			$this->load->view("templates/header");

			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT')
			{
				$emp = new EmployeeModel();
				$perf = new PerformanceInstrument();
				$form_data['data'] = $submission_row;
				//$form_data['emp'] = $emp->get_profile($submission_row->emp_id);
				$form_data['performance_plan'] = $perf->get_performance_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['personal_developmental_training'] = $perf->get_personal_developmental_training($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['submission_row'] = $submission_row;
				$form_data['duties'] = $perf->get_duties($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['duty_reason'] = $perf->get_duty_reason($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['key_responsibility'] = $perf->get_key_responsibility($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['mou'] = $mou->get_op_mou($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submission/level_1_to_12/performance_instrument",$form_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {
				$annual = new  AnnualAssessment();
				$form_data['data'] = $submission_row;
				$form_data['performance_plan'] = $annual->get_performance_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/submission/level_1_to_12/annual_assessment",$form_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {
				$op = new  MidYearAssessment();
				//$form_data['data'] = $submission_row;
				//$perf = new PerformanceInstrument();

				$form_data['data'] = $submission_row;
				$form_data['performance_plan'] = $op->get_performance_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/submission/level_1_to_12/mid_year_assessment",$form_data);
			}
			$this->load->view("templates/footer");
		}
		if ($submission_row->salarylevel == 13 || $submission_row->salarylevel == 14) {

			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$mou_dir = new DirectorMouIndividualModel();
				$mou_gmc = new DirectorMouGmcModel();
				$p_i = new PerformanceInstrument();
				$form_data['data'] = $submission_row;
				$form_data['kra'] = $p_i->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['gmc_personal_development_plan'] = $p_i->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['individual_performance'] = $p_i->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['mou'] = $mou_dir->get_dir_mou($id, $submission_row->period, $submission_row->template_name);
				$form_data['gmcWorkplan'] = $mou_gmc->get_dir_gmc($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['work_plan'] = $p_i->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['devplan'] = $p_i->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submission/level_13_and_14/performance_instrument",$form_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {

				$ann = new AnnualAssessment();
				$form_data['data'] = $submission_row;
				$form_data['work_plan'] = $ann->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['kra'] = $ann->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['gmc_personal_development_plan'] = $ann->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submission/level_13_and_14/annual_assessment",$form_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {

				$mid = new MidYearAssessment();
				$form_data['data'] = $submission_row;
				$form_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['personal_developmental_plan'] = $mid->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submission/level_13_and_14/mid_year_assessment",$form_data);
			}
			$this->load->view("templates/footer");
		}
		if ($submission_row->salarylevel == 15) {
			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$p_i = new PerformanceInstrument();
				$form_data['data'] = $submission_row;
				$form_data['kra'] = $p_i->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['individual_performance'] = $p_i->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['generic_management_competencies'] = $p_i->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['work_plan'] = $p_i->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['personal_developmental_plan'] = $p_i->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submission/level_15/performance_instrument",$form_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {
				$mid = new MidYearAssessment();
				$form_data['data'] = $submission_row;
				$form_data['auditor_general_opinion_and_findings'] = $mid->get_auditor_general_opinion_and_findings($_SESSION['Id'], $submission_row->period, 'ANNUAL ASSESSMENT');
				$form_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/submission/level_15/annual_assessment",$form_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {

				$mid = new MidYearAssessment();
				$form_data['data'] = $submission_row;
				$form_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['organisational_performance'] = $mid->get_organisational_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['personal_development_plan'] = $mid->get_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);

				$this->load->view("performance/submission/level_15/mid_year_performance_assessment",$form_data);
			}
			$this->load->view("templates/footer");
		}

		if ($submission_row->salarylevel == 16) {

			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$i_p = new PerformanceInstrument();
				$form_data['data'] = $submission_row;
				$form_data['gmc_work_plan'] = $i_p->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['bp'] = $i_p->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['work_plan'] = $i_p->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['kra'] = $i_p->get_kra($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submission/level_16/performance_instrument",$form_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {

				$ann = new AnnualAssessment();
				$form_data['data'] = $submission_row;
				$form_data['krs'] = $ann->get_kra($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/submission/level_16/annual_assessment",$form_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {
				$mid = new MidYearAssessment();
				$form_data['data'] = $submission_row;
				$form_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['kgfa'] = $mid->get_key_government_focus_areas($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['cmc'] = $mid->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, $submission_row->template_name);

				$this->load->view("performance/submission/level_16/mid_year_assessment",$form_data);
			}
			$this->load->view("templates/footer");
		}

	}

	public function permis_view_submission()
	{

		$id = $this->uri->segment(3);
		$submission_id = $this->uri->segment(4);
		//$emp = new EmployeeModel();
		//$data['emp'] = $emp->get_profile($id);
		$data['submission_id'] = $submission_id;




		$mou_ann = new OperationalAnnualModel();
		$mou = new OperationalMemoModel();
		$submission = new PerformanceModel();

		$emp = new EmployeeModel();
		$form_data['emp'] = $emp->get_profile($id);
		$submission_row = $submission->get_user_submission($submission_id);
		$form_data['submission_id'] = $submission_id;


		$init = new Initialization();
		$form_data['initialization'] = $init->get_initializations($id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
		$form_data['submission_row'] = $submission_row;


		if ($submission_row->salarylevel <= 12)
		{
			$this->load->view("templates/header");

			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT')
			{
				$emp = new EmployeeModel();
				$perf = new PerformanceInstrument();
				//$form_data['emp'] = $emp->get_profile($_SESSION['Id']);
				$form_data['data'] = $submission_row;
				$form_data['performance_plan'] = $perf->get_performance_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['personal_developmental_training'] = $perf->get_personal_developmental_training($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['submission_row'] = $submission_row;
				$form_data['duties'] = $perf->get_duties($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['duty_reason'] = $perf->get_duty_reason($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['key_responsibility'] = $perf->get_key_responsibility($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['mou'] = $mou->get_op_mou($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				//$form_data['mou'] = $mou->get_op_mou($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/permis_submission/level_1_to_12/performance_instrument",$form_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {
				$op = new  MidYearAssessment();
				$form_data['operational_memorandum'] = $op->get_operational_memorandum($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['mou'] = $mou_ann->get_op_ann_mou($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/permis_submission/level_1_to_12/annual_assessment",$form_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {
				$op = new  MidYearAssessment();
				//$form_data['data'] = $submission_row;
				//$perf = new PerformanceInstrument();
				$form_data['data'] = $submission_row;
				$form_data['performance_plan'] = $op->get_performance_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/permis_submission/level_1_to_12/mid_year_assessment",$form_data);
			}
			$this->load->view("templates/footer");
		}
		if ($submission_row->salarylevel == 13 || $submission_row->salarylevel == 14) {

			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$mou_dir = new DirectorMouIndividualModel();
				$mou_gmc = new DirectorMouGmcModel();
				$p_i = new PerformanceInstrument();
				$form_data['gmc_personal_development_plan'] = $p_i->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['individual_performance'] = $p_i->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['mou'] = $mou_dir->get_dir_mou($id, $submission_row->period, $submission_row->template_name);
				$form_data['gmcWorkplan'] = $mou_gmc->get_dir_gmc($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['work_plan'] = $p_i->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['devplan'] = $p_i->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/permis_submission/level_13_and_14/performance_instrument",$form_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {

				$ann = new AnnualAssessment();
				$form_data['kra'] = $ann->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['work_plan'] = $ann->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['gmc_personal_development_plan'] = $ann->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/permis_submission/level_13_and_14/annual_assessment",$form_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {

				$mid = new MidYearAssessment();
				$form_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['personal_developmental_plan'] = $mid->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/permis_submission/level_13_and_14/mid_year_assessment",$form_data);
			}
			$this->load->view("templates/footer");
		}
		if ($submission_row->salarylevel == 15) {
			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$p_i = new PerformanceInstrument();
				$form_data['individual_performance'] = $p_i->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['generic_management_competencies'] = $p_i->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['work_plan'] = $p_i->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['kra'] = $p_i->get_kra($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['personal_developmental_plan'] = $p_i->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$this->load->view("performance/permis_submission/level_15/performance_instrument",$form_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {
				$mid = new MidYearAssessment();
				$form_data['data'] = $submission_row;
				$form_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/permis_submission/level_15/annual_assessment",$form_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {

				$mid = new MidYearAssessment();

				$form_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['organisational_performance'] = $mid->get_organisational_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['personal_development_plan'] = $mid->get_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);

				$this->load->view("performance/permis_submission/level_15/mid_year_performance_assessment",$form_data);
			}
			$this->load->view("templates/footer");
		}

		if ($submission_row->salarylevel == 16) {

			$this->load->view("templates/header");
			if ($submission_row->template_name == 'PERFORMANCE INSTRUMENT') {
				$i_p = new PerformanceInstrument();
				$form_data['data'] = $submission_row;
				$form_data['gmc_work_plan'] = $i_p->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['bp'] = $i_p->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['work_plan'] = $i_p->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['kra'] = $i_p->get_kra($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['kgfa'] = $i_p->get_kgfa($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['personal_developmental_plan'] = $i_p->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['key_government_focus_areas'] = $i_p->get_key_government_focus_areas($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				/*$i_p = new PerformanceInstrument();
				$form_data['gmc_work_plan'] = $i_p->get_generic_management_competencies_personal_development_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['bp'] = $i_p->get_individual_performance($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['kgfa'] = $i_p->get_kgfa($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['key_government_focus_areas'] = $i_p->get_key_government_focus_areas($submission_row->emp_id, $submission_row->period, $submission_row->template_name);
				$form_data['work_plan'] = $i_p->get_work_plan($submission_row->emp_id, $submission_row->period, $submission_row->template_name);*/
				$this->load->view("performance/permis_submission/level_16/performance_instrument",$form_data);
			}
			if ($submission_row->template_name == 'ANNUAL ASSESSMENT') {

				$ann = new AnnualAssessment();
				$p_data['kgfa'] = $ann->get_kgfa($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['kra'] = $ann->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['key_government_focus_areas'] = $ann->get_key_government_focus_areas($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['work_plan'] = $ann->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$p_data['cmc'] = $ann->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$this->load->view("performance/permis_submission/level_16/annual_assessment",$p_data);
			}
			if ($submission_row->template_name == 'MID YEAR ASSESSMENT') {
				$mid = new MidYearAssessment();
				$form_data['personal_developmental_plan'] = $mid->get_personal_developmental_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['kra'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['work_plan'] = $mid->get_work_plan($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['kgfa'] = $mid->get_kra($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['key_government_focus_areas'] = $mid->get_key_government_focus_areas($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');
				$form_data['cmc'] = $mid->get_generic_management_competencies($submission_row->emp_id, $submission_row->period, 'PERFORMANCE INSTRUMENT');

				$this->load->view("performance/permis_submission/level_16/mid_year_assessment",$form_data);
			}
			$this->load->view("templates/footer");
		}








	}



	public function sup_update_status_correction($id)
	{
		$perf = new PerformanceModel();
		$data = array(
			'status' => 'PENDING'
		);
		$perf->sup_update_status($id, $data);
		$this->index();

	}

	public function sup_update_status($id)
	{
		$status = $this->input->post('action_option');
		$comment = $this->input->post('comment');
		$data = array(
			'status' => $status,
			'sup_comment' => $comment
		);
		$perf = new PerformanceModel();
		if ($status == "REJECTED") {
			if (!isset($comment)) {
				echo '<script> alert("Comment is required")</script>';
				$this->submitted_performance();
				return;
			}
			$perf->sup_update_status($id, $data);
			$this->submitted_performance();
		} else if ($status == "APPROVED") {
			$perf->sup_update_status($id, $data);
			$this->submitted_performance();
		} else {
			$this->submitted_performance();
		}


	}
	public function update_work_plans($id)
	{
		$this->form_validation->set_rules('key_activities', '', 'required');
		$this->form_validation->set_rules('target_date', '', 'required');
		$this->form_validation->set_rules('indicator_target', '', 'required');
		$this->form_validation->set_rules('resource_required', '', 'required');
		$this->form_validation->set_rules('enabling_condition', '', 'required');

		//print_r($_POST);

		if ($this->form_validation->run())
		{
			$data = array(
				'key_activities' => $this->input->post('key_activities'),
				'weight' => $this->input->post('weight'),
				'target_date' => $this->input->post('target_date'),
				'indicator_target' => $this->input->post('indicator_target'),
				'resource_required' => $this->input->post('resource_required'),
				'enabling_condition' => $this->input->post('enabling_condition'),
			);
			$this->db->where('id', $id);
			$this->db->update('work_plan', $data);
		}
	}

	public function permis_update_status($id)
	{
		$status = $this->input->post('action_option');
		$comment = $this->input->post('comment');

		$data = array(
			'status_final' => $status,
			'comment_final' => $comment,
			'pmd_user'=>$_SESSION['Id']
		);
		$perf = new PerformanceModel();

		if ($status == "REJECTED") {
			if (!isset($comment)) {
				echo '<script> alert("Comment is required")</script>';
				$this->permis_official_submissions();
				return;
			}
			$perf->sup_update_status($id, $data);
			$this->permis_official_submissions();
		} else if ($status == "APPROVED") {
			$perf->sup_update_status($id, $data);
			$this->permis_official_submissions();
		} else {
			$this->permis_official_submissions();
		}

	}
	public function remove_individual_performance()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$p_i = new PerformanceInstrument();
		$p_i->remove_individual_performance($id);
		$this->template($type);
	}
	public function add_individual_performance( $type)
	{

		$p_i = new PerformanceInstrument();
		$this->form_validation->set_rules('key_results_area', '', 'required');
		$this->form_validation->set_rules('batho_pele_principles', '', 'required');
		$this->form_validation->set_rules('weight_of_outcome', '', 'required');
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;


		$template_name = $this->input->post('template_name');

		if ($this->form_validation->run()) {

			$data = array(
				'key_results_area' => $this->input->post('key_results_area'),
				'batho_pele_principles' => $this->input->post('batho_pele_principles'),
				'weight_of_outcome' => $this->input->post('weight_of_outcome'),
				'employee' => $_SESSION['Id'],
				'template_name' => $template_name,
				'period' =>$period,

			);
			$p_i->add_individual_performance($data);
		}
		$this->template($type);
	}


	public function remove_kra()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$mid_year = new MidYearAssessment();
		$mid_year->remove_kra($id);
		$this->template($type);
	}

	public function add_kra($id, $type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$mid_year = new MidYearAssessment();
		$this->form_validation->set_rules('activities', '', 'required');
		$this->form_validation->set_rules('achievement', '', 'required');
		$this->form_validation->set_rules('sms_rating', '', 'required');
		$this->form_validation->set_rules('supervisor_rating', '', 'required');
		$this->form_validation->set_rules('agreed_rating', '', 'required');
		$this->form_validation->set_rules('target', '', 'required');
		$template_name = $this->input->post('template_name');

		if ($this->form_validation->run()) {
			$data = array(
				'activities' => $this->input->post('activities'),
				'achievement' => $this->input->post('achievement'),
				'sms_rating' => $this->input->post('sms_rating'),
				'supervisor_rating' => $this->input->post('supervisor_rating'),
				'agree_rating' => $this->input->post('agreed_rating'),
				'kra_no' => 'KRA NO ',
				'target' => $this->input->post('target'),
				'employee' => $_SESSION['Id'],
				'template_name' => $template_name,
				'period' =>$period,
				'kra_id' =>$id,
			);
			$mid_year->add_kra($data);
		}
		$this->template($type);
	}
	public function add_generic_management_competencies_personal_development_plan($type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$p_i = new PerformanceInstrument();
		$this->form_validation->set_rules('core_management_competencies', '', 'required');
		$this->form_validation->set_rules('process_competencies', '', 'required');
		$template_name = $this->input->post('template_name');
		if ($this->form_validation->run()) {
			$data = array(
				'core_management_competencies' => $this->input->post('core_management_competencies'),
				'process_competencies' => $this->input->post('process_competencies'),
				'dev_required' => $this->input->post('dev_required'),
				'employee' => $_SESSION['Id'],
				'template_name' => $template_name,
				'period' =>$period,

			);
			$p_i->add_generic_management_competencies_personal_development_plan($data);
		}
		$this->template($type);
	}

	public function remove_generic_management_competencies_personal_development_plan()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$p_i = new PerformanceInstrument();
		$p_i->remove_generic_management_competencies_personal_development_plan($id);
		$this->template($type);
	}

	public function remove_generic_management_competencies()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$p_i = new MidYearAssessment();
		$p_i->remove_generic_management_competencies($id);
		$this->template($type);
	}
	//submissions
	public function submit_performance_mou($type)
	{
		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$t_name = $this->input->post('template_name');
		$check = $perf->validate_submission($period,$t_name);
		if ($check > 0)
		{
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			

			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->template($type);
			return;
		}



		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'pmd_user' => $user->pmd,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => '',
			'emp_comment' => '',
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => $this->input->post('option'),
			'reason' => $this->input->post('reason'),

		);
		if(isset($t_name))
		{
			$perf->submit_to_manager_performance($data);
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->success("THANK YOU FOR SUBMITTING YOUR PERFORMANCE ASSESSMENT");
		}
		$this->acknowledge_message();
	}


	public function submit_performance_dir($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$check = $perf->validate_submission($period, $this->input->post('template_name'));
		if ($check > 0) {
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => '',
			'emp_comment' => '',
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => $this->input->post('option'),
			'reason' => $this->input->post('reason'),
		);
		if($this->input->post('template_name') !== null)
		{
			$perf->submit_to_manager_performance($data);
			$this->acknowledge_message();
		}

		$this->template($type);
	}

	public function submit_performance_ddg($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		$check = $perf->validate_submission_ddg($period, $this->input->post('template_name'));
		if ($check > 0) {
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => '',
			'emp_comment' => '',
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => $this->input->post('option'),
			'reason' => $this->input->post('reason'),
		);
		$perf->submit_to_manager_performance_ddg($data);
		$this->acknowledge_message();
		$this->template($type);
	}

	public function submit_performance_hod($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		$check = $perf->validate_submission_hod($period, $this->input->post('template_name'));
		if ($check > 0) {
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => '',
			'emp_comment' => '',
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => $this->input->post('option'),
			'reason' => $this->input->post('reason'),
		);
		if($this->input->post('template_name')!=NULL)
		{
			$perf->submit_to_manager_performance_hod($data);
			$this->acknowledge_message();
		}
		$this->performance_capture();
	}


	public function submit_performance_mid($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		$check = $perf->validate_submission_dir($period, $this->input->post('template_name'));
		if ($check > 0) {
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'pmd_user' => $user->pmd,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => NULL,
			'emp_comment' => NULL,
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => NULL,
			'reason' => NULL,
		);
		$perf->submit_to_manager_mid_performance($data);
		$this->acknowledge_message();
		$this->template($type);
	}

	public function submit_performance_mid_hod($type)
	{
		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$check = $perf->validate_submission_mid_hod($period, $this->input->post('template_name'));
		if ($check > 0) {
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}
		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => NULL,
			'emp_comment' => NULL,
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => NULL,
			'reason' => NULL,
		);
		$perf->submit_to_manager_mid_performance_hod($data);
		$this->template($type);
	}

	public function UpdateMidLevel14()
	{

	}

	public function submit_performance_dir_mid($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		$check = $perf->validate_submission_mid_dir($period, $this->input->post('template_name'));
		if ($check > 0) {
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			//$this->load->view('flush');
			$this->template($type);
			return;
		}

		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => NULL,
			'emp_comment' => $this->input->post('emp_comment'),
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => NULL,
			'reason' => NULL,
		);
		//$this->input->post('supervisor_comment')
		$perf->submit_to_manager_mid_dir_performance($data);
		$this->template($type);
	}

	public function submit_performance_dir_mid_ddg($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		$check = $perf->validate_submission_mid_ddg($period, $this->input->post('template_name'));
		if ($check > 0) {
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => NULL,
			'emp_comment' => NULL,
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => NULL,
			'reason' => NULL,
		);
		$perf->submit_to_manager_mid_ddg_performance($data);
		$this->template($type);
	}


	public function submit_performance_ann($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		$check = $perf->validate_submission_ann($period, $this->input->post('template_name'));
		if ($check > 0) {
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'pmd_user' => $user->pmd,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => '',
			'emp_comment' => '',
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => $this->input->post('option'),
			'reason' => $this->input->post('reason'),
		);
		$perf->submit_to_manager_ann_performance($data);
		$this->template($type);
	}

	public function submit_performance_hod_ann($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$check = $perf->validate_submission_hod_ann($period, $this->input->post('template_name'));
		if ($check > 0) {
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => '',
			'emp_comment' => '',
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => $this->input->post('option'),
			'reason' => $this->input->post('reason'),
		);
		$perf->submit_to_manager_ann_hod_performance($data);
		$this->template($type);
	}


	public function submit_performance_dir_ann($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		$check = $perf->validate_submission_dir_ann($period, $this->input->post('template_name'));
		if ($check > 0) {
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => '',
			'emp_comment' => '',
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => $this->input->post('option'),
			'reason' => $this->input->post('reason'),
		);
		$perf->submit_to_manager_dir_ann_performance($data);
		$this->template($type);
	}

	public function submit_performance_ddg_ann($type)
	{

		$perf = new PerformanceModel();
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;

		$check = $perf->validate_submission_ddg_ann($period,$this->input->post('template_name'));
		if ($check > 0) {
			$this->load->view('flush');
			$toaster = new Toastr();
			$toaster->warning("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR");
			$this->load->view('flush');
			$this->load->view('flush');
			$this->template($type);
			return;
		}


		$emp = new EmployeeModel();
		$user = $emp->get_single_user($_SESSION['Id']);
		$data = array(
			'supervisor' => $user->SupervisorId,
			'employee' => $_SESSION['Id'],
			'date_captured' => date('Y-m-d'),
			'period' => $period,
			'status' => 'PENDING',
			'status_final' => 'PENDING',
			'sup_comment' => $this->input->post('sup_comment'),
			'emp_comment' => $this->input->post('emp_comment'),
			'pmd_comment' => NULL,
			'template_name' => $this->input->post('template_name'),
			'agree' => $this->input->post('option'),
			'reason' => $this->input->post('reason'),
		);
		$perf->submit_to_manager_ddg_ann_performance($data);
		$this->template($type);
	}

	public function add_factor($type)
	{
		//id	employee	period	template_name	sub_total_a	of_assessment	c_score

		$this->form_validation->set_rules('sub_total_a', '', 'required');
		$this->form_validation->set_rules('of_assessment', '', 'required');
		$this->form_validation->set_rules('c_score', '', 'required');
		$mou = new OperationalMemoModel();
		if ($this->form_validation->run()) {
			$$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;
			$data = array('sub_total_a' => $this->input->post('sub_total_a'),
				'of_assessment' => $this->input->post('of_assessment'),
				'outcome_weight' => $this->input->post('weight'),
				'c_score' => $this->input->post('c_score'),
				'employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),
			);
			$mou->add_factor($data);
			$this->template($type);
		} else {
			$this->template($type);
		}
	}

	public function op_mou($type)
	{
		$this->form_validation->set_rules('kra', '', 'required');
		$this->form_validation->set_rules('gafs', '', 'required');
		$this->form_validation->set_rules('jobholder_rating', '', 'required');
		$this->form_validation->set_rules('supervisor_decision', '', 'required');
		$this->form_validation->set_rules('par', '', 'required');
		$this->form_validation->set_rules('performance_report', '', 'required');
		$mou = new OperationalMemoModel();
		if ($this->form_validation->run()) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;
			$data = array('key_result_areas' => $this->input->post('kra'),
				'gafs' => $this->input->post('gafs'),
				'outcome_weight' => $this->input->post('weight'),
				'job_holder_rating' => $this->input->post('jobholder_rating'),
				'supervisor_rating' => $this->input->post(''),
				'decision_of_supervisor' => $this->input->post('supervisor_decision'),
				'par_score' => $this->input->post('par'),
				'performance_report' => $this->input->post('performance_report'),
				'employee' => $_SESSION['Id'],
				'period' =>$period,
				'template_name' =>$this->input->post('template_name'),
			);
			$mou->add_mou($data);
			$this->template($type);
		} else {
			$this->template($type);
		}
	}

	public function remove_mou($id)
	{

		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$mou = new OperationalMemoModel();
		$mou->remove_mou($id);
		$this->template($type);
	}
	public function add_work_plan()
	{
		$this->form_validation->set_rules('key_activities', '', 'required');
		//$this->form_validation->set_rules('outcome_weight', '', 'required');
		$this->form_validation->set_rules('target_date', '', 'required');
		$this->form_validation->set_rules('indicator_target', '', 'required');
		$this->form_validation->set_rules('resource_required', '', 'required');
		$this->form_validation->set_rules('enabling_condition', '', 'required');

		$p_i = new PerformanceInstrument();

		//	id	employee	key_result_areas	key_activities	weight
		//target_date	indicator_target	resource_required	enabling_condition
		//template_name	period
		if ($this->form_validation->run()) {
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year . '/' . $next_year;

			// Initialize the data array with common fields
			$data = array(
				'key_activities' => $this->input->post('key_activities'),
				'target_date' => $this->input->post('target_date'),
				'indicator_target' => $this->input->post('indicator_target'),
				'resource_required' => $this->input->post('resource_required'),
				'enabling_condition' => $this->input->post('enabling_condition'),
				'template_name' => $this->input->post('template_name'),
				'employee' => $_SESSION['Id'],
				'period' => $period,
				'kra_id' => $this->input->post('kra_id'),
			);

			// Check if the "weight" field is set
			if (isset($_POST['weight'])) {
				// Add the "weight" field to the data array
				$data['weight'] = $this->input->post('weight');
			}

			// Call the add_work_plan method with the data array
			$p_i->add_work_plan($data);
		}

	}
	public function delete_kra($type, $id)
	{
		$perf = new PerformanceInstrument();
		$perf->remove_kra($id);
		$this->template($type);
	}
	public function delete_kgfa($type, $id)
	{
		$perf = new PerformanceInstrument();
		$perf->delete_kgfa($id);
		$this->template($type);
	}


	public function remove_work_plan($id)
	{
		$p_i= new PerformanceInstrument();
		$p_i->remove_work_plan($id);

	}
	public function remove_organisational_performance()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$mid= new MidYearAssessment();
		$mid->remove_organisational_performance($id);
		$this->template($type);
	}

	public function add_organisational_performance($type)
	{
		$year = date('Y') + 1;
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('targeted_objectives','','required');
		$this->form_validation->set_rules('performance_measures_target','','required');
		$this->form_validation->set_rules('progress_review_comment','','required');
		$this->form_validation->set_rules('progress','','required');

//targeted_objectives	performance_measures_target	progress	progress_review_comment

		if($this->form_validation->run())
		{
			$data = array(
				'targeted_objectives'=>$this->input->post('targeted_objectives'),
				'performance_measures_target'=>$this->input->post('performance_measures_target'),
				'progress_review_comment'=>$this->input->post('progress_review_comment'),
				'progress'=>$this->input->post('progress'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new MidYearAssessment();
			$mid->add_organisational_performance($data);
			$this->template($type);
		}
		else {
		$this->template($type);
		}
	}
	public function add_competencies_personal_development_plan($type)
	{

		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('core_management_competencies','','required');
		$this->form_validation->set_rules('process_competencies','','required');
		$this->form_validation->set_rules('other_developmental_areas_identified','','required');
		if($this->form_validation->run())
		{
			$data = array(
				'core_management_competencies'=>$this->input->post('core_management_competencies'),
				'process_competencies'=>$this->input->post('process_competencies'),
				'other_developmental_areas_identified'=>$this->input->post('other_developmental_areas_identified'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new MidYearAssessment();
			$mid->add_competencies_personal_development_plan($data);
			$this->template($type);
		}
		else {
		$this->template($type);
		}
	}

	public function remove_competencies_personal_development_plan()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$mid= new MidYearAssessment();
		$mid->remove_competencies_personal_development_plan($id);
		$this->template($type);
	}
	public function add_key_government_focus_areas($number, $type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('key_focus_area_activities_outputs','','required');
		$this->form_validation->set_rules('indicator_target','','required');
		$this->form_validation->set_rules('progress_review_comment','','required');
		$this->form_validation->set_rules('progress','','required');
		if($this->form_validation->run())
		{
			$data = array(
				'key_focus_area_activities_outputs'=>$this->input->post('key_focus_area_activities_outputs'),
				'indicator_target'=>$this->input->post('indicator_target'),
				'progress_review_comment'=>$this->input->post('progress_review_comment'),
				'progress'=>$this->input->post('progress'),
				'key_government_focus_areas_no'=>$number,
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new MidYearAssessment();
			$mid->add_key_government_focus_areas($data);
			$this->template($type);
		}
		else {
		$this->template($type);
		}
	}
	public function add_performance_key_government_focus_areas($type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('key_focus_area_activities_outputs','','required');
		$this->form_validation->set_rules('indicator_target','','required');
		$this->form_validation->set_rules('enabling_condition','','required');
		$this->form_validation->set_rules('target_date','','required');
		$this->form_validation->set_rules('baseline_data','','required');
		$this->form_validation->set_rules('resource_required','','required');
		if($this->form_validation->run())
		{
			$data = array(
				'key_focus_area_activities_outputs'=>$this->input->post('key_focus_area_activities_outputs'),
				'indicator_target'=>$this->input->post('indicator_target'),
				'baseline_data'=>$this->input->post('baseline_data'),
				'resource_required'=>$this->input->post('resource_required'),
				'enabling_condition'=>$this->input->post('enabling_condition'),
				'target_date'=>$this->input->post('target_date'),
				'kgfa_id'=>$this->input->post('kgfa_id'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new MidYearAssessment();
			$mid->add_key_government_focus_areas($data);
			$this->template($type);
		}
		else {
			$this->template($type);
		}
	}
	public function add_key_responsibility($type)
	{
//		id	employee	period	template_name	description

		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('description','','required');
		if($this->form_validation->run())
		{
			$data = array(
				'key_responsibility'=>$this->input->post('description'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new PerformanceInstrument();
			$mid->add_key_responsibility($data);
			$this->template($type);
		}
		else {
		$this->template($type);
		}
	}
	public function add_duties($type)
	{
//		id	employee	period	template_name	description

		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('description','','required');
		if($this->form_validation->run())
		{
			$data = array(
				'description'=>$this->input->post('description'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new PerformanceInstrument();
			$mid->add_duties($data);
			$this->template($type);
		}
		else {
		$this->template($type);
		}
	}
	public function add_duty_reason($type)
	{
//		id	employee	period	template_name	description

		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('description','','required');
		if($this->form_validation->run())
		{
			$data = array(
				'description'=>$this->input->post('description'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new PerformanceInstrument();
			$mid->add_duty_reason($data);
			$this->template($type);
		}
		else {
		$this->template($type);
		}
	}
	public function add_performance_plan($type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('key_responsibility','','required');
		$this->form_validation->set_rules('gafs','','required');
		$this->form_validation->set_rules('performance_outcome','','required');
		//$this->form_validation->set_rules('outcome_weight','','required');
		$this->form_validation->set_rules('performance_measurement','','required');
		$this->form_validation->set_rules('time_frames','','required');
		$this->form_validation->set_rules('resources','','required');
		if($this->form_validation->run())
		{
			$data = array(
				'key_responsibility'=>$this->input->post('key_responsibility'),
				'gafs'=>$this->input->post('gafs'),
				'performance_outcome'=>$this->input->post('performance_outcome'),
				'outcome_weight'=>$this->input->post('outcome_weight'),
				'performance_measurement'=>$this->input->post('performance_measurement'),
				'time_frames'=>$this->input->post('time_frames'),
				'resources'=>$this->input->post('resources'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new PerformanceInstrument();
			$mid->add_performance_plan($data);
			$this->template($type);
		}
		else {
		$this->template($type);
		}
	}
	public function edit_personal_developmental_training($type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('development_required', '', 'required');
		$this->form_validation->set_rules('training_type', '', 'required');
		//$this->form_validation->set_rules('reason', '', 'required');
		$this->form_validation->set_rules('time_frame', '', 'required');
		$this->form_validation->set_rules('progress', '', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'development_required'=>$this->input->post('development_required'),
				'training_type'=>$this->input->post('training_type'),
				'reason'=>$this->input->post('reason'),
				'time_frame'=>$this->input->post('time_frame'),
				'progress'=>$this->input->post('progress'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new PerformanceInstrument();
			$mid->add_personal_developmental_training($data);
			$this->template($type);
		}
		else {
			$this->template($type);
		}
	}
	public function edit_pdp($type, $id)
	{

		$data = $_POST;
		$perf = new PerformanceInstrument();
		$perf->edit_pdp($id, $data);
		$this->template($type);



/*		$this->form_validation->set_rules('development_required', '', 'required');
		$this->form_validation->set_rules('training_type', '', 'required');
		//$this->form_validation->set_rules('reason', '', 'required');
		$this->form_validation->set_rules('time_frame', '', 'required');
		$this->form_validation->set_rules('progress', '', 'required');


		if($this->form_validation->run())
		{
			$data = array(
				'development_required'=>$this->input->post('development_required'),
				'training_type'=>$this->input->post('training_type'),
				'reason'=>$this->input->post('reason'),
				'time_frame'=>$this->input->post('time_frame'),
				'progress'=>$this->input->post('progress'),
			);

			$mid = new PerformanceInstrument();
			$mid->edit_pdp($id,$data);
			$this->template($type);
			//$_POST = null;
		}
		else {
			$this->template($type);
		}*/
	}
	public function add_personal_developmental_training($type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('development_required', '', 'required');
		$this->form_validation->set_rules('training_type', '', 'required');
		//$this->form_validation->set_rules('reason', '', 'required');
		$this->form_validation->set_rules('time_frame', '', 'required');
		$this->form_validation->set_rules('progress', '', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'development_required'=>$this->input->post('development_required'),
				'training_type'=>$this->input->post('training_type'),
				'reason'=>$this->input->post('reason'),
				'time_frame'=>$this->input->post('time_frame'),
				'progress'=>$this->input->post('progress'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);

				$mid = new PerformanceInstrument();
				$mid->add_personal_developmental_training($data);
				$this->template($type);
				$_POST = null;
		}
		else {
		$this->template($type);
		}
	}

	public function remove_personal_developmental_training()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$mid= new PerformanceInstrument();
		$mid->remove_personal_developmental_training($id);
		$this->template($type);
	}
	public function remove_key_government_focus_areas()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$mid= new MidYearAssessment();
		$mid->remove_key_government_focus_areas($id);
		$this->template($type);
	}
	public function remove_key_responsibility($type, $id)
	{

		$mid= new PerformanceInstrument();
		$mid->remove_key_responsibility($id);
		//$this->template($type);
	}
	public function remove_duties($type, $id)
	{

		$mid= new PerformanceInstrument();
		$mid->remove_duties($id);
		$this->template($type);
	}
	public function remove_duty_reason($type, $id)
	{

		$mid= new PerformanceInstrument();
		$mid->remove_duty_reason($id);
		$this->template($type);
	}
	public function remove_performance_plan()
	{
		$type = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$mid= new PerformanceInstrument();
		$mid->remove_performance_plan($id);
		$this->template($type);
	}
	public function update_performance($id, $type)
	{
		$this->form_validation->set_rules('job_holder_rating', '', 'required');
		//$this->form_validation->set_rules('par_score', '', 'required');
		$this->form_validation->set_rules('performance_report', '', 'required');
		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			'job_holder_rating'=>$this->input->post('job_holder_rating'),
			'par_score'=>$this->input->post('par_score'),
			'performance_report'=>$this->input->post('performance_report'),
		);

		if($this->form_validation->run())
		{
			$mid->update_performance($id, $data);
		}
		$this->template($type);
	}

	public function update_performance_ann($id, $type)
	{
		$this->form_validation->set_rules('job_holder_rating_ann', '', 'required');
		//$this->form_validation->set_rules('par_score', '', 'required');
		$this->form_validation->set_rules('performance_report_ann', '', 'required');

		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			'job_holder_rating_ann'=>$this->input->post('job_holder_rating_ann'),
			'par_score_ann'=>$this->input->post('par_score_ann'),
			'performance_report_ann'=>$this->input->post('performance_report_ann'),
		);

		if($this->form_validation->run())
		{
			$mid->update_performance($id, $data);
		}
		$this->template($type);
	}

	public function update_work_plan($id, $type)
	{
		//$this->form_validation->set_rules('actual_achievement', '', 'required');
		$this->form_validation->set_rules('sms_rating', '', 'required');
		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			//'actual_achievement'=>$this->input->post('actual_achievement'),
			'sms_rating'=>$this->input->post('sms_rating'),
			//'performance_report'=>$this->input->post('performance_report'),

		);

		if($this->form_validation->run())
		{
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$mid->update_work_plan($id, $data);
		}
		$this->template($type);
	}
	public function sup_update_work_plan($id, $s_id, $emp_id)
	{
		$this->form_validation->set_rules('supervisor_rating', '', 'required');
		$this->form_validation->set_rules('agreed_rating', '', 'required');
		//$this->form_validation->set_rules('moderated_rating', '', 'required');
		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			'supervisor_rating'=>$this->input->post('supervisor_rating'),
			'agreed_rating'=>$this->input->post('agreed_rating'),
			//'moderated_rating'=>$this->input->post('moderated_rating'),
			//'performance_report'=>$this->input->post('performance_report'),

		);

		if($this->form_validation->run())
		{
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$mid->update_work_plan($id, $data);
		}
		$this->view_submission($emp_id, $s_id);
	}
	public function update_mod_work_plan($id, $type)
	{
		$this->form_validation->set_rules('moderated_rating', '', 'required');

		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			'moderated_rating'=>$this->input->post('moderated_rating'),
		);

		if($this->form_validation->run())
		{
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$mid->update_work_plan($id, $data);
		}
		$this->template($type);
	}
	public function update_annual_moderated_work_plan($id, $type)
	{
		$this->form_validation->set_rules('moderated_rating', '', 'required');
		//$this->form_validation->set_rules('sms_rating', '', 'required');
		$ann = new AnnualAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			//'actual_achievement'=>$this->input->post('actual_achievement'),
			'moderated_rating'=>$this->input->post('moderated_rating'),
			//'performance_report'=>$this->input->post('performance_report'),

		);

		if($this->form_validation->run())
		{
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$ann->update_work_plan($id, $data);
		}
		$this->template($type);
	}
	public function update_annual_work_plan($id, $type)
	{
		$this->form_validation->set_rules('evaluated_score', '', 'required');
		//$this->form_validation->set_rules('sms_rating', '', 'required');
		$ann = new AnnualAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			//'actual_achievement'=>$this->input->post('actual_achievement'),
			'evaluated_score'=>$this->input->post('evaluated_score'),
			//'performance_report'=>$this->input->post('performance_report'),

		);

		if($this->form_validation->run())
		{
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$ann->update_work_plan($id, $data);
		}
		$this->template($type);
	}
	public function update_sup_work_plan($id, $s_id, $emp_id)
	{
		$this->form_validation->set_rules('supervisor_rating', '', 'required');
		$this->form_validation->set_rules('agreed_rating', '', 'required');
		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			'supervisor_rating'=>$this->input->post('supervisor_rating'),
			'agreed_rating'=>$this->input->post('agreed_rating'),
		);

		if($this->form_validation->run())
		{
			$mid->update_work_plan($id, $data);
		}
		$this->view_submission($emp_id, $s_id);

	}
	public function update_sup_performance($id, $s_id, $emp_id)
	{
		$this->form_validation->set_rules('supervisor_rating', '', 'required');
		$this->form_validation->set_rules('agreed_rating', '', 'required');
		$this->form_validation->set_rules('par_score', '', 'required');
		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			'supervisor_rating'=>$this->input->post('supervisor_rating'),
			'agreed_rating'=>$this->input->post('agreed_rating'),
			'par_score'=>$this->input->post('par_score'),
		);

		if($this->form_validation->run())
		{
			$mid->update_performance($id, $data);
		}
		$this->view_submission($emp_id, $s_id);

	}

	public function update_sup_performance_ann($id, $s_id, $emp_id)
	{
		$this->form_validation->set_rules('supervisor_rating_ann', '', 'required');
		$this->form_validation->set_rules('agreed_rating_ann', '', 'required');
		$this->form_validation->set_rules('par_score_ann', '', 'required');
		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			'supervisor_rating_ann'=>$this->input->post('supervisor_rating_ann'),
			'agreed_rating_ann'=>$this->input->post('agreed_rating_ann'),
			'par_score_ann'=>$this->input->post('par_score_ann'),
		);

		if($this->form_validation->run())
		{
			$mid->update_performance($id, $data);
		}
		$this->view_submission($emp_id, $s_id);

	}

	public function add_kra_name($type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('kra_name', '', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'name'=>$this->input->post('kra_name'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new PerformanceInstrument();
			$mid->add_kra($data);
			$this->template($type);
		}
		else {
			$this->template($type);
		}
	}
	public function add_kgfa_name($type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('kra_name', '', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'name'=>$this->input->post('kra_name'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$mid = new PerformanceInstrument();
			$mid->add_kgfa($data);
			$this->template($type);
		}
		else {
			$this->template($type);
		}
	}
	public function initialization()
	{
		$init = new Initialization();
		$this->form_validation->set_rules('initials','','required');
		if($this->form_validation->run())
		{
			$year = date('Y');
			$next_year = $year + 1;
			$period = $year .'/'.$next_year;
			//	id	initials	template_name	table_name	employee
			$data =  array(
				'table_name'=>$this->input->post('description'),
				'template_name'=>$this->input->post('template_name'),
				'initials'=>$this->input->post('initials'),
				'employee'=>$_SESSION['Id'],
				'period'=>$period,

			);
			$init->add_initialization($data);
		}
	}
	public function add_auditor_general_opinion_and_findings($type)
	{
		$year = date('Y');
		$next_year = $year + 1;
		$period = $year .'/'.$next_year;
		$this->form_validation->set_rules('ag_weight', '', 'required');
		$this->form_validation->set_rules('ag_assessment_score', '', 'required');
		$this->form_validation->set_rules('app_weight', '', 'required');
		$this->form_validation->set_rules('num_planned_targets', '', 'required');
		$this->form_validation->set_rules('targets_achieved', '', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'ag_weight'=>$this->input->post('ag_weight'),
				'ag_assessment_score'=>$this->input->post('ag_assessment_score'),
				'app_weight'=>$this->input->post('app_weight'),
				'num_planned_targets'=>$this->input->post('num_planned_targets'),
				'targets_achieved'=>$this->input->post('targets_achieved'),
				'period'=>$period,
				'template_name'=>$this->input->post('template_name'),
				'employee'=>$_SESSION['Id'],
			);
			$ann = new AnnualAssessment();
			$ann->add_auditor_general_opinion_and_findings($data);
			$this->template($type);
		}
		else {
			$this->template($type);
		}
	}
	public function update_key_government_focus_areas($id, $type)
	{
		//$this->form_validation->set_rules('actual_achievement', '', 'required');
		$this->form_validation->set_rules('progress_review_comment', '', 'required');
		$mid = new MidYearAssessment();
		//echo $this->input->post('job_holder_rating') . $this->input->post('par_score') . $this->input->post('performance_report');
		$data = array(
			'progress' => $this->input->post('progress'),
			'progress_review_comment' => $this->input->post('progress_review_comment'),
			//'performance_report'=>$this->input->post('performance_report'),

		);

		if ($this->form_validation->run()) {
			//echo '<script type="text/javascript">toastr.success("YOU ALREADY SUBMITTED YOUR PERFORMANCE FOR THIS FINANCIAL YEAR")</script>';
			$mid->update_key_government_focus_areas($id, $data);
		}
		$this->template($type);
	}
	public function update_performance_plan($type, $id)
	{
		$data = $_POST;
		$perf = new PerformanceInstrument();
		$perf->update_performance_plan($data, $id);
		$this->template($type);

	}
		public function remove_ip($id = null)
	{
		if($id != null)
		{
			$this->db->where('id', $id);
			$this->db->delete('individual_performance');
		}

	}
	public function update_gmc($id)
	{
		$this->form_validation->set_rules('dev_required', '', 'required');
		$this->form_validation->set_rules('process_competencies', '', 'required');
		$this->form_validation->set_rules('core_management_competencies', '', 'required');
		if($this->form_validation->run()) {
			$data = array(
				'dev_required'=>$this->input->post('dev_required'),
				'core_management_competencies'=>$this->input->post('core_management_competencies'),
				'process_competencies'=>$this->input->post('process_competencies'),
			);
			$this->db->where('id',$id);
			$this->db->update('generic_management_competencies_personal_development_plan', $data);
		}
		else{
			echo "<script>alert('Something went wrong')</script>";
		}
	}
	public function update_generic_management_competencies($id)
	{
		$this->form_validation->set_rules('dev_required', '', 'required');
		$this->form_validation->set_rules('process_competencies', '', 'required');
		$this->form_validation->set_rules('core_management', '', 'required');
		if($this->form_validation->run()) {
			$data = array(
				'dev_required'=>$this->input->post('dev_required'),
				'core_management'=>$this->input->post('core_management'),
				'process_competencies'=>$this->input->post('process_competencies'),
			);
			$this->db->where('id',$id);
			$this->db->update('generic_management_competencies', $data);
		}
		else{
			echo "<script>alert('Something went wrong')</script>";
		}
	}
}

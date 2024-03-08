<?php

class Leaves extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('PerformanceModel');
		$this->load->model('Leave');
		$this->load->model('SemesterModel');
		$this->load->database();
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "doc|docx|pdf",
			'overwrite' => FALSE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		);
		//$this->upload->initialize($config);
		$this->load->library('upload', $config);
	}
	public function index()
	{


		$semester = new SemesterModel();
		$performance = new PerformanceModel();
		$current_semester = $semester->get_current_semester();
		if(isset($current_semester))
		{
			$employee_submission = $performance->get_employee_submission($_SESSION['Id'], $current_semester->financial_year, 'PERFORMANCE INSTRUMENT');
			$data['employee_submission'] = $employee_submission;
		}


		$leaves = new Leave();
		$data['leaves'] = $leaves->my_leaves($_SESSION['Id']);
		$this->load->view('templates/header');
		$this->load->view('leaves/index', $data);
		$this->load->view('templates/footer');
	}
	public function submitted_leaves()
	{
		$this->load->view('templates/header');
		$this->load->view('leaves/submitted_leaves');
		$this->load->view('templates/footer');
	}
	public function leave_types()
	{
		$this->load->view('templates/header');
		$this->load->view('leaves/leave_types');
		$this->load->view('templates/footer');
	}
	public function create_leave()
	{
		$emp = new Leave();
		$form_data['employees'] = $emp->get_employees();
		$this->load->view('templates/header');
		$this->load->view('leaves/create_leave', $form_data);
		$this->load->view('templates/footer');
	}
	public function leave_application()
	{

		if(isset($_POST['leave_type']))
		{
			$this->form_validation->set_rules('start_date', '', 'required');
			$this->form_validation->set_rules('end_date', '', 'required');



			if($this->form_validation->run())
			{
				echo $this->input->post('attachment');
				//$attachment = '';
				if($this->upload->do_upload('attachment')){
					$output = $this->upload->data();

					$file_name = $output['file_name'];
					$file_path = $output['file_path'];
					$attachment = $file_path.$file_name;
				}
				$data = array(
					'start_date'=>$this->input->post('start_date'),
					'end_date'=>$this->input->post('end_date'),
					'leave_type'=>$this->input->post('leave_type'),
					'employee'=>$_SESSION['Id'],
					'comment'=>$this->input->post('comment'),
					'attachment'=>$attachment,
				);
				$this->db->insert('leaves', $data);
				redirect('leaves');
			}
		}
		//$this->db->where('supervisorid', $_SESSION['Id']);
		//$data['employees'] = $this->db->get('employees')->result_array();
		$this->load->view('templates/header');
		$this->load->view('leaves/leave_application');
		$this->load->view('templates/footer');
	}
	public function process_download($name)
	{
		$this->load->helper('download');
		$data = file_get_contents(base_url('upload/'.$name));
		force_download($name, $data);
	}

}

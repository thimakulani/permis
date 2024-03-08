<?php

class Library extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
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
		$this->load->view('templates/header');
		$this->load->view('library/index');
		$this->load->view('templates/footer');
	}
	public function memo_and_schedule()
	{
		$this->db->where('file_type', 'MEMOS AND SCHEDULES');
		$data['memo_and_schedule'] = $this->db->get('attachments')->result_array();
		$this->load->view('templates/header');
		$this->load->view('library/memo_and_schedule',$data);
		$this->load->view('templates/footer');
	}
	public function minutes()
	{
		$this->db->where('file_type', 'MINUTES');
		$data['minutes'] = $this->db->get('attachments')->result_array();
		$this->load->view('templates/header');
		$this->load->view('library/minutes',$data);
		$this->load->view('templates/footer');
	}

	public function monthly_and_quarterly()
	{
		$this->db->where('file_type', 'MONTHLY AND QUARTERLY');
		$data['monthly_and_quarterly'] = $this->db->get('attachments')->result_array();
		$this->load->view('templates/header');
		$this->load->view('library/monthly_and_quarterly',$data);
		$this->load->view('templates/footer');
	}
	public function attendance_register()
	{
		$this->db->where('file_type', 'ATTENDANCE REGISTER');
		$data['attendance_register'] = $this->db->get('attachments')->result_array();
		$this->load->view('templates/header');
		$this->load->view('library/attendance_register',$data);
		$this->load->view('templates/footer');
	}


	public function add_memo_and_schedule()
	{
		$this->load->view('templates/header');
		$this->load->view('library/add_memo_and_schedule');
		$this->load->view('templates/footer');
	}
	public function add_monthly_and_quarterly()
	{
		$this->load->view('templates/header');
		$this->load->view('library/add_monthly_and_quarterly');
		$this->load->view('templates/footer');
	}
	public function add_minutes()
	{
		$this->load->view('templates/header');
		$this->load->view('library/add_minutes');
		$this->load->view('templates/footer');
	}
	public function add_attendance_register()
	{
		$this->load->view('templates/header');
		$this->load->view('library/add_attendance_register');
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->form_validation->set_rules('name', '', 'required');
		$this->form_validation->set_rules('description', '', 'required');
		$name = $this->input->post('name');
		if($this->form_validation->run()){
			echo $this->input->post('attachment');
			$file_name = '';
			$attachment = '';
			if($this->upload->do_upload('attachment')){
				$output = $this->upload->data();

				$file_name = $output['file_name'];
				$file_path = $output['file_path'];
				$attachment = $file_path.$file_name;
			}
			$data = array(
				'name'=>$this->input->post('name'),
				'employee'=>$_SESSION['Id'],
				'description'=>$this->input->post('description'),
				'path'=>$attachment,
				'given_name'=>$file_name,
				'file_type'=>$this->input->post('file_type'),
			);
			$this->db->insert('attachments', $data);
			redirect('library/'.$this->input->post('navigation'));
		}
	}










	public function process_download($id = null)
	{
		if(isset($id))
		{
			$this->db->where('id', $id);
			$file = $this->db->get('attachments')->row();
			$this->load->helper('download');
			$data = file_get_contents(base_url('uploads/'.$file->given_name));
			force_download($file->given_name, $data);
		}

	}
}

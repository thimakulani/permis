<?php

class Branch extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
	}
	public function index()
	{
		if(isset($_POST['add_b']))
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			$data = array('name'=>$this->input->post('name'));
			$this->db->insert('branch', $data);
		}

		$branches = $this->db->get('branch')->result_array();

		$data['branch'] = $branches;
		$this->load->view('templates/header');
		$this->load->view('branch/index', $data);
		$this->load->view('templates/footer');
	}

}

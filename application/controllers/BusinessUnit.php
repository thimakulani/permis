<?php

class BusinessUnit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('BusinessUnitModel');
	}
	public function index()
	{
		$b_u = new BusinessUnitModel();
		$form_data['business_unit'] = $b_u->get_business_unit();
		$this->load->view('templates/header');
		$this->load->view('business_unit/index', $form_data);
		$this->load->view('templates/footer');
	}
	public function sub_directorate()
	{
		if(isset($_POST['add']))
		{
			$data = array(
				'name'=>$this->input->post('name'),
				'directorate'=>$this->input->post('directorate'),
			);
			$this->db->insert('sub_directorate', $data);
		}
		$b_u = new BusinessUnitModel();
		$form_data['sub_directorate'] = $b_u->get_sub_business_unit();
		$form_data['directorate'] = $b_u->get_business_unit();
		$this->load->view('templates/header');
		$this->load->view('business_unit/sub_directorate', $form_data);
		$this->load->view('templates/footer');
	}
	public function add_business_unit()
	{
		$this->form_validation->set_rules('name', '', 'required');
		if($this->form_validation->run())
		{
			$data = array(
				'name'=> $this->input->post('name'),
			);
			$b_u = new BusinessUnitModel();
			$b_u->add_business_unit($data);
		}
		$this->index();
	}
	public function update_directorate($id = null)
	{
		if($id!=null)
		{
			$data = array(
				'name'=> $this->input->post('name'),
			);
			$this->db->where('id', $id);
			$this->db->update('directorate', $data);
		}
	}
	public function update_sub_directorate($id = null)
	{
		if($id!=null)
		{
			$data = array(
				'name'=> $this->input->post('name'),
				'directorate'=> $this->input->post('name'),
			);
			$this->db->where('id', $id);
			$this->db->update('sub_directorate', $data);
		}
	}
}

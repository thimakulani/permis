<?php

class Assessments extends CI_Controller
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
		$this->db->select('performance_assessment.id, performance_assessment.date_captured, performance_assessment.period, performance_assessment.template_name');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.persal");
		$this->db->select("sup.Name as s_name, sup.LastName as s_last, sup.id as sup_id");
		$this->db->from('performance_assessment');
		$this->db->join('employees as sup', 'performance_assessment.supervisor = sup.Id');
		$this->db->join('employees as emp', 'performance_assessment.employee = emp.Id');
		$result_array = $this->db->get()->result_array();
		$data['submissions'] = $result_array;
		$this->load->view('templates/header');
		$this->load->view('assessments/index', $data);
		$this->load->view('templates/footer');
	}
	public function edit($id)
	{
		$this->db->select("lastname , name, id");
		$users = $this->db->get('employees')->result_array();
		$data['super_visor'] = $users;
		$data['id'] = $id;
		$this->load->view('templates/header');
		$this->load->view('assessments/edit', $data);
		$this->load->view('templates/footer');
	}
	public function update()
	{

		if($this->input->post('supervisor') !== null &&  $this->input->post('assessment_id') !== null)
		{
			$data = array('supervisor'=> $this->input->post('supervisor'));
			$this->db->where('id', $this->input->post('assessment_id'));
			$this->db->update('performance_assessment', $data);
			$this->index();
		}
		$this->index();
	}

}

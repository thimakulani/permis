<?php

class Special extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();
	}
	public function emp_special_request()
	{
		$this->load->view('templates/header');
		$this->load->view('emp_special_request/index');
		$this->load->view('templates/footer');
	}
	public function request(){

	}
	public function index()
	{
		$this->db->select('emp_special_request.id, emp_special_request.start_date, emp_special_request.leave_type, emp_special_request.end_date, emp_special_request. attachment, emp_special_request.comment, emp_special_request.status, emp_special_request.employee,  emp_special_request.recommender, emp_special_request.approver');
		$this->db->select("CONCAT(e.name,' ', e.lastname) AS emp");
		$this->db->from('emp_special_request');
		$this->db->join('employees e', 'emp_special_request.employee = e.id');

		$leaves = $this->db->get()->result_array();

		$view_data['emp_special_request'] = $leaves;
		$this->load->view('templates/header');
		$this->load->view('special_requests/index', $view_data);
		$this->load->view('templates/footer');
	}

	public function recommended()
	{
		$this->db->select('emp_special_request.id, emp_special_request.start_date, emp_special_request.end_date, emp_special_request.attachment, emp_special_request.comment, 
		emp_special_request.status, emp_special_request.employee, emp_special_request.recommender, emp_special_request.approver, emp_special_request.leave_type');
		$this->db->select("CONCAT(emp.name, ' ', emp.lastname) recommended_by");
		$this->db->from('emp_special_request');
		$this->db->join('employees AS emp', 'emp_special_request.recommender = emp.id');
		$this->db->where('emp_special_request.status', 'RECOMMENDED');
		$recommended = $this->db->get()->result_array();

		$data['recommended'] = $recommended;
		$this->load->view('templates/header');
		$this->load->view('special_requests/recommended', $data);
		$this->load->view('templates/footer');
	}
	public function view($id = null)
	{
		$this->db->select('emp_special_request.id, emp_special_request.start_date, emp_special_request.leave_type, emp_special_request.end_date, emp_special_request. attachment, 
								emp_special_request.comment, emp_special_request.status, emp_special_request.employee,  emp_special_request.recommender, emp_special_request.approver');
		$this->db->select("CONCAT(e.name,' ', e.lastname) AS emp");
		$this->db->select("CONCAT(emp.name,' ', emp.lastname) AS recommended_by");
		$this->db->from('emp_special_request');
		$this->db->join('employees e', 'emp_special_request.employee = e.id');
		$this->db->join('employees AS emp', 'emp_special_request.recommender = emp.id');
		$this->db->where('emp_special_request.id', $id);
		$leave = $this->db->get()->row();
		$data['leave'] = $leave;

		$this->load->view('templates/header');
		$this->load->view('special_requests/view', $data);
		$this->load->view('templates/footer');
	}
	public function recommend($id = null)
	{
		if($id!=null)
		{
			$this->db->where('id', $id);
			$this->db->update('emp_special_request', array('status'=>'RECOMMENDED', 'recommender'=>$_SESSION['Id']));
		}
	}
	public function approve($id = null)
	{
		if($id!=null)
		{
			$this->db->where('id', $id);
			$this->db->update('emp_special_request', array('status'=>'APPROVED', 'approver'=>$_SESSION['Id']));
		}
	}
}

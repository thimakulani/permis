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

	public function index()
	{
		$this->db->select('leaves.id, leaves.start_date, leaves.leave_type, leaves.end_date, leaves. attachment, leaves.comment, leaves.status, leaves.employee,  leaves.recommender, leaves.approver');
		$this->db->select("CONCAT(e.name,' ', e.lastname) AS emp");
		$this->db->from('leaves');
		$this->db->join('employees e', 'leaves.employee = e.id');

		$leaves = $this->db->get()->result_array();

		$view_data['leaves'] = $leaves;
		$this->load->view('templates/header');
		$this->load->view('special_requests/index', $view_data);
		$this->load->view('templates/footer');
	}

	public function recommended()
	{
		$this->db->select('leaves.id, leaves.start_date, leaves.end_date, leaves.attachment, leaves.comment, 
		leaves.status, leaves.employee, leaves.recommender, leaves.approver, leaves.leave_type');
		$this->db->select("CONCAT(emp.name, ' ', emp.lastname) recommended_by");
		$this->db->from('leaves');
		$this->db->join('employees AS emp', 'leaves.recommender = emp.id');
		$this->db->where('leaves.status', 'RECOMMENDED');
		$recommended = $this->db->get()->result_array();

		$data['recommended'] = $recommended;
		$this->load->view('templates/header');
		$this->load->view('special_requests/recommended', $data);
		$this->load->view('templates/footer');
	}
	public function view($id = null)
	{
		$this->db->select('leaves.id, leaves.start_date, leaves.leave_type, leaves.end_date, leaves. attachment, 
								leaves.comment, leaves.status, leaves.employee,  leaves.recommender, leaves.approver');
		$this->db->select("CONCAT(e.name,' ', e.lastname) AS emp");
		$this->db->select("CONCAT(emp.name,' ', emp.lastname) AS recommended_by");
		$this->db->from('leaves');
		$this->db->join('employees e', 'leaves.employee = e.id');
		$this->db->join('employees AS emp', 'leaves.recommender = emp.id');
		$this->db->where('leaves.id', $id);
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
			$this->db->update('leaves', array('status'=>'RECOMMENDED', 'recommender'=>$_SESSION['Id']));
		}
	}
	public function approve($id = null)
	{
		if($id!=null)
		{
			$this->db->where('id', $id);
			$this->db->update('leaves', array('status'=>'APPROVED', 'approver'=>$_SESSION['Id']));
		}
	}
}

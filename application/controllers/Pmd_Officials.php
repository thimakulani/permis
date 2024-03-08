<?php

class Pmd_Officials extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('EmployeeModel');
		$this->load->model('PerformanceModel');
		$this->load->database();
	}
	public function index($id = null)
	{
		//$id = $_SESSION['Id'];
		if(isset($_POST['assign']) && $id != null)
		{
			$arr_data = array(
				'assigned_directorate'=>$this->input->post('directorate'),
			);
			$this->db->where('id', $id);
			$this->db->update('employees', $arr_data);
		}

		$sql = "SELECT CONCAT(emp.name, ' ', emp.lastname) AS names, emp.id, d.name dir, emp.assigned_directorate assigned, emp.Role\n"
			. "From employees emp, directorate as d\n"
			. "WHERE emp.Role = 3\n"
			. "AND\n"
			. "(emp.assigned_directorate = d.id OR emp.assigned_directorate IS NULL)\n"
			. "GROUP BY emp.id;";

		$results = $this->db->query($sql);


		/*$this->db->select("CONCAT(employees.name, ' ', employees.lastname) as names, employees.id");
		$this->db->select('d.name as dir');
		$this->db->from('employees');
		$this->db->join('directorate d', 'employees.assigned_directorate = d.id');
		$this->db->where('role', 2);
		$this->db->where('d.id = employees.assigned_directorate OR employees.assigned_directorate IS NULL');
		$this->db->group_by('employees.id');*/


		$data['users'] = $results->result_array();
		$data['directorate'] = $this->db->get('directorate')->result_array();
		$this->load->view("templates/header");
		$this->load->view("Pmd_Officials/index", $data);
		$this->load->view("templates/footer");


	}
	public function pmd_view()
	{
		$this->load->view("templates/header");
		$this->load->view("Pmd_Officials/pmd");
		$this->load->view("templates/footer");
	}

	public function reviewed()
	{
		$performanceModel = new PerformanceModel();
		$row = $performanceModel->get_submissions_pmds($_SESSION['Id']);
		$data['performance'] = $performanceModel->pmds($row->emp_id,$_SESSION['Id']);
		$this->load->view("templates/header");
		$this->load->view("Pmd_Officials/pms_recommended",$data);
		$this->load->view("templates/footer");
	}

	public function pmds_approve($id, $emp)
	{
		$data = array(
			'status' => 'ACCEPTED',
			'status_final' => NULL,
		);
		$this->db->where('id', $id);
		$this->db->where('employee', $emp);
		$this->db->where('template_name', 'PERFORMANCE INSTRUMENT');
		$this->db->update('performance_assessment', $data);
		$this->reviewed();
	}

	public function pmds_approve_ann($id, $emp)
	{
		$data = array(
			'status' => 'ACCEPTED',
			'status_final' => NULL,
		);
		$this->db->where('id', $id);
		$this->db->where('employee', $emp);
		$this->db->where('template_name', 'ANNUAL ASSESSMENT');
		$this->db->update('performance_assessment', $data);
		$this->reviewed();
	}

	public function pmds_approve_mid($id, $emp)
	{
		$data = array(
			'status' => 'ACCEPTED',
			'status_final' => NULL,
		);
		$this->db->where('id', $id);
		$this->db->where('employee', $emp);
		$this->db->where('template_name', 'MID YEAR ASSESSMENT');
		$this->db->update('performance_assessment', $data);
		$this->reviewed();
	}


	public function pmds_reject($id, $emp)
	{

		$data = array(
			'pmd_comment' => $this->input->post('pmds_reason'),
			'status_final' => 'REJECTED'
		);
		$this->db->where('id', $id);
		$this->db->where('employee', $emp);
		$this->db->where('template_name', 'PERFORMANCE INSTRUMENT');
		$this->db->update('performance_assessment', $data);
		$this->reviewed();
	}

	public function pmds_reject_mid($id, $emp)
	{

		$data = array(
			'pmd_comment' => $this->input->post('pmds_reason'),
			'status_final' => 'REJECTED'
		);
		$this->db->where('id', $id);
		$this->db->where('employee', $emp);
		$this->db->where('template_name', 'MID YEAR ASSESSMENT');
		$this->db->update('performance_assessment', $data);
		$this->reviewed();
	}

	public function pmds_reject_ann($id, $emp)
	{

		$data = array(
			'pmd_comment' => $this->input->post('pmds_reason'),
			'status_final' => 'REJECTED'
		);
		$this->db->where('id', $id);
		$this->db->where('employee', $emp);
		$this->db->where('template_name', 'ANNUAL ASSESSMENT');
		$this->db->update('performance_assessment', $data);
		$this->reviewed();
	}

}

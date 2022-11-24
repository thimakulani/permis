<?php

class EmployeeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_user($data)
	{
		$this->db->insert('employees', $data);
	}
	public function get_all_users()
	{
		$results = $this->db->get('employees');
		return $results->result_array();
	}
	public function get_user($id)
	{
		$this->db->where('Id', $id);
		$results = $this->db->get('employees');
		return $results->row();
	}

	public function get_spcific_job_title($jobtitle)
	{
		//Name	LastName
		$this->db->select("Employees.Id, CONCAT(Employees.Name, ' ', Employees.Lastname) AS Names");
		$this->db->from('Employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->where('Positions.PositionName', $jobtitle);
		$results = $this->db->get();
		return $results->result_array();
	}
}

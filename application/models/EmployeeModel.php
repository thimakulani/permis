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

		$this->db->select("Employees.Id, Employees.Persal, Employees.Name , Employees.LastName, Employees.Name");
		$this->db->select("Employees.Email, Positions.PositionName as JobTitle, Concat(supervisor.Name, ' ' , supervisor.LastName) as S_Name, Concat(manager.Name, ' ' , manager.LastName) as M_Name, Employees.Status");
		$this->db->select("Employees.DateHired");
		$this->db->from('Employees');
		$this->db->join('Employees manager', 'Employees.ManagerId = manager.Id');
		$this->db->join('Employees supervisor', 'Employees.SupervisorId = supervisor.Id');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$results = $this->db->get();
		return $results->result_array();
	}
	public function get_user($id)
	{
		$this->db->select("Employees.Id, Employees.Name, Employees.LastName, Employees.Email, Employees.Gender, Employees.IdNumber, Employees.Persal, Employees.DateHired, 
		Employees.DateCreated, Employees.DateContracted, Concat(supervisor.Name, ' ' , supervisor.LastName) as S_Name ,supervisor.Id as S_Id, Concat(manager.Name, ' ' , manager.LastName) as M_Name, manager.Id as M_Id, Employees.Role, Employees.Race, Districts.DistrictName, Employees.Status, Employees.Contact,
		 Positions.PositionName as JobTitle, ");
		$this->db->join('Employees manager', 'Employees.ManagerId = manager.Id');
		$this->db->join('Employees supervisor', 'Employees.SupervisorId = supervisor.Id');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('Districts', 'Employees.DistrictId = Districts.DistrictId');
		$this->db->where('Employees.Id', $id);

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
	public function get_employee_count()
	{
		return $this->db->get('employees')->num_rows();
	}
}

<?php

class EmployeeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function updatestatus($id, $data)
	{
		$this->db->where('Id', $id);
		$this->db->update('employees', $data);
	}

	public function updateprofile($id, $data)
	{
		$this->db->where('Id', $id);
		$this->db->update('employees', $data);
	}
	public function get_emp_list()
	{
		$this->db->select("Employees.Id, Employees.Persal, Employees.Name , Employees.LastName");
		$this->db->select("Employees.Email, Positions.PositionName as JobTitle, Concat(supervisor.Name, ' ' , supervisor.LastName) as S_Name, Employees.Status");
		$this->db->from('Employees');
		$this->db->join('Employees supervisor', 'Employees.SupervisorId = supervisor.Id');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->where("Employees.SupervisorId = supervisor.Id");
		//$this->db->or_where("Employees.SupervisorId", '');

		$results = $this->db->get();
		return $results->result_array();
	}

	public function add_user($data)
	{
		$this->db->insert('employees', $data);
	}
	public function get_all_users()
	{
		$this->db->select("Employees.Id, Employees.IdNumber, Employees.Gender, Employees.Race,Employees.Persal, Employees.Name , Employees.LastName, Employees.Name,Employees.Disability");
		$this->db->select("Employees.Email, Positions.PositionName as JobTitle, Concat(supervisor.Name, ' ' , supervisor.LastName) as S_Name, Employees.Status");
		$this->db->select("Employees.SalaryLevelEntryDate, Employees.AppointmentDate,  Employees.SalaryLevel");
		$this->db->select("Districts.DistrictName as District");
		$this->db->from('Employees');
		$this->db->join('Districts', 'Employees.DistrictId = Districts.DistrictId');
		$this->db->join('Employees supervisor', 'Employees.SupervisorId = supervisor.Id');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$results = $this->db->get();
		return $results->result_array();
	}
	public function  get_user($id)
	{
		$this->db->select("Employees.Id, Employees.branch AS br, Employees.Name, Employees.LastName, Employees.Email, Employees.Gender, Employees.IdNumber, Employees.Persal, Employees.Disability,
							Employees.DateCreated, Employees.JobTitle AS JT , Employees.DateContracted, Concat(supervisor.Name, ' ' , supervisor.LastName) as S_Name,Concat(pmd.Name, ' ' , pmd.LastName) as Pmd_Name ,supervisor.Id as S_Id, Employees.Role, Employees.Race, Districts.DistrictName, Employees.Status, Employees.Contact,
							Positions.PositionName as JobTitle, Employees.SalaryLevel, Employees.directorate, Employees.sub_directorate");
		$this->db->select("Employees.SalaryLevelEntryDate, Employees.AppointmentDate",'left');
		$this->db->join('Employees supervisor', 'Employees.SupervisorId = supervisor.Id','left');
		$this->db->join('Employees pmd', 'Employees.pmd = pmd.Id','left');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId','left');
		$this->db->join('Districts', 'Employees.DistrictId = Districts.DistrictId','left');
		$this->db->where('Employees.Id', $id);
		$results = $this->db->get('employees');
		return $results->row();
	}

	public function get_single_user($id)
	{
		$this->db->where('Id', $id);
		return $this->db->get('employees')->row();
	}
	public function get_supervisor()
	{
		//Name	LastName
		$this->db->where('Persal !=', 12345);
		$results = $this->db->get('employees');
		return $results->result_array();
	}

	public function get_pmd_official()
	{
		$this->db->where('Persal !=', 12345);
		$this->db->where('Role',3);
		$this->db->or_where('Role', 6);
		$results = $this->db->get('employees');
		return $results->result_array();
	}
	public function get_employee_count()
	{
		return $this->db->get('employees')->num_rows();
	}

	public function get_not_complient_users()
	{
		$this->db->select("Employees.Id,Employees.Persal,Employees.Name,Employees.LastName,Positions.PositionName as JobTitle,Dist.DistrictName as District");
		$this->db->from('employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('districts Dist', 'Employees.DistrictId = Dist.DistrictId');
		$this->db->where("employees.Id NOT IN (SELECT employee FROM performance_assessment)");
		$results =  $this->db->get();
		return $results->result_array();
	}
	public function get_submissions()
	{
		$this->db->select("Employees.Id,Employees.Persal,Employees.Name,Employees.LastName,Positions.PositionName as JobTitle,Dist.DistrictName as District");
		$this->db->from('employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('districts Dist', 'Employees.DistrictId = Dist.DistrictId');
		$this->db->where("employees.Id NOT IN (SELECT employee FROM performance_assessment)");
		$this->db->or_where("employees.Id IN (SELECT employee FROM performance_assessment)");
		$results =  $this->db->get();
		return $results->result_array();
	}
	public function get_compliant($contract_type, $year, $directorate, $branch, $sub_directorate, $status, $salary_level)
	{

		$this->db->distinct();
		$this->db->select("Employees.Id, Sub.employee, Employees.Persal, Employees.Name, Employees.LastName, Positions.PositionName as JobTitle, br.name as br_name");
		$this->db->from('employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('branch br', 'Employees.branch = br.id');
		$this->db->join('performance_assessment Sub', 'Sub.employee = Employees.Id', 'left');
		$this->db->where('employees.Id <>', 1); // Avoiding magic numbers, replace 1 with actual ID
		$this->db->where('Sub.employee IS NOT NULL'); // Equivalent to 'employees.id IN (SELECT employee FROM performance_assessment )'

		if ($status == 'A') {
			$this->db->where('Sub.status', 'APPROVED');
			$this->db->where('Sub.status_final', 'PENDING');
		} elseif ($status == 'B') {
			$this->db->where('Sub.status_final', 'PENDING');
		} elseif ($status == 'C') {
			$this->db->where('Sub.status_final', 'APPROVED');
		}

		if ($contract_type !== null) {
			$this->db->where('Sub.template_name', $contract_type);
		}

		if ($year !== null) {
			$this->db->where('Sub.period', $year);
		}

		if ($directorate !== null) {
			$this->db->where('Employees.Directorate', $directorate);
		}

		if ($branch !== null) {
			$this->db->where('br.id', $branch);
		}

		if ($sub_directorate !== null) {
			$this->db->where('Employees.Sub_Directorate', $sub_directorate);
		}

		if ($salary_level == 'A') {
			$this->db->where("Employees.SalaryLevel BETWEEN 1 AND 12");
		} elseif ($salary_level == 'B') {
			$this->db->where("Employees.SalaryLevel BETWEEN 13 AND 16");
		}

		$results = $this->db->get();
		return $results->result_array();

	}
	public function get_complient_users($contract_type, $year)
	{
		$this->db->distinct();
		$this->db->select("Employees.Id,Sub.employee,Employees.Persal,Employees.Name,Employees.LastName,Positions.PositionName as JobTitle,Dist.DistrictName as District");
		$this->db->from('employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('districts Dist', 'Employees.DistrictId = Dist.DistrictId');
		$this->db->join('performance_assessment Sub','Sub.employee = Employees.Id');
		$this->db->where('employees.id IN (SELECT employee FROM performance_assessment)');
		$this->db->where('template_name', $contract_type);
		$this->db->where('period',$year);
		$results =  $this->db->get();
		return $results->result_array();
	}
	public function get_user_incomplete_profile($id)
	{
		$this->db->where('id', $id);
		$results = $this->db->get('employees');
		return $results->row();
	}
	public function get_profile($id)
	{
		$this->db->select("Employees.Name, Employees.id, Employees.LastName, Employees.Email, Employees.Gender, Employees.IdNumber, Employees.Persal, Employees.Disability,
							Employees.DateCreated, Employees.DateContracted, supervisor.LastName as S_Name, supervisor.Name as S_Fname, supervisor.Id as S_Id, Employees.Role, Employees.Race, Districts.DistrictName, Employees.Status, Employees.Contact,
							Positions.PositionName as JobTitle, Employees.SalaryLevel");
		$this->db->select("Employees.SalaryLevelEntryDate, Employees.AppointmentDate");
		$this->db->select("Roles.RoleName");
		$this->db->select("b.name AS b_name");
		$this->db->join('Employees supervisor', 'Employees.SupervisorId = supervisor.Id', 'left');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId', 'left');
		$this->db->join('Districts', 'Employees.DistrictId = Districts.DistrictId', 'left');
		$this->db->join('Roles', 'Roles.RoleId = Employees.Role', 'left');
		$this->db->join('branch b', 'Employees.branch = b.id', 'left');
		$this->db->where('Employees.Id', $id);

		$results = $this->db->get('employees');
		return $results->row();
	}

	public function get_complient_users_by_year_and_bu($buId, $finYear)
	{
		$this->db->distinct();
		$this->db->select("Employees.Id,Sub.employee,Employees.Persal,Employees.Name,Employees.LastName,Positions.PositionName as JobTitle,Dist.DistrictName as District");
		$this->db->from('employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('districts Dist', 'Employees.DistrictId = Dist.DistrictId');
		$this->db->join('business_unit bu','bu.id = Employees.business_unit');
		$this->db->join('performance_assessment Sub','Sub.employee = Employees.Id');
		$this->db->where('employees.id IN (SELECT employee FROM performance_assessment)');


		if($finYear !== "SELECT YEAR")
		{
			$this->db->where('Sub.period', $finYear );

		}
		if($buId !== "BUSINESS UNIT" || $buId !== 'ALL')
		{
			$this->db->where('bu.id', $buId );

		}


		$results =  $this->db->get();
		return $results->result_array();
	}
	public function report_to_me($id)
	{
		$this->db->where('supervisorid', $id);
		return $this->db->get('employees')->num_rows();
	}



/*
	public function get_compliant($contract_type, $year, $directorate, $branch, $sub_directorate, $status, $salary_level)
	{
		$this->db->distinct();
		$this->db->select("Employees.Id,Sub.employee,Employees.Persal,Employees.Name,Employees.LastName,Positions.PositionName as JobTitle, br.name as br_name");
		$this->db->from('employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('branch br', 'Employees.branch = br.id');
		$this->db->join('performance_assessment Sub','Sub.employee = Employees.Id');
		$this->db->where('employees.id IN (SELECT employee FROM performance_assessment )');
		$this->db->where('employees.role <> 2');
		
		if($status == 'A'){
			$this->db->where('Sub.status = "APPROVED"')
			->where('Sub.status_final = "PENDING"');
		}
		if($status == 'B'){
			$this->db->where('Sub.status_final = "PENDING"');
		}
		if($status == 'C'){
			$this->db->where('Sub.status_final = "APPROVED"');
		}
		if($contract_type !== null)
		{
			$this->db->where('Sub.template_name', $contract_type);
		}
		if($year !== null)
		{
			$this->db->where('Sub.period',$year);
		}
		if($directorate !== null)
		{
			$this->db->where('Employees.Directorate', $directorate);
		}
		if($branch !== null)
		{
			$this->db->where('br.id',$branch);
		}
		if($sub_directorate !== null)
		{
			$this->db->where('Employees.Sub_Directorate', $sub_directorate);
		}
		if($salary_level == 'A')
		{
			$this->db->where("Employees.SalaryLevel BETWEEN 1 AND 12");
		}
		if($salary_level == 'B')
		{
			$this->db->where("Employees.SalaryLevel BETWEEN 13 AND 16");
		}

		$results =  $this->db->get();
		return $results->result_array();
	}*/

	public function get_none_compliant($contract_type, $year, $directorate, $branch, $sub_directorate)
	{
		$this->db->select("Employees.Id, Employees.Persal, Employees.Name, Employees.LastName, Positions.PositionName as JobTitle, br.name as br_name");
		$this->db->from('employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('branch br', 'Employees.branch = br.id');
		$this->db->join('performance_assessment', 'Employees.Id = performance_assessment.employee', 'left');
		$this->db->where('performance_assessment.employee IS NULL');
		//$this->db->where('performance_assessment.period', '2023/2024');

		if ($year !== null) {
			$this->db->where('performance_assessment.period', $year);
		}
		if ($contract_type !== null) {
			$this->db->where('performance_assessment.template_name', $contract_type);
		}
		if ($directorate !== null) {
			$this->db->where('Employees.Directorate', $directorate);
		}
		if ($branch !== null) {
			$this->db->where('br.id', $branch);
		}
		if ($sub_directorate !== null) {
			$this->db->where('Employees.Sub_Directorate', $sub_directorate);
		}
		$results =  $this->db->get();
		return $results->result_array();
	}

    public function current_get_supervisor($current_user)
    {
		$this->db->where('persal <> 12345');
		$this->db->where("SalaryLevel >= $current_user->SalaryLevel");
		return $this->db->get('Employees')->result_array();
    }

	public function validate_persal($post)
	{
		$this->db->where('persal', $post);
		return $this->db->get('employees')->num_rows();
	}


}

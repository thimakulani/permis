<?php

class Reports extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('EmployeeModel');
		$this->load->model('DistrictModel');
		$this->load->model('PerformanceModel');
		$this->load->model('BusinessUnitModel');
		//$this->load->library('email');
	}
	public function index()
	{
		$data['title'] = 'REPORTS';
		$this->load->view('templates/header', $data);
		$this->load->view('reports/index');
		$this->load->view('templates/footer');
	}
	public function employeerep()
	{
				$y = date('y');

		$this->db->select("Employees.Id, SUBSTRING(Employees.IdNumber, 1, 2) - $y as Age, Employees.Gender, Employees.Race,Employees.Persal, Employees.Name , Employees.LastName, Employees.Name,Employees.Disability");
		$this->db->select("Employees.Email, Positions.PositionName as JobTitle, Concat(supervisor.Name, ' ' , supervisor.LastName) as S_Name, Employees.Status");
		$this->db->select("Employees.SalaryLevelEntryDate, Employees.AppointmentDate,  Employees.SalaryLevel");
		$this->db->select("Districts.DistrictName as District");
		$this->db->from('Employees');
		$this->db->join('Districts', 'Employees.DistrictId = Districts.DistrictId');
		$this->db->join('Employees supervisor', 'Employees.SupervisorId = supervisor.Id');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->where('employees.role <> 2');
		if(isset($_POST['filter']))
		{
			$value = $this->input->post('age_group');

			if($value == 'A')
			{
				//$this->db->where('SUBSTRING(Employees.IdNumber, 1, 2) -  >=', 25);
				//$this->db->where('SUBSTRING(Employees.IdNumber, 1, 2) <=', 35);
				$this->db->where("SUBSTRING(Employees.IdNumber, 1, 2)-$y BETWEEN 25 AND 35")
				->or_where("$y-SUBSTRING(Employees.IdNumber, 1, 2) BETWEEN 25 AND 35");
			}
			if($value == 'B')
			{
				//$this->db->where('SUBSTRING(Employees.IdNumber, 1, 2) -  >=', 25);
				//$this->db->where('SUBSTRING(Employees.IdNumber, 1, 2) <=', 35);
				$this->db->where("SUBSTRING(Employees.IdNumber, 1, 2)-$y BETWEEN 36 AND 45")
					->or_where("$y-SUBSTRING(Employees.IdNumber, 1, 2) BETWEEN 36 AND 45");
			}
			if($value == 'C')
			{
				//$this->db->where('SUBSTRING(Employees.IdNumber, 1, 2) -  >=', 25);
				//$this->db->where('SUBSTRING(Employees.IdNumber, 1, 2) <=', 35);
				$this->db->where("SUBSTRING(Employees.IdNumber, 1, 2)-$y BETWEEN 46 AND 55")
					->or_where("$y-SUBSTRING(Employees.IdNumber, 1, 2) BETWEEN 46 AND 55");
			}
			if($value == 'D')
			{
				//$this->db->where('SUBSTRING(Employees.IdNumber, 1, 2) -  >=', 25);
				//$this->db->where('SUBSTRING(Employees.IdNumber, 1, 2) <=', 35);
				$this->db->where("SUBSTRING(Employees.IdNumber, 1, 2)-$y BETWEEN 56 AND 65")
					->or_where("$y-SUBSTRING(Employees.IdNumber, 1, 2) BETWEEN 56 AND 65");
			}

		}
		$results = $this->db->get();

		$data['all_users'] = $results->result_array();
		$title['title'] = 'REPORTS';
		$this->load->view('templates/header', $data);
		$this->load->view('reports/employeereport');
		$this->load->view('templates/footer');
	}
	public function query_report()
	{
		$compliance = $this->input->post('compliance');
		$financial_year = $this->input->post('financial_year');

		$emp = new EmployeeModel();

		$data['all_users'] = $emp->filter($compliance, $financial_year);
		$this->load->view('templates/header');
		$this->load->view('reports/employeerep_unsub', $data);
		$this->load->view('templates/footer');
	}

	public function track()
	{
		$branch = null;
		if(isset($_POST['filter_branch']))
		{
			$branch = $this->input->post('branch');
			$_SESSION['branch'] = $this->input->post('branch');
		}
		else{
			if(isset($_SESSION['branch']))
			{
				$branch = $_SESSION['branch'];
			}
		}
		
		$br = $this->db->get('branch')->result_array();
		
		$this->db->select("Employees.Id,Employees.Persal,Employees.Name,Employees.LastName,Positions.PositionName as JobTitle,br.name as br_name");
		$this->db->select('p_a.status, p_a.status_final');
		$this->db->from('employees');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->join('branch br', 'Employees.branch = br.id');
		$this->db->join('performance_assessment p_a', 'Employees.Id = p_a.employee');
		if($branch != null)
		{
			$this->db->where('Employees.branch', $branch);
		}
		
		$users = $this->db->get()->result_array();

		$data['all_users'] = $users;
		$data['branch'] = $br;
		$this->load->view('templates/header');
		$this->load->view('reports/track', $data);
		$this->load->view('templates/footer');
	}
	public function none_compliant()
	{
		$emp = new EmployeeModel();


		if(isset($_POST['filter']))
		{
			//echo $_POST['filter'];
			$contract_type = $this->input->post('contract_type');
			$year =$this->input->post('financial_year');
			$directorate =$this->input->post('directorate');
			$branch =$this->input->post('branch');
			$sub_directorate =$this->input->post('sub_directorate');
			$users = $emp->get_none_compliant($contract_type, $year, $directorate, $branch, $sub_directorate);
		}
		else{
			$users = $emp->get_none_compliant(null, null, null, null, null);
		}
		$data['directorates'] = $this->db->get('directorate')->result_array();
		$data['branch'] = $this->db->get('branch')->result_array();


		$data['all_users'] = $users;
		$this->load->view('templates/header', $data);
		$this->load->view('reports/employeerep_unsub');
		$this->load->view('templates/footer');
	}


	public function compliant()
	{
		$emp = new EmployeeModel();

		//$users = '';


		if(isset($_POST['filter']))
		{
			//echo $_POST['filter'];
			$contract_type = $this->input->post('contract_type');
			$year =$this->input->post('financial_year');
			$directorate =$this->input->post('directorate');
			$branch =$this->input->post('branch');
			$sub_directorate =$this->input->post('sub_directorate');
			$status =$this->input->post('status');
			$salary_level =$this->input->post('salary_level');
			$users = $emp->get_compliant($contract_type, $year, $directorate, $branch, $sub_directorate, $status, $salary_level);
			//print_r($_POST);
		}
		else{
			$users = $emp->get_compliant(null, null, null, null, null, null, null);
		}
		$data['directorates'] = $this->db->get('directorate')->result_array();
		$data['branch'] = $this->db->get('branch')->result_array();
		$data['all_users'] = $users;
		$this->load->view('templates/header' );
		$this->load->view('reports/complient', $data);
		$this->load->view('templates/footer');
	}

	public function employeerep_year_and_bu_comp()
	{
		$id = $this->input->post('business_unit');
		$year =$this->input->post('financial_year');
		$emp = new EmployeeModel();
		$b_u = new BusinessUnitModel();
		$data['business_unit'] = $b_u->get_business_unit();
		$data['all_users'] = $emp->get_complient_users_by_year_and_bu($id,$year);
		$this->load->view('templates/header');
		$this->load->view('reports/complient',$data);
		$this->load->view('templates/footer');

	}
}

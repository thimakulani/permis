<?php

class PerformanceModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_user_performance($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('performanceplans');
		return $results->result_array();
	}

	public function get_workplan($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('workplan');
		return $results->result_array();
	}

	public function add_performance(array $data)
	{
		$this->db->insert('performanceplans', $data);
	}

	public function add_workplan(array $data)
	{
		$this->db->insert('workplan', $data);
	}


	//GMC_____________________
	public function add_gmc_plan(array $data)
	{
		$this->db->insert('directorsgmc', $data);
	}


	public function get_gmc_performance_plan($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('gmcperformanceplan');
		return $results->result_array();
	}

	public function remove_gmc_plan($id)
	{
		$this->db->where('Employee', $id);
		$this->db->delete('directorsgmc');
	}
	//GMC_____________________


	//____________HOD PERFORMANCE PLAN TEMPLATE
	public function add_employee_plan(array $data)
	{
		$this->db->insert('employeeperformanceplan', $data);
	}

	public function add_government_plan(array $data)
	{
		$this->db->insert('governmentfocusarea', $data);
	}

	public function add_auditor_plan(array $data)
	{
		$this->db->insert('auditorgeneralfocusarea', $data);
	}

	public function add_organization_plan(array $data)
	{
		$this->db->insert('organizationalfocusarea', $data);
	}
//___________________________________________________________________


//Getters
	public function get_employee_performance_plan($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('employeeperformanceplan');
		return $results->result_array();
	}

	public function get_government_performance_plan($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('governmentfocusarea');
		return $results->result_array();
	}

	public function get_auditor_performance_plan($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('auditorgeneralfocusarea');
		return $results->result_array();
	}

	public function get_organization_performance_plan($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('organizationalfocusarea');
		return $results->result_array();
	}

	//___________________________________________________________________


	public function remove_employee_plan($id)
	{
		$this->db->where('EmpPlanId', $id);
		$this->db->delete('employeeperformanceplan');
	}

	public function remove_government_plan($id)
	{
		$this->db->where('GovPlanId', $id);
		$this->db->delete('governmentfocusarea');
	}

	public function remove_auditor_plan($id)
	{
		$this->db->where('AudGenPlanId', $id);
		$this->db->delete('auditorgeneralfocusarea');
	}

	public function remove_organization_plan($id)
	{
		$this->db->where('OrgPlanId', $id);
		$this->db->delete('organizationalfocusarea');
	}


//____________HOD PERFORMANCE PLAN TEMPLATE

	public function add_personal_performance(array $data)
	{
		$this->db->insert('personaldevelopmentplans', $data);
	}

	public function get_user_performance_plan($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('personaldevelopmentplans');
		return $results->result_array();
	}

	public function remove($id)
	{
		$this->db->where('PerformancePlanId', $id);
		$this->db->delete('performanceplans');
	}

	public function remove_plan($id)
	{
		$this->db->where('PersonalDevelopmentPlanId', $id);
		$this->db->delete('personaldevelopmentplans');
	}

	public function remove_workplan($id)
	{
		$this->db->where('WorkplanId', $id);
		$this->db->delete('workplan');
	}

	public function submit_to_manager_performance(array $data)
	{
		//$this->db->insert('pt_submission', $data);
		$this->db->insert('performance_assessment', $data);

	}

	public function submit_to_manager_mid_performance(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function submit_to_manager_dir_performance(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function to_me($Id)
	{
		$this->db->select('pt_submission.id, pt_submission.status, pt_submission.date_captured');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.Persal, emp.Id as emp_id");
		$this->db->join('employees as emp', 'pt_submission.employee = emp.Id');
		$this->db->where('supervisor', $Id);
		return $this->db->get('pt_submission')->result_array();
	}

	public function my_submissions($id)
	{
		$this->db->select('performance_assessment.id, performance_assessment.status, performance_assessment.status_final , performance_assessment.date_captured, performance_assessment.period, performance_assessment.template_name');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as S_Name");
		$this->db->join('employees as emp', 'performance_assessment.supervisor = emp.Id','left');
		$this->db->where('employee', $id);
		return $this->db->get('performance_assessment')->result_array();
	}

	public function check_submission($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function user_submission($id, $period, $template_name)
	{

		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $template_name);
		return $this->db->get('performance_assessment')->num_rows();
	}
	public function user_sub($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $template_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function check_template_1($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		return $this->db->get('performanceplans')->num_rows();

	}

	public function check_template_2($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		return $this->db->get('personaldevelopmentplans')->num_rows();
	}

	public function check_template_3($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		return $this->db->get('workplan')->num_rows();
	}

	public function check_template_4($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		return $this->db->get('gmcperformanceplan')->num_rows();
	}

	public function check_template_5($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		return $this->db->get('governmentfocusarea')->num_rows();
	}

	public function check_template_6($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		return $this->db->get('auditorgeneralfocusarea')->num_rows();
	}

	public function check_template_7($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		return $this->db->get('organizationalfocusarea')->num_rows();
	}

	public function add_summary($data)
	{
		$this->db->insert('post_summary', $data);
	}

	public function get_summary($id)
	{
		$this->db->where('Employee', $id);
		$results = $this->db->get('post_summary');
		return $results->row();
	}

	public function get_submissions($branch, $contract_type, $financial_year )
	{
		
		$this->db->select('performance_assessment.id, performance_assessment.status, performance_assessment.date_captured, performance_assessment.Status_Final, performance_assessment.template_name');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.Persal, emp.Id as emp_id");
		$this->db->select("Concat(sup.Name, ' ' , sup.LastName) as S_Name");
		$this->db->join('employees as emp', 'performance_assessment.employee = emp.Id');
		$this->db->join('employees as sup', 'performance_assessment.supervisor = sup.Id');
		$this->db->where('performance_assessment.status', 'APPROVED');
		if($branch !== null)
		{
			$this->db->where('emp.branch', $branch);
		}
		if($contract_type !== null)
		{
			$this->db->where('performance_assessment.template_name', $contract_type);
		}
		if($financial_year !== null)
		{
			$this->db->where('performance_assessment.period', $financial_year);
		}
		$this->db->where('performance_assessment.status', 'APPROVED');
		return $this->db->get('performance_assessment')->result_array();
	}

	public function sup_update_status($id, array $data)
	{
		$this->db->where('Id', $id);
		$this->db->update('performance_assessment', $data);
	}

	public function permis_update_status($id, array $data)
	{
		$this->db->where('Id', $id);
		$this->db->update('performance_assessment', $data);
	}

	public function to_me_pending($Id)
	{
		$this->db->select('performance_assessment.id, performance_assessment.status, performance_assessment.date_captured');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.Persal, emp.Id as emp_id");
		$this->db->join('employees as emp', 'performance_assessment.employee = emp.Id');
		$this->db->where('supervisor', $Id);
		$this->db->where('performance_assessment.status', 'Pending');
		return $this->db->get('performance_assessment')->result_array();
	}

	public function get_specific_submission($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('performance_assessment')->row();
	}

	public function update_pp($id, $data)
	{
		$this->db->where('PerformancePlanId', $id);
		$this->db->update('performanceplans', $data);
	}

	public function validate_submission($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function validate_submission_dir($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function validate_submission_mid($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function validate_submission_ann($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_ann_performance(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function validate_submission_mid_dir($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_mid_dir_performance(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function validate_submission_dir_ann($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_dir_ann_performance(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function validate_submission_ddg($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_performance_ddg(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function validate_submission_mid_ddg($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_mid_ddg_performance(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function validate_submission_ddg_ann($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_ddg_ann_performance(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function validate_submission_hod($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_performance_hod(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function validate_submission_mid_hod($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_mid_performance_hod(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function validate_submission_hod_ann($period, $t_name)
	{
		$this->db->where('employee', $_SESSION['Id']);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $t_name);
		return $this->db->get('performance_assessment')->num_rows();
	}

	public function submit_to_manager_ann_hod_performance(array $data)
	{
		$this->db->insert('performance_assessment', $data);
	}

	public function to_me_new($Id)
	{
		$this->db->select('performance_assessment.id, performance_assessment.status, performance_assessment.date_captured, performance_assessment.template_name');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.Persal, emp.Id as emp_id");
		$this->db->join('employees as emp', 'performance_assessment.employee = emp.Id');
		$this->db->where('supervisor', $Id);
		return $this->db->get('performance_assessment')->result_array();
	}

	public function get_user_submission($id)
	{
		$this->db->select('performance_assessment.id,performance_assessment.employee, performance_assessment.status,performance_assessment.status_final, performance_assessment.date_captured, performance_assessment.template_name, performance_assessment.period, performance_assessment.emp_comment, performance_assessment.supervisor');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.Persal, emp.Id as emp_id, emp.salarylevel");
		$this->db->join('employees as emp', 'performance_assessment.employee = emp.Id');
		$this->db->where('performance_assessment.id', $id);
		return $this->db->get('performance_assessment')->row();
	}

	public function get_employee_submission($Id, $period, $template)
	{


		$this->db->where('employee', $Id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $template);

		return $this->db->get('performance_assessment')->row();
	}

    public function submitted_to_me($id)
    {
		$this->db->where('supervisor', $id);
		return $this->db->get('performance_assessment')->num_rows();
    }

    public function get_user_submission_pmds($id)
    {
		$this->db->select('performance_assessment.id, performance_assessment.status, performance_assessment.date_captured, performance_assessment.template_name,performance_assessment.supervisor,performance_assessment.period');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.Persal, emp.Id as emp_id,emp.SupervisorId,emp.Role");
		$this->db->join('employees as emp', 'performance_assessment.employee = emp.Id');
		$this->db->where('performance_assessment.employee', $id);
		return $this->db->get('performance_assessment')->row();
    }

	public function get_submissions_pmds($id)
	{
		$this->db->select('performance_assessment.id, performance_assessment.status, performance_assessment.date_captured, performance_assessment.template_name,performance_assessment.supervisor,performance_assessment.period');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.Persal, emp.Id as emp_id,emp.SupervisorId,emp.Role");
		$this->db->join('employees as emp', 'performance_assessment.employee = emp.Id');
		$this->db->where('performance_assessment.pmd_user', $id);
		return $this->db->get('performance_assessment')->row();

	}

	public function pmds($employee,$pmd)
	{
		$this->db->select('performance_assessment.id, performance_assessment.status, performance_assessment.date_captured, performance_assessment.template_name');
		$this->db->select("Concat(emp.Name, ' ' , emp.LastName) as E_Name, emp.Persal, emp.Id as emp_id");
		$this->db->join('employees as emp', 'performance_assessment.employee = emp.Id');
		//To only view the reviewed ones(by the supervisors)
		$this->db->where('performance_assessment.employee', $employee);
		$this->db->where('performance_assessment.pmd_user', $pmd);
		$this->db->or_where('performance_assessment.status', 'ACCEPTED');
		$this->db->or_where('performance_assessment.status', 'PENDING');
		$this->db->or_where('performance_assessment.status', 'APPROVED');
		$this->db->or_where('performance_assessment.status', 'RECOMMENDED');
		$this->db->or_where('performance_assessment.status', 'ACCEPTED BY PMDS');
		return $this->db->get('performance_assessment')->result_array();
	}

}

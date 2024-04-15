<?php

class AnnualAssessment extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_individual_performance($data)
	{
		$this->db->insert('individual_performance',$data);

	}
	public function get_individual_performance($id, $period)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		//$this->db->where('template_name', $template_name);
		return $this->db->get('individual_performance')->result_array();
	}
	public function remove_individual_performance($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('individual_performance');
	}
/*	public function add_kra($data)
	{
		$this->db->insert('kra',$data);
	}*/
/*	public function get_kra($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $template_name);
		return $this->db->get('kra')->result_array();
	}*/
	public function get_key_government_focus_areas($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('key_government_focus_areas')->result_array();
	}
/*	public function remove_kra($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kra');
	}*/
	public function update_work_plan($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('work_plan', $data);

	}
	public function update_work_plan_ann($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('work_plan', $data);
		if ($this->db->affected_rows() > 0) {
			// Update successful
			return true;
		} else {
			// Update failed
			return false;
		}
	}
	public function remove_work_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('work_plan');
	}
	public function add_work_plan($data)
	{
		$this->db->insert('work_plan', $data);
	}
	public function get_work_plan($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $template_name);
		return $this->db->get('work_plan')->result_array();
	}
	public function get_generic_management_competencies($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('generic_management_competencies')->result_array();
	}
/*	public function add_kra($data)
	{
		$this->db->insert('key_result_area',$data);
	}*/
	public function get_kra($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		//$this->db->where('template_name', $template_name);
		return $this->db->get('individual_performance')->result_array();
	}
/*	public function remove_kra($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('key_result_area');
	}*/
	public function add_generic_management_competencies_personal_development_plan(array $data)
	{
		$this->db->insert('generic_management_competencies', $data);
	}
	public function get_generic_management_competencies_personal_development_plan($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period,'both');
		//$this->db->where('template_name', $template_name);
		return $this->db->get('generic_management_competencies')->result_array();
	}
	public function remove_generic_management_competencies_personal_development_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('generic_management_competencies');
	}

	public function get_performance_plan($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period,'both');
		//$this->db->where('template_name', $template_name);
		$results=$this->db->get('performance_plan');
		return $results->result_array();
	}
	public function remove_performance_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('performance_plan');
	}
	public function add_performance_plan($data)
	{
		$this->db->insert('performance_plan', $data);
	}

	public function get_auditor_general_opinion_and_findings($Id, $period, $string)
	{
		$this->db->where('employee', $Id);
		$this->db->where('period', $period);
		return $this->db->get('auditor_general_opinion_and_findings')->row();
	}

	public function add_auditor_general_opinion_and_findings(array $data)
	{
		$this->db->insert('auditor_general_opinion_and_findings', $data);
	}

	public function get_kgfa($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('kgfa')->result_array();
	}


}

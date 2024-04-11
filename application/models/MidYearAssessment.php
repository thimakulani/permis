<?php

class MidYearAssessment extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_kra($data)
	{
		$this->db->insert('kra',$data);
	}
	public function get_kra($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		//$this->db->where('template_name', $template_name);
		return $this->db->get('individual_performance')->result_array();
	}
	public function remove_kra($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kra');
	}

    public function add_organisational_performance(array $data)
    {
		$this->db->insert('organisational_performance',$data);
    }
	public function remove_organisational_performance($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('organisational_performance');
	}

	public function get_organisational_performance($Id,$period, $template_name)
	{
		$this->db->where('employee', $Id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('organisational_performance')->result_array();
	}
	public function get_competencies_personal_development_plan($Id,$period, $template_name)
	{
		$this->db->where('employee', $Id);
		$this->db->where('period', $period);
		return $this->db->get('competencies_personal_development_plan')->result_array();
	}
	public function add_competencies_personal_development_plan(array $data)
	{
		$this->db->insert('competencies_personal_development_plan',$data);
	}

	public function remove_competencies_personal_development_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('competencies_personal_development_plan');
	}

	public function get_operational_memorandum($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('operational_memorandum')->result_array();
	}
	public function add_operational_memorandum($data)
	{
		$this->db->insert('operational_memorandum',$data);
	}
	public function remove_operational_memorandum($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('operational_memorandum');
	}

	public function add_personal_developmental_plan(array $data)
	{
		$this->db->insert('personal_developmental_plan', $data);
	}
	public function get_personal_developmental_plan($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('personal_developmental_plan')->result_array();
	}
	public function remove_personal_developmental_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('personal_developmental_plan');
	}
	public function remove_generic_management_competencies($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('generic_management_competencies');
	}
	public function add_generic_management_competencies(array $data)
	{
		$this->db->insert('generic_management_competencies', $data);
	}
	public function get_generic_management_competencies($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		return $this->db->get('generic_management_competencies')->result_array();
	}



	public function remove_key_government_focus_areas($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('key_government_focus_areas');
	}
	public function get_key_government_focus_areas($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('key_government_focus_areas')->result_array();
	}

    public function add_key_government_focus_areas(array $data)
    {
		$this->db->insert('key_government_focus_areas', $data);
    }

	public function get_performance_plan($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
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

	public function update_performance($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('performance_plan', $data);
	}
	public function update_work_plan($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('work_plan', $data);
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
		$this->db->where('period', $period);
		//$this->db->where('template_name', $template_name);
		return $this->db->get('work_plan')->result_array();
	}

    public function get_kgfa($id, $period, $template_name)
    {
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('kgfa')->result_array();
    }
	public function delete_kgfa($id)
	{
		$this->db->where('kgfa_id', $id);
		$results = $this->db->get('key_government_focus_areas')->num_rows();
		//$this->db->close();

		if($results > 0)
		{
			$this->db->query("DELETE t1, t2
							  FROM kgfa t1 
    						  JOIN key_government_focus_areas t2
							  ON t1.id = t2.kra_id
							  WHERE t1.id = $id");
		}
		else{

			$this->db->where('id', $id);
			$this->db->delete('kgfa');
		}
	}
	public function add_kgfa($data)
	{

	}

	public function update_key_government_focus_areas($id, array $data)
	{
		$this->db->where('id', $id);
		$this->db->update('key_government_focus_areas', $data);
	}

    public function get_auditor_general_opinion_and_findings($Id, $period, $string)
    {
		$this->db->where('employee', $Id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $string);
		return $this->db->get('auditor_general_opinion_and_findings')->row();
    }

	public function get_individual_performance($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		//$this->db->where('template_name', $template_name);
		return $this->db->get('individual_performance')->result_array();
	}
}

<?php

class PerformanceInstrument extends CI_Model
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
	public function add_generic_management_competencies(array $data)
	{
		$this->db->insert('generic_management_competencies', $data);
	}
	public function get_generic_management_competencies($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		//$this->db->where('template_name', $template_name);
		return $this->db->get('generic_management_competencies')->result_array();
	}
	public function get_individual_performance($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		//$this->db->where('template_name', $template_name);
		return $this->db->get('individual_performance')->result_array();
	}
	public function remove_individual_performance($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('individual_performance');
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

	public function add_personal_developmental_plan(array $data)
	{
		$this->db->insert('personal_developmental_plan', $data);
	}
	public function get_personal_developmental_plan($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		//$this->db->where('template_name', $template_name);
		return $this->db->get('personal_developmental_plan')->result_array();
	}
	public function remove_personal_developmental_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('personal_developmental_plan');
	}


	public function add_generic_management_competencies_personal_development_plan(array $data)
	{
		$this->db->insert('generic_management_competencies', $data);
	}
	public function get_generic_management_competencies_personal_development_plan($id,$period, $template)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		//$this->db->where('template_name', $template_name);
		return $this->db->get('generic_management_competencies')->result_array();
	}
	public function remove_generic_management_competencies_personal_development_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('generic_management_competencies');
	}
	public function update_generic_management_competencies_personal_development_plan(array $data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('generic_management_competencies', $data);
	}
	public function update_generic_management_competencies(array $data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('generic_management_competencies', $data);
	}
    public function add_key_responsibility(array $data)
    {
		$this->db->insert('performance_plan', $data);
    }
/*	public function get_key_responsibility($id,$period, $template_name)
    {
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $template_name);
		return $this->db->get('key_responsibility')->result_array();
    }*/

	public function remove_key_responsibility($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('performance_plan');
	}


	public function add_duties(array $data)
    {
		$this->db->insert('duties', $data);
    }
	public function add_duty_reason(array $data)
    {
		$this->db->insert('duty_reason', $data);
    }
	public function get_duties($id,$period, $template_name)
    {
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		return $this->db->get('duties')->result_array();
    }
	public function get_duty_reason($id,$period, $template_name)
    {
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		return $this->db->get('duty_reason')->result_array();
    }

	public function remove_duties($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('duties');
	}

	public function remove_duty_reason($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('duty_reason');
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
	public function remove_personal_developmental_training($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('personal_developmental_training');
	}
	public function add_personal_developmental_training($data)
	{
		$this->db->insert('personal_developmental_training', $data);
	}

    public function get_personal_developmental_training($id, $period, $template_name)
    {
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$results=$this->db->get('personal_developmental_training');
		return $results->result_array();
    }

    public function add_key_result_area(array $data)
    {
		$this->db->insert('key_result_area', $data);
    }
	public function get_distinct_key_result_area($id, $period, $template_name)
	{

		$this->db->distinct();
		$this->db->select('kra_name');
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		return $this->db->get('key_result_area')->result_array();
	}
	public function add_kra(array $data)
    {
		$this->db->insert('kra', $data);
    }
/*	public function get_kra($id, $period, $template_name)
	{

		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		//$this->db->where('template_name', $template_name);
		return $this->db->get('kra')->result_array();
	}*/

	public function remove_kra($id)
	{
		$this->db->where('kra_id', $id);
		$results = $this->db->get('work_plan')->num_rows();
		if($results > 0)
		{
			$this->db->query("DELETE t1, t2
							  FROM kra t1 
    						  JOIN work_plan t2
							  ON t1.id = t2.kra_id
							  WHERE t1.id = $id");
		}
		else{

			$this->db->where('id', $id);
			$this->db->delete('kra');
		}
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
							  ON t1.id = t2.kgfa_id
							  WHERE t1.id = $id");
		}
		else{

			$this->db->where('id', $id);
			$this->db->delete('kgfa');
		}
	}
	public function add_kgfa($data)
	{
		$this->db->insert('kgfa', $data);
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
		//$this->db->where('template_name', $template_name);
		return $this->db->get('key_government_focus_areas')->result_array();
	}

	public function add_key_government_focus_areas(array $data)
	{
		$this->db->insert('key_government_focus_areas', $data);
	}

	public function remove_kgfa($id)
	{
	}

    public function update_performance_plan(array $data, $id)
    {
		$this->db->where('id', $id);
		$this->db->update('performance_plan', $data);
    }


	public function edit_pdp($id, array $data)
	{
		$this->db->where('id', $id);
		$this->db->update('personal_developmental_training', $data);
	}
}

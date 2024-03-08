<?php

class DirectorMidyearModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_dir_dev_plan($id)
	{
		$this->db->where('Employee', $id);
		$results=$this->db->get('employee_performance_kra');
		return $results->result_array();
	}

	public function add_dir_dev_plan(array $data)
	{
		$this->db->insert('employee_performance_kra', $data);
	}

	public function remove_dir_dev_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('employee_performance_kra');
	}

	public function update_dir_dev_plan($id, array $data)
	{
		$this->db->where('id', $id);
		$this->db->update('employee_performance_kra', $data);
	}

}

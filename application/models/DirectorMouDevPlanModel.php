<?php

class DirectorMouDevPlanModel extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_dir_dev_plan($id)
	{
		$this->db->where('employee', $id);
		$results=$this->db->get('personal_developmental_plan');
		return $results->result_array();
	}

	public function add_dir_dev_plan(array $data)
	{
		$this->db->insert('personal_developmental_plan', $data);
	}

	public function remove_dir_dev_plan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('personal_developmental_plan');
	}

	public function update_dir_dev_plan($id, array $data)
	{
		$this->db->where('id', $id);
		$this->db->update('personal_developmental_plan', $data);
	}
}

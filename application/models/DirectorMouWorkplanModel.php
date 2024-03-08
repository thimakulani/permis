<?php

class DirectorMouWorkplanModel extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_dir_workplan($id)
	{
		$this->db->where('Employee', $id);
		$results=$this->db->get('workplan');
		return $results->result_array();
	}

	public function add_dir_workplan(array $data)
	{
		$this->db->insert('workplan', $data);
	}

	public function remove_dir_workplan($id)
	{
		$this->db->where('WorkplanId', $id);
		$this->db->delete('workplan');
	}

	public function update_dir_workplan($id, array $data)
	{
		$this->db->where('WorkplanId', $id);
		$this->db->update('workplan', $data);
	}
}

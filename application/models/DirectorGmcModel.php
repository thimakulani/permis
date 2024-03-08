<?php


class DirectorGmcModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_dir_workplan($id)
	{
		$this->db->where('Employee', $id);
		$results=$this->db->get('directorsgmc');
		return $results->result_array();
	}

	public function add_dir_workplan(array $data)
	{
		$this->db->insert('directorsgmc', $data);
	}

	public function remove_dir_workplan($id)
	{
		$this->db->where('DirectorGmcId', $id);
		$this->db->delete('directorsgmc');
	}

	public function update_dir_workplan($id, array $data)
	{
		$this->db->where('DirectorGmcId', $id);
		$this->db->update('directorsgmc', $data);
	}

}

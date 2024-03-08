<?php

class DirectorMouGmcModel extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_dir_gmc($id,$period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		$results=$this->db->get('generic_management_competencies');
		return $results->result_array();
	}

	public function add_dir_gmc(array $data)
	{
		$this->db->insert('generic_management_competencies', $data);
	}

	public function remove_dir_gmc($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('generic_management_competencies');
	}

	public function update_dir_gmc($id, array $data)
	{
		$this->db->where('id', $id);
		$this->db->update('generic_management_competencies', $data);
	}
}

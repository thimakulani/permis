<?php

class OperationalMidYearModel extends CI_Model{

	public function __construct()
	{


		parent::__construct();
		$this->load->database();
	}

	public function get_op_mid_mou($id)
	{
		$this->db->where('employee', $id);
		$results=$this->db->get('generic_management_competencies');
		return $results->result_array();
	}

	public function add_op_mid_mou(array $data)
	{
		$this->db->insert('generic_management_competencies', $data);
	}

	public function remove_op_mid_mou($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('generic_management_competencies');
	}

	public function update_op_mid_mou($id, array $data)
	{
		$this->db->where('id', $id);
		$this->db->update('generic_management_competencies', $data);
	}
}

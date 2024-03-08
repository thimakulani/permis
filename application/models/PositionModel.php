<?php

class PositionModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_positions()
	{
		$results = $this->db->get('positions');
		return $results->result_array();
	}

	public function get_position_name($id)
	{
		$this->db->select('PositionName');
		$this->db->from('positions');
		$this->db->where('PositionId', $id);
		return $this->db->get()->row()->PositionName;
	}

	public function exists($name)
	{
		$this->db->where('PositionName', $name);
		$query = $this->db->get('positions');
		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}

	public function update_name($id, $name)
	{
		$this->db->set('PositionName', $name);
		$this->db->where('PositionId', $id);
		$this->db->update('positions');
	}

	public function add_position(array $data)
	{
		$this->db->insert('positions', $data);
	}
}

<?php

class EmployeeModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_user($data)
	{
		$this->db->insert('users', $data);
	}
	public function get_all_users()
	{
		$results = $this->db->get('users');
		return $results->result_array();
	}
	public function get_user($id)
	{
		$this->db->where('Id', $id);
		$results = $this->db->get('users');
		return $results->row();
	}
}

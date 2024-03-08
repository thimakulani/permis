<?php

class Leave extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}
	public function get_employees()
	{
		$this->db->select("CONCAT(FirstName, ' ', LastName) as emp, id");
		$this->db->where('supervisor', $_SESSION['Id']);

		return $this->db->get('employees')->result_array();
	}

	public function create_leave($data)
	{
		$this->db->insert('leaves', $data);
	}

	public function my_leaves($Id)
	{
		$this->db->where('employee', $Id);
		return $this->db->get('leaves')->result_array();
	}
}

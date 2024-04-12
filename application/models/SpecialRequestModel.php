<?php

class SpecialRequestModel extends CI_Model
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
		$this->db->insert('special_request', $data);
	}
	public function insertRequest($data) {
		// Insert data into the 'special_request' table
		$this->db->insert('special_request', $data);
	}
	public function my_special_request($Id)
	{
		$this->db->where('employee', $Id);
		return $this->db->get('special_request')->result_array();
	}
}

<?php

class RoleModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_roles()
	{
		return $this->db->get('Roles')->result_array();
	}
}

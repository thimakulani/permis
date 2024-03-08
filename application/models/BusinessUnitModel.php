<?php

class BusinessUnitModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function add_business_unit(array $data)
    {
		$this->db->insert('directorate', $data);
    }
	public function add_sub_business_unit(array $data)
	{
		$this->db->insert('sub_directorate', $data);
	}
	public function get_business_unit()
	{
		return $this->db->get('directorate')->result_array();
	}

	public function get_sub_business_unit()
	{
		$this->db->select('sub_directorate.name, sub_directorate.id');
		$this->db->select('d.name as dir');
		$this->db->from('sub_directorate');
		$this->db->join('directorate d', 'sub_directorate.directorate = d.id');
		return $this->db->get()->result_array();
	}
}

<?php

class OperationalMemoModel extends CI_Model{

	public function __construct()
	{


		parent::__construct();
		$this->load->database();
	}

	public function get_op_mou($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		$results=$this->db->get('operational_memorandum');
		return $results->result_array();
	}

	public function add_mou(array $data)
	{
		$this->db->insert('operational_memorandum', $data);
	}

	public function remove_mou($id)
	{
		$this->db->where('OpMouId', $id);
		$this->db->delete('operational_memorandum');
	}

	public function update_mou($id, array $data)
	{
		$this->db->where('OpMouId', $id);
		$this->db->update('operational_memorandum', $data);
	}

    public function add_factor(array $data)
    {
		$this->db->insert('factor', $data);
    }
	public function get_factor($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		$results=$this->db->get('factor');
		return $results->row();
	}


}

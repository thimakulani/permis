<?php


class OperationalAnnualModel extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get_op_ann_mou($id,$period, $template_name)
	{
		$this->db->where('Employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		$results=$this->db->get('operational_memorandum');
		return $results->result_array();
	}

	public function add_op_ann_mou(array $data)
	{
		$this->db->insert('operational_memorandum', $data);
	}

	public function remove_op_ann_mou($id)
	{
		$this->db->where('Employee', $id);
		$this->db->delete('operational_memorandum');
	}

	public function update_op_ann_mou($id, array $data)
	{
		$this->db->where('OpAnnId', $id);
		$this->db->update('operational_memorandum', $data);
	}


}

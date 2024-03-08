<?php

class DirectorMouIndividualModel extends CI_Model{

	public function __construct()
	{


		parent::__construct();
		$this->load->database();
	}

	public function get_dir_mou($id,$period, $template_name)
	{
		$this->db->where('Employee', $id);
		$this->db->where('period', $period);
		$this->db->where('template_name', $template_name);
		$results=$this->db->get('individual_performance');
		return $results->result_array();
	}

	public function add_dir_mou(array $data)
	{
		$this->db->insert('individual_performance', $data);
	}

	public function remove_dir_mou($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('individual_performance');
	}

	public function update_dir_mou($id, array $data)
	{
		$this->db->where('id', $id);
		$this->db->update('individual_performance', $data);
	}
}

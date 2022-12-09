<?php

class PerformanceModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_user_performance($id)
	{
		$this->db->where('Employee', $id);
		$results=$this->db->get('performanceplans');
		return $results->result_array();
	}

	public function add_performance(array $data)
	{
		$this->db->insert('performanceplans', $data);
	}
	public function remove($id)
	{
		$this->db->where('PerformancePlanId', $id);
		$this->db->delete('performanceplans');
	}

    public function submit_to_manager_performance(array $data)
    {
		$this->db->insert('performanceagreements', $data);
    }

	public function to_me($Id)
	{
		$this->db->where('Supervisor', $Id);
		return $this->db->get('performanceagreements')->result_array();
	}
}

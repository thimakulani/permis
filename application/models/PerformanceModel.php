<?php

class PerformanceModel extends CI_Model
{

    public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

    public function capture_performance($data)
	{
		$this->db->insert('performancecapture', $data);
	}


}
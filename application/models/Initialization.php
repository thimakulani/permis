<?php


class Initialization extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_initialization($data)
	{
		$this->db->insert('initializations',$data);
	}

	public function get_initializations($id, $period, $template_name)
	{
		$this->db->where('employee', $id);
		$this->db->group_start();
		$this->db->like('period', $period,'both');
		$this->db->or_like('period', (date('Y') - 1).'/'. date('Y'),'both');
		$this->db->group_end();
		$this->db->where('template_name', $template_name);
		$results=$this->db->get('initializations');
		return $results->row();
	}
}

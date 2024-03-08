<?php

class Achievements extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->database();

	}
	public function index()
	{
		//$achievements = $this->db->get('achievements');
		$result_array = $this->db->get('achievements')->result_array();
		$data['achievements'] = $result_array;
		$this->load->view('templates/header');
		$this->load->view('achievements/index', $data);
		$this->load->view('templates/footer');
	}
	public function edit()
	{
		//$achievements = $this->db->get('achievements');
		$result_array = $this->db->get('achievements')->result_array();
		$data['achievements'] = $result_array;
		$this->load->view('templates/header');
		$this->load->view('achievements/index', $data);
		$this->load->view('templates/footer');
	}
	public function add_achievements()
	{
		$year = date('Y') + 1;
		$period = date('Y') . '/' . $year;
		$data = array('description'=>$this->input->post('description'),
			'type'=>$this->input->post('type'),
			'period'=>$period,
			'employee'=>$_SESSION['Id'],
			);
		$this->db->insert('achievements', $data);
	}
	public function edit_achievements($id)
	{
		if(isset($id))
		{
			$data = array('description'=>$this->input->post('description'),
				'type'=>$this->input->post('type'),
				'employee'=>$_SESSION['Id'],
			);
			$this->db->where('id', $id);
			$this->db->update('achievements', $data);
		}
	}
	public function delete($id)
	{
		if(isset($id))
		{
			$this->db->where('id', $id);
			$this->db->delete('achievements');
		}
	}
}

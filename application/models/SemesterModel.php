<?php

class SemesterModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create($data)
	{
		$this->db->insert('semesters',$data);
	}

	public function get_semesters()
	{
		return $this->db->get('semesters')->result_array();
	}

    public function get_types()
    {
		return $this->db->get('semestertypes')->result_array();
    }

	public function get_current_semester()
	{
		$dates = date('Y-m-d');
		$this->db->where('start_date <=', $dates);
		$this->db->where('end_date >=', $dates);
		return $this->db->get('semesters')->row();
	}

	public function validate_year_semester($financial_year, $semester_name)
	{
		$this->db->where('financial_year', $financial_year);
		$this->db->where('semester_name', $semester_name);
		return $this->db->get('semesters')->num_rows();
	}

    public function get_semester($id)
    {
		$this->db->where('id', $id);
		return $this->db->get('semesters')->row();
    }

	public function update($id, array $data)
	{
		$this->db->where('id',$id);
		$this->db->update('semesters', $data);
	}

}

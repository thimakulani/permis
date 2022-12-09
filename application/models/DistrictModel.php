<?php

class DistrictModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function add_district($data){
		$this->db->insert('districts', $data);
	}
	public function get_district()
	{
		return $this->db->get('districts')->result_array();
	}
	public function search_district($name)
	{
		$this->db->where('DistrictName', $name);
		$query = $this->db->get('districts');
		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	public function get_district_name($id){

		$this->db->select('DistrictName');
		$this->db->from('districts');
		$this->db->where('DistrictId', $id);
		return $this->db->get()->row()->DistrictName;

	}
	public function delete_district($id)
	{
		$this->db->where('DistrictId', $id);
		$this->db->delete('districts');
	}
	public function update_district($id, $data)
	{
		$this->db->set('DistrictName', $data);
		$this->db->where('DistrictId', $id);
		$this->db->update('districts');
	}
}

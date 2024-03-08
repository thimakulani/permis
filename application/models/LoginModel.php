<?php

class LoginModel extends CI_Model
{

    public function __construct()
    {
		parent::__construct();
		$this->load->database();
    }
	public function login($username, $password)
	{
		$this->load->database();
		$this->db->where('persal', $username);
		$this->db->where('password',$password);
		return $this->db->get("employees")->row();
	}

	public function update_password($Id, $password)
	{
		$this->db->set('password', $password);
		$this->db->where('id', $Id);
		$this->db->update('employees');
	}

	public function get_user_by_persal($persal)
	{
		$this->load->database();
		$this->db->where('persal',$persal);
		return $this->db->get("employees");
	}
}

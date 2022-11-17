<?php
class Performance extends CI_Controller 
{

public function __construct()
{
parent::__construct();
$this->load->helper(array('form','url'));
}


public function index()
{
    $this->load->view("templates/header");
    $this->load->view("performance/index");
    $this->load->view("templates/footer");
    
}
public function performance_capture()
{
	$p_data['performance'] = '';
    $this->load->view("templates/header");
    $this->load->view("performance/performance_capture");
    $this->load->view("templates/footer");

}
public function submitted_performance()
{
    $this->load->view("templates/header");
    $this->load->view("performance/submitted_performance");
    $this->load->view("templates/footer");

}

}

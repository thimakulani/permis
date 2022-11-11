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

public function hod_performance_capture()
{
    $this->load->view("templates/header");
    $this->load->view("performance/hod_performance_capture");
    $this->load->view("templates/footer");

}

public function hod_submitted_performance()
{
    $this->load->view("templates/header");
    $this->load->view("performance/hod_submitted_performance");
    $this->load->view("templates/footer");

}

public function gov_performance_capture()
{
    $this->load->view("templates/header");
    $this->load->view("performance/gov_performance_capture");
    $this->load->view("templates/footer");

}

public function gov_submitted_performance()
{
    $this->load->view("templates/header");
    $this->load->view("performance/gov_submitted_performance");
    $this->load->view("templates/footer");

}

public function aud_performance_capture()
{
    $this->load->view("templates/header");
    $this->load->view("performance/aud_performance_capture");
    $this->load->view("templates/footer");

}

public function aud_submitted_performance()
{
    $this->load->view("templates/header");
    $this->load->view("performance/aud_submitted_performance");
    $this->load->view("templates/footer");

}


}

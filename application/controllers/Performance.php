<?php
class Performance extends CI_Controller 
{

public function __construct()
{
parent::__construct();
$this->load->helper(array('form','url'));
$this->load->library('form_validation');
$this->load->library('session');
$this->load->model('PerformanceModel');
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

public  function push_performance()
{
/*
KeyResponsibility
Gafs
PerformaceOutcome
Weight
PerformanceMeasurement
Timeframes
Resources
*/
    $this->form_validation->set_rules('keyResponsibility', 'KeyResponsibility', 'required');
    $this->form_validation->set_rules('gafs', 'Gafs', 'required');
    $this->form_validation->set_rules('outcome', 'PerformaceOutcome', 'required');
    $this->form_validation->set_rules('weight', 'Weight', 'required');
    $this->form_validation->set_rules('measurement', 'PerformanceMeasurement', 'required');
    $this->form_validation->set_rules('timeframes', 'Timeframes', 'required');
    $this->form_validation->set_rules('resources', 'Resources', 'required');

    if($this->form_validation->run() == TRUE)
    {

        $peformance_info[] = array(
            'KeyResponsibility'=> $this->input->post('keyResponsibility'),
            'Gafs'=> $this->input->post('gafs'),
            'PerformaceOutcome'=> $this->input->post('outcome'),
            'Weight'=>  $this->input->post('weight'),
            'PerformanceMeasurement'=> $this->input->post('measurement'),
            'Timeframes'=> $this->input->post('timeframes'),
            'Resources'=> $this->input->post('resources'),

        );
        $performance = new PerformanceModel();
        $performance->capture_performance($peformance_info);
    }
    else{
        $this->push_performance();
    }
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

public function org_performance_capture()
{
    $this->load->view("templates/header");
    $this->load->view("performance/org_performance_capture");
    $this->load->view("templates/footer");

}

public function org_submitted_performance()
{
    $this->load->view("templates/header");
    $this->load->view("performance/org_submitted_performance");
    $this->load->view("templates/footer");

}


}

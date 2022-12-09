<?php
class Auth extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('LoginModel');
	}


    public function index($error = '')
    {
		$err['error'] = $error;
        $this->load->view("pages/login", $err);
    }
    public function login_user()
    {
		$this->form_validation->set_rules('persal', 'Persal', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$login = new LoginModel();
			$email = $this->input->post('persal');
			$password = sha1($this->input->post('password'));
			$results = $login->login($email, $password);
			if($results != null)
			{
				echo $results->Name;
				echo $results->LastName;
				if($results->Status == "Active")
				{
					$this->session->set_userdata('Id', $results->Id);
					$this->session->set_userdata('Names', $results->Name. ' '. $results->LastName);
					//$this->session->set_userdata('role', $results->Role);
					redirect("dashboard");
				}
				else{
					$this->index('Your account has been deactivated. Please contact the system administrator.');
				}
			}
			else{
				$this->index('Invalid persal number or password.');
			}
		}

    }
	public function reset_password()
	{
		$this->form_validation->set_rules('persal', 'Persal', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == FALSE)
		{
			$this->forgot_password('');//->view('pages/login');
		}else{
			$email = $this->input->post('persal');
			$password = sha1($this->input->post('password'));
			$login = new LoginModel();
			$row = $login->get_user_by_persal($email)->row();
			if($row !== null)
			{
				$login->update_password($row->Id, $password);
				$this->load->view('pages/complete');
			}
			else{
				//$this->session->set_flushdata('error', 'Invalid email or password');
				$this->forgot_password('Invalid persal number');
			}
		}
	}

	public function forgot_password($error = '')
	{
		$err['error'] = $error;
		$this->load->view('pages/forgot_password',$err);
    }
    
}

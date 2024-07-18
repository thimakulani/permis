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
		$this->load->database();
	}


    public function index($error = null)
    {
		$err['error'] = $error;
        $this->load->view("pages/login", $err);
    }
	public function login_user()
	{
		if($this->input->post('login_type') == 'local'){
			$this->login_user_local();
		}
		else{
			$this->ldap_user();
		}
	}
    public function ldap_user()
    {
		$this->form_validation->set_rules('persal', 'Persal', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run())
		{
			$this->db->where('persal', $this->input->post('persal'));
			$current_user = $this->db->get('employees')->row();
			if($current_user !== null)
			{
				$this->db->where('id', 1);
				$ldap = $this->db->get('ldap_login')->row();
				$server_ip = ldap_connect($ldap->path, 389);
				$user_name = $this->input->post('persal').'@'.$ldap->path;
				$DOconn = false;
				try{
					
					$DOconn = ldap_bind($server_ip, $user_name, $this->input->post('password'));
				}
				catch(Exeption $ex)
				{
					
				}
				if($DOconn)
			    {
				   if($current_user->Status == "Active")
					{
						$this->session->set_userdata('Id', $current_user->Id);
						$this->session->set_userdata('Names', $current_user->Name. ' '. $current_user->LastName);
						$this->session->set_userdata('Role', $current_user->Role);
						if($current_user->Persal == 82222517 || $current_user->Persal == 20862024 ||
							$current_user->Persal == 19151659 || $current_user->Persal == 82653135)
						{
							$this->session->set_userdata('sys_owner', 1);
						}
						if ($current_user->IdNumber == null) {
							redirect('/employees/complete_registration');
						}

						redirect("dashboard");
					}
					else{
						$this->index('YOUR ACCOUNT HAS BEEN DEACTIVATED. PLEASE CONTACT THE SYSTEM ADMINISTRATOR.');
					}
			    }
				else{
					$this->index('INVALID PERSAL NUMBER OR PASSWORD.');
				}
			}
			else{
				$this->index('PERSAL NUMBER DOES NOT EXIST IN THE SYSTEM.');
			}
		}
    }
	public function login_user_local()
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
				if($results->Status == "Active")
				{
					$this->session->set_userdata('Id', $results->Id);
					$this->session->set_userdata('Names', $results->Name. ' '. $results->LastName);
					$this->session->set_userdata('Role', $results->Role);

					if ($results->IdNumber == null) {
						redirect('/employees/complete_registration');
					}

					redirect("dashboard");
				}
				else{
					$this->index('YOUR ACCOUNT HAS BEEN DEACTIVATED. PLEASE CONTACT THE SYSTEM ADMINISTRATOR.');
				}
			}
			else{
				$this->index('INVALID PERSAL NUMBER OR PASSWORD.');
			}
		}
	}
	public function reset_password()
	{
		$this->form_validation->set_rules('persal', 'Persal', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');



		if(!$this->form_validation->run())
		{
			$this->forgot_password('');//->view.php('pages/login');
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

	public function forgot_password($error = null)
	{
		$err['error'] = $error;
		$this->load->view('pages/forgot_password',$err);
    }
    
}

<?php
use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
class Employees extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form','url'));
		$this->load->library('form_validation');
		$this->load->library('session');

		$this->load->model('EmployeeModel');
		$this->load->model('PositionModel');
		$this->load->model('RoleModel');
		$this->load->model('DistrictModel');
		$this->load->model('PerformanceModel');
		$this->load->model('BusinessUnitModel');
		$config = array(
			'upload_path' => "./uploads/",
			'allowed_types' => "*",
			'overwrite' => FALSE,
			'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			'max_height' => "768",
			'max_width' => "1024"
		);
		//$this->upload->initialize($config);
		$this->load->library('upload', $config);
	}
	public function switch_user($id)
	{
		$emp = new EmployeeModel();
		$user = $emp->get_single_user($id);
		$this->session->set_userdata('Id', $user->Id);
		$this->session->set_userdata('Names', $user->Name. ' '. $user->LastName);
		$this->session->set_userdata('Role', $user->Role);
		redirect("dashboard");
	}
	public  function create_user()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Last Name', 'required');
		$this->form_validation->set_rules('id_number', 'Id Number', 'required');
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('race', 'Race', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('persal', 'Persal', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		//
		//$this->form_validation->set_rules('salary_level', 'Salary Level', 'required');
		//$this->form_validation->set_rules('salary_level_period', 'Years In Level', 'required');
		$this->form_validation->set_rules('salary_level_entry_date', 'Salary Level Entry Date', 'required');
		$this->form_validation->set_rules('date_of_appointment', 'Appointment Date', 'required');
		//$this->form_validation->set_rules('disability', 'Disability', 'required');


		//
		if($this->form_validation->run() == FALSE)
		{
			$this->create();
		}
		else{
			$user_info = array(
				'Name'=> $this->input->post('name'),
				'LastName'=> $this->input->post('surname'),
				'Email'=> $this->input->post('email'),
				'pmd' => $this->input->post('pmd'),
				'Password'=> '',
				'Race'=> $this->input->post('race'),
				'IdNumber'=> $this->input->post('id_number'),
				'Gender'=> $this->input->post('gender'),
				'Persal'=> $this->input->post('persal'),
				'Username'=> $this->input->post('persal'),
				'SupervisorId'=> $this->input->post('supervisor'),
				'JobTitle'=> $this->input->post('position'),
				'directorate'=> $this->input->post('directorate'),
				'sub_directorate'=> $this->input->post('sub_directorate'),
				'Role'=> $this->input->post('role'),
				//	'ManagerId'=> $this->input->post('manager'),
				'DistrictId'=> $this->input->post('district'),
				'DateContracted'=> date('Y-m-d'),
				'DateCreated'=> date('Y-m-d'),
				'Status'=> 'Active',
				'Contact'=> $this->input->post('contact'),
				'Disability'=>$this->input->post('disability'),
				//'JobLevel'=>$this->input->post('position_level'),
				'SalaryLevel'=>$this->input->post('salary_level'),
				//'YearInLevel'=>$this->input->post('salary_level_period'),
				'SalaryLevelEntryDate'=>$this->input->post('salary_level_entry_date'),
				'AppointmentDate'=>$this->input->post('date_of_appointment'),
				'branch'=>$this->input->post('branch'),

			);
			$emp = new EmployeeModel();
			$num_rows = $emp->validate_persal($this->input->post('persal'));
			if($num_rows == 0)
			{
				$emp->add_user($user_info);
			}
			else{
				echo '<script>alert("PERSAL NUMBER ALREADY EXIST")</script>';
			}
			$this->index();
		}
	}
	public function index()
	{
		
		
		$this->db->select("Employees.Id, Employees.Persal, Employees.Name , Employees.LastName");
		$this->db->select("Employees.Email, Positions.PositionName as JobTitle, Concat(supervisor.Name, ' ' , supervisor.LastName) as S_Name, Employees.Status");
		$this->db->from('Employees');
		$this->db->join('Employees supervisor', 'Employees.SupervisorId = supervisor.Id');
		$this->db->join('Positions', 'Employees.JobTitle = Positions.PositionId');
		$this->db->where("Employees.SupervisorId = supervisor.Id");
		//$this->db->or_where("Employees.SupervisorId", '');

		
		
		if(isset($_POST['search']))
		{
			$value = $_POST['search'];
			$this->db->like('Employees.Persal', $value)
			->or_like('Employees.Name',  $value)
			->or_like('Employees.LastName',  $value);
		}
		$results = $this->db->get();
		$data['all_users'] = $results->result_array();
		$title['tittle'] = "EMPLOYEES";

		$this->load->view('templates/header', $title);
		$this->load->view('employees/index', $data);
		$this->load->view('templates/footer');
	}
	public function complete_registration()
	{
		$id = $_SESSION['Id'];
		$branch = $this->db->get('branch')->result_array();
		$dt['branch'] = $branch;
		$emp = new EmployeeModel();
		$current_user = $emp->get_user_incomplete_profile($id);
		$dt['user'] = $current_user;
		$pos = new PositionModel();
		$role = new RoleModel();
		$dis = new DistrictModel();
		$b_u = new BusinessUnitModel();
		$dt['directorate'] = $b_u->get_business_unit();
		//$dt['all_users'] = $emp->get_supervisor();
		$dt['all_users'] = $emp->current_get_supervisor($current_user);
		//$dt['managers'] = $emp->get_all_users();
		$dt['position'] = $pos->get_positions();
		$dt['roles'] = $role->get_roles();
		$dt['districts'] = $dis->get_district();
		$data['tittle'] = "COMPLETE REGISTRATION";

		$this->load->view('employees/complete_registration', $dt);
		$this->load->view('templates/footer');
	}
	public function update_complete_registration()
	{
		$emp = new EmployeeModel();
		//form parameters
		$f_name = $this->input->post('name');
		$l_name = $this->input->post('surname');
		$id_number = $this->input->post('id_number');
		$persal = $this->input->post('persal');
		$gender = $this->input->post('gender');
		$race = $this->input->post('race');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$supervisor = $this->input->post('supervisor');
		$job_title = $this->input->post('position');
		$role = $this->input->post('role');
		$district = $this->input->post('district');
		$salary_level = $this->input->post('salary_level');
		//$salary_level_period = $this->input->post('year_in_level');
		$salary_level_entry_date = $this->input->post('level_entry_date');
		$appointment_date = $this->input->post('appoint_date');
		//$employee_level = $this->input->post('position_level');
		$disability = $this->input->post('disability');
		$directorate = $this->input->post('directorate');
		$sub_directorate = $this->input->post('sub_directorate');


		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Last Name', 'required');
		$this->form_validation->set_rules('id_number', 'Id Number', 'required');

		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('persal', 'Persal', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		//
		//$this->form_validation->set_rules('salary_level', 'Job Level', 'required');
		//$this->form_validation->set_rules('year_in_level', 'Years In Level', 'required');
		$this->form_validation->set_rules('level_entry_date', 'Salary Level Entry Date', 'required');
		$this->form_validation->set_rules('appoint_date', 'Appointment Date', 'required');
		$id = $_SESSION['Id'];

		if($this->form_validation->run())
		{
			$data = array('Name' =>$f_name,
				'LastName' =>$l_name,
				'IdNumber' =>$id_number,
				'Persal' =>$persal,
				'Gender' =>$gender,
				'Race' =>$race,
				'Contact' =>$contact,
				'Email' =>$email,
				'SupervisorId' =>$supervisor,
				'JobTitle' =>$job_title,
				'Role' =>$role,
				'DistrictId' =>$district,
				'SalaryLevel' =>$salary_level,
				//'YearInLevel' =>$salary_level_period,
				'SalaryLevelEntryDate' =>$salary_level_entry_date,
				'AppointmentDate' =>$appointment_date,
				//'JobLevel' =>$employee_level,
				'Disability'=>$disability,
				'directorate'=>$directorate,
				'branch'=>$this->input->post('branch'),
				'sub_directorate'=>$sub_directorate);
			$emp->updateprofile($id, $data);
			redirect('dashboard');
		}
		else{
			$this->complete_registration();
		}

	}
	public function import()
	{
		if(isset($_POST['load_list_of_emp']))
		{
			echo $this->input->post('file');
			if($this->upload->do_upload('file')){
				$output = $this->upload->data();

				$file_name = $output['file_name'];
				$file_path = $output['file_path'];
				$attachment = $file_path.$file_name;
				$reader = ReaderEntityFactory::createReaderFromFile(FCPATH.'/Test.xlsx');
				$reader->open($attachment);
				foreach ($reader->getSheetIterator() as $sheet) {
					$counter = 0;

					foreach ($sheet->getRowIterator() as $row) {
						if($counter >= 1)
						{
							$cells = $row->getCells();
							$persal =  $cells[2]->getValue();
							$lastname =  $cells[0]->getValue();
							//$notch =  $cells[5]->getValue();
							$salary_level =  $cells[3]->getValue();
							/*$entry_date = str_replace(".","-", $cells[1]->getValue());
							$entry_date = str_replace("/","-", $cells[1]->getValue());*/

							$raw_infor = array(
								'persal'=>$persal,
								'lastname'=>$lastname,
								//'notch'=>$notch,
								//'SalaryLevelEntryDate'=>$entry_date,
								'salarylevel'=>$salary_level,
								'status'=>'Active',
							);

							$this->db->where('persal', $persal);
							$rows = $this->db->get('employees')->num_rows();
							if($rows == 0){
								$this->db->insert('employees', $raw_infor);
							}
						}
						$counter++;
					}
				}
				$reader->close();
			}
		}

		if(isset($_POST['load_list_of_emp']))
		{
			echo $this->input->post('file');
			if($this->upload->do_upload('file')){
				$output = $this->upload->data();

				$file_name = $output['file_name'];
				$file_path = $output['file_path'];
				$attachment = $file_path.$file_name;
				$reader = ReaderEntityFactory::createReaderFromFile(FCPATH.'/Test.xlsx');
				$reader->open($attachment);
				foreach ($reader->getSheetIterator() as $sheet) {
					$counter = 0;

					foreach ($sheet->getRowIterator() as $row) {
						if($counter >= 1)
						{
							$cells = $row->getCells();
							$persal =  $cells[2]->getValue();
							$lastname =  $cells[0]->getValue();
							//$notch =  $cells[5]->getValue();
							$salary_level =  $cells[3]->getValue();
							/*$entry_date = str_replace(".","-", $cells[1]->getValue());
							$entry_date = str_replace("/","-", $cells[1]->getValue());*/

							$raw_infor = array(
								'persal'=>$persal,
								'lastname'=>$lastname,
								//'notch'=>$notch,
								//'SalaryLevelEntryDate'=>$entry_date,
								'salarylevel'=>$salary_level,
								'status'=>'Active',
							);

							$this->db->where('persal', $persal);
							$rows = $this->db->get('employees')->num_rows();
							if($rows == 0){
								$this->db->insert('employees', $raw_infor);
							}
						}
						$counter++;
					}
				}
				$reader->close();
			}
		}


		$data['x'] = 'x';
		$this->load->view('templates/header');
		$this->load->view('employees/import',$data);
		$this->load->view('templates/footer');
	}
	public function get_sub_directorates($id = null)
	{
		if($id !=null){
			$this->db->where('directorate', $id);
			$data = $this->db->get('sub_directorate')->result_array();
			echo json_encode($data);
		}


	}
	public function create()
	{
		$branch = $this->db->get('branch')->result_array();
		$dt['branch'] = $branch;
		$emp = new EmployeeModel();
		$pos = new PositionModel();
		$role = new RoleModel();
		$dis = new DistrictModel();
		$b_u = new BusinessUnitModel();
		$dt['directorate'] = $b_u->get_business_unit();
		$dt['all_users'] = $emp->get_supervisor();
		$dt['pmd'] = $emp->get_pmd_official();
		//$dt['managers'] = $emp->get_all_users();
		$dt['position'] = $pos->get_positions();
		$dt['roles'] = $role->get_roles();
		$dt['districts'] = $dis->get_district();
		$data['tittle'] = "NEW EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/create', $dt);
		$this->load->view('templates/footer');

	}
	public function update_status($id)
	{
		//parameter from form
		$status = $this->input->post('account_status');
		echo $id.$status;
		$emp = new EmployeeModel();

		//data from DB
		$data = array('Status'=> $status);

		//function from model
		$emp->updatestatus($id, $data);
		$this->details($id);

	}

	public function update_profile($id)
	{

		$emp = new EmployeeModel();
		//form parameters
		$f_name = $this->input->post('name');
		$l_name = $this->input->post('surname');
		$id_number = $this->input->post('id_number');
		$persal = $this->input->post('persal');
		$gender = $this->input->post('gender');
		$race = $this->input->post('race');
		$contact = $this->input->post('contact');
		$email = $this->input->post('email');
		$supervisor = $this->input->post('supervisor');
		$job_title = $this->input->post('position');
		$role = $this->input->post('role');
		$district = $this->input->post('district');
		$salary_level = $this->input->post('salary_level');
		$salary_level_period = $this->input->post('year_in_level');
		$salary_level_entry_date = $this->input->post('level_entry_date');
		$appointment_date = $this->input->post('appoint_date');
		$employee_level = $this->input->post('position_level');
		$disability = $this->input->post('disability');
		$directorate = $this->input->post('directorate');
		$sub_directorate = $this->input->post('sub_directorate');
		$pmd = $this->input->post('pmd');



		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('surname', 'Last Name', 'required');
		$this->form_validation->set_rules('id_number', 'Id Number', 'required');

		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('persal', 'Persal', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		//
		$this->form_validation->set_rules('salary_level', 'Job Level', 'required');
		//$this->form_validation->set_rules('year_in_level', 'Years In Level', 'required');
		$this->form_validation->set_rules('level_entry_date', 'Salary Level Entry Date', 'required');
		$this->form_validation->set_rules('appoint_date', 'Appointment Date', 'required');

		if($this->form_validation->run() == FALSE)
		{
			$this->details($id);
		}
		else
		{
			$data = array('Name' =>$f_name,
				'LastName' =>$l_name,
				'IdNumber' =>$id_number,
				'Persal' =>$persal,
				'Gender' =>$gender,
				'Race' =>$race,
				'Contact' =>$contact,
				'Email' =>$email,
				'SupervisorId' =>$supervisor,
				'pmd' => $pmd,
				'JobTitle' =>$job_title,
				'Role' =>$role,
				'DistrictId' =>$district,
				'SalaryLevel' =>$salary_level,
				//'YearInLevel' =>$salary_level_period,
				'SalaryLevelEntryDate' =>$salary_level_entry_date,
				'AppointmentDate' =>$appointment_date,
				//'JobLevel' =>$employee_level,
				'Disability'=>$disability,
				'directorate'=>$directorate,
				'branch'=>$this->input->post('branch'),
				'sub_directorate'=>$sub_directorate);
			$emp->updateprofile($id, $data);
			$this->details($id);
		}



	}


	public function details($id)
	{
		$branch = $this->db->get('branch')->result_array();
		$user['branch'] = $branch;
		$emp = new EmployeeModel();
		$pos = new PositionModel();
		$role = new RoleModel();
		$dis = new DistrictModel();
		$directorate = new BusinessUnitModel();
		$user['directorate'] = $directorate->get_business_unit();
		$user['sub_directorate'] = $directorate->get_sub_business_unit();
		$user['roles'] = $role->get_roles();
		$user['districts'] = $dis->get_district();
		$user['position'] = $pos->get_positions();
		$user['user'] = $emp->get_user($id);
		$user['pmd'] = $emp->get_pmd_official();
		$user['all_users'] = $emp->get_supervisor();

		$data['tittle'] = "UPDATE EMPLOYEES";
		$this->load->view('templates/header', $data);
		$this->load->view('employees/details', $user);
		$this->load->view('templates/footer');
		$this->load->library('toastr');

	}
	public function profile()
	{
		$id = $_SESSION['Id'];
		$emp = new EmployeeModel();
		$user['user'] = $emp->get_profile($id);
		$this->load->view('templates/header');
		$this->load->view('employees/profile', $user);
		$this->load->view('templates/footer');
	}


}

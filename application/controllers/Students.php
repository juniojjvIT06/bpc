<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
class Students extends CI_Controller
{

	// public function __construct() {
    //     parent::__construct();
    //     $this->load->helper('url');
    //     $this->load->library('curl');
    // }

	

	public function get_province() {
        $api_url = "https://psgc.gitlab.io/api/provinces/" ;
        $provinces = $this->curl->simple_get($api_url);
        return $provinces;
    }

	public function get_municipalities($province_id) {
		$province_id_string = (string) $province_id;
		$api_url = 'https://psgc.gitlab.io/api/provinces/' . $province_id_string . '/cities-municipalities/' ;
	
		// Log the API URL for debugging
		error_log("API URL: " . $api_url);
	
		// Retrieve data from the API
		$municipalities = $this->curl->simple_get($api_url);
	
		// Log the response for debugging
		error_log("API Response: " . $municipalities);
	
		// Set header for JSON response
		header('Content-Type: application/json');
	
		// Return the municipalities data as JSON
		echo $municipalities;
	}

    public function get_barangays($municpality_id) {
		$municpality_id_string = (string) $municpality_id;

		$api_url = 'https://psgc.gitlab.io/api/cities-municipalities/'  . $municpality_id_string .'/barangays/' ;
		
	

		// Log the API URL for debugging
		error_log("API URL: " . $api_url);
	
		// Retrieve data from the API
		$barangays = $this->curl->simple_get($api_url);
	
		// Log the response for debugging
		error_log("API Response: " . $barangays);
	
		// Set header for JSON response
		header('Content-Type: application/json');
	
		// Return the municipalities data as JSON
		echo $barangays;
	}

	public function add()
	{


		$this->ensure_sign_in();
		$datas['courses'] = $this->Management_model->viewPrograms();
		$datas['program_sections'] = $this->Management_model->viewProgramSections();
		$datas['semesters'] = $this->Management_model->viewSemesters();
		$json_data = $this->get_province();
		$datas['provinces'] = json_decode($json_data, true);
		// $this->get_municipalities();
		$this->load->view('header');
		$this->load->view('form_add_student', $datas);
	}

	public function student_add()
	{

		$this->ensure_sign_in();

		$this->form_validation->set_rules('student_code', 'Student Code', 'required|trim');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('middlename', 'Middlename', 'required|trim');
		$this->form_validation->set_rules('extension', 'Extension', 'trim');
		$this->form_validation->set_rules('civil_status', 'Civil Status', 'required|trim');
		$this->form_validation->set_rules('barangay', 'Barangay', 'required|trim');
		$this->form_validation->set_rules('town', 'Town', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('place_of_birth', 'Place of Birth', 'required|trim');
		$this->form_validation->set_rules('religion', 'Religion', 'required|trim');
		$this->form_validation->set_rules('civil_status', 'Civil Status', 'required|trim');
		$this->form_validation->set_rules('mother_tongue', 'Mother Tongue', 'required|trim');
		$this->form_validation->set_rules('citizenship', 'Citizenship', 'required|trim');
		$this->form_validation->set_rules('father_firstname', 'Father Firstname', 'required|trim');
		$this->form_validation->set_rules('father_middlename', 'Father Middlename', 'required|trim');
		$this->form_validation->set_rules('father_lastname', 'Father Lastname', 'required|trim');
		$this->form_validation->set_rules('father_educational_attainment', 'Father Educational Attainment', 'required|trim');
		$this->form_validation->set_rules('father_address', 'Father Address', 'required|trim');
		$this->form_validation->set_rules('father_contact_number', 'Father Contact', 'required|trim');
		$this->form_validation->set_rules('mother_firstname', 'Mother Firstname', 'required|trim');
		$this->form_validation->set_rules('mother_middlename', 'Mother Middlename', 'required|trim');
		$this->form_validation->set_rules('mother_lastname', 'Mother Lastname', 'required|trim');
		$this->form_validation->set_rules('mother_educational_attainment', 'Mother Educational Attainment', 'required|trim');
		$this->form_validation->set_rules('mother_address', 'Mother Address', 'required|trim');
		$this->form_validation->set_rules('mother_contact_number', 'Mother Contact', 'required|trim');
		$this->form_validation->set_rules('last_school_name', 'Last School Name', 'required|trim');
		$this->form_validation->set_rules('last_school_address', 'Last School Address', 'required|trim');
		$this->form_validation->set_rules('honors_received', 'Honors Received', 'required|trim');
		$this->form_validation->set_rules('year_graduated', 'Year Graduated', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim');
		$this->form_validation->set_rules('4ps_beneficiary', '4pcs Beneficiary', 'required|trim');
		$this->form_validation->set_rules('s_contact', 'Contact Number', 'required|trim');
		$this->form_validation->set_rules('course_section', 'Course Section', 'trim');
		$this->form_validation->set_rules('date_enrolled', 'Date Enrolled', 'trim');
		// $this->form_validation->set_rules('pp_image', 'Profile Picture', 'required' );

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('students/add'));
		} else {

			$arr = array(

				'student_code' => $this->input->post('student_code'),
				's_lastname' => $this->input->post('lastname'),
				's_firstname' => $this->input->post('firstname'),
				's_middlename' => $this->input->post('middlename'),
				'extension' => $this->input->post('extension'),
				'civil_status' => $this->input->post('civil_status'),
				'town' => $this->input->post('town'),
				'barangay' => $this->input->post('barangay'),
				'province' => $this->input->post('province'),
				'sex' => $this->input->post('sex'),
				'birthdate' => $this->input->post('date_of_birth'),
				'place_of_birth' => $this->input->post('place_of_birth'),
				'religion' => $this->input->post('religion'),
				'mother_tongue' => $this->input->post('mother_tongue'),
				'citizenship' => $this->input->post('citizenship'),
				'contact' => $this->input->post('s_contact'),
				'email' => $this->input->post('email'),
				'father_firstname' => $this->input->post('father_firstname'),
				'father_middlename' => $this->input->post('father_middlename'),
				'father_lastname' => $this->input->post('father_lastname'),
				'father_educational' => $this->input->post('father_educational_attainment'),
				'father_address' => $this->input->post('father_address'),
				'father_contact' => $this->input->post('father_contact_number'),
				'mother_firstname' => $this->input->post('mother_firstname'),
				'mother_middlename' => $this->input->post('mother_middlename'),
				'mother_lastname' => $this->input->post('mother_lastname'),
				'mother_educational' => $this->input->post('mother_educational_attainment'),
				'mother_address' => $this->input->post('mother_address'),
				'mother_contact' => $this->input->post('mother_contact_number'),
				'4ps_beneficiary' => $this->input->post('4ps_beneficiary'),
				'last_school_name' => $this->input->post('last_school_name'),
				'last_school_address' => $this->input->post('last_school_address'),
				'honors_received' => $this->input->post('honors_received'),
				'year_graduated' => $this->input->post('year_graduated'),
				'course_code' => $this->input->post('course_section'),
				'status' => 'Active'
				
			);

			// $arr2 = array(
			//     'c' => $this->input->post('course_code'),
			//     'student_code' => $this->input->post('student_code'),
			// 	'semester_code' => $this->input->post('semester_code'),
			// );

			$encrpt = 'bpc_12345';
			$password = md5($encrpt);

			$arr3 = array(

				'code_id' => $this->input->post('student_code'),
				'password' => $password,
				'status' => 'first_login',
				'category_level' => 'Student'

			);

			$this->session->set_flashdata('success', 'Successfully Added!');
			$this->Student_model->addStudent($arr);
			$this->enrolled_courses($this->input->post('subject_section'), $this->input->post('student_code'), $this->input->post('date_enrolled'));
			// $this->Student_model->addEnrollee($arr2);
			$this->User_model->addCredentials($arr3);

			redirect(base_url('students/add'));
		}
	}

	public function enrolled_courses($section_code, $student_code, $date_enrolled)
	{


		$subjects = $this->Management_model->get_all_courses($section_code);

		foreach ($subjects as $rows) {
			$arr = array(
				'section_code' => $rows->section_code,
				'subject_code' => $rows->subject_code,
				'student_code' => $student_code,
				'date_enrolled' => $date_enrolled
			);

			$this->Student_model->enrolled_subjects($arr);
		}
	}

	public function upload()
	{
		$this->load->view('header');
		$this->load->view('upload_student');
	}

	public function importStudents()
	{


		// Configure the upload library
		$config['upload_path'] = './assets/excels/';
		$config['allowed_types'] = 'xlsx|xls';

		// Load the upload library with the specified configuration
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		// Check if the upload was successful
		if (!$this->upload->do_upload('students')) {
			// If the upload failed, display an error message
			echo $this->upload->display_errors() . " this";
		} else {
			$data = array('upload_data' => $this->upload->data());
			$file_path = $data['upload_data']['full_path'];

			try {
				$spreadsheet = IOFactory::load($file_path);
				$sheet = $spreadsheet->getActiveSheet();
				$highestRow = $sheet->getHighestRow();

				for ($row = 1; $row <= $highestRow; ++$row) {
					$column1 = $sheet->getCellByColumnAndRow(1, $row)->getValue();
					$column2 = $sheet->getCellByColumnAndRow(2, $row)->getValue();
					$column3 = $sheet->getCellByColumnAndRow(3, $row)->getValue();
					$column4 = $sheet->getCellByColumnAndRow(4, $row)->getValue();
					$column5 = $sheet->getCellByColumnAndRow(5, $row)->getValue();
					$column6 = $sheet->getCellByColumnAndRow(6, $row)->getValue();
					$column7 = $sheet->getCellByColumnAndRow(7, $row)->getValue();
					$column8 = $sheet->getCellByColumnAndRow(8, $row)->getValue();
					$column9 = $sheet->getCellByColumnAndRow(9, $row)->getValue();
					$column10 = $sheet->getCellByColumnAndRow(10, $row)->getValue();
					$column11 = $sheet->getCellByColumnAndRow(11, $row)->getValue();
					$column12 = $sheet->getCellByColumnAndRow(12, $row)->getValue();

					$data = array(
						'student_code' => $column1,
						's_lastname' => $column2,
						's_firstname' => $column3,
						's_middlename' => $column4,
						'town' => $column6,
						'barangay' => $column5,
						'province' => $column7,
						'sex' => $column8,
						's_birthdate' => $column9,
						's_contact' => $column10
					);

					$this->Student_model->addStudent($data);
					$this->enrolled_subjects($column11, $column1, $column12);
				}
				// Redirect to a success page
				$this->session->set_flashdata('success', 'Successfully Added!');
				redirect(base_url('students/add'));
			} catch (Exception $e) {
				die('Error loading file: ' . $e->getMessage());
			}
		}
	}



	public function ensure_sign_in()
	{
		if (!isset($this->session->code_id)) {
			redirect('users/');
		}
	}
}

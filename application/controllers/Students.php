<?php
defined('BASEPATH') or exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\IOFactory;
class Students extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function add()
	{


		$this->ensure_sign_in();
		$datas['courses'] = $this->Management_model->viewCourses();
		$datas['program_sections'] = $this->Management_model->viewProgramSections();
		$datas['semesters'] = $this->Management_model->viewSemesters();
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
		$this->form_validation->set_rules('barangay', 'Barangay', 'required|trim');
		$this->form_validation->set_rules('town', 'Town', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('s_contact', 'Professional Number', 'required|trim');
		$this->form_validation->set_rules('course_section', 'Course Section', 'required|trim');
		$this->form_validation->set_rules('date_enrolled', 'Date Enrolled', 'required|trim');
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
				'town' => $this->input->post('town'),
				'barangay' => $this->input->post('barangay'),
				'province' => $this->input->post('province'),
				'sex' => $this->input->post('sex'),
				's_birthdate' => $this->input->post('date_of_birth'),
				'course_code' => $this->input->post('course_section'),
				's_contact' => $this->input->post('s_contact'),
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
			$this->enrolled_subjects($this->input->post('course_section'), $this->input->post('student_code'), $this->input->post('date_enrolled'));
			// $this->Student_model->addEnrollee($arr2);
			$this->User_model->addCredentials($arr3);

			redirect(base_url('students/add'));
		}
	}

	public function enrolled_subjects($section_code, $student_code, $date_enrolled)
	{


		$subjects = $this->Management_model->get_all_subjects($section_code);

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

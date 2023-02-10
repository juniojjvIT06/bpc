<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Instructors extends CI_Controller
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
		$datas['colleges'] = $this->Management_model->getColleges();
		$this->load->view('header');
		$this->load->view('form_add_instructor', $datas);
	}

	public function list()
	{
		$this->ensure_sign_in();
		$datas['instructors'] = $this->Instructor_model->viewInstructors();
		$datas['colleges'] = $this->Management_model->getColleges();
		// $datas['specialities'] = $this->Instructor_model->show_instructor_specialty();
		$this->load->view('header');
		$this->load->view('list_view_instructor', $datas);
	}

	public function specialty($instructor_id)
	{
		$this->ensure_sign_in();
		$this->session->set_userdata('selected_id', $instructor_id);
		$datas['subjects'] = $this->Subject_model->viewSubjects();
		$datas['instructor_specialty'] =  $this->Instructor_model->show_instructor_specialty($instructor_id);
		$this->load->view('header');
		$this->load->view('form_add_specialty', $datas);
	}

	public function add_speciality($instructor_id)
	{
		$this->ensure_sign_in();
		$selected_values = $this->input->post('subjects');
		$instructors_specialties = $this->Instructor_model->show_instructor_specialty($this->session->userdata('selected_id'));
		// foreach ($selected_values as $sv) {

		// 	$this->Instructor_model->update_single_specialty($instructor_id, $sv);
		// }

		// foreach
		// foreach ($instructors_specialties as $is) {
		// 	foreach ($selected_values as $sv) {
		// 		if ($sv == $is->subject_code) {
		// 			$this->Instructor_model->update_single_specialty($instructor_id, $is->subject_code);
		// 		}
		// 	}
		// }

		// foreach ($selected_values as $sv) {
		// 	if (empty($this->Instructor_model->specialty_existence($instructor_id, $sv))) {
		// 		$this->Instructor_model->insert_single_specialty($instructor_id, $sv);
		// 	}
		// }



		$this->Instructor_model->add_specialties($selected_values, $instructor_id);
		$this->session->set_flashdata('success', 'Successfully Added!');
		$this->session->unset_userdata('selected_id');
		redirect(base_url('instructors/list'));
	}

	public function add_i()
	{
		$this->ensure_sign_in();
		$this->form_validation->set_rules('salutation', 'Salutation', 'required|trim');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('middlename', 'Middlename', 'required|trim');
		$this->form_validation->set_rules('town', 'Town', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('college_assign', 'College Assign', 'required|trim');
		$this->form_validation->set_rules('professional_no', 'Professional Number', 'required|trim');
		$this->form_validation->set_rules('appointment_nature', 'Nature of Appoinment', 'required|trim');
		$this->form_validation->set_rules('employment_status', 'Employment Status', 'required|trim');
		$this->form_validation->set_rules('date_hired', 'Hired Date', 'required|trim');
		$this->form_validation->set_rules('category_level', 'Category LEvel', 'required|trim');
		// $this->form_validation->set_rules('pp_image', 'Profile Picture', 'required' );

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors() . $_FILES['pp_image']['name']);
			redirect(base_url('instructors/add'));
		} else {
			if (!empty($_FILES['pp_image']['name'])) {

				$_FILES['file']['name'] = $_FILES['pp_image']['name'];
				$_FILES['file']['type'] = $_FILES['pp_image']['type'];
				$_FILES['file']['tmp_name'] = $_FILES['pp_image']['tmp_name'];
				$_FILES['file']['error'] = $_FILES['pp_image']['error'];
				$_FILES['file']['size'] = $_FILES['pp_image']['size'];
				$_FILES['pp_image']['name'] =  $this->input->post('instructor_id');

				$config = array(
					'file_name' => $_FILES['pp_image']['name'],
					'upload_path' => './assets/photosinstructor/',
					'allowed_types' => 'jpg|jpeg|png|JPG|JPEG|PNG',
					'max_size' => '10024',
					'overwrite' => TRUE
				);

				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {

					$uploadData = $this->upload->data();
					$document_name = $uploadData["file_name"];
					$arr = array(

						'instructors_id' => $this->input->post('instructor_id'),
						'salutation' => $this->input->post('salutation'),
						'lastname' => $this->input->post('lastname'),
						'firstname' => $this->input->post('firstname'),
						'middlename' => $this->input->post('middlename'),
						'town' => $this->input->post('town'),
						'barangay' => $this->input->post('barangay'),
						'province' => $this->input->post('province'),
						'sex' => $this->input->post('sex'),
						'date_of_birth' => $this->input->post('date_of_birth'),
						'professional_no' => $this->input->post('professional_no'),
						'appointment_nature' => $this->input->post('appointment_nature'),
						'employment_status' => $this->input->post('employment_status'),
						'date_hired' => $this->input->post('date_hired'),
						'college_code' => $this->input->post('college_assign'),
						'college_code' => $this->input->post('college_assign'),
						'image' => $document_name,
						'status' => 'Active'

					);

					$encrpt = 'bpc_12345';
					$password = md5($encrpt);

					$arr2 = array(

						'code_id' => $this->input->post('instructor_id'),
						'password' => $password,
						'status' => 'first_login',
						'category_level' => $this->input->post('category_level')

					);

					$this->session->set_flashdata('success', 'Successfully Added!');
					//$this->session->userdata('lgudms_user_id');
					$this->Instructor_model->addInstructor($arr);
					$this->User_model->addCredentials($arr2);

					redirect(base_url('instructors/add'));
				} else {
					$this->session->set_flashdata('error', 'No Image Found!' . $this->upload->display_errors());
					redirect(base_url('instructors/add'));
				}
			}
		}
	}

	public function update_instructor($instructor_id)
	{
		$this->ensure_sign_in();
		$this->form_validation->set_rules('salutation', 'Salutation', 'required|trim');
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|trim');
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim');
		$this->form_validation->set_rules('middlename', 'Middlename', 'required|trim');
		$this->form_validation->set_rules('town', 'Town', 'required|trim');
		$this->form_validation->set_rules('province', 'Province', 'required|trim');
		$this->form_validation->set_rules('sex', 'Sex', 'required|trim');
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required|trim');
		$this->form_validation->set_rules('college_assign', 'College Assign', 'required|trim');
		$this->form_validation->set_rules('professional_no', 'Professional Number', 'required|trim');
		$this->form_validation->set_rules('appointment_nature', 'Nature of Appoinment', 'required|trim');
		$this->form_validation->set_rules('employment_status', 'Employment Status', 'required|trim');
		$this->form_validation->set_rules('date_hired', 'Hired Date', 'required|trim');
		// $this->form_validation->set_rules('pp_image', 'Profile Picture', 'required' );

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('instructors/list'));
		} else {

			$arr = array(

				'instructors_id' => $this->input->post('instructor_id'),
				'salutation' => $this->input->post('salutation'),
				'lastname' => $this->input->post('lastname'),
				'firstname' => $this->input->post('firstname'),
				'middlename' => $this->input->post('middlename'),
				'town' => $this->input->post('town'),
				'barangay' => $this->input->post('barangay'),
				'province' => $this->input->post('province'),
				'sex' => $this->input->post('sex'),
				'date_of_birth' => $this->input->post('date_of_birth'),
				'professional_no' => $this->input->post('professional_no'),
				'appointment_nature' => $this->input->post('appointment_nature'),
				'employment_status' => $this->input->post('employment_status'),
				'date_hired' => $this->input->post('date_hired'),
				'college_code' => $this->input->post('college_assign'),
				'status' => 'Active'

			);

			$encrpt = 'bpc_12345';
			$password = md5($encrpt);

			$arr2 = array(

				'code_id' => $this->input->post('instructor_id'),
				'password' => $password,
				'status' => 'first_login',
				'category_level' => $this->input->post('category_level')

			);

			$this->session->set_flashdata('success', 'Successfully Updated!');
			//$this->session->userdata('lgudms_user_id');
			$this->Instructor_model->update_instructor($instructor_id, $arr);

			redirect(base_url('instructors/list'));
		}
	}

	public function instructor_delete($instructor_id)
	{
		$this->ensure_sign_in();
		$this->session->set_flashdata('success', 'Successfully Deleted!');
		//$this->session->userdata('lgudms_user_id');
		$this->Instructor_model->delete_instructor($instructor_id);
		redirect(base_url('instructors/list'));
	}

	public function classes()
	{
		$this->ensure_sign_in();
		$datas['classes'] = $this->Instructor_model->viewClasses($this->session->userdata('code_id'));
		$this->load->view('header');
		$this->load->view('view_instructor_subjects', $datas);
	}

	public function mystudents($section_code, $subject_code)
	{
		$this->ensure_sign_in();
		$datas['students'] = $this->Instructor_model->view_my_students($section_code, $subject_code);
		$this->session->set_userdata('select_section_code', $section_code);
		$this->session->set_userdata('select_subject_code', $subject_code);

		$this->load->view('header');
		$this->load->view('view_my_students', $datas);
	}


	public function ensure_sign_in()
	{
		if (!isset($this->session->code_id)) {
			redirect('users/');
		}
	}

	public function assign_classes($instructor_id)
	{
		$this->ensure_sign_in();
		$this->session->set_userdata('click_instructor_id', $instructor_id);
		$datas['assign_classes'] = $this->Instructor_model->viewClasses($instructor_id);
		$this->load->view('header');
		$this->load->view('list_of_class_per_instructor', $datas);
	}

	public function printSubjectLoads()
	{

		$image = "./assets/BPC-LOGO.png";

		$pdf = new FPDF('L', 'mm', 'A4');
		$pdf->AliasNbPages();

		$pdf->AddPage();
		$pdf->SetFont('Times', 'B', 10);

		$pdf->image($image, 30, $pdf->GetY(), 30, 29);
		$pdf->Cell(0, 4, '', 0, 1, 'C');
		$pdf->Cell(0, 4, 'Republic of the Philippines', 0, 1, 'C');
		$pdf->Cell(0, 4, 'Province of Pangasinan', 0, 1, 'C');
		$pdf->Cell(0, 4, 'Municipality of Bayambang', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 12);


		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(0, 10, '', 0, 1, 'C');
		$pdf->Cell(0, 8, 'List of Subjects and Schedules', 0, 1, 'C');
		$pdf->Ln(10);

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(30, 4, 'ID Code Number: ', 0, 0, 'L');
		$pdf->Cell(0, 4, $this->session->userdata('code_id'), 0, 1, 'L');
		$pdf->Cell(30, 4, 'Instructor Name: ', 0, 0, 'L');
		$pdf->Cell(0, 4, $this->Management_model->viewSingleInstructor($this->session->userdata('code_id'))->lastname . ', ' . $this->Management_model->viewSingleInstructor($this->session->userdata('code_id'))->firstname,  0, 1, 'L');
		$pdf->Cell(30, 4, 'College Assign: ', 0, 0, 'L');
		$pdf->Cell(0, 4, $this->Management_model->viewSingleInstructor($this->session->userdata('code_id'))->college_code, 0, 1, 'L');

		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetFillColor(0, 0, 0);
		$pdf->SetDrawColor(255, 255, 255);
		$pdf->SetTextColor(255, 255, 255);

		$pdf->Cell(30, 5, 'Section Code', 1, 0, 'C', 1);
		$pdf->Cell(30, 5, 'Subject Code', 1, 0, 'C', 1);
		$pdf->Cell(40, 5, 'Days', 1, 0, 'C', 1);
		$pdf->Cell(30, 5, 'Room', 1, 0, 'C', 1);
		$pdf->Cell(30, 5, 'Time', 1, 1, 'C', 1);

		$classes = $this->Instructor_model->viewClasses($this->session->userdata('code_id'));

		$pdf->SetFont('Times', '', 10);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetLineWidth(.1);

		foreach ($classes as $rows) {
			$pdf->Cell(30, 5, $rows->section_code, 1, 0, 'C', 1);
			$pdf->Cell(30, 5, $rows->subject_code, 1, 0, 'C', 1);
			$pdf->Cell(40, 5, $this->Management_model->viewSingleSchedule($rows->schedule_code)->day, 1, 0, 'C', 1);
			$pdf->Cell(30, 5, $this->Management_model->viewSingleSchedule($rows->schedule_code)->room_code, 1, 0, 'C', 1);
			$pdf->Cell(30, 5, $this->Management_model->viewSingleSchedule($rows->schedule_code)->start_time . '-' . $this->Management_model->viewSingleSchedule($rows->schedule_code)->end_time, 1, 1, 'C', 1);
		}


		$pdf->SetFont('Times', '', 10);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetLineWidth(.1);

		$pdf->Footer();
		$pdf->Output();
	}

	public function printStudent($section_code, $subject_code)
	{
		$image = "./assets/BPC-LOGO.png";

		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AliasNbPages();

		$pdf->AddPage();
		$pdf->SetFont('Times', 'B', 10);

		$pdf->image($image, 30, $pdf->GetY(), 30, 29);
		$pdf->Cell(0, 4, '', 0, 1, 'C');
		$pdf->Cell(0, 4, 'Republic of the Philippines', 0, 1, 'C');
		$pdf->Cell(0, 4, 'Province of Pangasinan', 0, 1, 'C');
		$pdf->Cell(0, 4, 'Municipality of Bayambang', 0, 1, 'C');
		$pdf->SetFont('Arial', 'B', 12);


		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 14);
		$pdf->Cell(0, 10, '', 0, 1, 'C');
		$pdf->Cell(0, 8, 'List of Students', 0, 1, 'C');
		$pdf->Ln(10);

		$pdf->SetFont('Times', 'B', 10);
		$pdf->Cell(30, 4, 'Section: ', 0, 0, 'L');
		$pdf->Cell(0, 4, $section_code, 0, 1, 'L');
		$pdf->Cell(30, 4, 'Subject: ', 0, 0, 'L');
		$pdf->Cell(0, 4, $subject_code,  0, 1, 'L');
		$pdf->Cell(30, 4, 'Schedule: '  , 0, 0, 'L');
		$pdf->Cell(0, 4, $this->Management_model->getSchedule($section_code, $subject_code)->schedule_code, 0, 1, 'L');

		$pdf->Ln(10);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->SetFillColor(0, 0, 0);
		$pdf->SetDrawColor(255, 255, 255);
		$pdf->SetTextColor(255, 255, 255);

		$pdf->Cell(10, 5, 'No.', 1, 0, 'C', 1);
		$pdf->Cell(30, 5, 'Student Code', 1, 0, 'C', 1);
		$pdf->Cell(90, 5, 'Student Name', 1, 0, 'C', 1);
		$pdf->Cell(60, 5, 'Student Contact Number', 1, 1, 'C', 1);


		$students = $this->Instructor_model->view_my_students($section_code, $subject_code);

		$pdf->SetFont('Times', '', 10);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetLineWidth(.1);

		$i = 0;
		foreach ($students as $rows) {
			$pdf->Cell(10, 5, $i, 1, 0, 'C', 1);
			$pdf->Cell(30, 5, $rows->student_code, 1, 0, 'C', 1);
			$pdf->Cell(90, 5, $this->Student_model->viewSingleStudent($rows->student_code)->s_lastname  . ',' .  $this->Student_model->viewSingleStudent($rows->student_code)->s_firstname  . $this->Student_model->viewSingleStudent($rows->student_code)->s_middlename , 1, 0, 'C', 1);
			$pdf->Cell(60, 5, $this->Student_model->viewSingleStudent($rows->student_code)->s_contact, 1, 1, 'C', 1);
			$i++;
		}


		$pdf->SetFont('Times', '', 10);
		$pdf->SetFillColor(255, 255, 255);
		$pdf->SetTextColor(0, 0, 0);
		$pdf->SetDrawColor(0, 0, 0);
		$pdf->SetLineWidth(.1);

		$pdf->Footer();
		$pdf->Output();
	}
}

<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
		$datas['semesters'] = $this->Management_model->viewSemesters();
		$this->load->view('header');
		$this->load->view('form_add_student', $datas);
	}

    public function student_add(){

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
		$this->form_validation->set_rules('course_code', 'Course Code', 'required|trim');
		$this->form_validation->set_rules('s_contact', 'Professional Number', 'required|trim');
		$this->form_validation->set_rules('semester_code', 'Semester Code', 'required|trim');
		// $this->form_validation->set_rules('pp_image', 'Profile Picture', 'required' );

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors() );
			redirect(base_url('students/add'));
		} else {
			
					$arr = array(

						'student_Code' => $this->input->post('student_code'),
						's_lastname' => $this->input->post('lastname'),
						's_firstname' => $this->input->post('firstname'),
						's_middlename' => $this->input->post('middlename'),
						'town' => $this->input->post('town'),
						'barangay' => $this->input->post('barangay'),
						'province' => $this->input->post('province'),
						'sex' => $this->input->post('sex'),
						's_birthdate' => $this->input->post('date_of_birth'),
						'course_code' => $this->input->post('course_code'),
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
					// $this->Student_model->addEnrollee($arr2);
					$this->User_model->addCredentials($arr3);

					redirect(base_url('students/add'));
				} 
	
        
    }

	

	public function ensure_sign_in()
    {
        if (!isset($this->session->code_id)) {
            redirect('users/');
        }
    }
}

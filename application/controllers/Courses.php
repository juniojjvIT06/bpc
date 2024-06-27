<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Courses extends CI_Controller
{


	public function add()
	{

		$this->ensure_sign_in();
		$datas['courses'] = $this->Course_model->viewCourses();
		$datas['programs'] = $this->Management_model->viewPrograms();
		$this->load->view('header');
		$this->load->view('form_add_course', $datas);
	}

	public function course_add()
	{
		$this->ensure_sign_in();
		$this->load->library('My_Form_validation');
		$this->form_validation->set_rules('program_code', 'Program Code Description', 'required|trim');
		$this->form_validation->set_rules('course_code', 'Course Code', 'required|trim|is_unique[tbl_bpc_courses.course_code]|no_spaces');
		$this->form_validation->set_rules('course_year_level', 'Year Level Description', 'required|trim');
		$this->form_validation->set_rules('course_semester', 'Semester Description', 'required|trim');
		$this->form_validation->set_rules('course_desc', 'Course Description', 'required|trim');
		$this->form_validation->set_rules('course_type', 'Course Type Description', 'required|trim');
		$this->form_validation->set_rules('course_units', 'Course Units Description', 'required|trim');
		$this->form_validation->set_rules('course_prerequisite', 'Course Pre-Requisite Description', 'required|trim');

		str_replace(" ", "", $this->input->post('course_code'));

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('courses/add'));
		} else {
			$arr = array(
				'program_code' => $this->input->post('program_code'),
				'course_code' => str_replace(" ", "", $this->input->post('course_code')),
				'course_description' => $this->input->post('course_desc'),
				'course_units' => $this->input->post('course_units'),
				'course_type' => $this->input->post('course_type'),
				'year_level' => $this->input->post('course_year_level'),
				'semester' => $this->input->post('course_semester'),
				'pre_requisite' => $this->input->post('course_prerequisite'),
				'status' => 'Active'

			);

			$this->session->set_flashdata('success', 'Successfully Added!');

			$this->Course_model->addCourses($arr);
			redirect(base_url('courses/add'));
		}
	}

	public function course_update($course_code)
	{
		$this->ensure_sign_in();
		$this->form_validation->set_rules('program_code_edit', 'Program Code Description', 'required|trim');
		$this->form_validation->set_rules('course_year_level_edit', 'Year Level Description', 'required|trim');
		$this->form_validation->set_rules('course_semester_edit', 'Semester Description', 'required|trim');
		$this->form_validation->set_rules('course_desc_edit', 'Course Description', 'required|trim');
		$this->form_validation->set_rules('course_type_edit', 'Course Type Description', 'required|trim');
		$this->form_validation->set_rules('course_units_edit', 'Course Units Description', 'required|trim');
		$this->form_validation->set_rules('course_prerequisite_edit', 'Course Pre-Requisite Description', 'required|trim');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('courses/add'));
		} else {

			$arr = array(

				'program_code' => $this->input->post('program_code_edit'),
				'course_description' => $this->input->post('course_desc_edit'),
				'course_units' => $this->input->post('course_units_edit'),
				'course_type' => $this->input->post('course_type_edit'),
				'year_level' => $this->input->post('course_year_level_edit'),
				'semester' => $this->input->post('course_semester_edit'),
				'pre_requisite' => $this->input->post('course_prerequisite_edit'),
				'status' => 'Active'

			);

			$subject_code = $this->input->post('course_code_edit');

			$this->session->set_flashdata('success', 'Successfully Updated!');
			$this->Course_model->update_course($arr, $course_code);

			redirect(base_url('courses/add'));
		}
	}

	public function course_delete($course_code)
	{
		$this->ensure_sign_in();
		$this->Course_model->delete_course($course_code);
		$this->session->set_flashdata('success', 'Successfully Deleted!');
		redirect(base_url('courses/add'));
	}

	public function ensure_sign_in()
    {
        if (!isset($this->session->code_id)) {
            redirect('users/');
        }
    }
}

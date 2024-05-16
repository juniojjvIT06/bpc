<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subjects extends CI_Controller
{


	public function add()
	{


		$this->ensure_sign_in();
		$datas['subjects'] = $this->Subject_model->viewSubjects();
		$this->load->view('header');
		$this->load->view('form_add_subject', $datas);
	}

	public function subjects_add()
	{
		$this->ensure_sign_in();
		$this->load->library('My_Form_validation');
		$this->form_validation->set_rules('subject_code', 'Subject Code', 'required|trim|is_unique[tbl_bpc_subjects.subject_code]|no_spaces');
		$this->form_validation->set_rules('subject_desc', 'Subject Description', 'required|trim');
		$this->form_validation->set_rules('subject_units', 'Subject Units Description', 'required|trim');

		str_replace(" ", "", $this->input->post('subject_code'));

		if ($this->form_validation->run() == FALSE) {

			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('subjects/add'));
		} else {
			$arr = array(

				'subject_code' => str_replace(" ", "", $this->input->post('subject_code')),
				'subject_description' => $this->input->post('subject_desc'),
				'subject_units' => $this->input->post('subject_units'),
				'status' => 'Active'

			);

			$this->session->set_flashdata('success', 'Successfully Added!');

			$this->Subject_model->addSubjects($arr);
			redirect(base_url('subjects/add'));
		}
	}

	public function subject_update($subject_code)
	{
		$this->ensure_sign_in();
		$this->form_validation->set_rules('subject_desc_edit', 'Course Description', 'required|trim');


		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('subjects/add'));
		} else {

			$arr = array(

				'subject_description' => $this->input->post('subject_desc_edit'),
				'subject_units' => $this->input->post('subject_units_edit'),

			);

			$subject_code = $this->input->post('subject_code_edit');

			$this->session->set_flashdata('success', 'Successfully Updated!');
			$this->Subject_model->update_subject($arr, $subject_code);

			redirect(base_url('subjects/add'));
		}
	}

	public function subject_delete($subject_code)
	{
		$this->ensure_sign_in();
		$this->Subject_model->delete_subject($subject_code);
		$this->session->set_flashdata('success', 'Successfully Deleted!');
		redirect(base_url('subjects/add'));
	}

	public function ensure_sign_in()
    {
        if (!isset($this->session->code_id)) {
            redirect('users/');
        }
    }
}

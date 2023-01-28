<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects extends CI_Controller {

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

    public function add(){
        $datas['subjects'] = $this->Subject_model->viewSubjects();
        $this->load->view('header');
        $this->load->view('form_add_subject' , $datas);
    }

	public function subjects_add(){
		$this->form_validation->set_rules('subject_code', 'Subject Code', 'required|trim|is_unique[tbl_bpc_subjects.subject_code]');
		$this->form_validation->set_rules('subject_desc', 'Subject Description', 'required|trim');

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('subjects/add'));
		}else{
			$arr = array(
					
				'subject_code' => $this->input->post('subject_code'),
				'subject_description' => $this->input->post('subject_desc'),
				'status' => 'Active'

			);

			$this->session->set_flashdata('success', 'Successfully Added!');

					$this->Instructor_model->addSubjects($arr);
					redirect(base_url('subjects/add'));

		}
	}

	
}

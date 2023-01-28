<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instructors extends CI_Controller {

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
		$datas['colleges'] = $this->Management_model->getColleges();
        $this->load->view('header');
        $this->load->view('form_add_instructor', $datas);
    }

	public function list(){
		$datas['instructors'] = $this->Instructor_model->viewInstructors();
		// $datas['specialities'] = $this->Instructor_model->show_instructor_specialty();
		$this->load->view('header');
        $this->load->view('list_view_instructor', $datas);
	}
	public function specialty($instructor_id){
		$this->session->set_userdata('selected_id',$instructor_id);
		$datas['subjects'] = $this->Subject_model->viewSubjects();
		$this->load->view('header');
        $this->load->view('form_add_specialty' , $datas);
	}
	public function add_speciality($instructor_id){
		$selected_values = $this->input->post('subjects');
		$this->Instructor_model->add_specialties($selected_values ,$instructor_id);
		$this->session->set_flashdata('success', 'Successfully Added!'  );
		$this->session->unset_userdata('selected_id');
		redirect(base_url('instructors/list'));
	}

	public function add_i(){

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

		if($this->form_validation->run() == FALSE){
			$this->session->set_flashdata('error', validation_errors() . $_FILES['pp_image']['name']);
			redirect(base_url('instructors/add'));
		}
		else{
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
						'image' => $document_name,
						'status' => 'Active'

					);

					$this->session->set_flashdata('success', 'Successfully Added!');
					//$this->session->userdata('lgudms_user_id');
					$this->Instructor_model->addInstructor($arr);

					redirect(base_url('instructors/add'));
				}
				else{
					$this->session->set_flashdata('error', 'No Image Found!' . $this->upload->display_errors());
					redirect(base_url('instructors/add'));
				}
				
		}

	}
}
}

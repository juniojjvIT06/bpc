<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
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
	public function index()
	{
		$this->load->view('user_login');
	}

	public function login()
	{
		$this->form_validation->set_rules('code_id', 'Code ID Number', 'required|trim');
		$this->form_validation->set_rules('password', 'Password', 'required|trim');

		if ($this->form_validation->run() == FALSE) {
			$this->session->set_flashdata('error', validation_errors());
			redirect(base_url('users/index'));
		} else {

			$code_id = $this->input->post('code_id');
			$password = md5($this->input->post('password'));

			$query = $this->User_model->login($code_id);

			$this->session->set_userdata('status', $query->status);
			$active_status = $this->session->userdata('status');

			if ($query->num_rows = 0) {
				$this->session->set_flashdata('error', "Invalid Code ID Number/password!");
				redirect('users/index');
			} else {

				if ($query->password != $password) {
					$this->session->set_flashdata('error', "Invalid Code ID Number/password!");
					redirect('users/index');
				} else {
					if ($active_status != 'first_login') {

						$this->session->set_userdata('code_id', $query->code_id);
						$this->session->set_userdata('category_level', $query->category);

						redirect('instructors/add');
					} else {
						$this->session->set_userdata('code_id', $query->code_id);
						$this->session->set_userdata('category_level', $query->category);
						redirect('users/first_login');
					}
				}
			}
		}
	}

	public function change_password()
	{

		$this->form_validation->set_rules('current-password', 'New Password', 'required|trim');
		$this->form_validation->set_rules('new-password', 'New Password', 'required|trim');
		$this->form_validation->set_rules('confirm-new-password', 'Confirm New Password', 'required|trim');

		$query = $this->User_model->login($this->session->userdata('code_id'));
		$current_password = md5($this->input->post('current-password'));
		$new_password = $this->input->post('new-password');
		$confirm_password = $this->input->post('confirm-new-password');



		if ($query->password != $current_password) {
			$this->session->set_flashdata('error', "Invalid password!");
			redirect('users/');
		} else {
			if ($new_password != $confirm_password) {

				$this->session->set_flashdata('error', "New Password does not match to Confirm Password");
				redirect('users/');
			} else {

				$this->User_model->update_new_password($this->session->userdata('code_id'), md5($new_password));
				$this->destroy_all_session();
				$this->session->set_flashdata('success', "Login with new Password!");
				redirect('users/');
			}
		}
	}

	public function destroy_all_session()
	{
		session_destroy();
	}

	public function first_login()
	{
		$this->load->view('form_change_password');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('users/index');
	}

	public function ensure_sign_in()
	{
		if (!isset($this->session->code_id)) {
			redirect('users/');
		}
	}
}

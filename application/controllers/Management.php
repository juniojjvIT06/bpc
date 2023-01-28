<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Management extends CI_Controller
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
        $datas['colleges'] = $this->Management_model->viewColleges();
        $this->load->view('header');
        $this->load->view('form_add_college', $datas);
    }

    public function college_add()
    {
        $this->form_validation->set_rules('college_code', 'College Code', 'required|trim|is_unique[tbl_bpc_college.college_code]');
        $this->form_validation->set_rules('college_desc', 'College Description', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/add'));
        } else {
            $arr = array(

                'college_code' => $this->input->post('college_code'),
                'college_description' => $this->input->post('college_desc'),
                'status' => 'Active'

            );

            $this->session->set_flashdata('success', 'Successfully Added!');

            $this->Management_model->addCollege($arr);
            redirect(base_url('management/add'));
        }
    }

    public function room()
    {
        $datas['rooms'] = $this->Management_model->viewRooms();
        $this->load->view('header');
        $this->load->view('form_add_room', $datas);
    }

    public function room_add()
    {
        $this->form_validation->set_rules('room_code', 'Room Code', 'required|trim|is_unique[tbl_bpc_rooms.room_code]');
        $this->form_validation->set_rules('room_desc', 'Room Description', 'required|trim');
        $this->form_validation->set_rules('room_capacity', 'Room Capacity', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/room'));
        } else {
            $arr = array(

                'room_code' => $this->input->post('room_code'),
                'room_description' => $this->input->post('room_desc'),
                'room_capacity' => $this->input->post('room_capacity'),
                'status' => 'Active'
            );

            $this->session->set_flashdata('success', 'Successfully Added!');

            $this->Management_model->addRoom($arr);
            redirect(base_url('management/room'));
        }
    }

    public function course()
    {
        $datas['courses'] = $this->Management_model->viewCourses();
        $datas['colleges'] = $this->Management_model->getColleges();
        $this->load->view('header');
        $this->load->view('form_add_course', $datas);
    }

    public function course_add()
    {
        $this->form_validation->set_rules('course_code', 'Course Code', 'required|trim|is_unique[tbl_bpc_courses.course_code]');
        $this->form_validation->set_rules('course_desc', 'Course Description', 'required|trim');
        $this->form_validation->set_rules('college_code', 'College Code', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/course'));
        } else {
            $arr = array(

                'course_code' => $this->input->post('course_code'),
                'course_description' => $this->input->post('course_desc'),
                'college_code' => $this->input->post('college_code')
            );

            $this->session->set_flashdata('success', 'Successfully Added!');
            $this->Management_model->addCourse($arr);
            redirect(base_url('management/course'));
        }
    }

    public function schedule()
    {
        $datas['rooms'] = $this->Management_model->viewRooms();
        $datas['schedules'] = $this->Management_model->viewSchedules();
        $this->load->view('header');
        $this->load->view('form_add_schedule', $datas);
    }

    public function schedule_add()
    {
        $this->form_validation->set_rules('schedule_code', 'Schedule Code', 'required|trim|is_unique[tbl_bpc_schedule.schedule_code]');
        $this->form_validation->set_rules('day', 'Schedule Day/s', 'required|trim');
        $this->form_validation->set_rules('room_code', 'Room Code', 'required|trim');
        $this->form_validation->set_rules('start_time', 'Start Time', 'required|trim');
        $this->form_validation->set_rules('end_time', 'Room Code', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/schedule'));
        } else {
            $arr = array(

                'schedule_code' => $this->input->post('schedule_code'),
                'day' => $this->input->post('day'),
                'room_code' => $this->input->post('room_code'),
                'start_time' => $this->input->post('start_time'),
                'end_time' => $this->input->post('end_time')
            );

            $this->session->set_flashdata('success', 'Successfully Added!');
            $this->Management_model->addSchedule($arr);
            redirect(base_url('management/schedule'));
        }
    }

}

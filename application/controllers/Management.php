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

    public function college_update($instructor_id)
    {

        $this->form_validation->set_rules('college_desc_edit', 'College Description', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/add'));
        } else {

            $arr = array(

                'college_description' => $this->input->post('college_desc_edit'),

            );

            $college_code = $this->input->post('college_code_edit');

            $this->session->set_flashdata('success', 'Successfully Updated!');
            $this->Management_model->update_college($arr, $college_code);

            redirect(base_url('management/add'));
        }
    }

    public function college_delete($college_code)
    {
        $this->Management_model->delete_college($college_code);
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect(base_url('management/add'));
    }

    public function room()
    {
        $datas['rooms'] = $this->Management_model->viewRooms();
        $this->load->view('header');
        $this->load->view('form_add_room', $datas);
    }

    public function room_update($room_code)
    {

        $this->form_validation->set_rules('room_desc_edit', 'College Description', 'required|trim');
        $this->form_validation->set_rules('room_capacity_edit', 'College Description', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/room'));
        } else {

            $arr = array(

                'room_description' => $this->input->post('room_desc_edit'),
                'room_capacity' => $this->input->post('room_capacity_edit'),

            );

            $room_code = $this->input->post('room_code_edit');

            $this->session->set_flashdata('success', 'Successfully Updated!');
            $this->Management_model->update_room($arr, $room_code);

            redirect(base_url('management/room'));
        }
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

    public function room_delete($room_code)
    {
        $this->Management_model->delete_room($room_code);
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect(base_url('management/room'));
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
        $this->form_validation->set_rules('course_code', 'Course Code', 'required|trim|is_unique[tbl_bpc_courses.course_code]|no_spaces');
        $this->form_validation->set_rules('course_desc', 'Course Description', 'required|trim');
        $this->form_validation->set_rules('college_code', 'College Code', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/course'));
        } else {
            $arr = array(

                'course_code' => str_replace(" ", "",$this->input->post('course_code')),
                'course_description' => $this->input->post('course_desc'),
                'college_code' => $this->input->post('college_code')
            );

            $this->session->set_flashdata('success', 'Successfully Added!');
            $this->Management_model->addCourse($arr);
            redirect(base_url('management/course'));
        }
    }

    public function course_update($course_code)
    {

        $this->form_validation->set_rules('course_desc_edit', 'Course Description', 'required|trim');
        $this->form_validation->set_rules('course_college_under_edit', 'College Under Description', 'required|trim');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/course'));
        } else {

            $arr = array(

                'course_description' => $this->input->post('course_desc_edit'),
                'college_code' => $this->input->post('course_college_under_edit'),

            );

            $course_code = $this->input->post('course_code_edit');

            $this->session->set_flashdata('success', 'Successfully Updated!');
            $this->Management_model->update_course($arr, $course_code);

            redirect(base_url('management/course'));
        }
    }

    public function course_delete($course_code)
    {
        $this->Management_model->delete_course($course_code);
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect(base_url('management/course'));
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

                'schedule_code' => str_replace(" ", "",$this->input->post('schedule_code')),
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

    public function schedule_update($schedule_code)
    {

        $this->form_validation->set_rules('day_edit', 'Day Description', 'required|trim');
        $this->form_validation->set_rules('room_code_edit', 'Room Code Description', 'required|trim');
        $this->form_validation->set_rules('start_time_edit', 'Time Start Description', 'required|trim');
        $this->form_validation->set_rules('end_time_edit', 'Time End Description', 'required|trim');
       


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/schedule'));
        } else {

            $arr = array(

                'day' => $this->input->post('day_edit'),
                'room_code' => $this->input->post('room_code_edit'),
                'start_time' => $this->input->post('start_time_edit'),
                'end_time' => $this->input->post('end_time_edit'),


            );

            $schedule_code = $this->input->post('schedule_code_edit');

            $this->session->set_flashdata('success', 'Successfully Updated!');
            $this->Management_model->update_schedule($arr, $schedule_code);

            redirect(base_url('management/schedule'));
        }
    }

    public function schedule_delete($schedule_code)
    {
        $this->Management_model->delete_schedule($schedule_code);
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect(base_url('management/schedule'));
    }


    public function academic()
    {
        $datas['academics'] = $this->Management_model->viewAcademics();
        $this->load->view('header');
        $this->load->view('form_add_academic_year', $datas);
    }

    public function academic_add()
    {
        $this->form_validation->set_rules('academic_year', 'Academic Year', 'required|trim|no_spaces|is_unique[tbl_bpc_academic_year.academic_year]');
        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/academic'));
        } else {
            $arr = array(

                'academic_year' => $this->input->post('academic_year'),

            );

            $this->session->set_flashdata('success', 'Successfully Added!');
            $this->Management_model->addAcademic($arr);
            redirect(base_url('management/academic'));
        }
    }

    
    public function academic_update($academic_id)
    {

        $this->form_validation->set_rules('academic_year_edit', 'Academic Year Description', 'required|trim|no_spaces|is_unique[tbl_bpc_academic_year.academic_year]');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/academic'));
        } else {

            $arr = array(

                'academic_year' => $this->input->post('academic_year_edit'),

            );

            $academic_id = $this->input->post('academic_id_edit');

            $this->session->set_flashdata('success', 'Successfully Updated!');
            $this->Management_model->update_academic($arr, $academic_id);

            redirect(base_url('management/academic'));
        }
    }

    public function academic_delete($academic_id)
    {
        $this->Management_model->delete_academic($academic_id);
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect(base_url('management/academic'));
    }

    public function semester()
    {
        $datas['semesters'] = $this->Management_model->viewSemesters();
        $datas['academics'] = $this->Management_model->viewAcademics();
        $this->load->view('header');
        $this->load->view('form_add_semester', $datas);
    }

    public function semester_add()
    {
        $this->form_validation->set_rules('semester_code', 'Semester Code', 'required|trim|is_unique[tbl_bpc_semesters.semester_code]');
        $this->form_validation->set_rules('year_level', 'Year Level', 'required|trim');
        $this->form_validation->set_rules('academic_year', 'Academic Year', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/semester'));
        } else {
            $arr = array(

                'semester_code' => $this->input->post('semester_code'),
                'year_level' => $this->input->post('year_level'),
                'academic_id' => $this->input->post('academic_year'),

            );

            $this->session->set_flashdata('success', 'Successfully Added!');
            $this->Management_model->addSemester($arr);
            redirect(base_url('management/semester'));
        }
    }

    public function semester_update($semester_id)
    {

        $this->form_validation->set_rules('year_level_edit', 'Year Level', 'required|trim|no_spaces');
        $this->form_validation->set_rules('academic_year_edit', 'Academic Year Description', 'required|trim|no_spaces');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/semester'));
        } else {

            $arr = array(

                'year_level' => $this->input->post('year_level_edit'),
                'academic_id' => $this->input->post('academic_year_edit'),

            );

            $semester_id = $this->input->post('semester_id_edit');

            $this->session->set_flashdata('success', 'Successfully Updated!');
            $this->Management_model->update_semester($arr, $semester_id);

            redirect(base_url('management/semester'));
        }
    }

    public function semester_delete($semester_id)
    {
        $this->Management_model->delete_semester($semester_id);
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect(base_url('management/semester'));
    }

    public function class()
    {

        $datas['rooms'] = $this->Management_model->viewRooms();
        $datas['schedules'] = $this->Management_model->viewSchedules();
        $datas['courses'] = $this->Management_model->viewCourses();
        $datas['semesters'] = $this->Management_model->viewSemesters();
        $datas['subjects'] = $this->Subject_model->viewSubjects();
        $datas['classes'] = $this->Management_model->viewClassesSchedules();

        $this->load->view('header');
        $this->load->view('form_add_class', $datas);
    }

    public function class_add()
    {
        $this->form_validation->set_rules('class_code', 'Class Code', 'required|trim|is_unique[tbl_bpc_classes.class_code]');
        $this->form_validation->set_rules('course_code', 'Course Level', 'required|trim');
        $this->form_validation->set_rules('subject_code', 'Subject Code', 'required|trim');
        $this->form_validation->set_rules('schedule_code', 'Schedule Code', 'required|trim');
        $this->form_validation->set_rules('semester_code', 'Semester Code', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/class'));
        } else {
            // $arr = array(

            //     'semester_code' => $this->input->post('semester_code'),
            //     'year_level' => $this->input->post('year_level'),
            //     'academic_id' => $this->input->post('academic_year'),

            // );

            // $this->session->set_flashdata('success', 'Successfully Added!');
            // $this->Management_model->addSemester($arr);

            $this->session->set_userdata('set_class_code', $this->input->post('class_code'));
            $this->session->set_userdata('set_course_code', $this->input->post('course_code'));
            $this->session->set_userdata('set_subject_code', $this->input->post('subject_code'));
            $this->session->set_userdata('set_schedule_code', $this->input->post('schedule_code'));
            $this->session->set_userdata('set_semester_code', $this->input->post('semester_code'));

            redirect(base_url('management/class_instructor'));
        }
    }
    public function class_instructor_reassign()
    {
        $this->form_validation->set_rules('class_code_res', 'Class Code', '');
        $this->form_validation->set_rules('course_code_res', 'Course Level', 'required|trim');
        $this->form_validation->set_rules('subject_code_res', 'Subject Code', 'required|trim');
        $this->form_validation->set_rules('schedule_code_res', 'Schedule Code', 'required|trim');
        $this->form_validation->set_rules('semester_code_res', 'Semester Code', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/class'));
        } else {
            // $arr = array(

            //     'semester_code' => $this->input->post('semester_code'),
            //     'year_level' => $this->input->post('year_level'),
            //     'academic_id' => $this->input->post('academic_year'),

            // );

            // $this->session->set_flashdata('success', 'Successfully Added!');
            // $this->Management_model->addSemester($arr);

            $this->session->set_userdata('set_class_code', $this->input->post('class_code_res'));
            $this->session->set_userdata('set_course_code', $this->input->post('course_code_res'));
            $this->session->set_userdata('set_subject_code', $this->input->post('subject_code_res'));
            $this->session->set_userdata('set_schedule_code', $this->input->post('schedule_code_res'));
            $this->session->set_userdata('set_semester_code', $this->input->post('semester_code_res'));

            redirect(base_url('management/class_instructor'));
        }
    }

    public function class_instructor()
    {
        $this->load->view('header');
        $this->load->view('form_add_class_instructor');
    }

    public function classs_schedule_add()
    {
        $this->form_validation->set_rules('instructor_code', 'Semester Code', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/class_instructor'));
        } else {
            $arr = array(

                'class_code' =>  $this->session->userdata('set_class_code'),
                'course_code' =>  $this->session->userdata('set_course_code'),
                'subject_code' =>  $this->session->userdata('set_subject_code'),
                'schedule_code' =>  $this->session->userdata('set_schedule_code'),
                'instructors_id' =>  $this->input->post('instructor_code'),
                'semester_code' =>  $this->session->userdata('set_semester_code')

            );

            $this->session->set_flashdata('success', 'Successfully Added!');
            $this->Management_model->addClassSchedule($arr);
            redirect(base_url('management/class_schedule_cancel'));
        }
    }

    public function class_schedule_update($class_code)
    {

        $this->form_validation->set_rules('subject_code_edit', 'Subject Code', 'required|trim|no_spaces');
        $this->form_validation->set_rules('course_code_edit', 'Course Code', 'required|trim|no_spaces');
        $this->form_validation->set_rules('schedule_code_edit', 'Schedule Code', 'required|trim|no_spaces');
        $this->form_validation->set_rules('subject_code_edit', 'Subejct Code', 'required|trim|no_spaces');
        $this->form_validation->set_rules('semester_code_edit', 'Semester', 'required|trim|no_spaces');


        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect(base_url('management/class'));
        } else {

            $arr = array(

                'course_code' => $this->input->post('course_code_edit'),
                'subject_code' => $this->input->post('subject_code_edit'),
                'schedule_code' => $this->input->post('schedule_code_edit'),
                'semester_code' => $this->input->post('semester_code_edit'),

            );

            $class_code = $this->input->post('class_code_edit');

            $this->session->set_flashdata('success', 'Successfully Updated!');
            $this->Management_model->update_class_schedule($arr, $class_code);

            redirect(base_url('management/class'));
        }
    }

    public function class_schedule_delete($class_code)
    {
        $this->Management_model->delete_class_schedule($class_code);
        $this->session->set_flashdata('success', 'Successfully Deleted!');
        redirect(base_url('management/class'));
    }

    public function class_schedule_cancel()
    {

        $this->session->unset_userdata('set_class_code');
        $this->session->unset_userdata('set_course_code');
        $this->session->unset_userdata('set_subject_code');
        $this->session->unset_userdata('set_schedule_code');
        $this->session->unset_userdata('set_semester_code');

        redirect(base_url('management/class'));
    }
}

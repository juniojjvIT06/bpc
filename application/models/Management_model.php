<?php

class Management_model extends CI_Model
{


    public function addCollege($arr)
    {
        return $this->db->insert("tbl_bpc_college", $arr);
    }

    public function viewColleges()
    {
        return $this->db->get("tbl_bpc_college")->result();
    }

    public function update_college($array, $college_coode)
    {

        $this->db->where('college_code', $college_coode);
        $this->db->update('tbl_bpc_college', $array);
    }

    public function delete_college($college_coode)
    {
        $this->db->where('college_code', $college_coode);
        $this->db->delete('tbl_bpc_college');
    }


    public function addRoom($arr)
    {
        return $this->db->insert("tbl_bpc_rooms", $arr);
    }
    public function viewRooms()
    {
        return $this->db->get("tbl_bpc_rooms")->result();
    }
    public function viewSingleRoom($code)
    {
        $this->db->where('room_code', $code);
        return $this->db->get("tbl_bpc_rooms")->row();
    }

    public function update_room($array, $room_code)
    {

        $this->db->where('room_code', $room_code);
        $this->db->update('tbl_bpc_rooms', $array);
    }

    public function delete_room($room_code)
    {
        $this->db->where('room_code', $room_code);
        $this->db->delete('tbl_bpc_rooms');
    }

    public function viewPrograms()
    {
        return $this->db->get("tbl_bpc_programs")->result();
    }

    public function getColleges()
    {
        return $this->db->get("tbl_bpc_college")->result();
    }
    public function addProgram($arr)
    {
        return $this->db->insert("tbl_bpc_programs", $arr);
    }

    public function update_program($array, $course_code)
    {

        $this->db->where('program_code', $course_code);
        $this->db->update('tbl_bpc_programs', $array);
    }

    public function delete_program($program_code)
    {
        $this->db->where('program_code', $program_code);
        $this->db->delete('tbl_bpc_programs');
    }

    public function viewSingleCollege($code)
    {
        $this->db->where('college_code', $code);
        return $this->db->get("tbl_bpc_college")->row();
    }

    public function viewSingleSchedule($code)
    {
        $this->db->where('schedule_code', $code);
        return $this->db->get("tbl_bpc_schedule")->row();
    }

    public function viewSchedules_available()
    {
        $this->db->where('acquired', 0);
        return $this->db->get("tbl_bpc_schedule")->result();
    }

    public function viewSchedules()
    {
        return $this->db->get("tbl_bpc_schedule")->result();
    }

    public function addSchedule($arr)
    {
        return $this->db->insert("tbl_bpc_schedule", $arr);
    }
    public function update_schedule($array, $schedule_code)
    {

        $this->db->where('schedule_code', $schedule_code);
        $this->db->update('tbl_bpc_schedule', $array);
    }

    public function delete_schedule($schedule_code)
    {
        $this->db->where('schedule_code', $schedule_code);
        $this->db->delete('tbl_bpc_schedule');
    }

    public function viewSingleAcademic($code)
    {
        $this->db->where('academic_id', $code);
        return $this->db->get("tbl_bpc_academic_year")->row();
    }

    public function viewAcademics()
    {
        return $this->db->get("tbl_bpc_academic_year")->result();
    }

    public function addAcademic($arr)
    {
        return $this->db->insert("tbl_bpc_academic_year", $arr);
    }

    public function update_academic($array, $academic_id)
    {

        $this->db->where('academic_id', $academic_id);
        $this->db->update('tbl_bpc_academic_year', $array);
    }

    public function delete_academic($academic_id)
    {
        $this->db->where('academic_id', $academic_id);
        $this->db->delete('tbl_bpc_academic_year');
    }

    public function viewSemesters()
    {
        return $this->db->get("tbl_bpc_semesters")->result();
    }

    public function addSemester($arr)
    {
        return $this->db->insert("tbl_bpc_semesters", $arr);
    }

    public function update_semester($array, $semester_code)
    {

        $this->db->where('semester_code', $semester_code);
        $this->db->update('tbl_bpc_semesters', $array);
    }

    public function delete_semester($semester_code)
    {
        $this->db->where('semester_code', $semester_code);
        $this->db->delete('tbl_bpc_semesters');
    }

    public function addClassSchedule($arr)
    {
        return $this->db->insert("tbl_bpc_program_section_subjects", $arr);
    }

    public function viewClassesSchedules()
    {
        return $this->db->get("tbl_bpc_program_section_subjects")->result();
    }
    public function viewSingleClassesSchedule($class_id)
    {
        $this->db->where('class_id', $class_id);
        return $this->db->get("tbl_bpc_program_section_subjects")->row();
    }

    public function update_class_schedule($array, $class_code)
    {

        $this->db->where('class_code', $class_code);
        $this->db->update('tbl_bpc_program_section_subjects', $array);
    }

    public function check_class_code_exist($class_code)
    {
        $this->db->where('class_code', $class_code);
        return $this->db->get("tbl_bpc_program_section_subjects")->row();
    }

    public function reasssign_instructror($class_code, $instructors_id)
    {

        $this->db->where('class_code', $class_code);
        $this->db->set('instructors_id', $instructors_id);
        $this->db->update("tbl_bpc_program_section_subjects");
    }

    public function delete_class_schedule($class_code)
    {
        $this->db->where('class_id', $class_code);
        $this->db->delete('tbl_bpc_program_section_subjects');
    }

    public function update_acquired($schedule_code){
        $this->db->where('schedule_code', $schedule_code);
        $this->db->set('acquired', 0);
        $this->db->update("tbl_bpc_schedule");
    }

    public function viewSingleInstructor($instructors_id)
    {
        $this->db->where('instructors_id', $instructors_id);
        return $this->db->get("tbl_bpc_instructors")->row();
    }

    public function loadPlatesPerDepartment($department)
    {
        $this->db->where('department_assign', $department);
        return $this->db->get("tblmachine")->result();
    }

    public function viewSections()
    {
        return $this->db->get("tbl_bpc_program_sections")->result();
    }

    public function addSection($arr)
    {
        return $this->db->insert("tbl_bpc_program_sections", $arr);
    }

    public function checkSectionCode_Availability($section_code)
    {
        $this->db->where('section_code', $section_code);
        return $this->db->get("tbl_bpc_program_sections")->row();
    }

    public function getYear_to_Roman($semester_code)
    {
        $this->db->select('year_level');
        $this->db->where('semester_code', $semester_code);
        return $this->db->get("tbl_bpc_semesters")->row();
    }

    public function get_all_courses($section_code)
    {
        $this->db->where('section_code', $section_code);
        return $this->db->get('tbl_bpc_program_section_subjects')->result();
    }

    public function viewProgramSections()
    {
        return $this->db->get('tbl_bpc_program_sections')->result();
    }
    public function numberofprograms()
    {

        return count($this->db->get('tbl_bpc_program_sections')->result());
    }

    public function getSchedule($section_code, $subject_code){
        $this->db->where('section_code', $section_code);
        $this->db->where('subject_code', $subject_code);
        return $this->db->get('tbl_bpc_program_section_subjects')->row();
    }
}

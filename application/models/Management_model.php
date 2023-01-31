<?php

class Management_model extends CI_Model
{

    
    public function addCollege($arr){
        return $this->db->insert("tbl_bpc_college", $arr);
    }

    public function viewColleges(){
        return $this->db->get("tbl_bpc_college")->result();
    }

    public function update_college($array, $college_coode)
    {

            $this->db->where('college_code', $college_coode);
            $this->db->update('tbl_bpc_college', $array);
        
    }

    public function delete_college( $college_coode)
    {
            $this->db->where('college_code', $college_coode);
            $this->db->delete('tbl_bpc_college');
    }

       
    public function addRoom($arr){
        return $this->db->insert("tbl_bpc_rooms", $arr);
    }
    public function viewRooms(){
        return $this->db->get("tbl_bpc_rooms")->result();
    }
    public function viewSingleRoom($code){
        $this->db->where('room_code', $code);
        return $this->db->get("tbl_bpc_rooms")->row();
    }

    public function viewCourses(){
        return $this->db->get("tbl_bpc_courses")->result();
    }

    public function getColleges(){
        return $this->db->get("tbl_bpc_college")->result();
    }
    public function addCourse($arr){
        return $this->db->insert("tbl_bpc_courses", $arr);
    }

    public function viewSingleCollege($code){
        $this->db->where('college_code', $code);
        return $this->db->get("tbl_bpc_college")->row();
    }

    public function viewSingleSchedule($code){
        $this->db->where('schedule_code', $code);
        return $this->db->get("tbl_bpc_schedule")->row();
    }

    public function viewSchedules(){
        return $this->db->get("tbl_bpc_schedule")->result();
    }

    public function addSchedule($arr){
        return $this->db->insert("tbl_bpc_schedule", $arr);
    }

    public function viewSingleAcademic($code){
        $this->db->where('academic_id', $code);
        return $this->db->get("tbl_bpc_academic_year")->row();
    }

    public function viewAcademics(){
        return $this->db->get("tbl_bpc_academic_year")->result();
    }

    public function addAcademic($arr){
        return $this->db->insert("tbl_bpc_academic_year", $arr);
    }

    public function viewSemesters(){
        return $this->db->get("tbl_bpc_semesters")->result();
    }

    public function addSemester($arr){
        return $this->db->insert("tbl_bpc_semesters", $arr);
    }

    public function addClassSchedule($arr){
        return $this->db->insert("tbl_bpc_classes", $arr);
    }

    public function viewClassesSchedules(){
        return $this->db->get("tbl_bpc_classes")->result();
    }

    public function viewSingleInstructor($instructors_id){
        $this->db->where('instructors_id', $instructors_id);
        return $this->db->get("tbl_bpc_instructors")->row();
    }



    public function loadPlatesPerDepartment($department)
    {
        $this->db->where('department_assign', $department);
        return $this->db->get("tblmachine")->result();
    }



    
}

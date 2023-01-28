<?php

class Management_model extends CI_Model
{

    
    public function addCollege($arr){
        return $this->db->insert("tbl_bpc_college", $arr);
    }

    public function viewColleges(){
        return $this->db->get("tbl_bpc_college")->result();
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

    public function viewSchedules(){
        return $this->db->get("tbl_bpc_schedule")->result();
    }

    public function addSchedule($arr){
        return $this->db->insert("tbl_bpc_schedule", $arr);
    }

    public function loadPlatesPerDepartment($department)
    {
        $this->db->where('department_assign', $department);
        return $this->db->get("tblmachine")->result();
    }



    
}

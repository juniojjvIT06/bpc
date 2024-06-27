<?php

class Course_model extends CI_Model
{

    

    public function addCourses($arr){
        return $this->db->insert("tbl_bpc_courses", $arr);
    }

    public function viewCourses(){
        return $this->db->get("tbl_bpc_courses")->result();
    }

    public function update_course($array, $course_code)
    {

            $this->db->where('course_code', $course_code);
            $this->db->update('tbl_bpc_courses', $array);
        
    }

    public function delete_course($course_code)
    {
            $this->db->where('course_code', $course_code);
            $this->db->delete('tbl_bpc_courses');
    }


    
}

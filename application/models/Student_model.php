<?php

class Student_model extends CI_Model
{



    public function addStudent($arr)
    {
        return $this->db->insert("tbl_bpc_students", $arr);
    }

    public function viewSingleStudent($student_code)
    {
        $this->db->where("student_code", $student_code);
        return $this->db->get("tbl_bpc_students")->row();
    }

    public function viewStudents()
    {
        return $this->db->get("tbl_bpc_students")->result();
    }

    public function update_student($array, $subject_code)
    {

        $this->db->where('student_code', $subject_code);
        $this->db->update('tbl_bpc_students', $array);
    }

    public function enrolled_subjects($arr)
    {
        $this->db->insert('tbl_bpc_enroll', $arr);
    }

    public function delete_student($student_code)
    {
        $this->db->where('student_code', $student_code);
        $this->db->delete('tbl_bpc_subjects');
    }

    public function get_last_number($table)
    {
        $this->db->select_max('student_id');
        $query = $this->db->get($table);
        $row = $query->row();
        return $row->student_id;
    }

    public function generate_student_id()
    {

        $school_acr = 'BPC';
        $year = date('Y');
        $last_two_digits = substr($year, -2);
        $last_number = $this->Student_model->get_last_number('tbl_bpc_students');
        $formatted_num = sprintf("%04d", $last_number);
        if ($last_number != null) {
            $last_number++;
            $formatted_num = sprintf("%04d", $last_number);
            $generated_id = $last_two_digits . '-' . $school_acr . '-' . $formatted_num;
        } else {
            $last_number++;
            $formatted_num = sprintf("%04d", $last_number);
            $generated_id = $last_two_digits . '-' . $school_acr . '-' . $formatted_num;
        }

        return $generated_id;
    }

    public function numberofstudents()
    {

        return count($this->db->get('tbl_bpc_students')->result());
    }

    public function countbysex($sex)
    {
        $this->db->where('sex', $sex);
        return count($this->db->get('tbl_bpc_students')->result());
    }
}

<?php

class Instructor_model extends CI_Model
{


    public function addInstructor($arr)
    {
        return $this->db->insert("tbl_bpc_instructors", $arr);
    }

    public function get_last_number($table)
    {
        $this->db->select_max('tid');
        $query = $this->db->get($table);
        $row = $query->row();
        return $row->tid;
    }

    public function viewInstructors()
    {
        return $this->db->get("tbl_bpc_instructors")->result();
    }

    public function update_instructor($instructor_id, $arr)
    {

        // $this->db->where("property_no", $mid);
        // $this->db->update("tblmachine", $array);

        $this->db->where("instructors_id", $instructor_id);
        $this->db->update("tbl_bpc_instructors", $arr);
    }

    public function delete_instructor($instructor_id)
    {

        // $this->db->where("property_no", $mid);
        // $this->db->update("tblmachine", $array);

        $this->db->where("instructors_id",$instructor_id);
        $this->db->delete("tbl_bpc_instructors");
    }

    public function add_specialties($arr, $instructor_id)
    {
        foreach ($arr as $value) {
            $data = array(
                'subject_code' => $value,
                'instructors_id' => $instructor_id
            );
            $this->db->insert('tbl_bpc_specialty', $data);
        }
    }

    public function update_specialties($arr, $instructor_id)
    {
        foreach ($arr as $value) {
            $data = array(
                'subject_code' => $value,
                'instructors_id' => $instructor_id
            );
            $this->db->update('tbl_bpc_specialty', $data);
        }
    }

    public function update_single_specialty($instructor_id, $subject_code){

        $data = array(
            'subject_code' => $subject_code,
            'instructors_id' => $instructor_id
        );


        $this->db->where("instructors_id", $instructor_id);
        $this->db->where("subject_code", $subject_code);
        $this->db->update('tbl_bpc_specialty', $data);
    }
    
    public function insert_single_specialty($instructor_id, $subject_code){

        $data = array(
            'subject_code' => $subject_code,
            'instructors_id' => $instructor_id
        );

        $this->db->insert('tbl_bpc_specialty', $data);
    }
    public function specialty_existence($instructor_id, $subject_code){

        $this->db->where("instructors_id", $instructor_id);
        $this->db->where("subject_code", $subject_code);

        return $this->db->get("tbl_bpc_specialty")->result();
    }

    public function show_instructor_specialty($instructor_id)
    {
        $this->db->from("tbl_bpc_specialty");
        $this->db->where("instructors_id", $instructor_id);
        return $this->db->get()->result();
    }


    public function generate_instructor_id()
    {

        $school_acr = 'BPC';
        $year = date('Y');
        $last_two_digits = substr($year, -2);
        $last_number = $this->Instructor_model->get_last_number('tbl_bpc_instructors');
        $formatted_num = sprintf("%03d", $last_number);
        if ($last_number != null) {
            $last_number++;
            $formatted_num = sprintf("%03d", $last_number);
            $generated_id = $last_two_digits . '-' . $school_acr . '-' . $formatted_num . 'i';
        } else {
            $last_number++;
            $formatted_num = sprintf("%03d", $last_number);
            $generated_id = $last_two_digits . '-' . $school_acr . '-' . $formatted_num . 'i';
        }

        return $generated_id;
    }

    public function get_instructors_within_subject_specialty($subject_code)
    {

        $this->db->from("tbl_bpc_specialty");
        $this->db->where("subject_code", $subject_code);
        $this->db->join("tbl_bpc_instructors", 'tbl_bpc_instructors.instructors_id = tbl_bpc_specialty.instructors_id');
        return $this->db->get()->result();
    }

    public function viewClasses($instructors_id){
        $this->db->where('instructors_id', $instructors_id);
        return $this->db->get('tbl_bpc_program_section_subjects')->result();

    }

    public function view_my_students($section_code, $subject_code){
        $this->db->where('section_code', $section_code);
        $this->db->where('subject_code', $subject_code);
        return $this->db->get("tbl_bpc_enroll")->result();
        
    }

}

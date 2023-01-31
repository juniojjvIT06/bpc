<?php

class Subject_model extends CI_Model
{

    

    public function addSubjects($arr){
        return $this->db->insert("tbl_bpc_subjects", $arr);
    }

    public function viewSubjects(){
        return $this->db->get("tbl_bpc_subjects")->result();
    }

    public function update_subject($array, $subject_code)
    {

            $this->db->where('subject_code', $subject_code);
            $this->db->update('tbl_bpc_subjects', $array);
        
    }

    public function delete_subject($subject_code)
    {
            $this->db->where('subject_code', $subject_code);
            $this->db->delete('tbl_bpc_subjects');
    }


    
}

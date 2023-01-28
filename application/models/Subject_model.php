<?php

class Subject_model extends CI_Model
{

    

    public function addSubjects($arr){
        return $this->db->insert("tbl_bpc_subjects", $arr);
    }

    public function viewSubjects(){
        return $this->db->get("tbl_bpc_subjects")->result();
    }


    
}

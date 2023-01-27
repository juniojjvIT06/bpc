<?php

class Instructor_model extends CI_Model
{

    
    public function addInstructor($arr){
        return $this->db->insert("tbl_bpc_instructors", $arr);
    }

    public function get_last_number($table){
        $this->db->select_max('tid');
        $query = $this->db->get($table);
        $row = $query->row();
        return $row->tid;
    }

    public function generate_instructor_id(){

		$school_acr = 'BPC';
		$year =date('Y');
		$last_two_digits = substr($year, -2);
		$last_number = $this->Instructor_model->get_last_number('tbl_bpc_instructors');
        $formatted_num = sprintf("%03d", $last_number);
        if($last_number != null){
		$generated_id = $last_two_digits . '-' . $school_acr . '-' . $formatted_num . 'i';
        }
        else{
            $last_number++;
            $formatted_num = sprintf("%03d", $last_number);
            $generated_id = $last_two_digits . '-' . $school_acr . '-' . $formatted_num . 'i'; 
        }
      
		return $generated_id;
	}

    public function addMachine($arr)
    {
        return $this->db->insert("tblmachine", $arr);
    }

    public function viewMachines()
    {
        return $this->db->get("tblmachine")->result();
    }

    public function oneMachine($enterID)
    {
        $this->db->where("plate_no", $enterID);
        $this->db->or_where("property_no", $enterID);
        return $this->db->get("tblmachine")->result();
    }

    public function updateMachine($mid, $array)
    {

        $this->db->where("property_no", $mid);
        $this->db->update("tblmachine", $array);
    }

    public function deleteMachine($mid)
    {
        $this->db->where("property_no", $mid);
        $this->db->delete("tblmachine");
    }

    public function loadPlatesPerDepartment($department)
    {
        $this->db->where('department_assign', $department);
        return $this->db->get("tblmachine")->result();
    }

    public function loadPlates()
    {
        return $this->db->get("tblmachine")->result();
    }
    
    public function typesofmachine()
    {
        return $this->db->get("tblmachinetype")->result();
    }

    public function inserttypeofmachine($arr){
        return $this->db->insert("tblmachinetype", $arr);
    }

    public function deleteMachineType($tid)
    {
        $this->db->where("type_id", $tid);
        $this->db->delete("tblmachinetype");
    }
    public function loadtypesofmachine()
    {
        return $this->db->get("tblmachinetype")->result();
    }

    
}

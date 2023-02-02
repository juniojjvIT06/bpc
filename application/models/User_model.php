<?php

class User_model extends CI_Model
{

    public function addCredentials($array){
        $this->db->insert('tbl_bpc_users', $array);
    }

    public function login($code_id){
        $this->db->where('code_id', $code_id);
        return $this->db->get('tbl_bpc_users')->row();
    }

    public function update_new_password($code_id, $newpassword){

        $this->db->set('status', 'Active');
        $this->db->set('password', $newpassword);
        $this->db->where('code_id', $code_id);
        $this->db->update('tbl_bpc_users');
    }

}

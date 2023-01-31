<?php
class My_Form_validation extends CI_Form_validation {

    public function no_spaces($str) {
        if (preg_match("/\s/", $str)) {
            $this->set_message('no_spaces', 'The %s field must not contain any spaces.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

}
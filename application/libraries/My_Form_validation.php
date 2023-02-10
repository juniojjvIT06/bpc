<?php
class My_Form_validation extends CI_Form_validation
{

    public function no_spaces($str)
    {
        if (preg_match("/\s/", $str)) {
            $this->set_message('no_spaces', 'The %s field must not contain any spaces.');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function allowed_days($str)
    {
        if (!preg_match("/^[MWFTH]+$/", $str)) {
            $this->set_message('validate_days', 'The {field} field can only contain characters "M", "W", "F", "T", "TH".');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}

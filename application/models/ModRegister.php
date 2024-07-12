<?php

class ModRegister extends CI_Model
{
    public function addNewUser($data)
    {
        return $this->db->insert('students', $data);
    }
    public function checkUser($email)
    {
        return $this->db->get_where('students', array('email' => $email));
    }
    public function checkLink($link)
    {
        return $this->db->get_where('students', array('eLink' => $link));
    }
    public function activateAccount($link, $data)
    {
        $this->db->where('eLink', $link);
        return $this->db->update('students', $data);
    }
    public function checkUserwithPassword($data)
    {
        return $this->db->get_where('students', $data)->result_array();
    }
}

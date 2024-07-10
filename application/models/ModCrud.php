<?php
class ModCrud extends CI_Model
{
    public function addUser($userData)
    {
        $this->db->insert('students', $userData);
    }
}

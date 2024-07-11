<?php
class ModCrud extends CI_Model
{
    public function addUser($userData)
    {
        return $this->db->insert('students', $userData);
    }
    public function getAllUsers()
    {
        return $this->db->get('students');
    }
    public function checkUser($id)
    {
        return $this->db->get_where('students', array('id' => $id))->result_array();
    }
    public function updateUser($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('students', $data);
    }
    public function deleteUser($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('students');
    }
}

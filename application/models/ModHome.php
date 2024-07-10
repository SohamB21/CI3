<?php
class ModHome extends CI_Model
{
    public function getAllRecords()
    {
        return $this->db->get('students');
    }
    public function mixup()
    {
        $this->db->select('fullName, email, password');
        $this->db->from('students');
        // $this->db->where('id', '1');
        // $this->db->where(array('id' => 1, 'password' => 'test2'));
        // $this->db->where_in('id', array(1, 2, 3));
        // $this->db->like('fullName', '1');

        return $this->db->get();
    }
    public function insertData($dataArray)
    {
        $this->db->insert('students', $dataArray);
    }
    public function updateData($id, $dataArray)
    {
        $this->db->where_in('id', $id);
        $this->db->update('students', $dataArray);
    }
    public function deleteData($id)
    {
        $this->db->where_in('id', $id);
        $this->db->delete('students');
    }
    public function addUser($data)
    {
        var_dump($data['name']);
        echo "working model...";
    }
}

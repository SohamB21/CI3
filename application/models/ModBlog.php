<?php

class ModBlog extends CI_Model
{
    public function addBlog($data)
    {
        return $this->db->insert('blogs', $data);
    }
    public function checkBlog($data)
    {
        return $this->db->get_where('blogs', array(
            'bTitle' => $data['bTitle']
        ));
    }
    public function getAllBlogs()
    {
        return $this->db
            ->select('blogs.*, students.fullName')
            ->from('blogs')
            ->join('students', 'blogs.userId = students.id', 'left')
            ->where('blogs.bStatus', 1)
            ->get()
            ->result();
    }
    public function getMyBlogs($userId)
    {
        return $this->db
            ->select('*')
            ->from('blogs')
            ->where('blogs.bStatus', 1)
            ->where('blogs.userId', $userId)
            ->get()
            ->result();
    }
    public function getBlogById($blogId)
    {
        return $this->db
            ->select('blogs.*, students.fullName')
            ->from('blogs')
            ->join('students', 'blogs.userId = students.id', 'left')
            ->where('bId', $blogId)
            ->get()
            ->result();
    }
}

<?php

class Blog extends CI_Controller
{

    public function index()
    {
        echo "Blog index here";
    }
    public function newBlog()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation');
        $this->load->view('blog/newBlog');
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }
}

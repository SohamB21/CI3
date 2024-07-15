<?php

class Blog extends CI_Controller
{
    public function index()
    {
        // echo "Blog index here";
        $data['allBlogs'] = $this->ModBlog->getAllBlogs();

        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation');
        $this->load->view('blog/allBlogs', $data);
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }
    public function myBlogs()
    {
        $userId = $this->session->userdata('uId');
        $data['allBlogs'] = $this->ModBlog->getMyBlogs($userId);

        $this->load->view('header/header');
        $this->load->view('header/css');
        $this->load->view('header/navigation');
        $this->load->view('blog/allBlogs', $data);
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
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
    public function addBlog()
    {
        $data['bTitle'] = $this->input->post('bTitle', TRUE);
        $data['bBody'] = $this->input->post('bBody', TRUE);
        $data['bDate'] = date('Y-m-d H:i:s');
        $data['userId'] = $this->session->userdata('uId');
        $data['bStatus'] = 1;

        if (empty($data['bTitle']) || empty($data['bBody']) || empty($data['bDate'])) {
            $this->session->set_flashdata('message', 'Please fill in all the fields!');
            redirect('Blog/newBlog');
        } else if (!isset($data['userId']) || empty($data['userId'])) {
            $this->session->set_flashdata('message', 'You need to sign in first!');
            redirect('Blog/newBlog');
        } else {
            $checkBlog = $this->ModBlog->checkBlog($data);
            if ($checkBlog->num_rows() > 0) {
                $this->session->set_flashdata('message', 'Your blog already exists!');
                redirect('Blog/newBlog');
            } else {
                $addBlogResult = $this->ModBlog->addBlog($data);
                if ($addBlogResult) {
                    $this->session->set_flashdata('message', 'Your blog is created!');
                    redirect('Blog/index');
                } else {
                    $this->session->set_flashdata('message', 'Failed to create blog. Try again!');
                    redirect('Blog/newBlog');
                }
            }
        }
    }
    public function readBlog($bId)
    {
        if ($this->session->userdata('uId')) {
            if (!empty($bId)) {
                $data['blog'] = $this->ModBlog->getBlogById($bId);
                if ($data['blog']) {
                    $this->load->view('header/header');
                    $this->load->view('header/css');
                    $this->load->view('header/navigation');
                    $this->load->view('blog/readBlog', $data);
                    $this->load->view('footer/footer');
                    $this->load->view('footer/js');
                    $this->load->view('footer/endhtml');
                } else {
                    $this->session->set_flashdata('message', 'Blog not available.');
                    redirect('Blog/newBlog');
                }
            } else {
                $this->session->set_flashdata('message', 'Blog not available.');
                redirect('Blog/newBlog');
            }
        } else {
            $this->session->set_flashdata('message', 'You need to sign in first!');
            redirect('Blog/newBlog');
        }
    }
}

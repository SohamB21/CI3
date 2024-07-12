<?php

class Signin extends CI_Controller
{

    public function index()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        // $this->load->view('header/navigation');
        $this->load->view('registration/signin');
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }
    public function checkUser()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            // echo "fine";
            $data['email'] = $this->input->post('email', TRUE);
            $data['password'] = hash('md5', $this->input->post('password', TRUE));

            $checkResult = $this->ModRegister->checkUserwithPassword($data);

            if (!empty($checkResult) && count($checkResult) === 1) {
                // var_dump($checkResult);

                $sessionValue = array(
                    'uId' => $checkResult[0]['id'],
                    'uEmail' => $checkResult[0]['email'],
                    'uFullname' => $checkResult[0]['fullname']
                );
                $this->session->set_userdata($sessionValue);

                if ($this->session->userdata('uId')) {
                    $this->session->set_flashdata('message', 'Welcome, you are signed in!');
                    redirect('Home');
                } else {
                    $this->session->set_flashdata('message', 'Something went wrong!');
                    redirect('Signin');
                }
            } else {
                $this->session->set_flashdata('message', 'Check your email or password!');
                redirect('Signin');
            }
        }
    }
    public function logout()
    {
        $this->session->unset_userdata(array('uId', 'uEmail', 'uFullName'));
        $this->session->sess_destroy();
        $this->session->set_flashdata('message', 'Logged out successfully!');
        redirect('Signin');
    }
}

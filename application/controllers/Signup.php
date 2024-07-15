<?php

class Signup extends CI_Controller
{
    public function index()
    {
        $this->load->view('header/header');
        $this->load->view('header/css');
        // $this->load->view('header/navigation');
        $this->load->view('registration/signup');
        $this->load->view('footer/footer');
        $this->load->view('footer/js');
        $this->load->view('footer/endhtml');
    }

    public function newUser()
    {
        $this->form_validation->set_rules('fullname', 'Full Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            // echo "fine";
            $data['fullname'] = $this->input->post('fullname', TRUE);
            $data['email'] = $this->input->post('email', TRUE);
            $data['password'] = hash('md5', $this->input->post('password', TRUE));
            $cpassword = $this->input->post('cpassword', TRUE);
            $data['eLink'] = random_string('alnum', 15);
            $data['date'] = date(format: 'Y-m-d H:i:s');

            // checking whether user with same email already exists or not
            $emailResult = $this->ModRegister->checkUser($data['email']);

            if ($emailResult->num_rows() > 0) {
                $this->session->set_flashdata('message', 'Email already exists!');
                redirect(uri: 'Signup');
            } else {
                $addResult = $this->ModRegister->addNewUser($data);
                if ($addResult) {
                    if ($this->sendEmailToUser($data)) {
                        $this->session->set_flashdata('message', 'User account created and activation email sent!');
                    } else {
                        $this->session->set_flashdata('message', 'User account created but activation email failed to send!');
                    }
                    redirect(uri: 'Signup');
                } else {
                    $this->session->set_flashdata('message', 'User account creation failed!');
                    $this->index();
                }
            }
        }
    }

    public function sendEmailToUser($data)
    {
        // Load the gmail_config file
        $this->load->config('gmail_config');

        // Retrieve the configuration values
        $gmail_account = $this->config->item('gmail_account');
        $gmail_username = $this->config->item('gmail_username');
        $gmail_app_password = $this->config->item('gmail_app_password');

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $gmail_account, // Your Gmail account
            'smtp_pass' => $gmail_app_password, // Your Gmail password or App Password
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'wordwrap' => TRUE,
            'newline' => "\r\n",
            'crlf' => "\r\n",
            'smtp_crypto' => 'ssl'
        );

        $this->load->library('email', $config);

        $message = '<strong>' . $data['fullname'] . '</strong> - '
            . anchor(site_url('signup/confirm/' . $data['eLink']), 'Activate The Link', 'class="myclass"');

        $this->email->set_newline("\r\n");
        $this->email->from($gmail_account, $gmail_username); // Your Gmail account and name
        $this->email->to($data['email']);
        $this->email->subject('Activate Your Account');
        $this->email->message($message);

        if ($this->email->send()) {
            return TRUE;
        } else {
            log_message('error', $this->email->print_debugger());
            return FALSE;
        }
    }

    public function confirm($link = null)
    {
        if (isset($link) && !empty($link)) {
            $linkResult = $this->ModRegister->checkLink($link);

            if ($linkResult->num_rows() === 1) {
                $data['status'] = 1;
                $data['eLink'] = $link . 'OK';
                $linkReturn = $this->ModRegister->activateAccount($link, $data);

                if ($linkReturn) {
                    $this->session->set_flashdata('message', 'Account successfully linked. Signin please!');
                } else {
                    $this->session->set_flashdata('message', 'Failed to link account, please try again!');
                }
                redirect('Signup');
            } else {
                $this->session->set_flashdata('message', 'The link has expired!');
                redirect('Signup');
            }
        } else {
            $this->session->set_flashdata('message', 'Check the email address and try again!');
            redirect('Signup');
        }
    }
}

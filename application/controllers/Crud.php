<?php
class Crud extends CI_Controller
{
    public function index()
    {
        $this->load->view('student');
    }
    public function newUser()
    {
        $data['fullName'] = $this->input->post('fullName', true);
        $data['email'] = $this->input->post('email', true);
        $data['password'] = $this->input->post('password', true);
        $data['age'] = $this->input->post('age', true);

        if (
            empty($data['fullName']) || empty($data['email'])
            || empty($data['password']) || empty($data['age'])
        ) {
            $this->session->set_flashdata('message', 'All the fields are required.');
            redirect(uri: 'Crud');
        } else {
            $result = $this->ModCrud->addUser($data);
            echo $result;

            if ($result == NULL) {
                $this->session->set_flashdata('message', 'Data Submitted!');
            } else {
                $this->session->set_flashdata('message', 'Data Not Submitted!');
            }

            redirect('Crud');
        }
    }
}

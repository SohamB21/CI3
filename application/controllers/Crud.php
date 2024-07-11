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
        $data['date'] = date(format: "Y-m-d h:i:sa");

        if (
            empty($data['fullName']) || empty($data['email'])
            || empty($data['password']) || empty($data['age']) || empty($data['date'])
        ) {
            $this->session->set_flashdata('message', 'All the fields are required.');
            redirect(uri: 'Crud');
        } else {
            $result = $this->ModCrud->addUser($data);
            echo $result;

            if ($result) {
                $this->session->set_flashdata('message', 'Data Submitted!');
            } else {
                $this->session->set_flashdata('message', 'Data Not Submitted!');
            }

            redirect('Crud/allUsers');
        }
    }
    public function allUsers()
    {
        $data['allStudents'] = $this->ModCrud->getAllUsers();
        $this->load->view('allStudents', $data);
    }
    public function editUser($id = null)
    {
        // echo $id . "<br>";
        $data['stdRecord'] = $this->ModCrud->checkUser($id);
        if (count($data['stdRecord']) == 1) {
            // $this->session->set_flashdata('message', "The student exists.");
            // redirect(uri: 'Crud/allUsers');
            $this->load->view('editStudent', $data);
        } else {
            $this->session->set_flashdata('message', "The student does not exist.");
            redirect(uri: 'Crud/allUsers');
        }
    }
    public function updateUser()
    {
        $data['id'] = $this->input->post('id', true);
        $data['fullName'] = $this->input->post('fullName', true);
        $data['email'] = $this->input->post('email', true);
        $data['age'] = $this->input->post('age', true);
        $data['date'] = date(format: "Y-m-d h:i:sa");

        if (
            !empty($data['id']) && !empty($data['fullName'])
            && !empty($data['email']) && !empty($data['age']) && !empty($data['date'])
        ) {
            $result = $this->ModCrud->updateUser($data);
            if ($result) {
                $this->session->set_flashdata('message', 'Data Updated!');
            } else {
                $this->session->set_flashdata('message', 'Data Not Updated!');
            }
            redirect(uri: 'crud/allUsers');
        } else {
            $this->session->set_flashdata('message', "These fields are required!");
            redirect(uri: 'crud/allUsers');
        }
    }
    public function deleteUser($id = null)
    {
        // echo $id . "<br>";
        $data['stdRecord'] = $this->ModCrud->checkUser($id);
        if (count($data['stdRecord']) == 1) {
            // $this->session->set_flashdata('message', "The student exists.");
            // redirect(uri: 'Crud/allUsers');
            $result = $this->ModCrud->deleteUser($id);

            if ($result) {
                $this->session->set_flashdata('message', 'User Deleted!');
            } else {
                $this->session->set_flashdata('message', 'User Not Deleted!');
            }
        } else {
            $this->session->set_flashdata('message', "The student does not exist.");
        }
        redirect(uri: 'Crud/allUsers');
    }
}

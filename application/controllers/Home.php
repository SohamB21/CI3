<?php
class Home extends CI_Controller
{
    public function index()
    {
        // $data["name"] = "Soham Banik";
        // $data["company"] = "Onlighten Media";
        // $data["course"] = "CodeIgniter 3";

        // // model
        // $this->load->model('ModHome');
        // $this->ModHome->addUser($data);

        // // view
        // $this->load->view('home', $data);
        // echo "working...";

        // // helpers
        // $this->load->helper('url');
        // echo site_url(uri: 'home/admin');
        // echo base_url(uri: 'assets/images/image.jpg');
        // echo anchor(uri: 'home/admin', title: 'Go To Admin', attributes: 'class="one"');
        // echo anchor_popup(uri: 'home/admin', title: 'Go To Admin', attributes: 'class="two"');
        // $title = "Demo Title";
        // echo url_title($title, '-', true);

        $this->load->helper('form');
        $this->load->view('home');

        $this->load->helper('captcha');
        $this->load->helper('url');

        // $captchaArray = array(
        //     'word' => 'Random word',
        //     'img_path' => FCPATH . 'assets/images/',
        //     'img_url' => FCPATH . 'assets/images/',
        //     'img_width' => 100,
        //     'img_height' => 100,
        //     'expiration' => 72000,
        //     'word_length' => 8,
        //     'font_size' => 16,
        //     'img_id' => 'ImageId',
        //     'colors' => array(
        //         'background' => array(125, 125, 125),
        //         'border' => array(100, 100, 100),
        //         'text' => array(0, 0, 0),
        //         'grid' => array(255, 20, 77)
        //     )
        // );

        // $returncaptcha = create_captcha($captchaArray);
        // var_dump($returncaptcha);
        // // echo APPPATH . '../assets/images/';
        // echo FCPATH . 'assets/images/';

        $this->load->helper('html');
        echo heading($data = 'Here is my data', $h = '3xampp', $attributes = 'class="one"');

        // library
        $this->load->library('calendar');
        $this->load->library('cart');
        $this->load->library('encryption');
    }

    public function anotherMethod()
    {
        echo "this is another method";
    }

    public function login()
    {
        // echo $this->input->post('radioname', true) . '<br>';
        // echo $this->input->post('mytextarea', true) . '<br>';
        // echo $this->input->post('myoption', true) . '<br>';
        echo $this->input->get_post('name', true);
    }

    public function myFile()
    {
        $config['upload_path'] = APPPATH . '../assets/images/';
        $config['allowed_types'] = 'gif|png|jpg';
        $config['max_size'] = 1000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('myimg')) {
            echo APPPATH . '../assets/images/';
            echo $this->upload->display_errors();
        } else {
            echo "uploaded";
        }
    }

    public function user()
    {
        // echo "working";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullName', 'Full Name', 'required|min_length[10]|max_length[5]|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|email');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[8]');
        $this->form_validation->set_rules('confpassword', 'Confirm Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            echo "fine";
        }
        
    }
}

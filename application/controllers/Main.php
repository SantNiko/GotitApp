<?php

class Main extends CI_Controller {

    public function __construct() {
        parent::__construct();

// Load form helper library
        $this->load->helper('form');
        $this->load->helper('url');
// Load form validation library
        $this->load->library('form_validation');

// Load session library
        $this->load->library('session');
        $this->load->model('Main_model');
// Load database
      //  $this->load->model('login_database');
    }

    public function user_login_process() {

        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            if (isset($this->session->userdata['logged_in'])) {
                $this->load->view('main/home');
            } else {
                $this->load->template('main/login');
            }
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password')
            );
            $result = $this->Main_model->bd_login($data);
            if ($result == TRUE) {

                $username = $this->input->post('username');
              //  $result = $this->login_database->read_user_information($username);
             //   if ($result != false) {
//                    $session_data = array(
//                        'username' => $result[0]->user_name,
//                        'email' => $result[0]->user_email,
//                    );
// Add user data in session
                    //$this->session->set_userdata('logged_in', $session_data);
                    $this->load->view('main/home');
            //    }
            } else {
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->template('main/login', $data);
            }
        }
    }

    public function showLandPage() {
        $this->load->view('main/landpage');
    }

    public function showLogin() {
        $this->load->helper('url');
        $this->load->template('main/login');
        //$this->load->view('main/login');
    }

    public function login() {

        $this->load->model('Main_model');
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        if ($this->Main_model->bd_login($user, $pass)) {

            $this->load->view('main/landpage');
        } else {
            $this->load->template('main/login');
        }
    }

    // Logout from admin page
    public function logout() {

// Removing session data
        $sess_array = array(
            'username' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);
        $data['message_display'] = 'Successfully Logout';
        $this->load->view('login_form', $data);
    }

}

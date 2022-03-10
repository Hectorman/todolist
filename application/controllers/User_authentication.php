<?php

//session_start(); //we need to start session in order to access it through CI

Class User_Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();

        // Load form helper library
        $this->load->helper('form');

        $this->load->helper('url');

        $this->load->helper('tools');

        // Load form validation library
        $this->load->library('form_validation');

        // Load session library
        $this->load->library('session');

        // Load database
        $this->load->model('login_database');


    }

    // Show login page
    public function index() {
        $this->load->view('auth/login_form');
    }



    // Validate and store registration data in database
    public function new_user_registration() {

        $data = array(
            'nombre' => $this->input->post('nombre'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $result = $this->login_database->registration_insert($data);

        if ($result == TRUE) {

            $data['data'] = 'exito';
        
            $this->load->view('auth/formsuccess', $data);

        } else {

            $data['data'] = 'ya existe';

            $this->load->view('auth/formsuccess', $data);

        }
        
    }

    // Check for user login process
    public function user_login_process() {

        $data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password')
        );

        $result = $this->login_database->login($data);

        if ($result == TRUE) {

            $email = $this->input->post('email');
            $result = $this->login_database->read_user_information($email);

            if ($result != false) {

                $session_data = array(
                    'nombre'  => $result[0]->nombre,
                    'email'   => $result[0]->email,
                    'id'      => $result[0]->id,
                );

                // Add user data in session
                $this->session->set_userdata('logged_in', $session_data);
                redirect( base_url() . 'app');

            }

        } else {

            $data = array(
                'error_message' => 'Email o password inválidos'
            );
            $this->load->view('auth/login_form', $data);
            
        }

    }

    // Logout from admin page
    public function logout() {

        // Removing session data
        $sess_array = array(
            'email' => ''
        );
        $this->session->unset_userdata('logged_in', $sess_array);

        redirect( base_url() );
    }

}

?>
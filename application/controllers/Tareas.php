<?php
class Tareas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('tareas_model');
        $this->load->helper('url_helper');
        $this->load->helper('tools');

        // Load session library
        $this->load->library('session');
    }

    public function mostrar()
    {
        $data['session'] = $this->session->userdata;
        //$data['tareas'] = $this->tareas_model->get_entradas_paciente( $idPaciente );

        $this->load->view('pages/app', $data);
    }

    public function crear_tarea()
    {

        $data['data'] = $this->tareas_model->crear_tarea();

        $this->load->view('auth/formsuccess', $data);
      
    }

    public function borrar_tarea( $id = null )
    {

        $this->tareas_model->borrar_tarea( $id );

        return true;

    }

    public function tareas_ajax( $id_usuario )
    {

        $data['data'] = $this->tareas_model->get_tareas_usuario( $id_usuario );
        $this->load->view('auth/formsuccess', $data);

    }


}
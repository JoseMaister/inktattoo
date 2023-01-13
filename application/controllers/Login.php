<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model');
        $this->load->library('correos_tickets');
    }

    function index() {
        date_default_timezone_set('America/Chihuahua');
        $data['url_actual'] = base_url('inicio');
        if(isset($this->session->url_actual))
        {
          $data['url_actual']=$this->session->url_actual;
        }
        $this->session->sess_destroy();
        $this->load->view('header', $data);
        $this->load->view('login', $data);
        $this->load->view('footer', $data);
    }

    function autenticar() {
        //$this->output->enable_profiler(TRUE);
        $url_actual = $this->input->post('url_actual');
        $usuario = $this->input->post('user');
        $pass = $this->input->post('pass');
        //echo $usuario.$pass.$url_actual;die();
        $res = $this->usuarios_model->autenticar($usuario, $pass);
        if ($res) {
            $row = $res->row();
            $this->session->nombre = $row->user;
            $this->session->id = $row->id;
            $this->session->password = $row->password;
            $this->session->vencimiento_password = $row->vencimiento_password;
            $this->session->password_correo = $row->password_correo;
            $this->session->user = $row->user;
            $this->session->activo = $row->activo;
            $this->session->foto = $row->foto;
            
            redirect($url_actual);
            echo var_dump($this->session->id);die();


        } else {
            $ERRORES = array();
            $error = array('titulo' => 'ERROR', 'detalle' => 'Usuario y/o Contraseña incorrectas');
            array_push($ERRORES, $error);
            $this->session->errores = $ERRORES;

            $this->session->url_actual = $url_actual;
            redirect(base_url('login'));
        }
    }

    public function cerrar_sesion() {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }

}

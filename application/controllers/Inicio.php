<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

   function __construct() {
        parent::__construct();
    }

  public function index()
  {
    $this->load->view('header');
    $this->load->view('inicio');
    $this->load->view('footer');
  }
  public function about()
  {
    $this->load->view('header');
    $this->load->view('about');
    $this->load->view('footer');
  }
  public function gallery()
  {
    $this->load->view('header');
    $this->load->view('gallery');
    $this->load->view('footer');
  }

    function primera_sesion()
    {
        $this->load->view('inicio/capturar_datos');
    }

    


}

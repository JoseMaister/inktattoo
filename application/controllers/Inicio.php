<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

   function __construct() {
        parent::__construct();
        $this->load->model('inicio_model','Modelo');
    }

  public function index()
  { 
    $active['active']='inicio';
    $datos['data']=$this->Modelo->getData();
    $datos['slides']=$this->Modelo->getDataCarrusel('inicio');
    $datos['content']=$this->Modelo->getDataContent();
    $this->load->view('header', $active);
    $this->load->view('inicio', $datos);
    $this->load->view('footer');
  }
  public function about()
  {
    $active['active']='about';
    $datos['data']=$this->Modelo->getData();
    $this->load->view('header',$active);
    $this->load->view('about', $datos);
    $this->load->view('footer');
  }
  public function gallery()
  {
    $active['active']='gallery';
    $datos['slides']=$this->Modelo->getDataCarrusel('gallery');
    $this->load->view('header',$active);
    $this->load->view('gallery',$datos);
    $this->load->view('footer');
  }  
}

<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

   function __construct() {
        parent::__construct();
        $this->load->model('admin_model','Modelo');
    }

  public function admin($data)
  {
    $datos['data']=$this->Modelo->getDataAdmin($data);
    $this->load->view('header');
    $this->load->view('admin', $datos);
    $this->load->view('footer');
  }
  public function edit($data)
  {
    $datos['data']=$this->Modelo->getData($data);
    $this->load->view('header');
    $this->load->view('edit', $datos);
    $this->load->view('footer');
  }
  public function update()
  {
    $id=$this->input->post('id');
    $img = file_get_contents($_FILES['foto']['tmp_name']);
    $data = array(
      'category'=> $this->input->post('category'),
      'intro_text'=> $this->input->post('intro_text'),
      'content'=> $this->input->post('content'),
      'img'=> $img,
      'tittle'=> $this->input->post('tittle'),
    );
    //echo var_dump($data);die();
    $this->Modelo->update($id,$data);
    $data = array(
      'idPag'=> $id,
      'category'=> $this->input->post('category'),
      'intro_text'=> $this->input->post('intro_text'),
      'content'=> $this->input->post('content'),
      'img'=> $img,
      'tittle'=> $this->input->post('tittle'),
      'user'=> $this->session->id,
    );
    $this->Modelo->insertAdmin($data);
    redirect(base_url());

  }


    


}

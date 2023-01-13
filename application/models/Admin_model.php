<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function getData($data){        
        $this->db->from('pagina');
        $this->db->where('id', $data);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return FALSE;
        }
    }
    function update($id, $datos)
    {
        $this->db->where('id', $id);
        $this->db->update('pagina', $datos);
    }
    function insertAdmin($datos)
    {
        return $this->db->insert('admin', $datos);
    }
    function getDataAdmin($data){    
        $this->db->select('a.*, concat(u.nombre, " ", u.paterno) as User');    
        $this->db->from('admin a');
        $this->db->join('usuarios u', 'u.id = a.user');
        $this->db->where('idPag', $data);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return FALSE;
        }
    }

}

?>

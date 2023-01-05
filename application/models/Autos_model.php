<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autos_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database();
        $this->db->reconnect();
    }

    function getCatalogo()
    {
        $this->db->select('A.*, ifnull(concat(U.nombre," ",U.paternO),"N/A") as Responsable, (SELECT max(fecha) from autos_revisiones where auto=A.id) as Ultrev, (SELECT max(id) from autos_revisiones where auto=A.id) as IdUltrev,(select semNiveles from autos_revisiones WHERE auto=A.id AND fecha = ultRev) as semNiveles, (select semLuces from autos_revisiones WHERE auto=A.id AND fecha = ultRev) as semLuces, (select semLlantas from autos_revisiones WHERE auto=A.id AND fecha = ultRev) as semLlantas, (select semRevAd from autos_revisiones WHERE auto=A.id AND fecha = ultRev) as semRevAd, (select semDocumentacion from autos_revisiones WHERE auto=A.id AND fecha = ultRev) as semDocumentacion');
        $this->db->from('autos A');
        $this->db->join('usuarios U', 'A.responsable = U.id', 'LEFT');
        $this->db->where('A.responsable', $this->session->id);
        $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res;


        }
        else
        {
            return false;
        }
    }


    function historial($id_auto){
        $this->db->select('R.*,R.fecha as Ultrev, R.id as IdUltrev, ifnull(concat(U.nombre, " ", U.paterno), "N/A") as responsable');
        $this->db->from('autos_revisiones R');
        $this->db->join('usuarios U', 'R.usuario=U.id');
        $this->db->where('R.auto', $id_auto);
        $this->db->order_by('R.fecha', 'DESC');
         $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res;


        }
        else
        {
            return false;
        }
    }






    function getCatalogoAll()
    {
        $this->db->select('A.*, ifnull(concat(U.nombre," ",U.paterno),"N/A") as Responsable, (SELECT max(fecha) from autos_revisiones where auto=A.id) as Ultrev, (SELECT max(id) from autos_revisiones where auto=A.id) as IdUltrev, (select semNiveles from autos_revisiones WHERE auto=A.id AND id = IdUltrev) as semNiveles, (select semLuces from autos_revisiones WHERE auto=A.id AND id = IdUltrev) as semLuces, (select semLlantas from autos_revisiones WHERE auto=A.id AND id = IdUltrev) as semLlantas, (select semRevAd from autos_revisiones WHERE auto=A.id AND id = IdUltrev) as semRevAd, (select semDocumentacion from autos_revisiones WHERE auto=A.id AND id = IdUltrev) as semDocumentacion');
        $this->db->from('autos A');
        $this->db->join('usuarios U', 'A.responsable = U.id', 'LEFT');
     
        $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res;


        }
        else
        {
            return false;
        }
    }

    function getSemaforos()
    {
        $this->db->select('*');
        $this->db->from('autos_revisiones');
        $this->db->where('usuario', $this->session->id);

        $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res;


        }
        else
        {
            return false;
        }

    }



    function getRevPendientes()
    {
        $this->db->select('A.*, ifnull(concat(U.nombre," ",U.paterno),"N/A") as Responsable, (SELECT max(fecha) from autos_revisiones where auto=A.id) as Ultrev, (SELECT max(id) from autos_revisiones where auto=A.id) as IdUltrev');
        $this->db->from('autos A');
        $this->db->join('usuarios U', 'A.responsable = U.id', 'LEFT');
        $this->db->having('Ultrev + INTERVAL 7 DAY < ','CURRENT_TIMESTAMP()',FALSE);
        $this->db->or_having('Ultrev');
        $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res;
        }
        else
        {
            return false;
        }
    }

    function getRevHoy()
    {
        $this->db->select('A.*, (SELECT max(fecha) from autos_revisiones where auto=A.id) as Ultrev, (SELECT max(id) from autos_revisiones where auto=A.id) as IdUltrev');
        $this->db->from('autos A');
        $this->db->having('Ultrev > ','current_date()',FALSE);
        $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res;
        }
        else
        {
            return false;
        }
    }

    function getProxMttos()
    {
      $this->db->select('A.*');
      $this->db->from('autos A');
      $this->db->where('A.kilometraje >=','A.proximo_mtto-1000', FALSE);
      //$this->db->where('A.proximo_mtto != ','0', FALSE);
      $res = $this->db->get();
      if($res->num_rows() > 0)
      {
          return $res;
      }
      else
      {
          return false;
      }
    }


    function getAuto($id_auto)
    {
        $this->db->where('id',$id_auto);
        $res = $this->db->get('autos');
        if($res->num_rows() > 0)
        {
            return $res->row();
        }
        else
        {
            return false;
        }
    }

    function getResponsable($id)
    {
      if(isset($id))
      {
        $this->db->select('U.*');
        $this->db->where('id', $id);
        $res = $this->db->get('usuarios U');
        if($res->num_rows() > 0)
        {
            return $res->row();
        }
        else
        {
            return false;
        }
      }
      else
      {
        return false;
      }

    }

    function updateAuto($id_auto, $datos)
    {
        $this->db->where('id', $id_auto);
        $this->db->update('autos', $datos);
    }

    function saveChecklist($datos)
    {
        $this->db->set('fecha', 'current_timestamp()', FALSE);
        $exito = $this->db->insert('autos_revisiones', $datos);
        $id = $this->db->insert_id();
        return array('EXITO' => $exito, 'ID' => $id);
    }

    function saveTempPhotos($data)
    {
      $this->db->set('fecha', 'current_timestamp()', FALSE);
      if($this->db->insert('temp', $data))
      {
        return $this->db->insert_id();
      }
      else
      {
        return 0;
      }
    }

    function deleteTempPhotos($id_temp)
    {
      $this->db->where('id', $id_temp);
      if($this->db->delete('temp'))
      {
        return TRUE;
      }
      else
      {
        return FALSE;
      }
    }

    function getHallazgoFoto($idFoto)
    {
      $this->db->select('foto');
      $this->db->where('id',$idFoto);
      $res = $this->db->get('revisiones_hallazgos');
      if($res->num_rows() > 0)
      {
          return $res->row();
      }
      else
      {
          return false;
      }
    }

    function saveHallazgosCarroceria($datos)
    {
        $query = "INSERT into revisiones_hallazgos (revision,tipo,descripcion,foto) (SELECT '" . $datos['revision'] . "', tipo, texto, archivo from temp where iu='" . $datos['iu'] . "');";
        $query2 = "DELETE from temp where iu='" . $datos['iu'] . "'";
        if($this->db->query($query));
        {
          $this->db->query($query2);
        }
    }
    function saveHallazgosCarroceriaL($datos)
    {
        $query = "INSERT into revisiones_hallazgos (revision,tipo,descripcion,foto) (SELECT '" . $datos['reision'] . "', tipo, texto, archivo from temp where tipo='LLANTA' AND iu='" . $datos['iu'] . "');";
        //echo var_dump($query);
        $query2 = "DELETE from temp where iu='" . $datos['iu'] . "'";
        if($this->db->query($query));
        {
          $this->db->query($query2);
        }
    }

    function saveHallazgos($datos)
    {
      return $this->db->insert('revisiones_hallazgos', $datos);
    }

    function getHallazgosCarroceria($id_revision)
    {
      $array = array('revision' => $id_revision, 'tipo' => 'Carroceria');
      $this->db->select('id,descripcion');
      $this->db->where($array);
      $query = $this->db->get('revisiones_hallazgos');
      if ($query->num_rows() > 0) {
          return $query;
      } else {
          return false;
      }
    }
    function getHallazgosLlantas($id_revision)
    {
      $array = array('revision' => $id_revision, 'tipo' => 'LLANTA');
      $this->db->select('id,descripcion');
      $this->db->where($array);
      $query = $this->db->get('revisiones_hallazgos');
      if ($query->num_rows() > 0) {
          return $query;
      } else {
          return false;
      }
    }

    function getHallazgosOtros($id_revision)
    {
      $array = array('revision' => $id_revision, 'tipo like' => '%nivel%');
      $this->db->where($array);
      $query = $this->db->get('revisiones_hallazgos');
      if ($query->num_rows() > 0) {
          return $query;
      } else {
          return false;
      }
    }



    function getHallazgosNivel($id_revision)
    {
      $array = array('revision' => $id_revision, 'tipo like' => '%nivel%');
      $this->db->where($array);
      $query = $this->db->get('revisiones_hallazgos');
      if ($query->num_rows() > 0) {
          return $query;
      } else {
          return false;
      }
    }

    function getHallazgosLuces($id_revision)
    {
      $array = array('revision' => $id_revision, 'tipo like' => '%luces%');
      $this->db->where($array);
      $query = $this->db->get('revisiones_hallazgos');
      if ($query->num_rows() > 0) {
          return $query;
      } else {
          return false;
      }
    }
    function getHallazgosLlantasCond($id_revision)
    {
      $array = array('revision' => $id_revision, 'tipo like' => '%llantas%');
      $this->db->where($array);
      $query = $this->db->get('revisiones_hallazgos');
      if ($query->num_rows() > 0) {
          return $query;
      } else {
          return false;
      }
    }
    function getHallazgosRevAdd($id_revision)
    {
      $array = array('revision' => $id_revision, 'tipo like' => '%Revisiones%');
      $this->db->where($array);
      $query = $this->db->get('revisiones_hallazgos');
      if ($query->num_rows() > 0) {
          return $query;
      } else {
          return false;
      }
    }
    function getHallazgosDoc($id_revision)
    {
      $array = array('revision' => $id_revision, 'tipo like' => '%Documentación%');
      $this->db->where($array);
      $query = $this->db->get('revisiones_hallazgos');
      if ($query->num_rows() > 0) {
          return $query;
      } else {
          return false;
      }
    }
    
    function getRevisiones($auto)
    {
        $this->db->select('R.id, R.fecha, ifnull(concat(U.nmbre," ",U.paterno),"N/A") as User, (SELECT count(*) from revisiones_hallazgos where revision=R.id) as Hallazgos');
        $this->db->from('autos_revisiones R');
        $this->db->join('usuarios U', 'R.usuario = U.id', 'LEFT');
        $this->db->where('auto', $auto);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query;
        } else {
            return false;
        }
    }

    function getRevision($id_revision)
    {
        $this->db->select('R.*, ifnull(concat(U.nombre," ",U.paterno),"N/A") as User');
        $this->db->from('autos_revisiones R');
        $this->db->join('usuarios U', 'R.usuario = U.id', 'LEFT');
        $this->db->where('R.id', $id_revision);
        $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res->row();
        }
        else
        {
            return false;
        }
    }

    function getHistorial($id_auto)
    {
        $this->db->select('R.*, ifnull(concat(U.nombre," ",U.paterno),"N/A") as User');
        $this->db->from('autos_revisiones R');
        $this->db->join('usuarios U', 'R.usuario = U.id', 'LEFT');
        $this->db->where('R.id', $id_auto);
        $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res->row();
        }
        else
        {
            return false;
        }
    }

    function getChecklist($id)
    {
        $this->db->select('checklist');
        $this->db->from('autos_revisiones');
        $this->db->where('id', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    function getMotorPlacasKm($auto)
    {
        $this->db->select('combustible, placas, kilometraje');
        $this->db->from('autos');
        $this->db->where('id', $auto);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $res = $query->row();
            return $res;
        } else {
            return 'ERROR';
        }
    }


     public function registrar_auto($datos) {
        $this->db->db_debug = FALSE;
    
        if($this->db->insert('autos', $datos)){
          return $this->db->insert_id();
         // echo var_dump($datos);die();
        }
        else {
          return FALSE;
        }
    }
    public function registrar_revision($datos) {
        $this->db->db_debug = FALSE;
    
        if($this->db->insert('autos', $datos)){
          return $this->db->insert_id();
         // echo var_dump($datos);die();
        }
        else {
          return FALSE;
        }
    }
     function gpsAutos()
    {
        $this->db->select('a.id as idAu, a.foto, concat(a.fabricante, " " , a.marca, " ", a.modelo) as auto, a.placas, a.serie, g.*');
        $this->db->from('autos a');
        $this->db->join('gpsAutos g', 'a.id=g.idAuto', 'LEFT');
     
        $res = $this->db->get();
        if($res->num_rows() > 0)
        {
            return $res;


        }
        else
        {
            return false;
        }
    }
    function getGPS($id_auto)
    {
        $this->db->where('idAuto',$id_auto);
        $res = $this->db->get('gpsAutos');
        if($res->num_rows() > 0)
        {
            return $res->row();
        }
        else
        {
            return false;
        }
    }
    public function registrar_GPS($datos) {
        $this->db->db_debug = FALSE;
    
        if($this->db->insert('gpsAutos', $datos)){
          return $this->db->insert_id();
         // echo var_dump($datos);die();
        }
        else {
          return FALSE;
        }
    }
    function updateGps($id_auto, $datos)
    {
        $this->db->where('idAuto', $id_auto);
        $this->db->update('gpsAutos', $datos);
    }
}

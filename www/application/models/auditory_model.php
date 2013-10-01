<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auditory_model extends CI_Model{
    function getAuditory(){
        $stmt = $this->db->conn_id->prepare("CALL getAuditoryNumb()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

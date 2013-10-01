<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class Practice extends CI_Model{
    function getPracticeType(){
        $stmt = $this->db->conn_id->prepare('CALL getPracticeType()');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

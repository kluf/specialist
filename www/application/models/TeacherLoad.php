<?php if (!defined('BASEPATH'))exit('No direct script access allowed');

class TeacherLoad extends CI_Model{
    function getTeacherLoadByKafedra($kafedraId,$begSem,$endSem){
        $stmt = $this->db->conn_id->prepare('CALL getTeachersLoadByKafedra(?,?,?)');
        $stmt->bindParam(1,$kafedraId,  PDO::PARAM_INT);
        $stmt->bindParam(2,$begSem,  PDO::PARAM_STR);
        $stmt->bindParam(3,$endSem,  PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

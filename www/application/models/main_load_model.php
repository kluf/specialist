<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_load_model extends CI_Model {
    function addMainTeacherLoad($data){
        //var_dump($data);exit;
        $stmt = $this->db->conn_id->prepare("CALL addMainTeacherLoad(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$data['teacher'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['lesson'],PDO::PARAM_INT);
        $stmt->bindParam(3,$data['group'],PDO::PARAM_INT);
        $stmt->bindParam(4,$data['dateStart'],PDO::PARAM_STR);
        $stmt->bindParam(5,$data['dateFinal'],PDO::PARAM_STR);
        $stmt->bindParam(6,$data['subgroup'],PDO::PARAM_INT);
        $stmt->bindParam(7,$data['cntStud'],PDO::PARAM_INT);
        $stmt->bindParam(8,$data['semestr'],PDO::PARAM_INT);
        $stmt->bindParam(9,$data['lection'],PDO::PARAM_INT);
        $stmt->bindParam(10,$data['lab'],PDO::PARAM_INT);
        $stmt->bindParam(11,$data['KontrRob'],PDO::PARAM_INT);
        $stmt->bindParam(12,$data['practice'],PDO::PARAM_INT);
        $stmt->bindParam(13,$data['ispyt'],PDO::PARAM_INT);
        $stmt->bindParam(14,$data['zalik'],PDO::PARAM_INT);
        $stmt->bindParam(15,$data['konsult'],PDO::PARAM_INT);
        $stmt->bindParam(16,$data['KursRob'],PDO::PARAM_INT);
        $stmt->bindParam(17,$data['KursProj'],PDO::PARAM_INT);
        $stmt->bindParam(18,$data['lecAud1'],PDO::PARAM_INT);
        $stmt->bindParam(19,$data['lecAud2'],PDO::PARAM_INT);
        $stmt->bindParam(20,$data['practAud1'],PDO::PARAM_INT);
        $stmt->bindParam(21,$data['practAud2'],PDO::PARAM_INT);
        $stmt->bindParam(22,$data['labAud1'],PDO::PARAM_INT);
        $stmt->bindParam(23,$data['labAud2'],PDO::PARAM_INT);
        $stmt->execute();
    }
    function updateMainTeacherLoad($data){
        //var_dump($data);exit;
        $stmt = $this->db->conn_id->prepare("CALL updateMainTeacherLoad(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['teacher'],PDO::PARAM_INT);
        $stmt->bindParam(3,$data['lesson'],PDO::PARAM_INT);
        $stmt->bindParam(4,$data['group'],PDO::PARAM_INT);
        $stmt->bindParam(5,$data['dateStart'],PDO::PARAM_STR);
        $stmt->bindParam(6,$data['dateFinal'],PDO::PARAM_STR);
        $stmt->bindParam(7,$data['subgroup'],PDO::PARAM_INT);
        $stmt->bindParam(8,$data['cntStud'],PDO::PARAM_INT);
        $stmt->bindParam(9,$data['semestr'],PDO::PARAM_INT);
        $stmt->bindParam(10,$data['lection'],PDO::PARAM_INT);
        $stmt->bindParam(11,$data['lab'],PDO::PARAM_INT);
        $stmt->bindParam(12,$data['KontrRob'],PDO::PARAM_INT);
        $stmt->bindParam(13,$data['practice'],PDO::PARAM_INT);
        $stmt->bindParam(14,$data['ispyt'],PDO::PARAM_INT);
        $stmt->bindParam(15,$data['zalik'],PDO::PARAM_INT);
        $stmt->bindParam(16,$data['konsult'],PDO::PARAM_INT);
        $stmt->bindParam(17,$data['KursRob'],PDO::PARAM_INT);
        $stmt->bindParam(18,$data['KursProj'],PDO::PARAM_INT);
        $stmt->bindParam(19,$data['lecAud1'],PDO::PARAM_STR);
        $stmt->bindParam(20,$data['lecAud2'],PDO::PARAM_STR);
        $stmt->bindParam(21,$data['practAud1'],PDO::PARAM_STR);
        $stmt->bindParam(22,$data['practAud2'],PDO::PARAM_STR);
        $stmt->bindParam(23,$data['labAud1'],PDO::PARAM_STR);
        $stmt->bindParam(24,$data['labAud2'],PDO::PARAM_STR);
        $stmt->execute();
    }
    function removeMainTeacherLoad($id){
        $stmt = $this->db->conn_id->prepare("CALL removeMainTeacherLoad(?)");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
    }
    function removePersonalTeacherLoad($id){
        $stmt = $this->db->conn_id->prepare("CALL removePersTeacherLoad(?)");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
    }
    function getPersonalTeacherLoad($data){
        $stmt = $this->db->conn_id->prepare("CALL getPersonalTeacherLoad(?,?,?)");
        $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['startSem'],PDO::PARAM_STR);
        $stmt->bindParam(3,$data['endSem'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     function getPersonalTeacherLoadById($id){
        $stmt = $this->db->conn_id->prepare("CALL getPersonalTeacherLoadById(?)");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function getMainTeacherLoad($data){
        $stmt = $this->db->conn_id->prepare("CALL getMainTeacherLoad(?,?,?)");
        $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['startSem'],PDO::PARAM_STR);
        $stmt->bindParam(3,$data['endSem'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     function getMainTeacherLoadById($id){
        $stmt = $this->db->conn_id->prepare("CALL getMainTeacherLoadById(?)");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function getPracticeTeacherLoad($data){
        $stmt = $this->db->conn_id->prepare("CALL getPractLoadForTeacher(?,?,?)");
        $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['startSem'],PDO::PARAM_STR);
        $stmt->bindParam(3,$data['endSem'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     function getPracticeTeacherLoadById($id){
        $stmt = $this->db->conn_id->prepare("CALL getPractLoadById(?)");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function addPersTeacherLoad($data){
        $stmt = $this->db->conn_id->prepare("CALL addPersonalTeacherLoad(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$data['teacher'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['dateStart'],PDO::PARAM_STR);
        $stmt->bindParam(3,$data['dateFinal'],PDO::PARAM_STR);
        $stmt->bindParam(4,$data['stavka'],PDO::PARAM_INT);
        $stmt->bindParam(5,$data['planove_navant'],PDO::PARAM_INT);
        $stmt->bindParam(6,$data['dp'],PDO::PARAM_INT);
        $stmt->bindParam(7,$data['rec_dp'],PDO::PARAM_INT);
        $stmt->bindParam(8,$data['magRob'],PDO::PARAM_INT);
        $stmt->bindParam(9,$data['recMR'],PDO::PARAM_INT);
        $stmt->bindParam(10,$data['dek'],PDO::PARAM_INT);
        $stmt->execute();
    }
    function updatePersTeacherLoad($data){
        //var_dump($data);exit;
        $stmt = $this->db->conn_id->prepare("CALL updatePersonalTeacherLoad(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['teacher'],PDO::PARAM_INT);
        $stmt->bindParam(3,$data['dateStart'],PDO::PARAM_STR);
        $stmt->bindParam(4,$data['dateFinal'],PDO::PARAM_STR);
        $stmt->bindParam(5,$data['stavka'],PDO::PARAM_INT);
        $stmt->bindParam(6,$data['planove_navant'],PDO::PARAM_INT);
        $stmt->bindParam(7,$data['dp'],PDO::PARAM_INT);
        $stmt->bindParam(8,$data['rec_dp'],PDO::PARAM_INT);
        $stmt->bindParam(9,$data['magRob'],PDO::PARAM_INT);
        $stmt->bindParam(10,$data['recMR'],PDO::PARAM_INT);
        $stmt->bindParam(11,$data['dek'],PDO::PARAM_INT);
        $stmt->execute();
    }
    function addPraktTeacherLoad($data){
        $stmt = $this->db->conn_id->prepare("CALL addPracticeForTeacher(?,?,?,?,?,?)");
        $stmt->bindParam(1,$data['teacher'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['group'],PDO::PARAM_INT);
        $stmt->bindParam(3,$data['practice'],PDO::PARAM_INT);
        $stmt->bindParam(4,$data['cntStud'],PDO::PARAM_STR);
        $stmt->bindParam(5,$data['dateStart'],PDO::PARAM_STR);
        $stmt->bindParam(6,$data['dateFinal'],PDO::PARAM_INT);
        $stmt->execute();
    }
    function updatePraktTeacherLoad($data){
        //var_dump($data);exit;
        $stmt = $this->db->conn_id->prepare("CALL updatePracticeForTeacher(?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['teacher'],PDO::PARAM_INT);
        $stmt->bindParam(3,$data['group'],PDO::PARAM_INT);
        $stmt->bindParam(4,$data['practice'],PDO::PARAM_INT);
        $stmt->bindParam(5,$data['cntStud'],PDO::PARAM_INT);
        $stmt->bindParam(6,$data['dateStart'],PDO::PARAM_STR);
        $stmt->bindParam(7,$data['dateFinal'],PDO::PARAM_STR);
        $stmt->execute();
    }
    function removePraktTeacherLoad($id){
        $stmt = $this->db->conn_id->prepare("CALL removePracticeForTeacher(?)");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
    }
    function getTimesheet($data){
        //var_dump($data);exit;
        $stmt = $this->db->conn_id->prepare("CALL getTimesheetBySemestr(?,?,?,?)");
        $stmt->bindParam(1,$data['kafedra'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['formaNavch'],PDO::PARAM_INT);
        $stmt->bindParam(3,$data['startSem'],PDO::PARAM_STR);
        $stmt->bindParam(4,$data['endSem'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getKafedraLoad($data){
        $stmt = $this->db->conn_id->prepare("CALL getTeachersLoadByKafedra(?,?,?)");
        $stmt->bindParam(1,$data['kafedra'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['startSem'],PDO::PARAM_STR);
        $stmt->bindParam(3,$data['endSem'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getTeachersLoadCount($data){
        $stmt = $this->db->conn_id->prepare("CAll getTeachersLoadCount(?,?,?)");
        $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['startSem'],PDO::PARAM_STR);
        $stmt->bindParam(3,$data['endSem'],PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
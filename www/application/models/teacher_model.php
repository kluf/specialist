<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model{
    function getTeacherByKafedra($kafId){
        $stmt = $this->db->conn_id->prepare("CALL getTeachersByKaf(?)");
        $stmt->bindParam(1,$kafId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getAllTeachers(){
        $stmt = $this->db->conn_id->prepare("CALL getAllTeachers()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
     function getTeacherById($id){
        $stmt = $this->db->conn_id->prepare("CALL getTeacherById(?)");
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function addTeacher($data){
        $stmt = $this->db->conn_id->prepare("CALL addTeacher(?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$data['kafedra'],  PDO::PARAM_INT);
        $stmt->bindParam(2,$data['surname'],  PDO::PARAM_STR);
        $stmt->bindParam(3,$data['name'],  PDO::PARAM_STR);
        $stmt->bindParam(4,$data['patronimic'],  PDO::PARAM_STR);
        $stmt->bindParam(5,$data['posada'],  PDO::PARAM_STR);
        $stmt->bindParam(6,$data['phone1'],  PDO::PARAM_STR);
        $stmt->bindParam(7,$data['passport'],  PDO::PARAM_STR);
        $stmt->bindParam(8,$data['surname2'],  PDO::PARAM_STR);
        $stmt->bindParam(9,$data['phone2'],  PDO::PARAM_STR);
        $stmt->bindParam(10,$data['img'],  PDO::PARAM_STR);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
        redirect(base_url().'teacher_controller/getTeacherById/'.$id['add_id'],'location');
    }
     function updateTeacher($data){
        $stmt = $this->db->conn_id->prepare("CALL updateTeacher(?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bindParam(1,$data['id'],  PDO::PARAM_INT);
        $stmt->bindParam(2,$data['kafedra'],  PDO::PARAM_INT);
        $stmt->bindParam(3,$data['surname'],  PDO::PARAM_STR);
        $stmt->bindParam(4,$data['name'],  PDO::PARAM_STR);
        $stmt->bindParam(5,$data['patronimic'],  PDO::PARAM_STR);
        $stmt->bindParam(6,$data['posada'],  PDO::PARAM_STR);
        $stmt->bindParam(7,$data['phone1'],  PDO::PARAM_STR);
        $stmt->bindParam(8,$data['passport'],  PDO::PARAM_STR);
        $stmt->bindParam(9,$data['surname2'],  PDO::PARAM_STR);
        $stmt->bindParam(10,$data['phone2'],  PDO::PARAM_STR);
        $stmt->bindParam(11,$data['img'],  PDO::PARAM_STR);
        $stmt->execute();
        redirect(base_url().'teacher_controller/','location');
    }
    function removeTeacher($id)
    {
        $stmt = $this->db->conn_id->prepare("CALL removeTeacher(?)");
        $stmt->bindParam(1,$id,  PDO::PARAM_INT);
        $stmt->execute();
        redirect(base_url().'teacher_controller/','location');
    }
}

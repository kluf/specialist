<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lesson_model extends CI_Model{
    function getLessonByKafedra($kid){
        $stmt = $this->db->conn_id->prepare("CALL getLessonsFromKafedra(?)");
        $stmt->bindParam(1,$kid, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getAllLessons(){
        $stmt = $this->db->conn_id->prepare("CALL getAllLessons()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getLessonById($id){
        $stmt = $this->db->conn_id->prepare("CALL getLessonById(?)");
        $stmt->bindParam(1,$id,  PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function addLesson($data){
        $stmt = $this->db->conn_id->prepare("CALL addLesson(?,?)");
        $stmt->bindParam(1,$data['kid'],  PDO::PARAM_INT);
        $stmt->bindParam(2,$data['name'],  PDO::PARAM_STR);
        $stmt->execute();
        redirect(base_url().'lesson_controller/','location');
    }
    function updateLesson($data){
        $stmt = $this->db->conn_id->prepare("CALL updateLesson(?,?,?)");
        $stmt->bindParam(1,$data['id'],  PDO::PARAM_INT);
        $stmt->bindParam(2,$data['kid'],  PDO::PARAM_INT);
        $stmt->bindParam(3,$data['name'],  PDO::PARAM_STR);
        $stmt->execute();
        redirect(base_url().'lesson_controller/','location');
    }
    function removeLesson($id){
        $stmt = $this->db->conn_id->prepare("CALL removeLesson(?)");
        $stmt->bindParam(1,$id,  PDO::PARAM_INT);
        $stmt->execute();
        redirect(base_url().'lesson_controller/','location');
    }
}

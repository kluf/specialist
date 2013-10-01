<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stud_model extends CI_Model {
	function getStudents($config,$lim)
	{       
            $stmt = $this->db->conn_id->prepare("CALL getAllStudentsByLimit(?,?)");
            $stmt->bindParam(1,$config['per_page'],PDO::PARAM_INT);
            $stmt->bindParam(2,$lim,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        function getStudentById($id)
        {
            $stmt = $this->db->conn_id->prepare("CALL getStudentById(?)");
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        function addStudent($data){
            $stmt = $this->db->conn_id->prepare("CALL addStudent(?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$data['group'],PDO::PARAM_INT);
            $stmt->bindParam(2,$data['surname'],PDO::PARAM_STR);
            $stmt->bindParam(3,$data['name'],PDO::PARAM_STR);
            $stmt->bindParam(4,$data['patronimic'],PDO::PARAM_STR);
            $stmt->bindParam(5,$data['zalikova1'],PDO::PARAM_INT);
            $stmt->bindParam(6,$data['phone1'],PDO::PARAM_STR);
            $stmt->bindParam(7,$data['passport'],PDO::PARAM_STR);
            $stmt->bindParam(8,$data['surname2'],PDO::PARAM_STR);
            $stmt->bindParam(9,$data['zalikova2'],PDO::PARAM_INT);
            $stmt->bindParam(10,$data['photo'],PDO::PARAM_STR);
            $stmt->execute();
            redirect(base_url().'student_controller/addStudentView/','location');
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        function removeStudent($data){
            $stmt = $this->db->conn_id->prepare("CALL removeStudent(?)");
            $stmt->bindParam(1,$data['idn'],PDO::PARAM_INT);
            $stmt->execute();
            redirect(base_url().'student_controller/index/','location');
        }
        function updateStudent($data){
            $stmt = $this->db->conn_id->prepare("CALL updateStudent(?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
            $stmt->bindParam(2,$data['group'],PDO::PARAM_INT);
            $stmt->bindParam(3,$data['surname'],PDO::PARAM_STR);
            $stmt->bindParam(4,$data['name'],PDO::PARAM_STR);
            $stmt->bindParam(5,$data['patronimic'],PDO::PARAM_STR);
            $stmt->bindParam(6,$data['zalikova1'],PDO::PARAM_INT);
            $stmt->bindParam(7,$data['phone1'],PDO::PARAM_STR);
            $stmt->bindParam(8,$data['passport'],PDO::PARAM_STR);
            $stmt->bindParam(9,$data['surname2'],PDO::PARAM_STR);
            $stmt->bindParam(10,$data['zalikova2'],PDO::PARAM_INT);
            $stmt->bindParam(11,$data['photo'],PDO::PARAM_STR);
            $stmt->execute();
            redirect(base_url()."student_controller/getStudentById/".$data["id"],"location");
        }
        function getCountStud(){
            $stmt = $this->db->conn_id->prepare("CALL getCountStud()");
            $stmt->execute();
            return $stmt->fetch();
        }
}
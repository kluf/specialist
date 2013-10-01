<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Group_model extends CI_Model {
	function getGroups()
	{
		$stmt = $this->db->conn_id->prepare('CALL getAllGroupsOfStudents()');
		$stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
        function getGroupsByLimit($lim,$off)
	{
		$stmt = $this->db->conn_id->prepare('CALL getAllGroupsOfStudentsByLimit(?,?)');
                $stmt->bindParam(1,$lim,  PDO::PARAM_INT);
                $stmt->bindParam(2,$off,  PDO::PARAM_INT);
		$stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
        function getGroupOfStudentsFromKafedra($kid)
        {
		$stmt = $this->db->conn_id->prepare('CALL getGroupOfStudentsFromKafedra(?)');
                $stmt->bindParam(1,$kid,PDO::PARAM_INT);
		$stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
        function getGroupStudById($id)
        {
            $stmt = $this->db->conn_id->prepare('CALL getGroupOfStudentsById(?)');
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        function addGroupStud($data)
        {
            $stmt = $this->db->conn_id->prepare('CALL addGroupOfStudents(?,?,?,?,?)');
            $stmt->bindParam(1,$data['kid'],PDO::PARAM_INT);
            $stmt->bindParam(2,$data['sfid'],PDO::PARAM_INT);
            $stmt->bindParam(3,$data['name'],PDO::PARAM_STR);
            $stmt->bindParam(4,$data['cnt'],PDO::PARAM_INT);
            $stmt->bindParam(5,$data['description'],PDO::PARAM_STR);
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_ASSOC);
            redirect(base_url().'groupStud_controller/getGroupStudById/'.$id['add_id'],'location');
        }
        function updateGroupStud($data)
        {
            //var_dump($data);exit;
            $stmt = $this->db->conn_id->prepare('CALL updateGroupOfStudents(?,?,?,?,?,?)');
            $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
            $stmt->bindParam(2,$data['kid'],PDO::PARAM_INT);
            $stmt->bindParam(3,$data['sfid'],PDO::PARAM_INT);
            $stmt->bindParam(4,$data['name'],PDO::PARAM_STR);
            $stmt->bindParam(5,$data['cnt'],PDO::PARAM_INT);
            $stmt->bindParam(6,$data['description'],PDO::PARAM_STR);
            $stmt->execute();
            $this->load->helper('url');
            redirect(base_url().'groupStud_controller/','location');
        }
         function removeGroupStudById($id)
        {
            $stmt = $this->db->conn_id->prepare('CALL removeGroupOfStudents(?)');
            $stmt->bindParam(1,$id,PDO::PARAM_INT);
            $stmt->execute();
            $this->load->helper('url');
            redirect(base_url().'/groupStud_controller/','location');
        }

}
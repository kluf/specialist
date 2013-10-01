<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faculty_model extends CI_Model {
	function getFaculty()
	{
		$stmt = $this->db->conn_id->prepare('CALL getAllFaculty()');
		$stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
        function getFacultyById($id)
	{
		$stmt = $this->db->conn_id->prepare('CALL getFacultyById(?)');
                $stmt->bindParam(1,$id,PDO::PARAM_STR);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
	}
        function getFacultyByLimit($lim,$off)
	{
		$stmt = $this->db->conn_id->prepare('CALL getFacultyByLimit(?,?)');
                $stmt->bindParam(1,$lim,PDO::PARAM_INT);
                $stmt->bindParam(2,$off,PDO::PARAM_INT);
		$stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
        function addFaculty($data)
        {
            $stmt = $this->db->conn_id->prepare('CALL addFaculty(?,?,?)');
            $stmt->bindParam(1,$data['name'],PDO::PARAM_STR);
            $stmt->bindParam(2,$data['img'],PDO::PARAM_STR);
            $stmt->bindParam(3,$data['description'],PDO::PARAM_STR);
            $stmt->execute();
            $id = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->load->helper('url');
            redirect(base_url().'faculty_controller/getFacultyById/'.$id['add_id'],'location');
        }
        function updateFaculty($data)
        {
            $stmt = $this->db->conn_id->prepare('CALL updateFaculty(?,?,?,?)');
            $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
            $stmt->bindParam(2,$data['name'],PDO::PARAM_STR);
            $stmt->bindParam(3,$data['img'],PDO::PARAM_STR);
            $stmt->bindParam(4,$data['description'],PDO::PARAM_STR);
            $stmt->execute();
            $this->load->helper('url');
            redirect(base_url().'faculty_controller/getFacultyById/'.$data['id'],'location');
        }
        function removeFaculty($id)
        {
            $stmt = $this->db->conn_id->prepare('CALL removeFaculty(?)');
            $stmt->bindParam(1,$id,PDO::PARAM_STR);
            $stmt->execute();
            $this->load->helper('url');
            redirect(base_url().'faculty_controller/','location');
        }
        function getCountFaculty()
        {
            $stmt = $this->db->conn_id->prepare('CALL getCountFaculty()');
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

}
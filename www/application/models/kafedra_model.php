<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kafedra_model extends CI_Model{
    function getAllKafedra(){
        $stmt = $this->db->conn_id->prepare("CALL getAllKafedra()");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getKafedra($config,$lim){
        $stmt = $this->db->conn_id->prepare("CALL getAllKafedraByLimit(?,?)");
        $stmt->bindParam(1,$config['per_page'],PDO::PARAM_INT);
        $stmt->bindParam(2,$lim,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getKafedraById($id){
        $stmt = $this->db->conn_id->prepare("CALL getKafedraById(?)");
        $stmt->bindParam(1,$id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function getCountKafedra(){
        $stmt = $this->db->conn_id->prepare("CALL getCountKafedra()");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    function updateKafedra($data){
        $stmt = $this->db->conn_id->prepare("CALL updateKafedra(?,?,?,?,?)");
        $stmt->bindParam(1,$data['id'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['fid'],PDO::PARAM_INT);
        $stmt->bindParam(3,$data['kname'],PDO::PARAM_STR);
        $stmt->bindParam(4,$data['photo'],PDO::PARAM_STR);
        $stmt->bindParam(5,$data['description'],PDO::PARAM_STR);
        $stmt->execute();
        redirect(base_url()."kafedra_controller/getKafedraById/".$data["id"],"location");
    }
    function addKafedra($data){
        $stmt = $this->db->conn_id->prepare("CALL addKafedra(?,?,?,?)");
        $stmt->bindParam(1,$data['fid'],PDO::PARAM_INT);
        $stmt->bindParam(2,$data['kname'],PDO::PARAM_STR);
        $stmt->bindParam(3,$data['photo'],PDO::PARAM_STR);
        $stmt->bindParam(4,$data['description'],PDO::PARAM_STR);
        $stmt->execute();
        redirect(base_url()."kafedra_controller/","location");
    }
    function removeKafedra($id){
        $stmt = $this->db->conn_id->prepare("CALL removeKafedra(?)");
        $stmt->bindParam(1,$id,PDO::PARAM_INT);
        $stmt->execute();
        redirect(base_url()."kafedra_controller/","location");
    }
}

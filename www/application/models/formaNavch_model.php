<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class FormaNavch_model extends CI_Model {
	function getFormaNavch()
	{
		$stmt = $this->db->conn_id->prepare('CALL getStudyForm()');
		$stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
}
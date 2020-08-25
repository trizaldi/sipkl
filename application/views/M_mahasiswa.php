<?php
class m_login extends CI_Model{

function get_mahasiswa(){
	$data=$this->db->query("tb_profile");
	return $data;
	}

}
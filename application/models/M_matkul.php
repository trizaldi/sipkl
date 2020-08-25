<?php
class M_matkul extends CI_Model{
    function get_matkul(){
        $prodi=$this->session->userdata('ses_prodi');
        $query=$this->db->query("SELECT tm_matkul.kode_matkul,
        tm_matkul.nama_matkul,
        tm_matkul.id_prodi,
        tm_matkul.stat,
        tm_prodi.nama_prodi
        FROM tm_matkul
        INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_matkul.id_prodi
        WHERE tm_matkul.id_prodi='$prodi'");
        return $query;
    }
    function view_matkul($id){
        $query=$this->db->query("UPDATE tm_matkul SET stat='2' WHERE tm_matkul.kode_matkul='$id'");
        return $query;
    }
    function tidak_tampilkan_matkul($id){
        $query=$this->db->query("UPDATE tm_matkul SET stat='1' WHERE tm_matkul.kode_matkul='$id'");
        return $query;
    }
    function total_matkul($id){
        $prodi=$this->session->userdata('ses_prodi');
        $query=$this->db->query("SELECT tm_matkul.kode_matkul,
        tm_matkul.nama_matkul,
        tm_matkul.id_prodi,
        tm_matkul.stat,
        tm_prodi.nama_prodi
        FROM tm_matkul
        INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_matkul.id_prodi
        WHERE tm_matkul.id_prodi='$prodi' AND tm_matkul.stat='$id'");
        return $query->result();
    }
 
}
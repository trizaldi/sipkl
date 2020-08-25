<?php
class M_angkatan extends CI_Model{
    function get_angkatan(){
        $query=$this->db->query("SELECT*FROM tm_angkatan");
        return $query;
    }
        function add($angkatan){
        $hasil=$this->db->query("INSERT INTO tm_angkatan (angkatan)
            VALUES ('$angkatan')");
        return $hasil;
    }
     function get_edit_angkatan($id){
        $query=$this->db->query("SELECT*FROM tm_angkatan WHERE tm_angkatan.id_angkatan='$id'");
        return $query->result();
    }
    function update_angkatan($id){
        $hasil=$this->db->query("UPDATE tm_angkatan
        SET angkatan='$angkatan' WHERE id_angkatan='$id'");
        return $hasil;
    }
     function delete_angkatan($id){
        $hasil=$this->db->query("DELETE FROM tm_angkatan WHERE id_angkatan='$id'");
        return $hasil;
    }
}
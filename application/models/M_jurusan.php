<?php
class M_jurusan extends CI_Model{
    function get_jurusan(){
        $query=$this->db->query("SELECT*FROM tm_jurusan");
        return $query;
    }
        function add($jurusan){
        $hasil=$this->db->query("INSERT INTO tm_jurusan (nama_jurusan)
            VALUES ('$jurusan')");
        return $hasil;
    }
     function get_edit_jurusan($id){
        $query=$this->db->query("SELECT*FROM tm_jurusan
            WHERE tm_jurusan.id_jurusan='$id'");
        return $query->result();
    }
    function update_jurusan($id,$jurusan){
        $hasil=$this->db->query("UPDATE tm_jurusan
        SET nama_jurusan='$jurusan' WHERE id_jurusan='$id'");
        return $hasil;
    }
     function delete_jurusan($id){
        $hasil=$this->db->query("DELETE FROM tm_jurusan WHERE id_jurusan='$id'");
        return $hasil;
    }
 
}
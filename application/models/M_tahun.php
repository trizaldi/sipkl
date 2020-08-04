<?php
class M_tahun extends CI_Model{
    function get_tahun(){
        $query=$this->db->query("SELECT*FROM tm_tahun");
        return $query;
    }
        function add($tahun){
        $hasil=$this->db->query("INSERT INTO tm_tahun (tahun)
            VALUES ('$tahun')");
        return $hasil;
    }
     function get_edit_tahun($id){
        $query=$this->db->query("SELECT*FROM tm_tahun WHERE tm_tahun.id_tahun='$id'");
        return $query->result();
    }
    function update_tahun($id,$tahun){
        $hasil=$this->db->query("UPDATE tm_tahun
        SET tahun='$tahun' WHERE id_tahun='$id'");
        return $hasil;
    }
     function delete_tahun($id){
        $hasil=$this->db->query("DELETE FROM tm_tahun WHERE id_tahun='$id'");
        return $hasil;
    }
}
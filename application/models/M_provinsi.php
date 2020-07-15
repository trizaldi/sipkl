<?php
class M_provinsi extends CI_Model{
    function get_provinsi(){
        $query=$this->db->query("SELECT*FROM tm_provinsi");
        return $query;
    }
        function add($provinsi){
        $hasil=$this->db->query("INSERT INTO tm_provinsi (nama_provinsi)
            VALUES ('$provinsi')");
        return $hasil;
    }
     function get_edit_provinsi($id){
        $query=$this->db->query("SELECT*FROM tm_provinsi
            WHERE tm_provinsi.id_provinsi='$id'");
        return $query->result();
    }
    function update_provinsi($id,$provinsi){
        $hasil=$this->db->query("UPDATE tm_provinsi
        SET nama_provinsi='$provinsi' WHERE id_provinsi='$id'");
        return $hasil;
    }
     function delete_provinsi($id){
        $hasil=$this->db->query("DELETE FROM tm_provinsi WHERE id_provinsi='$id'");
        return $hasil;
    }
 
}
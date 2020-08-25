<?php
class M_kota extends CI_Model{
    function get_kota(){
        $query=$this->db->query("SELECT tm_kota.id_kota,
        tm_kota.kota,
        tm_provinsi.id_provinsi,
        tm_provinsi.nama_provinsi
        FROM tm_kota INNER JOIN tm_provinsi ON tm_kota.id_provinsi=tm_provinsi.id_provinsi");
        return $query;
    }
    function add($kota,$provinsi){
        $hasil=$this->db->query("INSERT INTO tm_kota (kota,id_provinsi)
            VALUES ('$kota','$provinsi')");
        return $hasil;
    }
     function get_edit_kota($id){
        $query=$this->db->query("SELECT tm_kota.id_kota,
        tm_kota.kota,
        tm_provinsi.id_provinsi,
        tm_provinsi.nama_provinsi
        FROM tm_kota INNER JOIN tm_provinsi ON tm_kota.id_provinsi=tm_provinsi.id_provinsi
        WHERE tm_kota.id_kota='$id'");
        return $query->result();
    }
    function update_kota($id,$kota,$provinsi){
        $hasil=$this->db->query("UPDATE tm_kota
        SET kota='$kota',id_provinsi='$provinsi'
        WHERE id_kota='$id'");
        return $hasil;
    }
     function delete_kota($id){
        $hasil=$this->db->query("DELETE FROM tm_kota WHERE id_kota='$id'");
        return $hasil;
    }
 
}
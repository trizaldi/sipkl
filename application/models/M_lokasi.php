<?php
class M_lokasi extends CI_Model{
    function get_lokasi(){
        $query=$this->db->query("SELECT tm_lokasi.id_lokasi,
            tm_lokasi.nama_lokasi,
            tm_lokasi.alamat,
            tm_lokasi.telp,
            tm_lokasi.kode_pos,
            tm_lokasi.longitude,
            tm_lokasi.latitude,
            tm_kota.id_kota,
            tm_kota.kota
            FROM tm_lokasi INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota");
        return $query;
    }
    function get_kota(){
        $data=$this->db->get("tm_kota");
        return $data;
    }
        function add($nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude){
        $hasil=$this->db->query("INSERT INTO tm_lokasi (nama_lokasi,alamat,telp,kode_pos,id_kota,longitude,latitude)
            VALUES ('$nama','$alamat','$telp','$kode_pos','$kota','$longitude','$latitude')");
        return $hasil;
    }
     function get_edit_lokasi($id){
        $query=$this->db->query("SELECT tm_lokasi.id_lokasi,
            tm_lokasi.nama_lokasi,
            tm_lokasi.alamat,
            tm_lokasi.telp,
            tm_lokasi.kode_pos,
            tm_lokasi.longitude,
            tm_lokasi.latitude,
            tm_kota.id_kota,
            tm_kota.kota
            FROM tm_lokasi INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
            WHERE tm_lokasi.id_lokasi='$id'");
        return $query->result();
    }
    function update_lokasi($id,$nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude){
        $hasil=$this->db->query("UPDATE tm_lokasi
        SET nama_lokasi='$nama',alamat='$alamat',telp='$telp',id_kota='$kota',kode_pos='$kode_pos',longitude='$longitude',latitude='$latitude'
         WHERE id_lokasi='$id'");
        return $hasil;
    }
     function delete_lokasi($id){
        $hasil=$this->db->query("delete from tm_lokasi where id_lokasi='$id'");
        return $hasil;
    }
 
}
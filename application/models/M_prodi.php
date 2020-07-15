<?php
class M_prodi extends CI_Model{
    function get_prodi(){
        $query=$this->db->query("SELECT tm_prodi.id_prodi,
tm_prodi.nama_prodi,
tm_jurusan.id_jurusan,
tm_jurusan.nama_jurusan
FROM tm_prodi INNER JOIN tm_jurusan ON tm_prodi.id_jurusan=tm_jurusan.id_jurusan");
        return $query;
    }
        function add($prodi,$jurusan){
        $hasil=$this->db->query("INSERT INTO tm_prodi (nama_prodi,id_jurusan)
            VALUES ('$prodi','$jurusan')");
        return $hasil;
    }
     function get_edit_prodi($id){
        $query=$this->db->query("SELECT tm_prodi.id_prodi,
tm_prodi.nama_prodi,
tm_jurusan.id_jurusan,
tm_jurusan.nama_jurusan
FROM tm_prodi INNER JOIN tm_jurusan ON tm_prodi.id_jurusan=tm_jurusan.id_jurusan
            WHERE tm_prodi.id_prodi='$id'");
        return $query->result();
    }
    function update_prodi($id,$prodi,$jurusan){
        $hasil=$this->db->query("UPDATE tm_prodi
        SET nama_prodi='$prodi',id_jurusan='$jurusan'
        WHERE id_prodi='$id'");
        return $hasil;
    }
     function delete_prodi($id){
        $hasil=$this->db->query("delete from tm_prodi where id_prodi='$id'");
        return $hasil;
    }
}
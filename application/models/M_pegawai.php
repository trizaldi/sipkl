<?php
class M_pegawai extends CI_Model{
    function get_pegawai(){
        $query=$this->db->query("SELECT tm_pegawai.NIP,
            tm_pegawai.nama_pegawai,
            tm_pegawai.gelar,
            tm_prodi.nama_prodi,
            tm_level.level
            FROM tm_pegawai INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_pegawai.id_prodi
            INNER JOIN tm_level ON tm_level.id_level=tm_pegawai.id_level");
        return $query;
    }
        function get_level(){
        $query=$this->db->query("SELECT*FROM tm_level");
        return $query;
    }
        function add($nip,$nama,$gelar,$level,$prodi,$password){
        $hasil=$this->db->query("INSERT INTO tm_pegawai (NIP,nama_pegawai,gelar,id_level,id_prodi,password)
            VALUES ('$nip','$nama','$gelar','$level','$prodi',md5('$password'))");
        return $hasil;
    }
     function get_edit_pegawai($nip){
        $query=$this->db->query("SELECT tm_pegawai.NIP,
            tm_pegawai.nama_pegawai,
            tm_pegawai.gelar,
            tm_pegawai.password,
            tm_prodi.nama_prodi,
            tm_level.level
            FROM tm_pegawai INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_pegawai.id_prodi
            INNER JOIN tm_level ON tm_level.id_level=tm_pegawai.id_level
            WHERE tm_pegawai.NIP='$nip'");
        return $query->result();
    }
    function update_pegawai($nip,$nama,$gelar,$level,$prodi,$password){
        $hasil=$this->db->query("UPDATE tm_pegawai
        SET nama_pegawai='$nama',gelar='$gelar',id_level='$level',id_prodi='$prodi',password=md5('$password') where NIP='$nip'");
        return $hasil;
    }
     function delete($nip){
        $hasil=$this->db->query("delete from tm_pegawai where NIP='$nip'");
        return $hasil;
    }

    //cek nim dan password mahasiswa
    function auth_mahasiswa($username,$password,$level){
        $query=$this->db->query("SELECT * FROM tm_mahasiswa WHERE NIM='$username' AND password=MD5('$password') AND id_level='$level' LIMIT 1");
        return $query;
    }
 
}
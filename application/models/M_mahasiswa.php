<?php
class M_mahasiswa extends CI_Model{
    function get_mahasiswa(){
        $query=$this->db->query("SELECT tm_mahasiswa.NIM,
            tm_mahasiswa.nama_mhs,
            tm_mahasiswa.telp,
            tm_prodi.nama_prodi,
            tm_angkatan.angkatan,
            tm_mahasiswa.password
            FROM tm_mahasiswa INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
            INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan");
        return $query;
    }
        function get_angkatan(){
        $query=$this->db->query("SELECT*FROM tm_angkatan");
        return $query;
    }
        function add($nim,$nama,$tlp,$prodi,$angkatan,$level,$password){
        $hasil=$this->db->query("INSERT INTO tm_mahasiswa (NIM,nama_mhs,telp,id_prodi,id_angkatan,id_level,password)
            VALUES ('$nim','$nama','$tlp','$prodi','$angkatan','$level',md5('$password'))");
        return $hasil;
    }
     function get_edit_mahasiswa($nim){
        $query=$this->db->query("SELECT tm_mahasiswa.NIM,
            tm_mahasiswa.nama_mhs,
            tm_mahasiswa.telp,
            tm_prodi.nama_prodi,
            tm_angkatan.angkatan,
            tm_angkatan.id_angkatan,
            tm_mahasiswa.password
            FROM tm_mahasiswa INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
            INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
            WHERE tm_mahasiswa.NIM='$nim'");
        return $query->result();
    }
    function update_mahasiswa($nim,$nama,$tlp,$prodi,$angkatan,$level,$password){
        $hasil=$this->db->query("UPDATE tm_mahasiswa
        SET nama_mhs='$nama',telp='$tlp',id_prodi='$prodi',id_angkatan='$angkatan',id_level='$level',password=md5('$password') where NIM='$nim'");
        return $hasil;
    }
     function delete($nim){
        $hasil=$this->db->query("delete from tm_mahasiswa where NIM='$nim'");
        return $hasil;
    }

    //cek nim dan password mahasiswa
    function auth_mahasiswa($username,$password,$level){
        $query=$this->db->query("SELECT * FROM tm_mahasiswa WHERE NIM='$username' AND password=MD5('$password') AND id_level='$level' LIMIT 1");
        return $query;
    }
 
}
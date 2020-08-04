	
<?php
class m_login extends CI_Model{
    //cek nip dan password dosen
    function auth_dosen($username,$password){
        #$query=$this->db->query("SELECT * FROM tm_pegawai WHERE NIP='$username' AND password=MD5('$password')");
        $query=$this->db->query("SELECT * FROM tm_pegawai WHERE NIP='$username' AND password='$password'");
        return $query;
    }

    //cek nim dan password mahasiswa
    function auth_mahasiswa($username,$password){
        #$query=$this->db->query("SELECT * FROM tm_mahasiswa WHERE NIM='$username' AND password=MD5('$password') LIMIT 1");
        $query=$this->db->query("SELECT * FROM tm_mahasiswa WHERE NIM='$username' AND password='$password' LIMIT 1");
        return $query;
    }
 
}
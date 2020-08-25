<?php
class M_kajur_kaprodi extends CI_Model{
    function get_ttd(){
        $prodi=$this->session->userdata('ses_prodi');
        $query=$this->db->query("SELECT 
        a.nama_pegawai AS kajur,
        b.nama_pegawai AS kaprodi,
        c.nama_pegawai AS korbidpkl,
        tm_prodi.id_prodi,
        tm_prodi.nama_prodi AS prodi,
        tmst_ttd.id,
        tmst_ttd.id_prodi,
        tmst_ttd.ka_jur,
        tmst_ttd.ka_prodi,
        tmst_ttd.korbid_pkl
        FROM tmst_ttd
        INNER JOIN tm_pegawai AS a ON a.NIP=tmst_ttd.ka_jur
        INNER JOIN tm_pegawai AS b ON b.NIP=tmst_ttd.ka_prodi
        INNER JOIN tm_pegawai AS c ON c.NIP=tmst_ttd.korbid_pkl
        INNER JOIN tm_prodi ON tm_prodi.id_prodi=tmst_ttd.id_prodi
        WHERE tm_prodi.id_prodi='$prodi'");
        return $query;
    }
    function get_pegawai(){
        $query=$this->db->query("SELECT tm_pegawai.NIP,
tm_pegawai.nama_pegawai,
tm_pegawai.gelar_depan,
tm_pegawai.gelar_belakang,
tm_pegawai.password,
tm_prodi.nama_prodi,
tm_level.level
FROM tm_pegawai INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_pegawai.id_prodi INNER JOIN tm_level ON tm_level.id_level=tm_pegawai.id_level");
        return $query;
    }
    function get_prodi(){
        $query=$this->db->query("SELECT*FROM tm_prodi");
        return $query;
    }
        function add($prodi,$kajur,$kaprodi,$korbidpkl){
        $hasil=$this->db->query("INSERT INTO tmst_ttd (id_prodi,ka_jur,ka_prodi,korbid_pkl)
            VALUES ('$prodi','$kajur','$kaprodi','$korbidpkl')");
        return $hasil;
    }
     function get_edit_ttd($id){
        $query=$this->db->query("SELECT 
        a.nama_pegawai AS kajur,
        b.nama_pegawai AS kaprodi,
        c.nama_pegawai AS korbidpkl,
        a.gelar_depan AS gelardepankajur,
        a.gelar_belakang AS gelarbelakangkajur,
        b.gelar_depan AS gelardepankaprodi,
        b.gelar_belakang AS gelarbelakangkaprodi,
        c.gelar_depan AS gelardepankorbidpkl,
        c.gelar_belakang AS gelarbelakangkorbidpkl,
        a.NIP AS nipkajur,
        b.NIP AS nipkaprodi,
        c.NIP AS nipkorbidpkl,
        tm_prodi.id_prodi,
        tm_prodi.nama_prodi AS prodi,
        tmst_ttd.id,
        tmst_ttd.id_prodi,
        tmst_ttd.ka_jur,
        tmst_ttd.ka_prodi,
        tmst_ttd.korbid_pkl
        FROM tmst_ttd
        INNER JOIN tm_pegawai AS a ON a.NIP=tmst_ttd.ka_jur
        INNER JOIN tm_pegawai AS b ON b.NIP=tmst_ttd.ka_prodi
        INNER JOIN tm_pegawai AS c ON c.NIP=tmst_ttd.korbid_pkl
        INNER JOIN tm_prodi ON tm_prodi.id_prodi=tmst_ttd.id_prodi
        WHERE tmst_ttd.id='$id'");
        return $query->result();
    }
    function update_ttd($id,$prodi,$kajur,$kaprodi,$korbidpkl){
        $hasil=$this->db->query("UPDATE tmst_ttd
        SET id_prodi='$prodi',ka_jur='$kajur',ka_prodi='$kaprodi',korbid_pkl='$korbidpkl' WHERE id='$id'");
        return $hasil;
    }
     function delete_ttd($id){
        $hasil=$this->db->query("DELETE FROM tmst_ttd WHERE id='$id'");
        return $hasil;
    }
    function get_ttd_mahasiswa(){
        $prodi=$this->session->userdata('ses_prodi');
        $query=$this->db->query("SELECT 
        a.nama_pegawai AS kajur,
        b.nama_pegawai AS kaprodi,
        c.nama_pegawai AS korbidpkl,
        a.gelar_depan AS gelardepankajur,
        a.gelar_belakang AS gelarbelakangkajur,
        b.gelar_depan AS gelardepankaprodi,
        b.gelar_belakang AS gelarbelakangkaprodi,
        c.gelar_depan AS gelardepankorbidpkl,
        c.gelar_belakang AS gelarbelakangkorbidpkl,
        a.NIP AS nipkajur,
        b.NIP AS nipkaprodi,
        c.NIP AS nipkorbidpkl,
        tm_prodi.id_prodi,
        tm_prodi.nama_prodi AS prodi,
        tmst_ttd.id,
        tmst_ttd.id_prodi,
        tmst_ttd.ka_jur,
        tmst_ttd.ka_prodi,
        tmst_ttd.korbid_pkl
        FROM tmst_ttd
        INNER JOIN tm_pegawai AS a ON a.NIP=tmst_ttd.ka_jur
        INNER JOIN tm_pegawai AS b ON b.NIP=tmst_ttd.ka_prodi
        INNER JOIN tm_pegawai AS c ON c.NIP=tmst_ttd.korbid_pkl
        INNER JOIN tm_prodi ON tm_prodi.id_prodi=tmst_ttd.id_prodi
        WHERE tm_prodi.id_prodi='$prodi'");
        return $query;
    }

 
}
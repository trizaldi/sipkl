<?php
class M_grafik extends CI_Model{
    function get_grafik_total_usulan(){
        $prodi=$this->session->userdata('ses_prodi');
        $query=$this->db->query("SELECT id_usulan, COUNT(*) AS total FROM tmst_usulan
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tm_mahasiswa.id_prodi='$prodi'");
        return $query;
    }
    function get_grafik_belum_diverifikasi(){
        $prodi=$this->session->userdata('ses_prodi');
        $query=$this->db->query("SELECT id_usulan, COUNT(*) AS total FROM tmst_usulan
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tm_mahasiswa.id_prodi='$prodi' AND tmst_usulan.stat_usulan='1'");
        return $query;
    }

    function get_grafik_total_usulan_setuju(){
$prodi=$this->session->userdata('ses_prodi');
$query=$this->db->query("SELECT id_usulan, COUNT(*) AS total FROM tmst_usulan
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tm_mahasiswa.id_prodi='$prodi' AND tmst_usulan.stat_usulan='2'");
        return $query;
    }

    function get_grafik_total_usulan_ditolak(){
$prodi=$this->session->userdata('ses_prodi');
$query=$this->db->query("SELECT id_usulan, COUNT(*) AS total FROM tmst_usulan
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tm_mahasiswa.id_prodi='$prodi' AND tmst_usulan.stat_usulan='3'");
        return $query;
    }
//ADMIN
    function get_grafik_total_usulan_verifikasi_setuju(){
$prodi=$this->session->userdata('ses_prodi');
$query=$this->db->query("SELECT id_usulan, COUNT(*) AS total
FROM tmst_usulan
INNER JOIN tm_lokasi ON tm_lokasi.id_lokasi=tmst_usulan.id_lokasi
INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tm_mahasiswa.id_prodi='$prodi' AND tmst_usulan.stat_verifikasi='2'");
        return $query;
    }
    function get_grafik_total_usulan_verifikasi(){
$prodi=$this->session->userdata('ses_prodi');
$query=$this->db->query("SELECT id_usulan, COUNT(*) AS total
FROM tmst_usulan
INNER JOIN tm_lokasi ON tm_lokasi.id_lokasi=tmst_usulan.id_lokasi
INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tm_mahasiswa.id_prodi='$prodi' AND tmst_usulan.stat_verifikasi='1'");
        return $query;
    }

//USULAN LOKASI BARU
     function get_grafik_usulan_lokasi_baru(){
$prodi=$this->session->userdata('ses_prodi');
$query=$this->db->query("SELECT id_lok_usul, COUNT(*) AS total
            FROM ts_lokasi 
            INNER JOIN tm_kota ON tm_kota.id_kota=ts_lokasi.id_kota
            INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=ts_lokasi.NIM_k
            WHERE tm_mahasiswa.id_prodi='$prodi'");
        return $query;
    }

     function get_grafik_usulan_lokasi_baru_setuju(){
$prodi=$this->session->userdata('ses_prodi');
$query=$this->db->query("SELECT id_lok_usul, COUNT(*) AS total
            FROM ts_lokasi 
            INNER JOIN tm_kota ON tm_kota.id_kota=ts_lokasi.id_kota
            INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=ts_lokasi.NIM_k
            WHERE tm_mahasiswa.id_prodi='$prodi' AND tS_lokasi.status='2'");
        return $query;
    }

     function get_grafik_usulan_lokasi_baru_ditolak(){
$prodi=$this->session->userdata('ses_prodi');
$query=$this->db->query("SELECT id_lok_usul, COUNT(*) AS total
            FROM ts_lokasi 
            INNER JOIN tm_kota ON tm_kota.id_kota=ts_lokasi.id_kota
            INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=ts_lokasi.NIM_k
            WHERE tm_mahasiswa.id_prodi='$prodi' AND tS_lokasi.status='3'");
        return $query;
}

function total_mahasiswa(){
    $prodi=$this->session->userdata('ses_prodi');
    $query=$this->db->query("SELECT NIM, COUNT(*) AS total FROM tm_mahasiswa
    INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi");
    return $query;
}
function total_pegawai(){
    $prodi=$this->session->userdata('ses_prodi');
    $query=$this->db->query("SELECT NIP, COUNT(*) AS total FROM tm_pegawai
    INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_pegawai.id_prodi");
    return $query;
}
}
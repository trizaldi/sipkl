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
        function get_prodi(){
        $query=$this->db->query("SELECT*FROM tm_prodi");
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
    function get_lokasi($id){
        $query=$this->db->query("SELECT tm_lokasi.id_lokasi,
            tm_lokasi.nama_lokasi,
            tm_lokasi.alamat,
            tm_lokasi.telp,
            tm_lokasi.kode_pos,
            tm_lokasi.longitude,
            tm_lokasi.latitude,
            tm_kota.id_kota,
            tm_kota.kota
            FROM tm_lokasi INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota WHERE tm_lokasi.id_kota='$id'");
        return $query->result();
    }
function get_mahasiswa_prodi($prodi,$angkatan){
        $query=$this->db->query("SELECT tm_mahasiswa.NIM,
            tm_mahasiswa.nama_mhs,
            tm_mahasiswa.telp,
            tm_prodi.nama_prodi,
            tm_angkatan.id_angkatan,
            tm_angkatan.angkatan,
            tm_mahasiswa.password
            FROM tm_mahasiswa INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
            INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
            WHERE tm_mahasiswa.id_prodi='$prodi' AND tm_mahasiswa.id_angkatan='$angkatan'");
        return $query;
    }
        function add_usulan_pkl($lokasi,$mahasiswa_1,$mahasiswa_2,$mahasiswa_3,$mahasiswa_4,$mahasiswa_5){
        $hasil=$this->db->query("INSERT INTO tmst_usulan (id_kelompok,id_lokasi,id_tahun,stat_usulan,stat_verifikasi)
            VALUES ('$id_kelompok','$mahasiswa_1','$mahasiswa_2','$mahasiswa_3','$mahasiswa_4','$mahasiswa_5',md5('$password'))");
        return $hasil;
    }

 // Mahasiswa hasil ajukan langsung
 // 1. query tampil Usulan lokasi
   function get_usulan_lokasi(){
        $query=$this->db->query("SELECT tmst_usulan.id_usulan,
tmst_usulan.id_lokasi,
tmst_usulan.stat_usulan,
tmst_usulan.stat_verifikasi,
tm_lokasi.id_lokasi,
tm_lokasi.nama_lokasi,
tm_lokasi.alamat,
tm_lokasi.telp,
tm_lokasi.id_kota,
tm_lokasi.kode_pos,
tm_lokasi.longitude,
tm_lokasi.latitude,
tm_kota.id_kota,
tm_kota.kota
FROM tmst_usulan
INNER JOIN tm_lokasi ON tm_lokasi.id_lokasi=tmst_usulan.id_lokasi
INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota");
        return $query;
    }
//2. Ajukan lokasi PKL
function add_ajukan_lokasi_pkl($lokasi,$tahun,$status_usulan,$status_verifikasi){
        $hasil=$this->db->query("INSERT INTO tmst_usulan (id_lokasi,id_tahun,stat_usulan,stat_verifikasi)
            VALUES ('$lokasi','$tahun','$status_usulan','$status_verifikasi')");
        return $hasil;    
}
//3. Ajukan kelompok PKL
function add_kelompok_pkl($mahasiswa_1,$mahasiswa_2,$mahasiswa_3,$mahasiswa_4,$mahasiswa_5){
        $hasil=$this->db->query("INSERT INTO tmst_kelompok (NIM_k,NIM_a1,NIM_a2,NIM_a3,NIM_a4)
            VALUES ('$mahasiswa_1','$mahasiswa_2','$mahasiswa_3','$mahasiswa_4','$mahasiswa_5')");
        return $hasil;
    }
//2. query tampil Usulan kelompok
function mahasiswa_1(){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_k
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_k=tm_mahasiswa.NIM");
         return $hasil;
     }
function mahasiswa_2(){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a1
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a1=tm_mahasiswa.NIM");
         return $hasil;
     }
function mahasiswa_3(){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a2
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a2=tm_mahasiswa.NIM");
         return $hasil;
     }
function mahasiswa_4(){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a3
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a3=tm_mahasiswa.NIM");
         return $hasil;
     }
function mahasiswa_5(){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a3
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a4=tm_mahasiswa.NIM");
         return $hasil;
     }
 }
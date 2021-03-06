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
function get_mahasiswa_prodi(){
    //memunculkan query ini bila status di setujui.
        $prodi=$this->session->userdata('ses_prodi');
        $angkatan=$this->session->userdata('ses_angkatan');
        $data_tidak_ada_dalam_kelompok=$this->db->query("SELECT tm_mahasiswa.NIM,
            tm_mahasiswa.nama_mhs,
            tm_mahasiswa.telp,
            tm_prodi.nama_prodi,
            tm_angkatan.id_angkatan,
            tm_angkatan.angkatan,
            tm_mahasiswa.password
            FROM tm_mahasiswa INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
            INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
WHERE NOT EXISTS (SELECT * FROM tmst_kelompok
WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_k)
AND NOT EXISTS (SELECT * FROM tmst_kelompok WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_a1)
AND NOT EXISTS (SELECT * FROM tmst_kelompok WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_a2)
AND NOT EXISTS (SELECT * FROM tmst_kelompok WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_a3)
AND NOT EXISTS (SELECT * FROM tmst_kelompok WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_a4)
AND tm_mahasiswa.id_prodi='$prodi'
AND tm_mahasiswa.id_angkatan='$angkatan'");
        
        return $data_tidak_ada_dalam_kelompok;
    }
    
    function get_mahasiswa_angkatan($id){//find mahasiswa javascript
        $prodi=$this->session->userdata('ses_prodi');
        #$angkatan=$this->session->userdata('ses_angkatan');
        $status=$this->session->userdata('ses_status');
        $data_tidak_ada_dalam_kelompok=$this->db->query("SELECT tm_mahasiswa.NIM,
            tm_mahasiswa.nama_mhs,
            tm_mahasiswa.telp,
            tm_prodi.nama_prodi,
            tm_angkatan.id_angkatan,
            tm_angkatan.angkatan,
            tm_mahasiswa.password
            FROM tm_mahasiswa INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
            INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
WHERE NOT EXISTS (SELECT * FROM tmst_kelompok
WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_k)
AND NOT EXISTS (SELECT * FROM tmst_kelompok WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_a1)
AND NOT EXISTS (SELECT * FROM tmst_kelompok WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_a2)
AND NOT EXISTS (SELECT * FROM tmst_kelompok WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_a3)
AND NOT EXISTS (SELECT * FROM tmst_kelompok WHERE tm_mahasiswa.NIM = tmst_kelompok.NIM_a4)
AND tm_mahasiswa.id_prodi='$prodi' AND tm_mahasiswa.id_angkatan='$id'");

$tampil_semua_mahasiswa=$this->db->query("SELECT tm_mahasiswa.NIM,
tm_mahasiswa.nama_mhs,
tm_mahasiswa.telp,
tm_prodi.nama_prodi,
tm_angkatan.id_angkatan,
tm_angkatan.angkatan,
tm_mahasiswa.password
FROM tm_mahasiswa INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
WHERE tm_mahasiswa.id_prodi='$prodi' AND tm_mahasiswa.id_angkatan='$id'");

if($status==1){
    return $data_tidak_ada_dalam_kelompok->result();
}
else{
    return $tampil_semua_mahasiswa->result();
}
        #return $query->result();
    }
    function get_semua_data_mahasiswa(){
        //memunculkan query ini bila status di tolak.
            $prodi=$this->session->userdata('ses_prodi');
            $angkatan=$this->session->userdata('ses_angkatan');
            $tampil_semua_mahasiswa=$this->db->query("SELECT tm_mahasiswa.NIM,
            tm_mahasiswa.nama_mhs,
            tm_mahasiswa.telp,
            tm_prodi.nama_prodi,
            tm_angkatan.id_angkatan,
            tm_angkatan.angkatan,
            tm_mahasiswa.password
            FROM tm_mahasiswa INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
            INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
            WHERE tm_mahasiswa.id_prodi='$prodi' AND tm_mahasiswa.id_angkatan='$angkatan'");

            return $tampil_semua_mahasiswa;
        }

        function add_usulan_pkl($lokasi,$mahasiswa_1,$mahasiswa_2,$mahasiswa_3,$mahasiswa_4,$mahasiswa_5){
        $hasil=$this->db->query("INSERT INTO tmst_usulan (id_kelompok,id_lokasi,id_tahun,stat_usulan,stat_verifikasi)
            VALUES ('$id_kelompok','$mahasiswa_1','$mahasiswa_2','$mahasiswa_3','$mahasiswa_4','$mahasiswa_5',md5('$password'))");
        return $hasil;
    }

 // Mahasiswa hasil ajukan langsung
 // 1. query tampil Usulan lokasi

function get_akses_mahasiswa(){
    $nim=$this->session->userdata('ses_id');
    $cek_kelompok=$this->db->query("SELECT tmst_kelompok.id_usulan,
    tmst_usulan.id_usulan,
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
        INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
        INNER JOIN tmst_kelompok ON tmst_kelompok.id_usulan=tmst_usulan.id_usulan
        WHERE tmst_kelompok.NIM_k='$nim' OR tmst_kelompok.NIM_a1='$nim'
        OR tmst_kelompok.NIM_a2='$nim' OR tmst_kelompok.NIM_a3='$nim'
        OR tmst_kelompok.NIM_a4='$nim' ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");

    //cek relasi status usulan (tm_mahasiswa dan tmst_usulan);
    $cek_status_usulan=$this->db->query("SELECT tmst_usulan.id_usulan, tmst_usulan.id_lokasi, tmst_usulan.stat_usulan, tmst_usulan.stat_verifikasi, tm_lokasi.id_lokasi,tm_lokasi.nama_lokasi,tm_lokasi.alamat,tm_lokasi.telp,tm_lokasi.id_kota,tm_lokasi.kode_pos,tm_lokasi.longitude,tm_lokasi.latitude,tm_kota.id_kota,tm_kota.kota
FROM tmst_usulan
INNER JOIN tm_lokasi ON tm_lokasi.id_lokasi=tmst_usulan.id_lokasi
INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tmst_usulan.NIM_k='$nim' ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");

        if($cek_kelompok->num_rows() > 0){      
             return $cek_kelompok;
          }
          else{
           return $cek_status_usulan;   #$ymdhis=date('YmdHis').rand(100,999);
          }
    }
    function get_kode_usulan(){   
         $query = $this->db->query("SELECT id_prodi from tm_prodi WHERE tm_prodi.id_prodi='".$this->session->userdata('ses_prodi')."'");
         $usulan=$this->db->query("SELECT MAX(RIGHT(id_usulan,3)) AS id_usulan FROM tmst_usulan");
        foreach($query->result() as $data){
            $prodi = $data->id_prodi;
            $id_prodi=sprintf("%03s", $prodi);

        #$kode="";    
          if($usulan->num_rows() > 0){      
             foreach($usulan->result() as $data){
                #$id = intval($data->id_usulan)+1;
                $id = (substr($data->id_usulan,-3)+1);
                $kode = sprintf("%03s", $id);

            }
          }
          else{
           $kode = strval("001");   #$ymdhis=date('YmdHis').rand(100,999);
          }
          $ymdhis=date('Y');
              $kodetampil = $ymdhis.$id_prodi.$kode;
        }  
              return $kodetampil;
    }

   function get_usulan_lokasi(){
    $nim=$this->session->userdata('ses_id');
    $cek_kelompok=$this->db->query("SELECT tmst_kelompok.id_usulan,tmst_usulan.id_usulan,tmst_usulan.id_lokasi,tmst_usulan.stat_usulan,tmst_usulan.stat_verifikasi,tm_lokasi.id_lokasi,tm_lokasi.nama_lokasi,tm_lokasi.alamat,tm_lokasi.telp,tm_lokasi.id_kota,tm_lokasi.kode_pos,tm_lokasi.longitude,tm_lokasi.latitude,tm_kota.id_kota,tm_kota.kota
         FROM tmst_usulan INNER JOIN tm_lokasi ON tm_lokasi.id_lokasi=tmst_usulan.id_lokasi INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota INNER JOIN tmst_kelompok ON tmst_kelompok.id_usulan=tmst_usulan.id_usulan
          WHERE tmst_kelompok.NIM_k='$nim' OR tmst_kelompok.NIM_a1='$nim' OR tmst_kelompok.NIM_a2='$nim' OR tmst_kelompok.NIM_a3='$nim' OR tmst_kelompok.NIM_a4='$nim'");

        $cek_usulan=$this->db->query("SELECT tmst_usulan.id_usulan, tmst_usulan.id_lokasi, tmst_usulan.stat_usulan, tmst_usulan.stat_verifikasi, tm_lokasi.id_lokasi,tm_lokasi.nama_lokasi,tm_lokasi.alamat,tm_lokasi.telp,tm_lokasi.id_kota,tm_lokasi.kode_pos,tm_lokasi.longitude,tm_lokasi.latitude,tm_kota.id_kota,tm_kota.kota FROM tmst_usulan INNER JOIN tm_lokasi ON tm_lokasi.id_lokasi=tmst_usulan.id_lokasi INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tmst_usulan.NIM_k='$nim'");
         if($cek_kelompok->num_rows() > 0){      
             return $cek_kelompok;
          }
          else{
           return $cek_usulan;   #$ymdhis=date('YmdHis').rand(100,999);
          }
    }
   function cek_id_usulan_lokasi(){
    $nim=$this->session->userdata('ses_id');
        $cek_usulan=$this->db->query("SELECT tmst_usulan.id_usulan, tmst_usulan.id_lokasi, tmst_usulan.stat_usulan, tmst_usulan.stat_verifikasi, tm_lokasi.id_lokasi,tm_lokasi.nama_lokasi,tm_lokasi.alamat,tm_lokasi.telp,tm_lokasi.id_kota,tm_lokasi.kode_pos,tm_lokasi.longitude,tm_lokasi.latitude,tm_kota.id_kota,tm_kota.kota FROM tmst_usulan INNER JOIN tm_lokasi ON tm_lokasi.id_lokasi=tmst_usulan.id_lokasi INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tmst_usulan.NIM_k='$nim'");
           return $cek_usulan;   #$ymdhis=date('YmdHis').rand(100,999);
    }
//2. Ajukan lokasi PKL
function add_ajukan_lokasi_pkl($id,$lokasi,$tahun,$status_usulan,$status_verifikasi,$NIM_k){
        $hasil=$this->db->query("INSERT INTO tmst_usulan (id_usulan,id_lokasi,id_tahun,stat_usulan,stat_verifikasi,NIM_k)
            VALUES ('$id','$lokasi','$tahun','$status_usulan','$status_verifikasi','$NIM_k')");
        return $hasil;    
}
//3. Ajukan kelompok PKL
   function get_kode_kelompok(){
          $this->db->select('RIGHT(tmst_kelompok.id_kelompok,4) as kode', FALSE);
          $this->db->order_by('id_kelompok','DESC');    
          $this->db->limit(1);       
         $query = $this->db->query("SELECT id_prodi from tm_prodi
WHERE tm_prodi.id_prodi='".$this->session->userdata('ses_prodi')."'");
$usulan=$this->db->query("SELECT MAX(RIGHT(id_kelompok,4)) AS id_kelompok FROM tmst_kelompok");
 foreach($query->result() as $data){
        $prodi = $data->id_prodi;
        $id_prodi=sprintf("%03s", $prodi);
        $kode="";    
          if($usulan->num_rows() > 0){      
             foreach($usulan->result() as $data){
                $id = intval($data->id_kelompok)+1;
                $kode = sprintf("%03s", $id);

            }
          }
          else{
           $kode = strval("001");
          }
          $ymdhis=date('Y');
              $kodetampil = $ymdhis.$id_prodi.$kode;
        }  
              return $kodetampil;
    }
function add_kelompok_pkl($id,$lokasi,$mahasiswa_1,$mahasiswa_2,$mahasiswa_3,$mahasiswa_4,$mahasiswa_5){
        $hasil=$this->db->query("INSERT INTO tmst_kelompok (id_kelompok,id_usulan,NIM_k,NIM_a1,NIM_a2,NIM_a3,NIM_a4)
            VALUES ('$id','$lokasi','$mahasiswa_1','$mahasiswa_2','$mahasiswa_3','$mahasiswa_4','$mahasiswa_5')");
        return $hasil;
    }
//2. query tampil Usulan kelompok
function mahasiswa_1($id){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_k,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_k=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
#WHERE tmst_kelompok.NIM_k='$nim'
#OR tmst_kelompok.NIM_a1='$nim'
#OR tmst_kelompok.NIM_a2='$nim'
#OR tmst_kelompok.NIM_a3='$nim'
#OR tmst_kelompok.NIM_a4='$nim'

         return $hasil->result();
     }
function mahasiswa_2($id){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a1,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a1=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'
#WHERE tmst_kelompok.NIM_k='$nim'
#OR tmst_kelompok.NIM_a1='$nim'
#OR tmst_kelompok.NIM_a2='$nim'
#OR tmst_kelompok.NIM_a3='$nim'
#OR tmst_kelompok.NIM_a4='$nim'
");
         return $hasil->result();
     }
function mahasiswa_3($id){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a2,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a2=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'
#WHERE tmst_kelompok.NIM_k='$nim'
#OR tmst_kelompok.NIM_a1='$nim'
#OR tmst_kelompok.NIM_a2='$nim'
#OR tmst_kelompok.NIM_a3='$nim'
#OR tmst_kelompok.NIM_a4='$nim'
");
         return $hasil->result();
     }
function mahasiswa_4($id){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a3,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a3=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'
#WHERE tmst_kelompok.NIM_k='$nim'
#OR tmst_kelompok.NIM_a1='$nim'
#OR tmst_kelompok.NIM_a2='$nim'
#OR tmst_kelompok.NIM_a3='$nim'
#OR tmst_kelompok.NIM_a4='$nim'
");
         return $hasil->result();
     }
function mahasiswa_5($id){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a4,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a4=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'
#WHERE tmst_kelompok.NIM_k='$nim'
#OR tmst_kelompok.NIM_a1='$nim'
#OR tmst_kelompok.NIM_a2='$nim'
#OR tmst_kelompok.NIM_a3='$nim'
#OR tmst_kelompok.NIM_a4='$nim'
");
         return $hasil->result();
     }

//MAHASISWA USULAN LOKASI BARU
    function get_usulan_lokasi_baru(){
        $query=$this->db->query("SELECT ts_lokasi.id_lok_usul,
            ts_lokasi.nama_lok,
            ts_lokasi.alamat,
            tS_lokasi.telp,
            tS_lokasi.kode_pos,
            tS_lokasi.longitude,
            tS_lokasi.latitude,
            ts_lokasi.NIM_k,
            ts_lokasi.status,
            ts_lokasi.id_kota,
            tm_kota.kota,
            tm_mahasiswa.NIM
            FROM ts_lokasi 
            INNER JOIN tm_kota ON tm_kota.id_kota=ts_lokasi.id_kota
            INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=ts_lokasi.NIM_k
            WHERE ts_lokasi.NIM_k='".$this->session->userdata('ses_id')."'");
        return $query;
    }
        function tambah_usulan_lokasi_baru($nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude,$status){
        $hasil=$this->db->query("INSERT INTO ts_lokasi (nama_lok,alamat,telp,kode_pos,id_kota,longitude,latitude,NIM_k,status)
            VALUES ('$nama','$alamat','$telp','$kode_pos','$kota','$longitude','$latitude','".$this->session->userdata('ses_id')."','$status')");
        return $hasil;
    }
         function get_edit_usulan_lokasi($id){
        $NIM_k=$this->session->userdata('ses_id');
        $query=$this->db->query("SELECT ts_lokasi.id_lok_usul,
            ts_lokasi.nama_lok,
            ts_lokasi.alamat,
            ts_lokasi.telp,
            ts_lokasi.kode_pos,
            ts_lokasi.longitude,
            ts_lokasi.latitude,
            ts_lokasi.NIM_k,
            ts_lokasi.status,
            ts_lokasi.id_kota,
            tm_kota.kota,
            tm_mahasiswa.NIM
            FROM ts_lokasi 
            INNER JOIN tm_kota ON tm_kota.id_kota=ts_lokasi.id_kota
            INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=ts_lokasi.NIM_k
            WHERE ts_lokasi.NIM_k='$NIM_k' AND ts_lokasi.id_lok_usul='$id'");
        return $query->result();
    }
    function update_usulan_lokasi_baru($id,$nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude,$status){
        $hasil=$this->db->query("UPDATE ts_lokasi
        SET nama_lok='$nama',alamat='$alamat',telp='$telp',id_kota='$kota',kode_pos='$kode_pos',longitude='$longitude',latitude='$latitude',
        status='$status'
         WHERE id_lok_usul='$id'");
        return $hasil;
    }
     function delete_lokasi_usulan($id){
        $hasil=$this->db->query("delete from ts_lokasi where id_lok_usul='$id'");
        return $hasil;
    }

//MAHASISWA GENERATE_DOKUMEN
    function get_generate_dokumen(){
        $query=$this->db->query("SELECT ts_lokasi.id_lok_usul,
            ts_lokasi.nama_lok,
            ts_lokasi.alamat,
            tS_lokasi.telp,
            tS_lokasi.kode_pos,
            tS_lokasi.longitude,
            tS_lokasi.latitude,
            ts_lokasi.NIM_k,
            ts_lokasi.status,
            ts_lokasi.id_kota,
            tm_kota.kota,
            tm_mahasiswa.NIM
            FROM ts_lokasi 
            INNER JOIN tm_kota ON tm_kota.id_kota=ts_lokasi.id_kota
            INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=ts_lokasi.NIM_k
            WHERE ts_lokasi.NIM_k='".$this->session->userdata('ses_id')."'");
        return $query;
    }
    function get_dokumen_lembar_pengesahan(){
        $nim=$this->session->userdata('ses_id');
        $cek_kelompok=$this->db->query("SELECT tmst_kelompok.id_usulan,
        tmst_usulan.id_usulan,
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
            INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
            INNER JOIN tmst_kelompok ON tmst_kelompok.id_usulan=tmst_usulan.id_usulan
            WHERE tmst_kelompok.NIM_k='$nim' OR tmst_kelompok.NIM_a1='$nim'
            OR tmst_kelompok.NIM_a2='$nim' OR tmst_kelompok.NIM_a3='$nim'
            OR tmst_kelompok.NIM_a4='$nim' ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");
    
        $cek_status_usulan=$this->db->query("SELECT tmst_usulan.id_usulan, tmst_usulan.id_lokasi, tmst_usulan.stat_usulan, tmst_usulan.stat_verifikasi, tm_lokasi.id_lokasi,tm_lokasi.nama_lokasi,tm_lokasi.alamat,tm_lokasi.telp,tm_lokasi.id_kota,tm_lokasi.kode_pos,tm_lokasi.longitude,tm_lokasi.latitude,tm_kota.id_kota,tm_kota.kota
    FROM tmst_usulan
    INNER JOIN tm_lokasi ON tm_lokasi.id_lokasi=tmst_usulan.id_lokasi
    INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
    INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
    WHERE tmst_usulan.NIM_k='$nim' ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");
    
            if($cek_kelompok->num_rows() > 0){      
                 return $cek_kelompok;
              }
              else{
               return $cek_status_usulan;   #$ymdhis=date('YmdHis').rand(100,999);
              }
        }
function dokumen_mahasiswa_1(){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_k,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_k=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
      WHERE tmst_kelompok.NIM_k='$nim'
      OR tmst_kelompok.NIM_a1='$nim'
      OR tmst_kelompok.NIM_a2='$nim'
      OR tmst_kelompok.NIM_a3='$nim'
      OR tmst_kelompok.NIM_a4='$nim'
      ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");

         return $hasil->result();
     }
function dokumen_mahasiswa_2(){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a1,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a1=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.NIM_k='$nim'
      OR tmst_kelompok.NIM_a1='$nim'
      OR tmst_kelompok.NIM_a2='$nim'
      OR tmst_kelompok.NIM_a3='$nim'
      OR tmst_kelompok.NIM_a4='$nim'
      ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");
         return $hasil->result();
     }
function dokumen_mahasiswa_3(){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a2,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a2=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.NIM_k='$nim'
      OR tmst_kelompok.NIM_a1='$nim'
      OR tmst_kelompok.NIM_a2='$nim'
      OR tmst_kelompok.NIM_a3='$nim'
      OR tmst_kelompok.NIM_a4='$nim'
      ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");
         return $hasil->result();
     }
function dokumen_mahasiswa_4(){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a3,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a3=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.NIM_k='$nim'
      OR tmst_kelompok.NIM_a1='$nim'
      OR tmst_kelompok.NIM_a2='$nim'
      OR tmst_kelompok.NIM_a3='$nim'
      OR tmst_kelompok.NIM_a4='$nim'
      ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");
         return $hasil->result();
     }
function dokumen_mahasiswa_5(){
    $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a4,
         tmst_kelompok.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a4=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.NIM_k='$nim'
      OR tmst_kelompok.NIM_a1='$nim'
      OR tmst_kelompok.NIM_a2='$nim'
      OR tmst_kelompok.NIM_a3='$nim'
      OR tmst_kelompok.NIM_a4='$nim'
      ORDER BY tmst_usulan.id_usulan DESC LIMIT 1");
         return $hasil->result();
     }



#KORBID PKL
#MENU PKL
//1. VERIFIKASI LOKASI DAN KELOMPOK LANGSUNG
function get_usulan_lokasi_korbid(){
        $query=$this->db->query("SELECT tmst_usulan.id_usulan,
tmst_usulan.id_lokasi,
tmst_usulan.stat_usulan,
tmst_usulan.stat_verifikasi,
tmst_usulan.NIM_k,
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
INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tm_mahasiswa.id_prodi='".$this->session->userdata('ses_prodi')."'");
return $query;
    }
function kelompok_mahasiswa_1_korbid($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_k,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_k=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function kelompok_mahasiswa_2_korbid($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a1,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a1=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function kelompok_mahasiswa_3_korbid($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a2,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a2=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function kelompok_mahasiswa_4_korbid($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a3,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a3=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function kelompok_mahasiswa_5_korbid($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a3,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a4=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function get_verifikasi_lokasi_mahasiswa($id){
        $hasil=$this->db->query("UPDATE tmst_usulan
        SET stat_usulan='2' where id_usulan='$id'");
        return $hasil;
    }
function get_tolak_lokasi_mahasiswa($id){
        $hasil=$this->db->query("UPDATE tmst_usulan
        SET stat_usulan='3' WHERE id_usulan='$id'");
        return $hasil;
    }
//2. VERIFIKASI USULAN LOKASI
    function get_verifikasi_usulan_lokasi_baru(){
        $query=$this->db->query("SELECT ts_lokasi.id_lok_usul,
            ts_lokasi.nama_lok,
            ts_lokasi.alamat,
            tS_lokasi.telp,
            tS_lokasi.kode_pos,
            tS_lokasi.longitude,
            tS_lokasi.latitude,
            ts_lokasi.NIM_k,
            ts_lokasi.status,
            ts_lokasi.id_kota,
            tm_kota.kota,
            tm_mahasiswa.NIM
            FROM ts_lokasi 
            INNER JOIN tm_kota ON tm_kota.id_kota=ts_lokasi.id_kota
            INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=ts_lokasi.NIM_k
            WHERE tm_mahasiswa.id_prodi='".$this->session->userdata('ses_prodi')."'");
        return $query;
    }




    function verifikasi_usulan_lokasi_baru($id,$nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude,$status){
        $hasil=$this->db->query("UPDATE ts_lokasi
        SET nama_lok='$nama',alamat='$alamat',telp='$telp',id_kota='$kota',kode_pos='$kode_pos',longitude='$longitude',latitude='$latitude',
        status='$status' WHERE id_lok_usul='$id'");
        return $hasil;
    }
    function pindah_tabel_usulan_lokasi_baru($nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude){
        $hasil=$this->db->query("INSERT INTO tm_lokasi (nama_lokasi,alamat,telp,kode_pos,id_kota,longitude,latitude)
            VALUES ('$nama','$alamat','$telp','$kode_pos','$kota','$longitude','$latitude')");
        return $hasil;
    }
    function tolak_usulan_lokasi_baru($id,$nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude,$status){
        $hasil=$this->db->query("UPDATE ts_lokasi
        SET nama_lok='$nama',alamat='$alamat',telp='$telp',id_kota='$kota',kode_pos='$kode_pos',longitude='$longitude',latitude='$latitude',
        status='$status' WHERE id_lok_usul='$id'");
        return $hasil;
    }




//ADMIN PRODI

function get_usulan_lokasi_adminprodi(){
        $query=$this->db->query("SELECT tmst_usulan.id_usulan,
tmst_usulan.id_lokasi,
tmst_usulan.stat_usulan,
tmst_usulan.stat_verifikasi,
tmst_usulan.NIM_k,
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
INNER JOIN tm_kota ON tm_kota.id_kota=tm_lokasi.id_kota
INNER JOIN tm_mahasiswa ON tm_mahasiswa.NIM=tmst_usulan.NIM_k
WHERE tm_mahasiswa.id_prodi='".$this->session->userdata('ses_prodi')."'");
return $query;
    }
function kelompok_mahasiswa_1_adminprodi($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_k,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_k=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function kelompok_mahasiswa_2_adminprodi($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a1,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a1=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function kelompok_mahasiswa_3_adminprodi($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a2,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a2=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function kelompok_mahasiswa_4_adminprodi($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a3,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a3=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function kelompok_mahasiswa_5_adminprodi($id){
        $hasil=$this->db->query("SELECT tm_mahasiswa.NIM,
         tm_mahasiswa.nama_mhs,
         tm_mahasiswa.telp,
         tm_prodi.nama_prodi,
         tm_angkatan.angkatan,
         tmst_kelompok.NIM_a3,
         tmst_usulan.id_usulan
         FROM tm_mahasiswa
         INNER JOIN tm_prodi ON tm_prodi.id_prodi=tm_mahasiswa.id_prodi
         INNER JOIN tm_angkatan ON tm_angkatan.id_angkatan=tm_mahasiswa.id_angkatan
         INNER JOIN tmst_kelompok ON tmst_kelompok.NIM_a4=tm_mahasiswa.NIM
         INNER JOIN tmst_usulan ON tmst_usulan.id_usulan=tmst_kelompok.id_usulan
         WHERE tmst_kelompok.id_usulan='$id'");
         return $hasil->result();
     }
function get_verifikasi_lokasi_adminprodi($id){
        $hasil=$this->db->query("UPDATE tmst_usulan
        SET stat_verifikasi='2' where id_usulan='$id'");
        return $hasil;
    }
    function get_profile_mahasiswa(){
        $nim=$this->session->userdata('ses_id');
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
    function get_update_password_mahasiswa(){
        $nim=$this->session->userdata('ses_id');
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
    function update_password($password){
        $nim=$this->session->userdata('ses_id');
        $hasil=$this->db->query("UPDATE tm_mahasiswa
        SET password='$password' WHERE NIM='$nim'");
        return $hasil;
    }
 }
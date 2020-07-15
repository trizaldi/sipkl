<?php
class Mahasiswa extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	$this->load->model('M_lokasi');
	$this->load->model('M_kota');
	$this->load->model('M_mahasiswa');
	$this->load->model('M_prodi');
  }
public function index(){
	if($this->session->userdata('akses')=='1'){
		$isi['content'] ='layout/v_dashboard';
		$isi['judul']	='Dashboard';
		$isi['sub_judul']='Menu Mahasiswa';
		$this->load->view('layout/v_template',$isi);
	}else{
     $url=base_url();
	 redirect($url);
    }
	}
//	
public function tampil_lokasi(){
	if($this->session->userdata('akses')=='1'){
     	$isi['data']		=$this->M_lokasi->get_lokasi();
		$isi['content'] 	='mahasiswa/v_tampil_lokasi_mahasiswa';
		$isi['judul']		='Data Lokasi Tersedia';
		$isi['sub_judul']	='Menu lokasi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$isi['nama_kota']	=$this->M_kota->get_kota();
		$isi['content'] 	='mahasiswa/v_tambah_lokasi_mahasiswa';
		$isi['judul']		='Lokasi';
		$isi['sub_judul']	='Menu Tambah Lokasi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$nama				=$this->input->post("nama");
		$alamat				=$this->input->post("alamat");
		$telp				=$this->input->post("telp");
		$kota				=$this->input->post("kota");
		$kode_pos			=$this->input->post("kode_pos");
		$longitude			=$this->input->post("longitude");
		$latitude			=$this->input->post("latitude");				
		$this->M_mahasiswa->add($nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude);
		redirect("Mahasiswa/tampil_lokasi");
		}else{
            $url=base_url();
			redirect($url);
    }
}//
// Master pengajuan PKL langsung
//1. Pengajuan Lokasi
public function daftar_pkl_langsung(){
	if($this->session->userdata('akses')=='1'){
     	$isi['data']				=$this->M_lokasi->get_lokasi();
     	$isi['data_mahasiswa']		=$this->M_mahasiswa->get_mahasiswa();
     	$isi['data_usulan_lokasi']	=$this->M_mahasiswa->get_usulan_lokasi();
     	$isi['data_mahasiswa_1']	=$this->M_mahasiswa->mahasiswa_1();
     	$isi['data_mahasiswa_2']	=$this->M_mahasiswa->mahasiswa_2();
     	$isi['data_mahasiswa_3']	=$this->M_mahasiswa->mahasiswa_3();
     	$isi['data_mahasiswa_4']	=$this->M_mahasiswa->mahasiswa_4();
     	$isi['data_mahasiswa_5']	=$this->M_mahasiswa->mahasiswa_5();
     	$isi['content'] 			='mahasiswa/v_tampil_daftar_pkl_mahasiswa';
		$isi['judul']				='Data Lokasi Tersedia';
		$isi['sub_judul']			='Menu lokasi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
	function find_lokasi(){
		$id=$this->input->post('id');
		$data=$this->M_mahasiswa->get_lokasi($id);
		echo json_encode($data);
	}
function insert_ajukan_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$status_usulan				='1';
		$status_verifikasi			='1';
		$lokasi						=$this->input->post("lokasi");
		$tahun						=$this->input->post("tahun");
				
		$this->M_mahasiswa->add_ajukan_lokasi_pkl($lokasi,$tahun,$status_usulan,$status_verifikasi);
		redirect("Mahasiswa/daftar_pkl_langsung");
		}else{
            $url=base_url();
			redirect($url);
    }
}
public function tambah_lokasi_mahasiswa(){
	if($this->session->userdata('akses')=='1'){
     	$isi['data']		=$this->M_kota->get_kota();
     	$isi['data_prodi']		=$this->M_prodi->get_prodi();
     	$isi['data_angkatan']		=$this->M_mahasiswa->get_angkatan();
		$isi['content'] 	='mahasiswa/v_daftar_tambah_lokasi_mahasiswa';
		$isi['judul']		='Data Lokasi Tersedia';
		$isi['sub_judul']	='Menu lokasi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
// 2. Ajukan kelompok PKL
public function tambah_kelompok_mahasiswa(){
	if($this->session->userdata('akses')=='1'){
     	$isi['data_prodi']			=$this->M_prodi->get_prodi();
     	$isi['data_angkatan']		=$this->M_mahasiswa->get_angkatan();
		$isi['content'] 			='mahasiswa/v_daftar_tambah_kelompok_mahasiswa';
		$isi['judul']				='Isi Data Kelompok';
		$isi['sub_judul']			='Ajukan Kelompok';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function proses_daftar_mahasiswa(){
	if($this->session->userdata('akses')=='1'){
		$isi['content'] 			='mahasiswa/v_tampil_mahasiswa';
		$isi['judul']				='Isi Data Kelompok';
		$isi['sub_judul']			='Ajukan Kelompok';
		if(isset($_POST['Submit'])) {
			$prodi 	  = $_POST['prodi'];
			$angkatan = $_POST['angkatan'];
			#$prodi					=$this->input->post("prodi");
			#$angkatan				=$this->input->post("angkatan");
			$isi['data_mahasiswa']	=$this->M_mahasiswa->get_mahasiswa_prodi($prodi,$angkatan);

		$this->load->view('layout/v_template',$isi);
		}
		else{
            $url=base_url();
			redirect($url);
    }
}
}
function daftar_mahasiswa(){
	if($this->session->userdata('akses')=='1'){
		$prodi						=$this->input->post("prodi");
		$angkatan					=$this->input->post("angkatan");
		$isi['data_mahasiswa']		=$this->M_mahasiswa->get_mahasiswa_prodi($prodi,$angkatan);
		$isi['content'] 			='mahasiswa/v_tampil_mahasiswa';
		$isi['judul']				='Isi Data Kelompok';
		$isi['sub_judul']			='Ajukan Kelompok';
		$this->load->view('layout/v_template',$isi);
		redirect("Mahasiswa/tampil_lokasi");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function insert_usulan_kelompok(){
	if($this->session->userdata('akses')=='1'){
		$mahasiswa_1				=$this->input->post("mahasiswa_1");
		$mahasiswa_2				=$this->input->post("mahasiswa_2");
		$mahasiswa_3				=$this->input->post("mahasiswa_3");
		$mahasiswa_4				=$this->input->post("mahasiswa_4");
		$mahasiswa_5				=$this->input->post("mahasiswa_5");
		$this->M_mahasiswa->add_kelompok_pkl($mahasiswa_1,$mahasiswa_2,$mahasiswa_3,$mahasiswa_4,$mahasiswa_5);
		redirect("Mahasiswa/daftar_pkl_langsung");
		}else{
            $url=base_url();
			redirect($url);
    }
}
/*	function find_mahasiswa(){
		$id=$this->input->post('id_prodi');
		$id_tahun=$this->input->post('id_tahun');
		$data=$this->M_mahasiswa->get_mahasiswa_prodi($id,$id_tahun);
		echo json_encode($data);
	}
function insert_usulan_kelompok(){
	if($this->session->userdata('akses')=='1'){
		$status_usulan				='usulan';
		$status_verifikasi			='belum verifikasikasi';
		$lokasi						=$this->input->post("lokasi");
		$mahasiswa_1				=$this->input->post("mahasiswa_1");
		$mahasiswa_2				=$this->input->post("mahasiswa_2");
		$mahasiswa_3				=$this->input->post("mahasiswa_3");
		$mahasiswa_4				=$this->input->post("mahasiswa_4");
		$mahasiswa_5				=$this->input->post("mahasiswa_5");
				
		$this->M_mahasiswa->add_kelompok_pkl($mahasiswa_1,$mahasiswa_2,$mahasiswa_3,$mahasiswa_4,$mahasiswa_5);
		redirect("Mahasiswa/daftar_pkl_langsung");
		}else{
            $url=base_url();
			redirect($url);
    }
}*/

}
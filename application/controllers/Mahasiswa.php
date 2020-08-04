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
     	
     	#Mahasiswa_bisa/tidak mengajukan data bila ada di tabel kelompok
     	$isi['data_akses_mahasiswa']	=$this->M_mahasiswa->get_akses_mahasiswa();

     	$isi['data_usulan_lokasi']	=$this->M_mahasiswa->get_usulan_lokasi();

     	$isi['data']			=$this->M_kota->get_kota();
     	$isi['data_prodi']		=$this->M_prodi->get_prodi();
     	$isi['data_angkatan']		=$this->M_mahasiswa->get_angkatan();     	
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
public function tambah_lokasi_mahasiswa(){
	if($this->session->userdata('akses')=='1'){
     	$isi['data']		=$this->M_kota->get_kota();
     	$isi['data_prodi']		=$this->M_prodi->get_prodi();
     	$isi['data_angkatan']		=$this->M_mahasiswa->get_angkatan();
     	$isi['kode_usulan']				=$this->M_mahasiswa->get_kode_usulan();
		$isi['content'] 	='mahasiswa/v_daftar_tambah_lokasi_mahasiswa';
		$isi['judul']		='Data Lokasi Tersedia';
		$isi['sub_judul']	='Menu lokasi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function insert_ajukan_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$status_usulan				='1';
		$status_verifikasi			='1';
		$id						=$this->input->post("id");
		$lokasi						=$this->input->post("lokasi");
		$tahun						=$this->input->post("tahun");
		$NIM_k						=$this->input->post("nim_k");				
		$this->M_mahasiswa->add_ajukan_lokasi_pkl($id,$lokasi,$tahun,$status_usulan,$status_verifikasi,$NIM_k);
		redirect("Mahasiswa/daftar_pkl_langsung");
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
     	$isi['data_mahasiswa']	=$this->M_mahasiswa->get_mahasiswa_prodi();
     	$isi['data_usulan_lokasi']	=$this->M_mahasiswa->get_usulan_lokasi();
		$isi['kode_kelompok']				=$this->M_mahasiswa->get_kode_kelompok();
		$isi['content'] 			='mahasiswa/v_daftar_tambah_kelompok_mahasiswa';
		$isi['judul']				='Isi Data Kelompok';
		$isi['sub_judul']			='Ajukan Kelompok';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
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
		$id						=$this->input->post("id");
		$lokasi						=$this->input->post("id_lokasi");
		$mahasiswa_1				=$this->input->post("mahasiswa_1");
		$mahasiswa_2				=$this->input->post("mahasiswa_2");
		$mahasiswa_3				=$this->input->post("mahasiswa_3");
		$mahasiswa_4				=$this->input->post("mahasiswa_4");
		$mahasiswa_5				=$this->input->post("mahasiswa_5");
		$this->M_mahasiswa->add_kelompok_pkl($id,$lokasi,$mahasiswa_1,$mahasiswa_2,$mahasiswa_3,$mahasiswa_4,$mahasiswa_5);
		redirect("Mahasiswa/daftar_pkl_langsung");
		}else{
            $url=base_url();
			redirect($url);
    }
}
	function find_mahasiswa(){
		$id=$this->input->post('id');
		$data=$this->M_mahasiswa->get_mahasiswa_angkatan($id);
		echo json_encode($data);
	}


//MAHASISWA USULAN LOKASI BARU
public function tampil_usulan_lokasi(){
	if($this->session->userdata('akses')=='1'){
     	$isi['data']		=$this->M_mahasiswa->get_usulan_lokasi_baru();
		$isi['content'] 	='mahasiswa/v_tampil_usulan_lokasi_baru_mahasiswa';
		$isi['judul']		='Usulan Lokasi Baru';
		$isi['sub_judul']	='Menu PKL';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_usulan_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$isi['nama_kota']	=$this->M_kota->get_kota();
		$isi['content'] 	='Mahasiswa/v_tambah_usulan_lokasi_baru_mahasiswa';
		$isi['judul']		='Usulan Lokasi Baru';
		$isi['sub_judul']	='Menu PKL';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_usulan_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$nama				=$this->input->post("nama");
		$alamat				=$this->input->post("alamat");
		$telp				=$this->input->post("telp");
		$kota				=$this->input->post("kota");
		$kode_pos			=$this->input->post("kode_pos");
		$longitude			=$this->input->post("longitude");
		$latitude			=$this->input->post("latitude");
		$status 			='1';				
		$this->M_mahasiswa->tambah_usulan_lokasi_baru($nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude,$status);
		redirect("Mahasiswa/tampil_usulan_lokasi");
		}else{
            $url=base_url();
			redirect($url);
    }
}

function edit_usulan_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$id =$this->uri->segment(3);
		$isi['data_edit_lokasi']		=$this->M_mahasiswa->get_edit_usulan_lokasi($id);
		$isi['nama_kota']				=$this->M_lokasi->get_kota();
		$isi['content'] 				='mahasiswa/v_edit_lokasi_usul_mahasiswa';
		$isi['judul']					='Lokasi';
		$isi['sub_judul']				='Menu Edit Lokasi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_usulan_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$id					=$this->input->post("id");
		$nama				=$this->input->post("nama");
		$alamat				=$this->input->post("alamat");
		$telp				=$this->input->post("telp");
		$kota				=$this->input->post("kota");		
		$kode_pos			=$this->input->post("kode_pos");
		$longitude			=$this->input->post("longitude");
		$latitude			=$this->input->post("latitude");				
		$status 			='1';				
		$this->M_mahasiswa->update_usulan_lokasi_baru($id,$nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude,$status);
		redirect("Mahasiswa/tampil_usulan_lokasi");
		}else{
            $url=base_url();
			redirect($url);;
    }
	}	
function delete_usulan_lokasi(){
	if($this->session->userdata('akses')=='1'){
		$id=$this->input->post('id');
		$this->M_mahasiswa->delete_lokasi_usulan($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Mahasiswa/tampil_usulan_lokasi');
	}else{
            $url=base_url();
			redirect($url);
    }
	}
//MAHASISWA CETAK DOKUMEN
public function tampil_cetak_dokumen(){
	if($this->session->userdata('akses')=='1'){
     	$isi['data']		=$this->M_mahasiswa->get_usulan_lokasi_baru();
		$isi['content'] 	='mahasiswa/v_tampil_cetak_dokumen_mahasiswa';
		$isi['judul']		='Cetak Dokumen';
		$isi['sub_judul']	='Menu PKL';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
}
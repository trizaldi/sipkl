<?php
class Korbidpkl extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('M_lokasi');
		$this->load->model('M_kota');
		$this->load->model('M_mahasiswa');
  }
public function index(){
	if($this->session->userdata('akses')=='2'){
		$isi['content'] 	='korbidpkl/v_dashboard_korbidpkl';
		$isi['judul']		='Dashboard';
		$isi['sub_judul']	='Pelajaran';
		$this->load->view('layout/v_template',$isi);
	}else{
     $url=base_url();
	 redirect($url);
    }
}
//Master Lokasi
public function tampil_lokasi(){
	if($this->session->userdata('akses')=='2'){
     	$isi['data']		=$this->M_lokasi->get_lokasi();
		$isi['content'] 	='korbidpkl/v_tampil_lokasi';
		$isi['judul']		='Lokasi';
		$isi['sub_judul']	='Menu lokasi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_lokasi(){
	if($this->session->userdata('akses')=='2'){
		$isi['nama_kota']	=$this->M_kota->get_kota();
		$isi['content'] 	='korbidpkl/v_tambah_lokasi';
		$isi['judul']		='Lokasi';
		$isi['sub_judul']	='Menu Tambah Lokasi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_lokasi(){
	if($this->session->userdata('akses')=='2'){
		$nama				=$this->input->post("nama");
		$alamat				=$this->input->post("alamat");
		$telp				=$this->input->post("telp");
		$kota				=$this->input->post("kota");
		$kode_pos			=$this->input->post("kode_pos");
		$longitude			=$this->input->post("longitude");
		$latitude			=$this->input->post("latitude");				
		$this->M_lokasi->add($nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude);
		redirect("Korbidpkl/tampil_lokasi");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_lokasi(){
	if($this->session->userdata('akses')=='2'){
		$id =$this->uri->segment(3);
		$isi['data_edit_lokasi']		=$this->M_lokasi->get_edit_lokasi($id);
		$isi['nama_kota']				=$this->M_lokasi->get_kota();
		$isi['content'] 				='korbidpkl/v_edit_lokasi';
		$isi['judul']					='Lokasi';
		$isi['sub_judul']				='Menu Edit Lokasi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_lokasi(){
	if($this->session->userdata('akses')=='2'){
		$id					=$this->input->post("id");
		$nama				=$this->input->post("nama");
		$alamat				=$this->input->post("alamat");
		$telp				=$this->input->post("telp");
		$kota				=$this->input->post("kota");		
		$kode_pos			=$this->input->post("kode_pos");
		$longitude			=$this->input->post("longitude");
		$latitude			=$this->input->post("latitude");				
		$this->M_lokasi->update_lokasi($id,$nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude);
		redirect("Korbidpkl/tampil_lokasi");
		}else{
            $url=base_url();
			redirect($url);;
    }
	}	
function delete_lokasi(){
	if($this->session->userdata('akses')=='2'){
		$id=$this->input->post('id');
		$this->M_lokasi->delete_lokasi($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Korbidpkl/v_tampil_lokasi');
	}else{
            $url=base_url();
			redirect($url);
    }
	}
public function data_pengajuan_pkl(){
	if($this->session->userdata('akses')=='2'){
     	$isi['data']				=$this->M_lokasi->get_lokasi();
     	$isi['data_mahasiswa']		=$this->M_mahasiswa->get_mahasiswa();
     	$isi['data_usulan_lokasi']	=$this->M_mahasiswa->get_usulan_lokasi_korbid();
     	$isi['data_angkatan']		=$this->M_mahasiswa->get_angkatan();
     	$id=$this->input->post("id");     	
     	$isi['data_mahasiswa_1']	=$this->M_mahasiswa->kelompok_mahasiswa_1_korbid($id);
     	$isi['data_mahasiswa_2']	=$this->M_mahasiswa->kelompok_mahasiswa_2_korbid($id);
     	$isi['data_mahasiswa_3']	=$this->M_mahasiswa->kelompok_mahasiswa_3_korbid($id);
     	$isi['data_mahasiswa_4']	=$this->M_mahasiswa->kelompok_mahasiswa_4_korbid($id);
     	$isi['data_mahasiswa_5']	=$this->M_mahasiswa->kelompok_mahasiswa_5_korbid($id);
     	$isi['content'] 			='korbidpkl/v_tampil_ajuan_pkl_mahasiswa';
		$isi['judul']				='Data Lokasi Tersedia';
		$isi['sub_judul']			='Menu lokasi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function find_kelompok_mahasiswa_1(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_1_korbid($id);
    echo json_encode($data); 
}
function find_kelompok_mahasiswa_2(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_2_korbid($id);
    echo json_encode($data); 
}
function find_kelompok_mahasiswa_3(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_3_korbid($id);
    echo json_encode($data); 
}
function find_kelompok_mahasiswa_4(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_4_korbid($id);
    echo json_encode($data); 
}
function find_kelompok_mahasiswa_5(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_5_korbid($id);
    echo json_encode($data); 
}
function verifikasi_lokasi(){
	if($this->session->userdata('akses')=='2'){
		$id =$this->uri->segment(3);
		$this->M_mahasiswa->get_verifikasi_lokasi_mahasiswa($id);
		redirect('Korbidpkl/data_pengajuan_pkl');
		}else{
            $url=base_url();
			redirect($url);
    }
	}

}
<?php
class Adminprodi extends CI_Controller {
  function __construct(){
    parent::__construct();

    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
		$this->load->model('M_lokasi');
		$this->load->model('M_mahasiswa');
		$this->load->model('M_kajur_kaprodi');
		$this->load->model('M_matkul');
		$this->load->model('M_pegawai');
		$this->load->model('M_grafik');
  }
public function index(){
	if($this->session->userdata('akses')=='3'){
	$isi['total_usulan_pkl_diverifikasi_setuju']		=$this->M_grafik->get_grafik_total_usulan_verifikasi_setuju();
	$isi['total_usulan_pkl_belum_diverifikasi']		=$this->M_grafik->get_grafik_total_usulan_verifikasi();
		$isi['content'] 	='adminprodi/v_dashboard_adminprodi';
		$isi['judul']		='Dashboard';
		$isi['sub_judul']	='AdminProdi';
		$this->load->view('layout/v_template',$isi);
	}else{
	$url=base_url();
	redirect($url);
}
}
//Master Lokasi
public function tampil_lokasi(){
	if($this->session->userdata('akses')=='3'){
     	$isi['data']		=$this->M_lokasi->get_lokasi();
		$isi['content'] 	='adminprodi/v_adminprodi_tampil_lokasi';
		$isi['judul']		='Data Lokasi';
		$isi['sub_judul']	='Menu lokasi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function edit_lokasi(){
	if($this->session->userdata('akses')=='3'){
		$id =$this->uri->segment(3);
		$isi['data_edit_lokasi']		=$this->M_lokasi->get_edit_lokasi($id);
		$isi['nama_kota']				=$this->M_lokasi->get_kota();
		$isi['content'] 				='adminprodi/v_adminprodi_edit_lokasi';
		$isi['judul']					='Lokasi';
		$isi['sub_judul']				='Menu Edit Lokasi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_lokasi(){
	if($this->session->userdata('akses')=='3'){
		$id					=$this->input->post("id");
		$nama				=$this->input->post("nama");
		$alamat				=$this->input->post("alamat");
		$telp				=$this->input->post("telp");
		$kota				=$this->input->post("kota");		
		$kode_pos			=$this->input->post("kode_pos");
		$longitude			=$this->input->post("longitude");
		$latitude			=$this->input->post("latitude");				
		$this->M_lokasi->update_lokasi($id,$nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude);
		redirect("Adminprodi/tampil_lokasi");
		}else{
            $url=base_url();
			redirect($url);;
    }
	}

//MAHASISWA CETAK DOKUMEN
public function tampil_cetak_dokumen(){
	if($this->session->userdata('akses')=='3'){
		$isi['data_akses_mahasiswa']	=$this->M_mahasiswa->get_akses_mahasiswa();#Mahasiswa_bisa/tidak mengajukan data bila ada di tabel kelompok
     	$cek_status=$this->M_mahasiswa->get_akses_mahasiswa();
     	$data=$cek_status->row_array();
     	$this->session->set_userdata('ses_status',$data['stat_usulan']);
     	$this->session->set_userdata('ses_status_verifikasi',$data['stat_verifikasi']);
     	$isi['data']		=$this->M_mahasiswa->get_usulan_lokasi_baru();
		$isi['content'] 	='adminprodi/v_adminprodi_tampil_cetak_dokumen';
		$isi['judul']		='Cetak Dokumen';
		$isi['sub_judul']	='Menu PKL';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
//
public function data_pengajuan_pkl(){
	if($this->session->userdata('akses')=='3'){
     	#$isi['data']				=$this->M_lokasi->get_lokasi();
     	#$isi['data_mahasiswa']		=$this->M_mahasiswa->get_mahasiswa();
     	$isi['data_usulan_lokasi']	=$this->M_mahasiswa->get_usulan_lokasi_adminprodi();
     	#$isi['data_angkatan']		=$this->M_mahasiswa->get_angkatan();
     	$id=$this->input->post("id");     	
     	$isi['data_mahasiswa_1']	=$this->M_mahasiswa->kelompok_mahasiswa_1_adminprodi($id);
     	$isi['data_mahasiswa_2']	=$this->M_mahasiswa->kelompok_mahasiswa_2_adminprodi($id);
     	$isi['data_mahasiswa_3']	=$this->M_mahasiswa->kelompok_mahasiswa_3_adminprodi($id);
     	$isi['data_mahasiswa_4']	=$this->M_mahasiswa->kelompok_mahasiswa_4_adminprodi($id);
     	$isi['data_mahasiswa_5']	=$this->M_mahasiswa->kelompok_mahasiswa_5_adminprodi($id);
     	$isi['content'] 			='adminprodi/v_adminprodi_tampil_ajuan_pkl_mahasiswa';
		$isi['judul']				='Data Ajuan PKL Mahasiswa';
		$isi['sub_judul']			='Menu PKL';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function find_kelompok_mahasiswa_1(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_1_adminprodi($id);
    echo json_encode($data); 
}
function find_kelompok_mahasiswa_2(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_2_adminprodi($id);
    echo json_encode($data); 
}
function find_kelompok_mahasiswa_3(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_3_adminprodi($id);
    echo json_encode($data); 
}
function find_kelompok_mahasiswa_4(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_4_adminprodi($id);
    echo json_encode($data); 
}
function find_kelompok_mahasiswa_5(){
	$id = $this->input->post('id');
    $data = $this->M_mahasiswa->kelompok_mahasiswa_5_adminprodi($id);
    echo json_encode($data); 
}
function verifikasi_lokasi(){
	if($this->session->userdata('akses')=='3'){
		$id =$this->uri->segment(3);
		$this->M_mahasiswa->get_verifikasi_lokasi_adminprodi($id);
		redirect('Adminprodi/data_pengajuan_pkl');
		}else{
            $url=base_url();
			redirect($url);
    }
	}

//Master Kajur Kaprodi
public function tampil_ttd(){
	if($this->session->userdata('akses')=='3'){
     	$isi['data']		=$this->M_kajur_kaprodi->get_ttd();
		$isi['content'] 	='adminprodi/v_tampil_kajur_kaprodi';
		$isi['judul']		='Data Kajur dan Kaprodi';
		$isi['sub_judul']	='Menu master';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_ttd(){
	if($this->session->userdata('akses')=='4'){
		$isi['data_pegawai']	=$this->M_kajur_kaprodi->get_pegawai();
		$isi['data_prodi']	=$this->M_kajur_kaprodi->get_prodi();
		$isi['content'] 	='adminprodi/v_tambah_kajur_kaprodi';
		$isi['judul']		='Tambah';
		$isi['sub_judul']	='Menu Tambah Kajur dan Kaprodi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}

	function insert_ttd(){
		if($this->session->userdata('akses')=='3'){
			$prodi				=$this->input->post("prodi");
			$kajur				=$this->input->post("kajur");
			$kaprodi			=$this->input->post("kaprodi");
			$korbidpkl			=$this->input->post("korbidpkl");
			$this->M_kajur_kaprodi->add($prodi,$kajur,$kaprodi,$korbidpkl);
			redirect("Admin/tampil_ttd");
			}else{
				$url=base_url();
				redirect($url);
		}
	}
	function edit_ttd(){
		if($this->session->userdata('akses')=='3'){
			$id =$this->uri->segment(3);
			$isi['data_pegawai']			=$this->M_kajur_kaprodi->get_pegawai();
			$isi['data_prodi']				=$this->M_kajur_kaprodi->get_prodi();
			$isi['data_edit_ttd']			=$this->M_kajur_kaprodi->get_edit_ttd($id);
			$isi['content'] 				='adminprodi/v_edit_kajur_kaprodi';
			$isi['judul']					='Tahun';
			$isi['sub_judul']				='Menu Edit Tahun';
			$this->load->view('layout/v_template',$isi);
			}else{
				$url=base_url();
				redirect($url);
		}
		}
	public function update_ttd(){
		if($this->session->userdata('akses')=='3'){
			$id					=$this->input->post("id");
			$prodi				=$this->input->post("prodi");
			$kajur				=$this->input->post("kajur");
			$kaprodi			=$this->input->post("kaprodi");
			$korbidpkl			=$this->input->post("korbidpkl");
			$this->M_kajur_kaprodi->update_ttd($id,$prodi,$kajur,$kaprodi,$korbidpkl);
			redirect("Adminprodi/tampil_ttd");
			}else{
				$url=base_url();
				redirect($url);
		}
		}	
	function delete_ttd(){
		if($this->session->userdata('akses')=='3'){
			$id=$this->input->post('id');
			$this->M_tahun->delete_ttd($id);
			
			echo $this->session->set_flashdata('msg','success-hapus');
			redirect('Adminprodi/tampil_ttd');
		}else{
				$url=base_url();
				redirect($url);
		}
		}
//Master MATKUL
public function tampil_matkul(){
	if($this->session->userdata('akses')=='3'){
		 $isi['data_matkul']		=$this->M_matkul->get_matkul();
	//	 $isi['matkul_total']		=$this->M_matkul->total_matkul();
		$isi['content'] 	='adminprodi/v_adminprodi_tampil_matkul';
		$isi['judul']		='Data Mata Kuliah';
		$isi['sub_judul']	='Menu Mata Kuliah';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
public function tampilkan_matkul(){
	if($this->session->userdata('akses')=='3'){
		$id					=$this->input->post("id");				
		$this->M_matkul->view_matkul($id);
		redirect("Adminprodi/tampil_matkul");
		}else{
            $url=base_url();
			redirect($url);;
    }
	}
	public function tidak_tampil_matkul(){
		if($this->session->userdata('akses')=='3'){
			$id					=$this->input->post("id");				
			$this->M_matkul->tidak_tampilkan_matkul($id);
			redirect("Adminprodi/tampil_matkul");
			}else{
				$url=base_url();
				redirect($url);;
		}
		}
		public function tampil_total_matkul(){
	//		if($this->session->userdata('akses')=='3'){
		$id = $this->input->post('id');	
				$data=$this->M_matkul->total_matkul($id);
				echo json_encode($data);
	//			}else{
	//				$url=base_url();
	//				redirect($url);;
	//		}
			}
			public function Profile(){
				if($this->session->userdata('akses')=='3'){
					 $isi['data_pegawai']		=$this->M_pegawai->get_profile_pegawai();
					$isi['content'] 	='adminprodi/v_tampil_profile';
					$isi['judul']		='Data User';
					$isi['sub_judul']	='Menu User';
					$this->load->view('layout/v_template',$isi);
				}else{
						$url=base_url();
						redirect($url);
				}
			}
			public function grafik(){
				if($this->session->userdata('akses')=='3'){
			
					#$total_usulan_pkl = $this->M_grafik->get_grafik_total_usulan();
					  $isi['total_usulan_pkl'] = $this->M_grafik->get_grafik_total_usulan();
					 $isi['total_usulan_pkl_disetujui']		=$this->M_grafik->get_grafik_total_usulan_setuju();
					 $isi['total_usulan_pkl_ditolak']		=$this->M_grafik->get_grafik_total_usulan_ditolak();
					 //ADMIN
					 $isi['total_usulan_pkl_diverifikasi_setuju']		=$this->M_grafik->get_grafik_total_usulan_verifikasi_setuju();
					 $isi['total_usulan_pkl_belum_diverifikasi']		=$this->M_grafik->get_grafik_total_usulan_verifikasi();
					 //LOKASI BARU
					 $isi['total_usulan_lokasi_baru']		=$this->M_grafik->get_grafik_usulan_lokasi_baru();
					 $isi['total_usulan_lokasi_baru_disetujui']		=$this->M_grafik->get_grafik_usulan_lokasi_baru_setuju();
					 $isi['total_usulan_lokasi_baru_ditolak']		=$this->M_grafik->get_grafik_usulan_lokasi_baru_ditolak();
					$isi['content'] 	='adminprodi/v_tampil_grafik';
					$isi['judul']		='Grafik';
					$isi['sub_judul']	='Menu Grafik';
					$this->load->view('layout/v_template',$isi);
				}else{
						$url=base_url();
						redirect($url);
				}
			}	
	
}
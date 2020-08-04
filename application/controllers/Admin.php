<?php
class Admin extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	$this->load->model('M_mahasiswa');
	$this->load->model('M_pegawai');
	$this->load->model('M_lokasi');
	$this->load->model('M_jurusan');
 	$this->load->model('M_prodi');
  	$this->load->model('M_provinsi');
   	$this->load->model('M_kota');
   	$this->load->model('M_angkatan');
   	$this->load->model('M_tahun');
   	$this->load->model('M_grafik');
  }
public function index(){
	if($this->session->userdata('akses')=='4'){
		$isi['content'] 	='admin/v_dashboard_admin';
		$isi['judul']		='Dashboard';
		$isi['sub_judul']	='Home';
		$this->load->view('layout/v_template',$isi);
		    }else{
      $url=base_url();
			redirect($url);
    }
	}
//Master Mahasiswa
public function tampil_mahasiswa(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_mahasiswa->get_mahasiswa();
		$isi['content'] 	='admin/v_mahasiswa';
		$isi['judul']		='Mahasiswa';
		$isi['sub_judul']	='Menu Master';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_mahasiswa(){
	if($this->session->userdata('akses')=='4'){
		$isi['data']		=$this->M_mahasiswa->get_angkatan();
		$isi['content'] 	='admin/v_tambah_mahasiswa';
		$isi['judul']		='Mahasiswa';
		$isi['sub_judul']	='Menu Mahasiswa';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_mahasiswa(){
		$nim				=$this->input->post("nim");
		$nama				=$this->input->post("nama");
		$tlp				=$this->input->post("tlp");
		$prodi				=$this->input->post("prodi");
		$angkatan			=$this->input->post("angkatan");
		$level				=$this->input->post("level");
		$password			=$this->input->post("password");
				
		$this->M_mahasiswa->add($nim,$nama,$tlp,$prodi,$angkatan,$level,$password);
		redirect("Admin/tampil_mahasiswa");
}
function edit_mahasiswa(){
	if($this->session->userdata('akses')=='4'){
		$nim =$this->uri->segment(3);
		$isi['data_edit_mahasiswa']		=$this->M_mahasiswa->get_edit_mahasiswa($nim);
		$isi['data_angkatan']			=$this->M_mahasiswa->get_angkatan();
		$isi['data_prodi']				=$this->M_mahasiswa->get_prodi();
		$isi['content'] 				='admin/v_edit_mahasiswa';
		$isi['judul']					='Mahasiswa';
		$isi['sub_judul']				='Menu Mahasiswa';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_mahasiswa(){
	if($this->session->userdata('akses')=='4'){
		$nim				=$this->input->post("nim");
		$nama				=$this->input->post("nama");
		$tlp				=$this->input->post("tlp");
		$prodi				=$this->input->post("prodi");
		$angkatan			=$this->input->post("angkatan");
		$level				=$this->input->post("level");
		$password			=$this->input->post("password");
		
		$this->M_mahasiswa->update_mahasiswa($nim,$nama,$tlp,$prodi,$angkatan,$level,$password);
		redirect("Admin/tampil_mahasiswa");
		}else{
            $url=base_url();
			redirect($url);
    }
	}	
function delete(){
	if($this->session->userdata('akses')=='4'){
		$nim=$this->input->post('nim');
		$this->M_mahasiswa->delete($nim);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_mahasiswa');
	}else{
            $url=base_url();
			redirect($url);
    }
	}

//Master Pegawai
public function tampil_pegawai(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_pegawai->get_pegawai();
		$isi['content'] 	='admin/v_tampil_pegawai';
		$isi['judul']		='Pegawai';
		$isi['sub_judul']	='Menu pegawai';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_pegawai(){
	if($this->session->userdata('akses')=='4'){
		$isi['hak_akses']	=$this->M_pegawai->get_level();
		$isi['content'] 	='admin/v_tambah_pegawai';
		$isi['judul']		='Pegawai';
		$isi['sub_judul']	='Menu Tambah Pegawai';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_pegawai(){
	if($this->session->userdata('akses')=='4'){
		$nip				=$this->input->post("nip");
		$nama				=$this->input->post("nama");
		$gelar_depan		=$this->input->post("gelar_depan");
		$gelar_belakang		=$this->input->post("gelar_belakang");
		$level				=$this->input->post("level");
		$prodi				=$this->input->post("prodi");
		$password			=$this->input->post("password");
				
		$this->M_pegawai->add($nip,$nama,$gelar_depan,$gelar_belakang,$level,$prodi,$password);
		redirect("Admin/tampil_pegawai");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_pegawai(){
	if($this->session->userdata('akses')=='4'){
		$nip =$this->uri->segment(3);
		$isi['data_edit_pegawai']		=$this->M_pegawai->get_edit_pegawai($nip);
		$isi['hak_akses']				=$this->M_pegawai->get_level();
		$isi['data_prodi']				=$this->M_prodi->get_prodi();
		$isi['content'] 				='admin/v_edit_pegawai';
		$isi['judul']					='Pegawai';
		$isi['sub_judul']				='Menu Tambah Pegawai';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_pegawai(){
	if($this->session->userdata('akses')=='4'){
		$nip				=$this->input->post("nip");
		$nama				=$this->input->post("nama");
		$gelar_depan		=$this->input->post("gelar_depan");
		$gelar_belakang		=$this->input->post("gelar_belakang");
		$level				=$this->input->post("level");
		$prodi				=$this->input->post("prodi");
		$password			=$this->input->post("password");
				
		$this->M_pegawai->update_pegawai($nip,$nama,$gelar_depan,$gelar_belakang,$level,$prodi,$password);
		redirect("Admin/tampil_pegawai");
		}else{
            $url=base_url();
			redirect($url);
    }
	}	
function delete_pegawai(){
	if($this->session->userdata('akses')=='4'){
		$nip=$this->input->post('nip');
		$this->M_pegawai->delete($nip);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_pegawai');
	}else{
            $url=base_url();
			redirect($url);
    }
	}

//Master Lokasi
public function tampil_lokasi(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_lokasi->get_lokasi();
		$isi['content'] 	='admin/v_tampil_lokasi';
		$isi['judul']		='Lokasi';
		$isi['sub_judul']	='Menu lokasi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_lokasi(){
	if($this->session->userdata('akses')=='4'){
		$isi['nama_kota']	=$this->M_kota->get_kota();
		$isi['content'] 	='admin/v_tambah_lokasi';
		$isi['judul']		='Lokasi';
		$isi['sub_judul']	='Menu Tambah Lokasi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_lokasi(){
	if($this->session->userdata('akses')=='4'){
		$nama				=$this->input->post("nama");
		$alamat				=$this->input->post("alamat");
		$telp				=$this->input->post("telp");
		$kota				=$this->input->post("kota");
		$kode_pos			=$this->input->post("kode_pos");
		$longitude			=$this->input->post("longitude");
		$latitude			=$this->input->post("latitude");				
		$this->M_lokasi->add($nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude);
		redirect("Admin/tampil_lokasi");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_lokasi(){
	if($this->session->userdata('akses')=='4'){
		$id =$this->uri->segment(3);
		$isi['data_edit_lokasi']		=$this->M_lokasi->get_edit_lokasi($id);
		$isi['nama_kota']				=$this->M_lokasi->get_kota();
		$isi['content'] 				='admin/v_edit_lokasi';
		$isi['judul']					='Lokasi';
		$isi['sub_judul']				='Menu Edit Lokasi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_lokasi(){
	if($this->session->userdata('akses')=='4'){
		$id					=$this->input->post("id");
		$nama				=$this->input->post("nama");
		$alamat				=$this->input->post("alamat");
		$telp				=$this->input->post("telp");
		$kota				=$this->input->post("kota");		
		$kode_pos			=$this->input->post("kode_pos");
		$longitude			=$this->input->post("longitude");
		$latitude			=$this->input->post("latitude");				
		$this->M_lokasi->update_lokasi($id,$nama,$alamat,$telp,$kota,$kode_pos,$longitude,$latitude);
		redirect("Admin/tampil_lokasi");
		}else{
            $url=base_url();
			redirect($url);;
    }
	}	
function delete_lokasi(){
	if($this->session->userdata('akses')=='4'){
		$id=$this->input->post('id');
		$this->M_lokasi->delete_lokasi($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/v_tampil_lokasi');
	}else{
            $url=base_url();
			redirect($url);
    }
	}

//Master Jurusan
public function tampil_jurusan(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_jurusan->get_jurusan();
		$isi['content'] 	='admin/v_tampil_jurusan';
		$isi['judul']		='Jurusan';
		$isi['sub_judul']	='Menu jurusan';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_jurusan(){
	if($this->session->userdata('akses')=='4'){
		$isi['content'] 	='admin/v_tambah_jurusan';
		$isi['judul']		='Jurusan';
		$isi['sub_judul']	='Menu Tambah Jurusan';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_jurusan(){
	if($this->session->userdata('akses')=='4'){
		$jurusan		=$this->input->post("jurusan");
		$this->M_jurusan->add($jurusan);
		redirect("Admin/tampil_jurusan");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_jurusan(){
	if($this->session->userdata('akses')=='4'){
		$id =$this->uri->segment(3);
		$isi['data_edit_jurusan']		=$this->M_jurusan->get_edit_jurusan($id);
		$isi['content'] 				='admin/v_edit_jurusan';
		$isi['judul']					='Jurusan';
		$isi['sub_judul']				='Menu Edit Jurusan';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_jurusan(){
	if($this->session->userdata('akses')=='4'){
		$id					=$this->input->post("id");
		$jurusan		=$this->input->post("jurusan");
		$this->M_jurusan->update_jurusan($id,$jurusan);
		redirect("Admin/tampil_jurusan");
		}else{
            $url=base_url();
			redirect($url);
    }
	}	
function delete_jurusan(){
	if($this->session->userdata('akses')=='4'){
		$id=$this->input->post('id');
		$this->M_jurusan->delete_jurusan($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_jurusan');
	}else{
            $url=base_url();
			redirect($url);
    }
	}

//Master Prodi
public function tampil_prodi(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_prodi->get_prodi();
		$isi['content'] 	='admin/v_tampil_prodi';
		$isi['judul']		='Prodi';
		$isi['sub_judul']	='Menu Prodi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_prodi(){
	if($this->session->userdata('akses')=='4'){
		$isi['jurusan']		=$this->M_jurusan->get_jurusan();
		$isi['content'] 	='admin/v_tambah_prodi';
		$isi['judul']		='Prodi';
		$isi['sub_judul']	='Menu Tambah Prodi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_prodi(){
	if($this->session->userdata('akses')=='4'){
		$prodi		=$this->input->post("prodi");
		$jurusan		=$this->input->post("jurusan");
		$this->M_prodi->add($prodi,$jurusan);
		redirect("Admin/tampil_prodi");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_prodi(){
	if($this->session->userdata('akses')=='4'){
		$id =$this->uri->segment(3);
		$isi['data_edit_prodi']			=$this->M_prodi->get_edit_prodi($id);
		$isi['jurusan']					=$this->M_jurusan->get_jurusan();
		$isi['content'] 				='admin/v_edit_prodi';
		$isi['judul']					='Prodi';
		$isi['sub_judul']				='Menu Edit Prodi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_prodi(){
	if($this->session->userdata('akses')=='4'){
		$id					=$this->input->post("id");
		$jurusan			=$this->input->post("jurusan");
		$prodi				=$this->input->post("prodi");
		$this->M_prodi->update_prodi($id,$prodi,$jurusan);
		redirect("Admin/tampil_prodi");
		}else{
            $url=base_url();
			redirect($url);
    }
	}	
function delete_prodi(){
	if($this->session->userdata('akses')=='4'){
		$id=$this->input->post('id');
		$this->M_prodi->delete_prodi($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_prodi');
	}else{
            $url=base_url();
			redirect($url);
    }
	}
//Master Angkatan
public function tampil_angkatan(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_angkatan->get_angkatan();
		$isi['content'] 	='admin/v_tampil_angkatan';
		$isi['judul']		='Angkatan';
		$isi['sub_judul']	='Menu master';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_angkatan(){
	if($this->session->userdata('akses')=='4'){
		$isi['angkatan']		=$this->M_angkatan->get_angkatan();
		$isi['content'] 	='admin/v_tambah_angkatan';
		$isi['judul']		='Prodi';
		$isi['sub_judul']	='Menu Tambah Prodi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_angkatan(){
	if($this->session->userdata('akses')=='4'){
		$angkatan		=$this->input->post("angkatan");
		$this->M_angkatan->add($angkatan);
		redirect("Admin/tampil_angkatan");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_angkatan(){
	if($this->session->userdata('akses')=='4'){
		$id =$this->uri->segment(3);
		$isi['data_edit_angkatan']		=$this->M_angkatan->get_edit_angkatan($id);
		$isi['content'] 				='admin/v_edit_angkatan';
		$isi['judul']					='Angkatan';
		$isi['sub_judul']				='Menu Edit Angkatan';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_angkatan(){
	if($this->session->userdata('akses')=='4'){
		$id					=$this->input->post("id");
		$angkatan			=$this->input->post("angkatan");
		$this->M_angkatan->update_angkatan($id,$angkatan);
		redirect("Admin/tampil_angkatan");
		}else{
            $url=base_url();
			redirect($url);
    }
	}	
function delete_angkatan(){
	if($this->session->userdata('akses')=='4'){
		$id=$this->input->post('id');
		$this->M_angkatan->delete_angkatan($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_angkatan');
	}else{
            $url=base_url();
			redirect($url);
    }
	}
//Master Tahun
public function tampil_tahun(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_tahun->get_tahun();
		$isi['content'] 	='admin/v_tampil_tahun';
		$isi['judul']		='Tahun';
		$isi['sub_judul']	='Menu master';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_tahun(){
	if($this->session->userdata('akses')=='4'){
		$isi['tahun']		=$this->M_tahun->get_tahun();
		$isi['content'] 	='admin/v_tambah_tahun';
		$isi['judul']		='Tahun';
		$isi['sub_judul']	='Menu Tambah Tahun';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_tahun(){
	if($this->session->userdata('akses')=='4'){
		$tahun		=$this->input->post("tahun");
		$this->M_tahun->add($tahun);
		redirect("Admin/tampil_tahun");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_tahun(){
	if($this->session->userdata('akses')=='4'){
		$id =$this->uri->segment(3);
		$isi['data_edit_tahun']		=$this->M_tahun->get_edit_tahun($id);
		$isi['content'] 				='admin/v_edit_tahun';
		$isi['judul']					='Tahun';
		$isi['sub_judul']				='Menu Edit Tahun';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_tahun(){
	if($this->session->userdata('akses')=='4'){
		$id					=$this->input->post("id");
		$tahun			=$this->input->post("tahun");
		$this->M_tahun->update_tahun($id,$tahun);
		redirect("Admin/tampil_tahun");
		}else{
            $url=base_url();
			redirect($url);
    }
	}	
function delete_tahun(){
	if($this->session->userdata('akses')=='4'){
		$id=$this->input->post('id');
		$this->M_tahun->delete_tahun($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_tahun');
	}else{
            $url=base_url();
			redirect($url);
    }
	}
//Master Provinsi
public function tampil_provinsi(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_provinsi->get_provinsi();
		$isi['content'] 	='admin/v_tampil_provinsi';
		$isi['judul']		='Provinsi';
		$isi['sub_judul']	='Menu Provinsi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_provinsi(){
	if($this->session->userdata('akses')=='4'){
		$isi['content'] 	='admin/v_tambah_provinsi';
		$isi['judul']		='Provinsi';
		$isi['sub_judul']	='Menu Tambah Provinsi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_provinsi(){
	if($this->session->userdata('akses')=='4'){
		$provinsi		=$this->input->post("provinsi");
		$this->M_provinsi->add($provinsi);
		redirect("Admin/tampil_provinsi");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_provinsi(){
	if($this->session->userdata('akses')=='4'){
		$id =$this->uri->segment(3);
		$isi['data_edit_provinsi']		=$this->M_provinsi->get_edit_provinsi($id);
		$isi['content'] 				='admin/v_edit_provinsi';
		$isi['judul']					='Provinsi';
		$isi['sub_judul']				='Menu Edit Provinsi';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_provinsi(){
	if($this->session->userdata('akses')=='4'){
		$id					=$this->input->post("id");
		$provinsi		=$this->input->post("provinsi");
		$this->M_provinsi->update_provinsi($id,$provinsi);
		redirect("Admin/tampil_provinsi");
		}else{
            $url=base_url();
			redirect($url);
    }
	}	
function delete_provinsi(){
	if($this->session->userdata('akses')=='4'){
		$id=$this->input->post('id');
		$this->M_provinsi->delete_provinsi($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_provinsi');
	}else{
            $url=base_url();
			redirect($url);
    }
	}
//Master Kota
public function tampil_kota(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_kota->get_kota();
		$isi['content'] 	='admin/v_tampil_kota';
		$isi['judul']		='Kota';
		$isi['sub_judul']	='Menu Kota';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}
function tambah_kota(){
	if($this->session->userdata('akses')=='4'){
		$isi['kota']		=$this->M_kota->get_kota();
		$isi['provinsi']		=$this->M_provinsi->get_provinsi();
		$isi['content'] 	='admin/v_tambah_kota';
		$isi['judul']		='Kota';
		$isi['sub_judul']	='Menu Tambah Kota';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
function insert_kota(){
	if($this->session->userdata('akses')=='4'){
		$kota			=$this->input->post("kota");
		$provinsi		=$this->input->post("provinsi");
		$this->M_kota->add($kota,$provinsi);
		redirect("Admin/tampil_kota");
		}else{
            $url=base_url();
			redirect($url);
    }
}
function edit_kota(){
	if($this->session->userdata('akses')=='4'){
		$id =$this->uri->segment(3);
		$isi['data_edit_kota']			=$this->M_kota->get_edit_kota($id);
		$isi['provinsi']				=$this->M_provinsi->get_provinsi();
		$isi['content'] 				='admin/v_edit_kota';
		$isi['judul']					='Kota';
		$isi['sub_judul']				='Menu Edit Kota';
		$this->load->view('layout/v_template',$isi);
		}else{
            $url=base_url();
			redirect($url);
    }
	}
public function update_kota(){
	if($this->session->userdata('akses')=='4'){
		$id						=$this->input->post("id");
		$kota					=$this->input->post("kota");
		$provinsi				=$this->input->post("provinsi");
		$this->M_kota->update_kota($id,$kota,$provinsi);
		redirect("Admin/tampil_kota");
		}else{
            $url=base_url();
			redirect($url);
    }
	}	
function delete_kota(){
	if($this->session->userdata('akses')=='4'){
		$id=$this->input->post('id');
		$this->M_kota->delete_kota($id);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_kota');
	}else{
            $url=base_url();
			redirect($url);
    }
	}
public function grafik(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_grafik->get_provinsi();
		$isi['content'] 	='admin/v_tampil_provinsi';
		$isi['judul']		='Provinsi';
		$isi['sub_judul']	='Menu Provinsi';
		$this->load->view('layout/v_template',$isi);
    }else{
            $url=base_url();
			redirect($url);
    }
}

}
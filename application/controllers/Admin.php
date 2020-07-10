<?php
class Admin extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
	$this->load->model('M_mahasiswa');
  }
public function index(){
		$isi['content'] 	='admin/v_dashboard_admin';
		$isi['judul']		='Dashboard';
		$isi['sub_judul']	='Pelajaran';
		$this->load->view('layout/v_template',$isi);
	}
//Master Mahasiswa
public function tampil_mahasiswa(){
	if($this->session->userdata('akses')=='4'){
     	$isi['data']		=$this->M_mahasiswa->get_mahasiswa();
		$isi['content'] 	='admin/v_mahasiswa';
		$isi['judul']		='Mahasiswa';
		$isi['sub_judul']	='Menu Mahasiswa';
		$this->load->view('layout/v_template',$isi);
    }else{
      echo "Anda tidak berhak mengakses halaman ini";
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
      echo "Anda tidak berhak mengakses halaman ini";
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
		$isi['data_angkatan']					=$this->M_mahasiswa->get_angkatan();
		$isi['content'] 				='admin/v_edit_mahasiswa';
		$isi['judul']					='Mahasiswa';
		$isi['sub_judul']				='Menu Mahasiswa';
		$this->load->view('layout/v_template',$isi);
		}else{
      echo "Anda tidak berhak mengakses halaman ini";
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
      echo "Anda tidak berhak mengakses halaman ini";
    }
	}	
function delete(){
	if($this->session->userdata('akses')=='4'){
		$nim=$this->input->post('nim');
		$this->M_mahasiswa->delete($nim);
		
		echo $this->session->set_flashdata('msg','success-hapus');
		redirect('Admin/tampil_mahasiswa');
	}else{
      echo "Anda tidak berhak mengakses halaman ini";
    }
	}

//Master Pegawai
}
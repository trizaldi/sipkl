<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('m_login');
	}
	public function index()
	{
		$this->load->view('login');
	}
/* function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        $level=htmlspecialchars($this->input->post('level',TRUE),ENT_QUOTES);
        
        $cek_dosen=$this->m_login->auth_dosen($username,$password,$level);

        if($cek_dosen->num_rows() > 0){
                        $data=$cek_dosen->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($data['id_level']=='2'){
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_id',$data['NIP']);
                    $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                    redirect('Korbidpkl');

                 }elseif($data['id_level']=='3'){ 
                    $this->session->set_userdata('akses','3');
                    $this->session->set_userdata('ses_id',$data['NIP']);
                    $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                    redirect('Adminprodi');
                 }
                 elseif($data['id_level']=='4'){
                    $this->session->set_userdata('akses','4');
                    $this->session->set_userdata('ses_id',$data['NIP']);
                    $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                    redirect('Admin');
                 }
                  elseif($data['id_level']=='5'){
                    $this->session->set_userdata('akses','5');
                    $this->session->set_userdata('ses_id',$data['NIP']);
                    $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                    redirect('Jurusan');
                 }

        }else{
                    $cek_mahasiswa=$this->m_login->auth_mahasiswa($username,$password,$level);
                    if($cek_mahasiswa->num_rows() > 0){
                            $data=$cek_mahasiswa->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            if($data['id_level']=='1'){
                                $this->session->set_userdata('akses','1');
                                $this->session->set_userdata('ses_id',$data['NIM']);
                                $this->session->set_userdata('ses_nama',$data['nama_mhs']);
                                redirect('home');
                            }
                                    }
                            else{ 
                                $url=base_url();
                                $pemberitahuan = "<div class='alert alert-danger'>Silahkan Cek Username dan Password Anda </div>";
                                echo $this->session->set_flashdata('msg', $pemberitahuan);
                                redirect($url);
                    }
    }
}*/
function auth(){
        $username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
        
        $cek_dosen=$this->m_login->auth_dosen($username,$password);

        if($cek_dosen->num_rows() > 0){
            foreach ($cek_dosen->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['nip'] = $sess->NIP;
                $sess_data['password'] = $sess->password;
                $sess_data['level'] = $sess->id_level;
                $this->session->set_userdata($sess_data);
            }
                $data=$cek_dosen->row_array();
                $this->session->set_userdata('masuk',TRUE);
                 if($this->session->userdata('level')==2 & $this->session->userdata('password')==TRUE){
                    $this->session->set_userdata('akses','2');
                    $this->session->set_userdata('ses_prodi',$data['id_prodi']);
                    $this->session->set_userdata('ses_id',$data['NIP']);
                    $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                    redirect('Korbidpkl');

                 }elseif($this->session->userdata('level')==3 & $this->session->userdata('password')==TRUE){ 
                    $this->session->set_userdata('akses','3');
                    $this->session->set_userdata('ses_id',$data['NIP']);
                    $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                    redirect('Adminprodi');
                 }
                 elseif($this->session->userdata('level')==4 & $this->session->userdata('password')==TRUE){
                    $this->session->set_userdata('akses','4');
                    $this->session->set_userdata('ses_id',$data['NIP']);
                    $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                    redirect('Admin');
                 }
                  elseif($this->session->userdata('level')==5 & $this->session->userdata('password')==TRUE){
                    $this->session->set_userdata('akses','5');
                    $this->session->set_userdata('ses_id',$data['NIP']);
                    $this->session->set_userdata('ses_nama',$data['nama_pegawai']);
                    redirect('Jurusan');
                 }

        }else{
                    $cek_mahasiswa=$this->m_login->auth_mahasiswa($username,$password,$level);
                    if($cek_mahasiswa->num_rows() > 0){
                            foreach ($cek_mahasiswa->result() as $sess) {
                            $sess_data['logged_in'] = 'Sudah Loggin';
                            $sess_data['nim'] = $sess->NIM;
                            $sess_data['password'] = $sess->password;
                            $sess_data['level'] = $sess->id_level;
                $this->session->set_userdata($sess_data);
            }
                            $data=$cek_mahasiswa->row_array();
                            $this->session->set_userdata('masuk',TRUE);
                            if($this->session->userdata('level')==1 & $this->session->userdata('password')==TRUE){
                                $this->session->set_userdata('akses','1');
                                $this->session->set_userdata('ses_id',$data['NIM']);
                                $this->session->set_userdata('ses_prodi',$data['id_prodi']);
                                $this->session->set_userdata('ses_angkatan',$data['id_angkatan']);
                                $this->session->set_userdata('ses_nama',$data['nama_mhs']);
                                redirect('Mahasiswa');
                            }
                                    }
                            else{ 
                                $url=base_url();
                                $pemberitahuan = "<div class='alert alert-danger'>Silahkan Cek Username dan Password Anda </div>";
                                echo $this->session->set_flashdata('msg', $pemberitahuan);
                                redirect($url);
                    }
    }
}


    function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }
}

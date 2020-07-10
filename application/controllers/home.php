<?php
class home extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }
public function index(){
		$isi['content'] ='layout/v_dashboard';
		$isi['judul']	='Dashboard';
		$isi['sub_judul']='Pelajaran';
		$this->load->view('layout/v_template',$isi);
	}
	#function index(){
#		$this->load->view('home');
#	}
}
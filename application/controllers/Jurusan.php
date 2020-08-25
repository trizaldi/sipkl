<?php
class Jurusan extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }
public function index(){
		$isi['content'] 	='jurusan/v_dashboard_jurusan';
		$isi['judul']		='Dashboard';
		$isi['sub_judul']	='Jurusan';
		$this->load->view('layout/v_template',$isi);
	}
}
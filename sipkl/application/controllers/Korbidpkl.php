<?php
class Korbidpkl extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }
public function index(){
		$isi['content'] 	='korbidpkl/v_dashboard_korbidpkl';
		$isi['judul']		='Dashboard';
		$isi['sub_judul']	='Pelajaran';
		$this->load->view('layout/v_template',$isi);
	}
}
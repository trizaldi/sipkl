<?php
class Adminprodi extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('masuk') != TRUE){
			$url=base_url();
			redirect($url);
		}
  }
public function index(){
		$isi['content'] 	='adminprodi/v_dashboard_adminprodi';
		$isi['judul']		='Dashboard';
		$isi['sub_judul']	='AdminProdi';
		$this->load->view('layout/v_template',$isi);
	}
}
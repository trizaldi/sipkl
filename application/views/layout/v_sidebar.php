 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?php echo base_url() ?>assets/images/poltek.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">SIPKL</span>
    </a>

    <!-- Sidebar -->
<?php
  $level = $this->session->userdata('akses');
  if($level == 1){
  $this->load->view('layout/v_sidebar_mahasiswa');
  }
  elseif($level == 2){
  $this->load->view('layout/v_sidebar_korbidpkl');
  }
  elseif($level == 3){
  $this->load->view('layout/v_sidebar_adminprodi');
  }
  elseif($level == 4){
  $this->load->view('layout/v_sidebar_admin');
  }
  elseif($level == 5){
  $this->load->view('layout/v_sidebar_jurusan');
  }
  else{
  echo "tidak ada data user";
  }
  
  ?>
  </aside>
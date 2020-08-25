<div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo base_url()?>Adminprodi" class="nav-link">
              <i class="fa fa-home" aria-hidden="true"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-list-ul" aria-hidden="true"></i>
              <p>
                Menu Master
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>Adminprodi/tampil_lokasi" class="nav-link">
                  <i class="fa fa-book" aria-hidden="true"></i>
                  <p>Data Lokasi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>Adminprodi/tampil_ttd" class="nav-link">
                  <i class="fa fa-book" aria-hidden="true"></i>
                  <p>Data Kajur Kaprodi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>Adminprodi/tampil_matkul" class="nav-link">
                  <i class="fa fa-book" aria-hidden="true"></i>
                  <p>Data Matkul</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-list-ul" aria-hidden="true"></i>
              <p>
                Menu User
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>Adminprodi/Profile" class="nav-link">
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  <p>User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="fa fa-list-ul" aria-hidden="true"></i>
              <p>
                Menu PKL
                <i class="fas fa-angle-left right"></i>
              </p>
            </a> 
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>Adminprodi/data_pengajuan_pkl" class="nav-link">
                  <i class="fa fa-book" aria-hidden="true"></i>
                  <p>Pengajuan PKL</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>Adminprodi/tampil_cetak_dokumen" class="nav-link">
                  <i class="fa fa-print" aria-hidden="true"></i>
                  <p>Cetak Dokumen</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url()?>Adminprodi/grafik" class="nav-link">
                  <i class="fa fa-book" aria-hidden="true"></i>
                  <p>Grafik</p>
                </a>
              </li>
            </ul>

          </li>



          <li class="nav-header">PROFILE</li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Menu Profile
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
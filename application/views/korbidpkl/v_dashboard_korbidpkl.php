    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
              <?php
              foreach($total_usulan_pkl->result() as $jumlah_usulan){
                $semua_usulan=$jumlah_usulan->total;
              ?>  
              <h3>Total : <?php echo $semua_usulan; ?></h3><?php } ?>

                <p> Pendaftar PKL</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
              <?php
              foreach($total_usulan_pkl_ditolak->result() as $jumlah_ditolak){
                $ditolak=$jumlah_ditolak->total;
              ?>  
                <h3>Total : <?php echo $ditolak; ?></h3><?php } ?>

                <p>Pendaftar Ditolak</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
              <?php
              foreach($total_usulan_pkl_disetujui->result() as $value){
                $disetujui=$value->total;
              ?>  
              <h3>Total : <?php echo $disetujui; ?></h3><?php } ?>

                <p>Pendaftar Diverifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
              <?php
              foreach($total_usulan_belum_verifikasi->result() as $value){
                $usulan_belum_verifikasi=$value->total;
              ?>  
                <h3>Total : <?php echo $usulan_belum_verifikasi; ?></h3><?php } ?>

                <p>Pendaftar Belum Diverifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
  </section>



    <!-- Main content -->
    <section class="content">


    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Selamat Datang <b> <?php echo $this->session->userdata('ses_nama')?> </b> Di Sistem Informasi PKL Mahasiswa Sebagai AdminProdi</h3>

              </div>
              <!-- /.card-header -->
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>



        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
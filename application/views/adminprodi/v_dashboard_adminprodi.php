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
              foreach($total_usulan_pkl_diverifikasi_setuju->result() as $value){
                $verifikasi=$value->total;
              ?>  
              <h3>Total : <?php echo $verifikasi; ?></h3><?php } ?>

                <p> Total PKL Verifikasi</p>
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
              foreach($total_usulan_pkl_belum_diverifikasi->result() as $value){
                $belum_verifikasi=$value->total;
              ?>  
                <h3>Total : <?php echo $belum_verifikasi; ?></h3><?php } ?>

                <p>Total PKL Belum Di Verifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->

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
                <h3 class="card-title">Selamat Datang <b> <?php echo $this->session->userdata('ses_nama')?> </b> Di Sistem Informasi PKL Mahasiswa Sebagai Adminprodi</h3>

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
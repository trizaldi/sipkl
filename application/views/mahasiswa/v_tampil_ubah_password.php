
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $judul; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $sub_judul; ?></a></li>
              <li class="breadcrumb-item active"><?php echo $judul; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
       <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">

        <?php
        foreach ($data_mahasiswa as $value){
            $nim=$value->NIM;
            $nama=$value->nama_mhs;
          $nomor=$value->telp;
          $password=$value->password;


            ?>
<div class="container">
  <form class="form-horizontal" action="<?php echo base_url()?>Mahasiswa/update_password" method="post" enctype="multipart/form-data">


<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Password Baru :</label>
      <input type="text" name="password" class="form-control" id="inputEmail4" value="" placeholder="Isi password Baru" required>
    </div>
  </div>
  <a href="<?php echo base_url()?>Mahasiswa/Profile" class="btn btn-secondary">Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
  <?php } ?>
</form>
</div>
          </div>

        </div>

        </div>
        </div>
      </div>
    </section>
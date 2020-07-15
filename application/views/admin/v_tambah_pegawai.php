
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

<div class="container">
  <form class="form-horizontal" action="<?php echo base_url()?>Admin/insert_pegawai" method="post" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputZip">NIP :</label>
      <input type="text" name="nip" class="form-control" id="inputZip" required>
    </div>
  </div>

<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Nama Pegawai :</label>
      <input type="text" name="nama" class="form-control" id="inputEmail4" placeholder="Isi nama pegawai" required>
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Gelar :</label>
      <input type="text" name="gelar" class="form-control" id="inputPassword4" placeholder="isi gelar" required>
    </div>
  </div>
<div class="form-row">
    <div class="form-group col-md-5">
                  <label>Program Studi :</label>
                  <select name="prodi" class="form-control select2" style="width: 100%;">
                    <option selected="selected" value="1">MIF</option>
                    <option value="2">TKK</option>
                    <option value="3">TIF</option>
                  </select>
                </div>
    <div class="form-group col-md-5">
                  <label>Hak Akses :</label>
                  <select name="level" class="form-control select2" style="width: 100%;">
                   <?php foreach ($hak_akses->result() as $akses) {
                       
                    ?>
                    <option value="<?php echo $akses->id_level ?>"><?php echo $akses->level ?></option><?php } ?>
                  </select>
                </div>                
</div>

<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Password :</label>
      <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="Isi password" required>
    </div>
  </div>
  <a href="<?php echo base_url()?>Admin/tampil_pegawai" class="btn btn-secondary">Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
          </div>

        </div>

        </div>
        </div>
      </div>
    </section>

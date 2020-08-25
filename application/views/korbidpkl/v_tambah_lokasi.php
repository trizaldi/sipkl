
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
  <form class="form-horizontal" action="<?php echo base_url()?>Korbidpkl/insert_lokasi" method="post" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputZip">Nama lokasi :</label>
      <input type="text" name="nama" class="form-control" id="inputZip" required>
    </div>
  </div>

<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Alamat :</label>
      <input type="text" name="alamat" class="form-control" id="inputEmail4" placeholder="Isi alamat" required>
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">No Telepon :</label>
      <input type="text" name="telp" class="form-control" id="inputPassword4" placeholder="isi nomor telp" required>
    </div>
  </div>
<div class="form-row">
    <div class="form-group col-md-5">
                  <label>Kota :</label>
                  <select name="kota" class="form-control select2" style="width: 100%;">
                   <?php foreach ($nama_kota->result() as $kota) {
                       
                    ?>
                    <option value="<?php echo $kota->id_kota ?>"><?php echo $kota->kota ?></option><?php } ?>
                  </select>
                </div>                
</div>
<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Kode Pos :</label>
      <input type="text" name="kode_pos" class="form-control" id="inputEmail4" placeholder="Isi longitude" required>
    </div>
    <div class="form-group col-md-5">
      <label for="inputEmail4">Longitude :</label>
      <input type="text" name="longitude" class="form-control" id="inputEmail4" placeholder="Isi longitude" required>
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Latitude :</label>
      <input type="text" name="latitude" class="form-control" id="inputPassword4" placeholder="isi latitude" required>
    </div>
  </div>
  <a href="<?php echo base_url()?>Korbidpkl/tampil_lokasi" class="btn btn-secondary">Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
          </div>

        </div>

        </div>
        </div>
      </div>
    </section>

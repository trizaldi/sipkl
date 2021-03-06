
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
        foreach ($data_edit_mahasiswa as $value){
          $prodi_mahasiswa=$value->nama_prodi;
          $angkatan_mahasiswa=$value->angkatan;


            ?>
<div class="container">
  <form class="form-horizontal" action="<?php echo base_url()?>Admin/update_mahasiswa" method="post" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputZip">NIM :</label>
      <input type="text" name="nim" class="form-control"  id="inputZip" readonly value="<?php echo $value->NIM; ?>">
    </div>
  </div>

<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Nama Mahasiswa :</label>
      <input type="text" name="nama" class="form-control" id="inputEmail4" value="<?php echo $value->nama_mhs; ?>" placeholder="Isi nama mahasiswa" required>
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Nomor Telepon :</label>
      <input type="text" name="tlp" class="form-control" id="inputPassword4" value="<?php echo $value->telp; ?>" placeholder="isi nomor telepon" required>
      <input type="hidden" name="level" class="form-control" value="1">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-5">
                  <label>Prodi :</label>
                  <select name="prodi" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_prodi->result_array() as $prodi) :
                       $id=$prodi['id_prodi'];
                       $prodi['nama_prodi'];
                       $selected = ($prodi_mahasiswa ==$prodi['nama_prodi']) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>" <?= $selected; ?> class=""><?php echo $prodi['nama_prodi'] ?></option><?php endforeach;?>
                  </select>
                </div>  
    <div class="form-group col-md-5">
                  <label>Angkatan :</label>
                  <select name="angkatan" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_angkatan->result_array() as $angkatan) :
                       $id=$angkatan['id_angkatan'];
                       $angkatan=$angkatan['angkatan'];
                       $selected = ($angkatan_mahasiswa ==$angkatan) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>" <?= $selected; ?> class=""><?php echo $angkatan ?></option><?php endforeach;?>
                  </select>
                </div>                
</div>

<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Password :</label>
      <input type="password" name="password" class="form-control" id="inputEmail4" value="<?php echo $value->password; ?>" placeholder="Isi password" required>
    </div>
  </div>
  <a href="<?php echo base_url()?>Admin/tampil_mahasiswa" class="btn btn-secondary">Kembali</a>
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

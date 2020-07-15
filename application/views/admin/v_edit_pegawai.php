
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
        foreach ($data_edit_pegawai as $value){
          $pegawai_kases=$value->level;
          $pegawai_prodi=$value->nama_prodi;
            ?>

<div class="container">
  <form class="form-horizontal" action="<?php echo base_url()?>Admin/update_pegawai" method="post" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputZip">NIP :</label>
      <input type="text" name="nip" class="form-control" id="inputZip" required readonly value="<?php echo $value->NIP; ?>" >
    </div>
  </div>

<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Nama Pegawai :</label>
      <input type="text" name="nama" class="form-control" id="inputEmail4" placeholder="Isi nama pegawai" required value="<?php echo $value->nama_pegawai; ?>">
    </div>
    <div class="form-group col-md-5">
      <label for="inputPassword4">Gelar :</label>
      <input type="text" name="gelar" class="form-control" id="inputPassword4" placeholder="isi gelar" required value="<?php echo $value->gelar; ?>">
    </div>
  </div>
<div class="form-row">
    <div class="form-group col-md-5">
                  <label>Hak akses :</label>
                  <select name="level" class="form-control select2" style="width: 100%;">
                   <?php foreach ($hak_akses->result_array() as $level) :
                       $id=$level['id_level'];
                       $level=$level['level'];
                       $selected = ($pegawai_kases ==$level) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>"  <?= $selected; ?> class=""><?php echo $level ?></option><?php endforeach;?>
                  </select>
                </div>    
    <div class="form-group col-md-5">
                  <label>Prodi :</label>
                  <select name="prodi" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_prodi->result_array() as $prodi) :
                       $id=$prodi['id_prodi'];
                       $prodi=$prodi['nama_prodi'];
                       $selected = ($pegawai_prodi ==$prodi) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>"  <?= $selected; ?> class=""><?php echo $prodi ?></option><?php endforeach;?>
                  </select>
                </div>               
</div>

<div class="form-row">
    <div class="form-group col-md-5">
      <label for="inputEmail4">Password :</label>
      <input type="password" name="password" class="form-control" id="inputEmail4" value="<?php echo $value->password; ?>" placeholder="Isi password" required>
    </div>
  </div>
  <a href="<?php echo base_url()?>Admin/tampil_pegawai" class="btn btn-secondary">Kembali</a>
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

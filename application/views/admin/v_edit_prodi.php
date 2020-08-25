
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
        foreach ($data_edit_prodi as $value){
          $jurusan_prodi=$value->nama_jurusan


            ?>
<div class="container">
  <form class="form-horizontal" action="<?php echo base_url()?>Admin/update_prodi" method="post" enctype="multipart/form-data">
<div class="form-row">
    <div class="form-group col-md-2">
      <label for="inputZip">Nama PRODI :</label>
      <input type="text" name="prodi" class="form-control"  id="inputZip" value="<?php echo $value->nama_prodi; ?>">
      <input type="hidden" name="id" class="form-control"  id="inputZip" readonly value="<?php echo $value->id_prodi; ?>">
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-5">
                  <label>Angkatan :</label>
                  <select name="jurusan" class="form-control select2" style="width: 100%;">
                   <?php foreach ($jurusan->result_array() as $value) :
                       $id=$value['id_jurusan'];
                       $jurusan=$value['nama_jurusan'];
                       $selected = ($jurusan_prodi ==$jurusan) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>"  <?= $selected; ?> class=""><?php echo $jurusan ?></option><?php endforeach;?>
                  </select>
                </div>                
</div>

  <a href="<?php echo base_url()?>Admin/tampil_prodi" class="btn btn-secondary">Kembali</a>
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

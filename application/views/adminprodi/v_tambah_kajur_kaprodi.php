
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
  <form class="form-horizontal" action="<?php echo base_url()?>Admin/insert_ttd" method="post" enctype="multipart/form-data">
<div class="form-row">
<div class="form-group col-md-5">
                  <label>PRODI :</label>
                  <select name="prodi" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_prodi->result_array() as $prodi) :
                       $id=$prodi['id_prodi'];
                       $prodi=$prodi['nama_prodi'];
                    ?>
                    <option value="<?php echo $id ?>"><?php echo $prodi ?></option><?php endforeach;?>
                  </select>
                </div>    
                <div class="form-group col-md-5">
                  <label>Ketua Jurusan :</label>
                  <select name="kajur" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_pegawai->result_array() as $pegawai) :
                       $id=$pegawai['NIP'];
                       $pegawai=$pegawai['nama_pegawai'];
                    ?>
                    <option value="<?php echo $id ?>"><?php echo $pegawai ?></option><?php endforeach;?>
                  </select>
                </div>    
  </div>

<div class="form-row">
<div class="form-group col-md-5">
                  <label>Ketua Program Studi :</label>
                  <select name="kaprodi" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_pegawai->result_array() as $pegawai) :
                       $id=$pegawai['NIP'];
                       $pegawai=$pegawai['nama_pegawai'];
                    ?>
                    <option value="<?php echo $id ?>"><?php echo $pegawai ?></option><?php endforeach;?>
                  </select>
                </div>    
                <div class="form-group col-md-5">
                  <label>Kordinator Bidang PKL :</label>
                  <select name="korbidpkl" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_pegawai->result_array() as $pegawai) :
                       $id=$pegawai['NIP'];
                       $pegawai=$pegawai['nama_pegawai'];
                    ?>
                    <option value="<?php echo $id ?>"><?php echo $pegawai ?></option><?php endforeach;?>
                  </select>
                </div>    
  </div>
  <a href="<?php echo base_url()?>Admin/tampil_ttd" class="btn btn-secondary">Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>
          </div>

        </div>

        </div>
        </div>
      </div>
    </section>
    

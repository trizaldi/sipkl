
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
        foreach ($data_edit_ttd as $value){
                    $id_ttd=$value->id;
                    $prodi_asli=$value->prodi;
                    $data_kajur=$value->kajur;
                    $data_kaprodi=$value->kaprodi;
                    $data_korbidpkl=$value->korbidpkl;
            ?>
<div class="container">
  <form class="form-horizontal" action="<?php echo base_url()?>Adminprodi/update_ttd" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" class="form-control" id="inputZip" required value="<?php echo $id_ttd?>">
<div class="form-row">
            <div class="form-group col-md-5">
                <label>PRODI :</label>
                  <select name="prodi" class="form-control select2" style="width: 100%;">
                  <?php foreach ($data_prodi->result_array() as $a) :
                       $id          =$a['id_prodi'];
                       $nama_prodi  =$a['nama_prodi'];
                       $selected    = ($prodi_asli==$nama_prodi) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>"  <?= $selected; ?> class=""><?php echo $nama_prodi ?></option><?php endforeach;?>
                  </select>
                </div>    
                <div class="form-group col-md-5">
                  <label>Ketua Jurusan :</label>
                  <select name="kajur" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_pegawai->result_array() as $pegawai) :
                       $id=$pegawai['NIP'];
                       $kajur=$pegawai['nama_pegawai'];
                       $selected = ($data_kajur ==$kajur) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>"  <?= $selected; ?> class=""><?php echo $kajur ?></option><?php endforeach;?>
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
                       $selected = ($pegawai==$data_kaprodi) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>"  <?= $selected; ?> class=""><?php echo $pegawai ?></option><?php endforeach;?>
                  </select>
                </div>      
                <div class="form-group col-md-5">
                  <label>Kordinator Bidang PKL :</label>
                  <select name="korbidpkl" class="form-control select2" style="width: 100%;">
                   <?php foreach ($data_pegawai->result_array() as $pegawai) :
                       $id=$pegawai['NIP'];
                       $pegawai=$pegawai['nama_pegawai'];
                       $selected = ($pegawai==$data_korbidpkl) ? 'selected' : '';
                    ?>
                    <option value="<?php echo $id ?>"  <?= $selected; ?> class=""><?php echo $pegawai ?></option><?php endforeach;?>
                  </select>
                </div>
  </div>
  <a href="<?php echo base_url()?>Adminprodi/tampil_ttd" class="btn btn-secondary">Kembali</a>
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
    

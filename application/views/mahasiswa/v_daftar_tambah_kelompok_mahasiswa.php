
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
  <form class="form-horizontal" action="<?php echo base_url()?>Mahasiswa/proses_daftar_mahasiswa" method="post" enctype="multipart/form-data">
<!--<input type="hidden" name="tahun" class="form-control" id="inputZip" required value=" <?php echo $this->session->userdata('ses_angkatan')?>">-->
  <div class="form-row">
    <div class="form-group col-md-5">
                  <label>Pilih PRODI :</label>
                  <select name="prodi" id="kota" class="form-control select2" style="width: 100%;">
                  <?php foreach($data_prodi->result() as $row):?>
                   <option value="<?php echo $row->id_prodi;?>"><?php echo $row->nama_prodi;?></option>
                   <?php endforeach;?>

                  </select>
                </div>
    <div class="form-group col-md-5">
                  <label>Pilih Tahun Angkatan :</label>
                  <select name="angkatan" id="kota" class="form-control select2" style="width: 100%;">
                  <?php foreach($data_angkatan->result() as $row):?>
                   <option value="<?php echo $row->id_angkatan;?>"><?php echo $row->angkatan;?></option>
                   <?php endforeach;?>
                  </select>
                </div>            
</div>
  <a href="<?php echo base_url()?>Mahasiswa/daftar_pkl_langsung" class="btn btn-secondary">Kembali</a>
  <button type="submit" name="Submit" class="btn btn-primary">Tampilkan</button>
</form>
</div>
          </div>

        </div>





        </div>
        </div>
      </div>
    </section>
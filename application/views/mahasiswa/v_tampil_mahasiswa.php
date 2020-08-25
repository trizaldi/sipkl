
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
      </div>
    </section>

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

<!--Tabel baru -->
     <div class="card-body">
<form class="form-horizontal" action="<?php echo base_url()?>Mahasiswa/insert_ajukan_lokasi" method="post" enctype="multipart/form-data">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th></th>
                    <th></th>
                    <th>Pilih Anggota</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td></td>
                    <td>Pilih Anggota Kelompok 1</td>
                    <td>:</td>
                    <td><input type="hidden" name="mahasiswa_1" class="form-control" id="inputZip" readonly value="<?php echo $this->session->userdata('ses_id')?>">
                    <input type="text" class="form-control" id="inputZip" readonly value="<?php echo $this->session->userdata('ses_nama')?>"></td> 
                  </tr>
                  <tr>
                    <td></td>
                    <td>Pilih Anggota Kelompok 2</td>
                    <td>:</td>
                    <td><select name="mahasiswa_2" id="mahasiswa_2" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_mahasiswa->result_array() as $mahasiswa) :
                                  $NIM=$mahasiswa['NIM'];
                                  $nama=$mahasiswa['nama_mhs']; ?>
                   <option value="<?php echo $NIM; ?>"><?php echo $nama;?></option>
                   <?php endforeach;?>
                  </select></td> 
                  </tr>
                  <tr>
                    <td></td>
                    <td>Pilih Anggota Kelompok 3</td>
                    <td>:</td>
                    <td><select name="mahasiswa_3" id="mahasiswa_3" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_mahasiswa->result_array() as $mahasiswa) :
                                  $NIM=$mahasiswa['NIM'];
                                  $nama=$mahasiswa['nama_mhs']; ?>
                   <option value="<?php echo $NIM; ?>"><?php echo $nama;?></option>
                   <?php endforeach;?>
                  </select></td> 
                  </tr>
                  <tr>
                    <td></td>
                    <td>Pilih Anggota Kelompok 4</td>
                    <td>:</td>
                    <td><select name="mahasiswa_4" id="mahasiswa_4" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_mahasiswa->result_array() as $mahasiswa) :
                                  $NIM=$mahasiswa['NIM'];
                                  $nama=$mahasiswa['nama_mhs']; ?>
                   <option value="<?php echo $NIM; ?>"><?php echo $nama;?></option>
                   <?php endforeach;?>
                  </select></td> 
                  </tr>
                  <tr>
                    <td></td>
                    <td>Pilih Anggota Kelompok 5</td>
                    <td>:</td>
                    <td><select name="mahasiswa_5" id="mahasiswa_5" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_mahasiswa->result_array() as $mahasiswa) :
                                  $NIM=$mahasiswa['NIM'];
                                  $nama=$mahasiswa['nama_mhs']; ?>
                   <option value="<?php echo $NIM; ?>"><?php echo $nama;?></option>
                   <?php endforeach;?>
                  </select></td> 
                  </tr>

                  </tbody>
                </table>



  <a href="<?php echo base_url()?>Mahasiswa/tampil_mahasiswa" class="btn btn-secondary">Kembali</a>
  <button type="submit" class="btn btn-primary">Approve</button>
</form>

              </div>

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div> 

<!-- tabel berakhir -->
  </div>
        </div>
      </div>
    </section>
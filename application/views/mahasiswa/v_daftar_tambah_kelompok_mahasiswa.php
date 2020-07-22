
    <!-- 
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
    </section>-->


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
<form class="form-horizontal" action="<?php echo base_url()?>Mahasiswa/insert_usulan_kelompok" method="post" enctype="multipart/form-data">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th></th>
                    <th></th>
                    <th>Pilih Anggota</th>
                    <th>Pilih Tahun Angkatan</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td></td>
                    <td>Pilih Anggota Kelompok 1</td>
                    <td>:</td>
                    <td><input type="hidden" name="mahasiswa_1" class="form-control" id="inputZip" readonly value="<?php echo $this->session->userdata('ses_id')?>">
                    <?php foreach($data_usulan_lokasi->result() as $row):?>
                    <input type="hidden" name="id_lokasi" class="form-control" id="inputZip" readonly value="<?php echo $row->id_usulan ?>">
                    <?php endforeach;?>
                    <input type="text" class="form-control" id="inputZip" readonly value="<?php echo $this->session->userdata('ses_nama')?>"></td>
                    <td></td> 
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
                  <td><select name="angkatan_2" id="angkatan_2" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_angkatan->result_array() as $angkatan) :
                                  $id_angkatan=$angkatan['id_angkatan'];
                                  $angkatan=$angkatan['angkatan']; ?>
                   <option value="<?php echo $id_angkatan; ?>"><?php echo $angkatan;?></option>
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
                  <td><select name="angkatan_3" id="angkatan_3" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_angkatan->result_array() as $angkatan) :
                                  $id_angkatan=$angkatan['id_angkatan'];
                                  $angkatan=$angkatan['angkatan']; ?>
                   <option value="<?php echo $id_angkatan; ?>"><?php echo $angkatan;?></option>
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
                  <td><select name="angkatan_4" id="angkatan_4" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_angkatan->result_array() as $angkatan) :
                                  $id_angkatan=$angkatan['id_angkatan'];
                                  $angkatan=$angkatan['angkatan']; ?>
                   <option value="<?php echo $id_angkatan; ?>"><?php echo $angkatan;?></option>
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
                  <td><select name="angkatan_5" id="angkatan_5" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_angkatan->result_array() as $angkatan) :
                                  $id_angkatan=$angkatan['id_angkatan'];
                                  $angkatan=$angkatan['angkatan']; ?>
                   <option value="<?php echo $id_angkatan; ?>"><?php echo $angkatan;?></option>
                   <?php endforeach;?>
                  </select></td>   
                  </tr>

                  </tbody>
                </table>



  <a href="<?php echo base_url()?>Mahasiswa/tampil_mahasiswa" class="btn btn-secondary">Kembali</a>
  <button type="submit" class="btn btn-primary">Simpan Kelompok</button>
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
    <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
        <script type="text/javascript">
  $(document).ready(function(){
    $('#angkatan_2').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>Mahasiswa/find_mahasiswa",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].NIM+'>'+data[i].nama_mhs+'</option>';
                }
                $('#mahasiswa_2').html(html);
          
        }
      });
    });
      });

    $(document).ready(function(){
    $('#angkatan_3').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>Mahasiswa/find_mahasiswa",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].NIM+'>'+data[i].nama_mhs+'</option>';
                }
                $('#mahasiswa_3').html(html);
          
        }
      });
    });
      });

    $(document).ready(function(){
    $('#angkatan_4').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>Mahasiswa/find_mahasiswa",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].NIM+'>'+data[i].nama_mhs+'</option>';
                }
                $('#mahasiswa_4').html(html);
          
        }
      });
    });
      });


    $(document).ready(function(){
    $('#angkatan_5').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>Mahasiswa/find_mahasiswa",
        method : "POST",
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].NIM+'>'+data[i].nama_mhs+'</option>';
                }
                $('#mahasiswa_5').html(html);
          
        }
      });
    });
      });
  </script>
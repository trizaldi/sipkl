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
<!--<form class="form-horizontal" action="<?php echo base_url()?>Mahasiswa/insert_usulan_kelompok" id="myForm" method="post" enctype="multipart/form-data">-->
  <form class="form-horizontal" enctype="multipart/form-data" id="myForm">
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
                    <td><input type="hidden" name="mahasiswa_1" class="form-control" id="mahasiswa_1" readonly value="<?php echo $this->session->userdata('ses_id')?>">
                      <input type="hidden" name="id" class="form-control" id="mahasiswa_1" readonly value="<?php echo $kode_kelompok ?>">
                    <?php foreach($id_usulan_lokasi->result() as $row):?>
                    <input type="text" name="id_lokasi" class="form-control" id="inputZip" readonly value="<?php echo $row->id_usulan ?>">
                    <?php endforeach;?>
                    <input type="text" class="form-control" id="inputZip" readonly value="<?php echo $this->session->userdata('ses_nama')?>"></td>
                    <td></td> 
                  </tr>
                  <?php 
                  $status=$this->session->userdata('ses_status');

                  if($status==1){

                  
                  ?>
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


              <?php } else{ ?>
                <tr>
                    <td></td>
                    <td>Pilih Anggota Kelompok 2</td>
                    <td>:</td>
                    <td><select name="mahasiswa_2" id="mahasiswa_2" class="form-control select2" style="width: 100%;">
                  <?php  foreach ($data_semua_mahasiswa->result_array() as $mahasiswa) :
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
                  <?php  foreach ($data_semua_mahasiswa->result_array() as $mahasiswa) :
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
                  <?php  foreach ($data_semua_mahasiswa->result_array() as $mahasiswa) :
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
                  <?php  foreach ($data_semua_mahasiswa->result_array() as $mahasiswa) :
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
                  <?php } ?>



 <!-- <a href="<?php echo base_url()?>Mahasiswa/daftar_pkl_langsung" class="btn btn-secondary">Kembali</a>-->
  <button type="submit" id="submit" class="btn btn-primary">Simpan Data Kelompok</button>
</form>
<div id="data"></div>
<span class="error" style="display:none"> Please Enter Valid Data</span>
<span class="success" style="display:none"> Form Submitted Success</span>
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

$(function () {
    $("#submit").click(function (event) {
      var mahasiswa_1 = $("#mahasiswa_1").val();
      var mahasiswa_2 = $("#mahasiswa_2").val();
      var mahasiswa_3 = $("#mahasiswa_3").val();
      var mahasiswa_4 = $("#mahasiswa_4").val();
      var mahasiswa_5 = $("#mahasiswa_5").val();
      if (mahasiswa_1 == mahasiswa_2 || mahasiswa_1 == mahasiswa_3 || mahasiswa_1 == mahasiswa_4 || mahasiswa_1 == mahasiswa_5){
        alert('Data tidak boleh sama dan Lengkapi data');
        location.reload();
      }else if(mahasiswa_2 == mahasiswa_1 || mahasiswa_2 == mahasiswa_3 || mahasiswa_2 == mahasiswa_4 || mahasiswa_2 == mahasiswa_5){
        alert('Data tidak boleh sama dan Lengkapi data');
        location.reload();
      }else if(mahasiswa_3 == mahasiswa_1 || mahasiswa_3 == mahasiswa_2 || mahasiswa_3 == mahasiswa_4 || mahasiswa_3 == mahasiswa_5){
        alert('Data tidak boleh sama dan Lengkapi data');
        location.reload();
      }else if(mahasiswa_4 == mahasiswa_1 || mahasiswa_4 == mahasiswa_2 || mahasiswa_4 == mahasiswa_3 || mahasiswa_4 == mahasiswa_5){
        alert('Data tidak boleh sama dan Lengkapi data');
        location.reload();
      }else if(mahasiswa_5 == mahasiswa_1 || mahasiswa_5 == mahasiswa_2 || mahasiswa_5 == mahasiswa_3 || mahasiswa_5 == mahasiswa_4){
        alert('Data tidak boleh sama dan Lengkapi data');
        location.reload();
      }else if( mahasiswa_2 == '' || mahasiswa_3 == '' || mahasiswa_4 == '' || mahasiswa_5 ==''){
        alert('data tidak boleh kosong');
        location.reload();
      }      
      else{
      var data = $('#myForm').serialize(); 
        $.ajax({
          type: "POST",
          url: "<?php echo base_url()?>Mahasiswa/insert_usulan_kelompok",
          data: data,
          success: function (data) {
          alert('data berhasil di simpan');
          window.location.href =('<?php echo base_url()?>Mahasiswa/daftar_pkl_langsung');
          }
        });
      }
      event.preventDefault();
    });
  });
  </script>
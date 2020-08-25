
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mahasiswa Pengajuan PKL </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Mahasiswa Pengajuan PKL</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <section class="content">


    <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'><B>DATA PENGAJUAN PKL MAHASISWA</B></h3>

              </div>

<div class='card-body'>
  <?php
  $status_usulan_lokasi=$this->session->userdata('ses_status');
  $status_verifikasi_lokasi=$this->session->userdata('ses_status_verifikasi');

    if($status_usulan_lokasi==1){
       echo "<h5><span class='badge badge-primary'>Anda Telah Mengajukan PKL Silahkan Tunggu Verifikasi</span></h5>";
      }
      elseif($status_usulan_lokasi==2){
      #  echo "<button type='button' class='btn btn-md btn-info ' onclick='button()' id='tombol_tambah_lokasi'><i class='fa fa-plus' aria-hidden='true'></i> Pengajuan Lokasi </button></a>";
      }
      elseif($status_usulan_lokasi==3){
        echo "<button type='button' class='btn btn-md btn-info ' onclick='button()' id='tombol_tambah_lokasi'><i class='fa fa-plus' aria-hidden='true'></i> Pengajuan Lokasi & Kelompok PKL </button></a>";
      }
      else{
        echo "<button type='button' class='btn btn-md btn-info ' onclick='button()' id='tombol_tambah_lokasi'><i class='fa fa-plus' aria-hidden='true'></i> Pengajuan Lokasi </button></a>";
      }

      ?>
                <table id='example' class='table table-bordered table-striped'>
                  <thead>
                  <tr>
                    <th width='10'>No</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat</th>
                    <th>telp</th>
                    <th>Kota</th>
                    <th>Status Usulan</th>
                    <th>Status verifikasi</th>
                    <th>Kelompok</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;

                    foreach ($data_usulan_lokasi->result_array() as $lokasi) :
                      $id_usulan=$lokasi['id_usulan'];  
                       $id=$lokasi['id_lokasi'];
                       $nama=$lokasi['nama_lokasi'];
                       $alamat=$lokasi['alamat'];
                       $telp=$lokasi['telp'];
                       $kota=$lokasi['kota'];
                       $status_usulan=$lokasi['stat_usulan'];
                       $status_verifikasi=$lokasi['stat_verifikasi'];

                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $nama ?></td>
                    <td><?php echo $alamat ?></td>
                    <td><?php echo $telp ?></td>
                    <td><?php echo $kota ?></td>
                    <td><?php

                     if ($status_usulan==1){
                      echo "<h5><span class='badge badge-info'>Usulan</span></h5>";
                      }elseif ($status_usulan==2) {
                        echo "<h5><span class='badge badge-success'>Disetujui</span></h5>";
                      }
                      else{
                        echo "<h5><span class='badge badge-danger'>Ditolak</span></h5>";
                      }
                      ?></td>

                    <td><?php if ($status_verifikasi==1){
                      echo "<h5><span class='badge badge-info'>Belum Diverifikasi</span></h5>";
                      }else{
                        echo "<h5><span class='badge badge-success'>Telah Diverifikasi</span></h5>";
                      }
                      ?></td>
                                               <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                      </div>
                        <a class="btn btn-info view_detail" relid="<?php echo $id_usulan; ?>" title="Lihat Kelompok"><i class="fas fa-search-plus"></i></a>            
                      </td>
  
                    <?php endforeach;?>
                  </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>





              </div>    

            </div>
          </div>
        </div>

 <!--section kedua -->

      <!--     <div class='row' id='kelompok'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'><B>DATA PENGAJUAN KELOMPOK PKL</B></h3>

              </div>
              <div class='card-body'>
 <?php
 //   if($data_mahasiswa_1->num_rows()>0)
   // {
     // foreach ($data_mahasiswa_1->result() as $row)
      //{
               #echo "<div class='alert alert-success' role='alert'>Anda Telah Mengisi Data Kelompok Silahkan Tunggu Verifikasi!</div>";
      //}
      //}
      //else if($data_usulan_lokasi->num_rows()>0){
        //      foreach ($data_usulan_lokasi->result() as $row)
      //{
        //       echo "<button type='button' onclick='tombol_kelompok()' class='btn btn-md btn-info' id='tombol_tambah_lokasi'><i class='fa fa-plus' aria-hidden='true'></i> Pengajuan Kelompok </button></a>";
      //}
      //}
      //else{
        //echo " ";
      //}?>   
          <table id='example' class='table table-bordered table-striped'>
                  <thead>
                  <tr>
                    
                    <th width='20%'>Identitas Kelompok</th>
                    <th width='20%'>NIM</th>
                    <th >Nama Anggota</th>
                    <th >PRODI</th>
                    <th >Angkatan</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    
                    <td>Ketua kelompok</td>
                    <td><?php  foreach ($data_mahasiswa_1 as $mahasiswa_1){
                      echo $mahasiswa_1->NIM;
                     ?></td>
                    <td>
                      <?php echo $mahasiswa_1->nama_mhs; ?> 
                      </td>
                    <td>
                      <?php echo $mahasiswa_1->nama_prodi;  ?> 
                      </td> 
                    <td>
                      <?php echo $mahasiswa_1->angkatan; } ?> 
                      </td> 
                  </tr>
                  <tr>
                    
                    <td>Anggota 1</td>
                    <td><?php  foreach ($data_mahasiswa_2 as $mahasiswa_2){
                      echo $mahasiswa_2->NIM;

                     ?></td>
                    <td>
                      <?php echo $mahasiswa_2->nama_mhs;  ?> 
                      </td>
                    <td>
                      <?php echo $mahasiswa_1->nama_prodi;  ?> 
                      </td> 
                    <td>
                      <?php echo $mahasiswa_1->angkatan; } ?> 
                      </td>
                  </tr>
                  <tr>
                    
                    <td>Anggota 2</td>
                    <td><?php  foreach ($data_mahasiswa_3 as $mahasiswa_3){
                      echo $mahasiswa_3->NIM;

                     ?></td>
                    <td>
                      <?php echo $mahasiswa_3->nama_mhs;  ?> 
                      </td>
                    <td>
                      <?php echo $mahasiswa_1->nama_prodi;  ?> 
                      </td> 
                    <td>
                      <?php echo $mahasiswa_1->angkatan; } ?> 
                      </td>
                  </tr>
                  <tr>
                    
                    <td>Anggota 3</td>
                    <td><?php  foreach ($data_mahasiswa_4 as $mahasiswa_4){
                      echo $mahasiswa_4->NIM;

                     ?></td>
                    <td>
                      <?php echo $mahasiswa_4->nama_mhs;  ?> 
                      </td>
                    <td>
                      <?php echo $mahasiswa_1->nama_prodi;  ?> 
                      </td> 
                    <td>
                      <?php echo $mahasiswa_1->angkatan; } ?> 
                      </td>
                  </tr>
                  <tr>
                    
                    <td>Anggota 4</td>
                    <td><?php  foreach ($data_mahasiswa_5 as $mahasiswa_5){
                      echo $mahasiswa_5->NIM;

                     ?></td>
                    <td>
                      <?php echo $mahasiswa_2->nama_mhs; ?> 
                      </td>
                    <td>
                      <?php echo $mahasiswa_1->nama_prodi;  ?> 
                      </td> 
                    <td>
                      <?php echo $mahasiswa_1->angkatan; } ?> 
                      </td>
                  </tr>

                  </tbody>
                </table>
-->
              </div>    
            </div>
          </div>
        </div> 


      </div>
    </section>
  </div>
 <div id="show_modal" class="modal fade bd-example-modal-lg" role="dialog" style="background: #000;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> Data Kelompok</h3>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <th>NIM</th>
              <th>Nama Mahasiswa</th>
              <th>PRODI</th>
              <th>Angakatan</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td><p id="NIM_1"></p></td>
              <td><p id="nama_mahasiswa_1"></p></td>
              <td><p id="prodi_1"></p></td>
              <td><p id="angkatan_1"></p></td>
            </tr>
             <tr>
              <td><p id="NIM_2"></p></td>
              <td><p id="nama_mahasiswa_2"></p></td>
              <td><p id="prodi_2"></p></td>
              <td><p id="angkatan_2"></p></td>
            </tr>
             <tr>
              <td><p id="NIM_3"></p></td>
              <td><p id="nama_mahasiswa_3"></p></td>
              <td><p id="prodi_3"></p></td>
              <td><p id="angkatan_3"></p></td>
            </tr>
             <tr>
              <td><p id="NIM_4"></p></td>
              <td><p id="nama_mahasiswa_4"></p></td>
              <td><p id="prodi_4"></p></td>
              <td><p id="angkatan_4"></p></td>
            </tr>
             <tr>
              <td><p id="NIM_5"></p></td>
              <td><p id="nama_mahasiswa_5"></p></td>
              <td><p id="prodi_5"></p></td>
              <td><p id="angkatan_5"></p></td>
            </tr>
          </tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>


  <script type='text/javascript'>

function button() {
    alert("PERHATIAN !!:\n 1. Jangan Close Browser Saat Mengisi Data.\n2. Harap Mengisi Data Dengan Lengkap \n 3. Pengisian Dimulai Isi Usulan Lokasi Kemudian Dilanjutkan Isi Anggota Kelompok");
    location.href='<?php echo base_url()?>Mahasiswa/tambah_lokasi_mahasiswa';
};
function tombol_kelompok() {
    location.href='<?php echo base_url()?>Mahasiswa/tambah_kelompok_mahasiswa';
};
  </script>

<script type='text/javascript'>
    $(document).ready(function(){
    $('#kota').change(function(){
      var id=$(this).val();
      $.ajax({
        url : '<?php echo base_url();?>Mahasiswa/find_lokasi',
        method : 'POST',
        data : {id: id},
        async : false,
            dataType : 'json',
        success: function(data){
          var html = '';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value='+data[i].id_lokasi+'>'+data[i].nama_lokasi+'</option>';
                }
                $('#lokasi').html(html);
          
        }
      });
    });
  $('#save').click(function(){
    var data = $('#form_tambah_lokasi').serialize();
    $.ajax({
      type: 'POST',
      url: '<?php echo base_url()?>Mahasiswa/insert_ajukan_lokasi',
      data: data,
      success: function() {
        alert('Data berhasil disimpan');
      }
    });
  });

  
      });

</script>


<script type="text/javascript">
    $(document).ready(function() {

      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value
          console.log(id);
          $.ajax({
              url : "<?php echo base_url(); ?>Mahasiswa/find_kelompok_mahasiswa_1",
              data:{id : id},
              method:'POST',
              dataType:'json',
              success: function(data){
                var NIM_1 = '';
                var nama_mahasiswa_1 = '';
                var prodi_1 = '';
                var angkatan_1 = '';
                var i;
                for(i=0; i<data.length; i++){
                    NIM_1 += data[i].NIM;
                    nama_mahasiswa_1 += data[i].nama_mhs;
                    prodi_1 += data[i].nama_prodi;
                    angkatan_1 += data[i].angkatan;
                }
                $('#NIM_1').html(NIM_1);
                $('#nama_mahasiswa_1').html(nama_mahasiswa_1);
                $('#prodi_1').html(prodi_1);
                $('#angkatan_1').html(angkatan_1);
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });

    $(document).ready(function() {

      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value
          console.log(id);
          $.ajax({
              url : "<?php echo base_url(); ?>Mahasiswa/find_kelompok_mahasiswa_2",
              data:{id : id},
              method:'POST',
              dataType:'json',
              success: function(data){
                var NIM_2 = '';
                var nama_mahasiswa_2 = '';
                var prodi_2 = '';
                var angkatan_2 = '';
                var i;
                for(i=0; i<data.length; i++){
                    NIM_2 += data[i].NIM;
                    nama_mahasiswa_2 += data[i].nama_mhs;
                    prodi_2 += data[i].nama_prodi;
                    angkatan_2 += data[i].angkatan;
                }
                $('#NIM_2').html(NIM_2);
                $('#nama_mahasiswa_2').html(nama_mahasiswa_2);
                $('#prodi_2').html(prodi_2);
                $('#angkatan_2').html(angkatan_2);
                //$('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });

    $(document).ready(function() {

      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value
          console.log(id);
          $.ajax({
              url : "<?php echo base_url(); ?>Mahasiswa/find_kelompok_mahasiswa_3",
              data:{id : id},
              method:'POST',
              dataType:'json',
              success: function(data){
                var NIM_3 = '';
                var nama_mahasiswa_3 = '';
                var prodi_3 = '';
                var angkatan_3 = '';
                var i;
                for(i=0; i<data.length; i++){
                    NIM_3 += data[i].NIM;
                    nama_mahasiswa_3 += data[i].nama_mhs;
                    prodi_3 += data[i].nama_prodi;
                    angkatan_3 += data[i].angkatan;
                }
                $('#NIM_3').html(NIM_3);
                $('#nama_mahasiswa_3').html(nama_mahasiswa_3);
                $('#prodi_3').html(prodi_3);
                $('#angkatan_3').html(angkatan_3);
                //$('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });

    $(document).ready(function() {
      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value
          console.log(id);
          $.ajax({
              url : "<?php echo base_url(); ?>Mahasiswa/find_kelompok_mahasiswa_4",
              data:{id : id},
              method:'POST',
              dataType:'json',
              success: function(data){
                var NIM_4 = '';
                var nama_mahasiswa_4 = '';
                var prodi_4 = '';
                var angkatan_4 = '';
                var i;
                for(i=0; i<data.length; i++){
                    NIM_4 += data[i].NIM;
                    nama_mahasiswa_4 += data[i].nama_mhs;
                    prodi_4 += data[i].nama_prodi;
                    angkatan_4 += data[i].angkatan;
                }
                $('#NIM_4').html(NIM_4);
                $('#nama_mahasiswa_4').html(nama_mahasiswa_4);
                $('#prodi_4').html(prodi_4);
                $('#angkatan_4').html(angkatan_4);
                //$('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });

    $(document).ready(function() {
      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value
          console.log(id);
          $.ajax({
              url : "<?php echo base_url(); ?>Mahasiswa/find_kelompok_mahasiswa_5",
              data:{id : id},
              method:'POST',
              dataType:'json',
              success: function(data){
                var NIM_5 = '';
                var nama_mahasiswa_5 = '';
                var prodi_5 = '';
                var angkatan_5 = '';
                var i;
                for(i=0; i<data.length; i++){
                    NIM_5 += data[i].NIM;
                    nama_mahasiswa_5 += data[i].nama_mhs;
                    prodi_5 += data[i].nama_prodi;
                    angkatan_5 += data[i].angkatan;
                }
                $('#NIM_5').html(NIM_5);
                $('#nama_mahasiswa_5').html(nama_mahasiswa_5);
                $('#prodi_5').html(prodi_5);
                $('#angkatan_5').html(angkatan_5);
                //$('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }
          });
      });
    });
</script>
  

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
                <h3 class='card-title'><B>DATA PENGAJUAN LOKASI PKL</B></h3>

              </div>

<div class='card-body'>
  <?php
    if($data_akses_mahasiswa->num_rows()>0)
    {
      foreach ($data_akses_mahasiswa->result() as $row)
      {
               echo " <div class='container'> <div class='alert alert-success' role='alert'>
    <strong>Berhasil! </strong>Anda Telah memilih lokasi PKL Silahkan Tunggu Verifikasi!</div></div>";
      }
      }
      else      
      {
        echo "<button type='button' class='btn btn-md btn-info ' onclick='button()' id='tombol_tambah_lokasi'><i class='fa fa-plus' aria-hidden='true'></i> Pengajuan Lokasi </button></a>";
      }?>
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
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;
                    foreach ($data_usulan_lokasi->result_array() as $lokasi) :
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
                    <td><?php if ($status_usulan==1){
                      echo 'Usulan';
                      }elseif ($status_usulan=2) {
                        echo 'Setujui';
                      }
                      else{
                        echo 'Ditolak';
                      }
                      ?></td>

                    <td><?php if ($status_verifikasi==1){
                      echo 'Belum Diverifikasi';
                      }else{
                        echo 'Telah Diverifikasi';
                      }
                      ?></td>
  
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

     <div class='row' id='kelompok'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'><B>DATA PENGAJUAN KELOMPOK PKL</B></h3>

              </div>
              <div class='card-body'>
<!--<a  class='btn' data-toggle='modal' data-target='#ModalKelompok'><button type='button'  class='btn btn-lg btn-danger'>Ajukan Kelompok PKL</button></a>-->
 <?php
    if($data_mahasiswa_1->num_rows()>0)
    {
      foreach ($data_mahasiswa_1->result() as $row)
      {
               echo "<div class='alert alert-success' role='alert'>Anda Telah Mengisi Data Kelompok Silahkan Tunggu Verifikasi!</div>";
      }
      }
      else if($data_usulan_lokasi->num_rows()>0){
              foreach ($data_usulan_lokasi->result() as $row)
      {
               echo "<button type='button' onclick='tombol_kelompok()' class='btn btn-md btn-info' id='tombol_tambah_lokasi'><i class='fa fa-plus' aria-hidden='true'></i> Pengajuan Kelompok </button></a>";
      }
      }
      else{
        echo " ";
      }?>   
                <table id='example' class='table table-bordered table-striped'>
                  <thead>
                  <tr>
                    <th width='10'>No</th>
                    <th width='20%'>Identitas Kelompok</th>
                    <th width='20%'>NIM</th>
                    <th >Nama Anggota</th>
                    <th >PRODI</th>
                    <th >Angkatan</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td></td>
                    <td>Ketua kelompok</td>
                    <td><?php  foreach ($data_mahasiswa_1->result() as $mahasiswa_1){
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
                    <td></td>
                    <td>Anggota 1</td>
                    <td><?php  foreach ($data_mahasiswa_2->result() as $mahasiswa_2){
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
                    <td></td>
                    <td>Anggota 2</td>
                    <td><?php  foreach ($data_mahasiswa_3->result() as $mahasiswa_3){
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
                    <td></td>
                    <td>Anggota 3</td>
                    <td><?php  foreach ($data_mahasiswa_4->result() as $mahasiswa_4){
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
                    <td></td>
                    <td>Anggota 4</td>
                    <td><?php  foreach ($data_mahasiswa_5->result() as $mahasiswa_5){
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

              </div>    
            </div>
          </div>
        </div> 


      </div>
    </section>
  </div>
  <script type='text/javascript'>

function button() {
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
  
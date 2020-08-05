        <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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


            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
          
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id='example1' class='table table-bordered table-striped'>
                  <thead>
                  <tr>
                    <th width='10'>No</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat</th>
                    <th>telp</th>
                    <th>Kota</th>
                    <th>Status Usulan</th>
                    <th>Status verifikasi</th>
                    <th width="17%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;
                    foreach ($data_usulan_lokasi->result_array() as $lokasi) :
                       $id_lokasi=$lokasi['id_lokasi'];
                       $id_usulan=$lokasi['id_usulan'];
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
                    <td width="15">
                      <?php if ($status_usulan==1){
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
                        <a class="btn btn-info view_detail" relid="<?php echo $id_usulan; ?>"><i class="fas fa-search-plus"></i></a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#ModalTolak<?php echo $id_usulan;?>"><i class="fa fa-ban" aria-hidden="true"></i></a>
                        <a class="btn btn-success" data-toggle="modal" data-target="#ModalVerifikasi<?php echo $id_usulan;?>"><i class="fa fa-check-circle" aria-hidden="true"></i></a>                
                      </td>
                    <?php endforeach;?>
                  </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<?php
                    $no=1;
                    foreach ($data_usulan_lokasi->result_array() as $lokasi) :
                       $id_lokasi=$lokasi['id_lokasi'];
                       $id_usulan=$lokasi['id_usulan'];
                       $nama=$lokasi['nama_lokasi'];
                       $alamat=$lokasi['alamat'];
                       $telp=$lokasi['telp'];
                       $kota=$lokasi['kota'];
                       $status_usulan=$lokasi['stat_usulan'];
                       $status_verifikasi=$lokasi['stat_verifikasi'];

                    ?>
           <div class="modal fade" id="ModalTolak<?php echo $id_usulan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Menolak Lokasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Korbidpkl/tolak_lokasi'?>/<?php echo $id_usulan ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="id" value="<?php echo $id_usulan;?>"/>
                     <p>Apakah Anda akan Menolak ajuan lokasi <b><?php echo $nama;?></b> ?</p>
                               
                    </div>
             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" id="simpan">Verifikasi</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>


<?php
                    foreach ($data_usulan_lokasi->result_array() as $lokasi) :
                       $id_usulan=$lokasi['id_usulan'];
                       $id_lokasi=$lokasi['id_lokasi'];
                       $nama=$lokasi['nama_lokasi'];
                       $alamat=$lokasi['alamat'];
                       $telp=$lokasi['telp'];
                       $kota=$lokasi['kota'];
                       $kode_pos=$lokasi['kode_pos'];
                       $longitude=$lokasi['longitude'];
                       $latitude=$lokasi['latitude'];
                    ?>      
           <div class="modal fade" id="ModalVerifikasi<?php echo $id_usulan;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Verifikasi Data Lokasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url()?>Korbidpkl/verifikasi_lokasi/<?php echo $id_usulan ?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="id" value="<?php echo $id_usulan;?>"/> 
                     <p>Apakah Anda akan Memverifikasi ajuan lokasi <b><?php echo $nama;?></b> ?</p>
                               
                    </div>
             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-flat" id="simpan">Verifikasi</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>

 <div id="show_modal" class="modal fade" role="dialog" style="background: #000;">
  <div class="modal-dialog">
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
<script type="text/javascript">
    $(document).ready(function() {

      $('.view_detail').click(function(){
          
          var id = $(this).attr('relid'); //get the attribute value
          console.log(id);
          $.ajax({
              url : "<?php echo base_url(); ?>Korbidpkl/find_kelompok_mahasiswa_1",
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
              url : "<?php echo base_url(); ?>Korbidpkl/find_kelompok_mahasiswa_2",
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
              url : "<?php echo base_url(); ?>Korbidpkl/find_kelompok_mahasiswa_3",
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
              url : "<?php echo base_url(); ?>Korbidpkl/find_kelompok_mahasiswa_4",
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
              url : "<?php echo base_url(); ?>Korbidpkl/find_kelompok_mahasiswa_5",
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

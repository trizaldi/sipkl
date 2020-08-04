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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                    <th>Longitude</th>
                    <th>Latitude</th>
                    <th>Status Verifikasi</th>
                    <th width="10">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;
                    foreach ($data->result_array() as $lokasi) :
                       $id=$lokasi['id_lok_usul'];
                       $nama=$lokasi['nama_lok'];
                       $alamat=$lokasi['alamat'];
                       $telp=$lokasi['telp'];
                       $kota=$lokasi['kota'];
                       $kode_pos=$lokasi['kode_pos'];
                       $longitude=$lokasi['longitude'];
                       $latitude=$lokasi['latitude'];
                       $status=$lokasi['status'];
                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $nama ?></td>
                    <td><?php echo $alamat ?></td>
                    <td><?php echo $telp ?></td>
                    <td><?php echo $kota ?></td>
                    <td><?php echo $kode_pos ?></td>
                    <td><?php echo $longitude ?></td>
                    <td><?php echo $latitude ?></td>
                    <td width="15">
                      <?php
                       if ($status==1){
                            echo "<h5><span class='badge badge-info'>Usulan</span></h5>";
                      }elseif ($status==2) {
                            echo "<h5><span class='badge badge-success'>Disetujui</span></h5>";

                      }else{
                            echo "<h5><span class='badge badge-danger'>Ditolak</span></h5>";
                      }
                      ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a class="btn btn-danger" data-toggle="modal" data-target="#ModalTolak<?php echo $id;?>"><i class="fa fa-ban"></i></a>
                        <a class="btn btn-success" data-toggle="modal" data-target="#ModalVerifikasi<?php echo $id;?>"><i class="fa fa-check"></i></a>
                      </div>
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
                    foreach ($data->result_array() as $lokasi) :
                       $id=$lokasi['id_lok_usul'];
                       $nama=$lokasi['nama_lok'];
                       $alamat=$lokasi['alamat'];
                       $telp=$lokasi['telp'];
                       $kota=$lokasi['kota'];
                       $id_kota=$lokasi['id_kota'];
                       $kode_pos=$lokasi['kode_pos'];
                       $longitude=$lokasi['longitude'];
                       $latitude=$lokasi['latitude'];
                    ?>      
          <div class="modal fade" id="ModalVerifikasi<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Verifikasi Usulan Lokasi Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Korbidpkl/verifikasi_usulan_lokasi_baru'?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="id" value="<?php echo $id;?>"/>
                     <input type="hidden" name="nama" value="<?php echo $nama;?>"/>
                     <input type="hidden" name="alamat" value="<?php echo $alamat;?>"/>
                     <input type="hidden" name="telp" value="<?php echo $telp;?>"/>
                     <input type="hidden" name="kota" value="<?php echo $id_kota;?>"/>
                     <input type="hidden" name="kode_pos" value="<?php echo $kode_pos;?>"/>
                     <input type="hidden" name="longitude" value="<?php echo $longitude;?>"/>
                     <input type="hidden" name="latitude" value="<?php echo $latitude;?>"/> 
                     <p>Apakah Anda akan verifikasi ajuan lokasi Baru <b><?php echo $nama;?></b> ?</p>
                               
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
<?php
                    foreach ($data->result_array() as $lokasi) :
                       $id=$lokasi['id_lok_usul'];
                       $nama=$lokasi['nama_lok'];
                       $alamat=$lokasi['alamat'];
                       $telp=$lokasi['telp'];
                       $kota=$lokasi['kota'];
                       $id_kota=$lokasi['id_kota'];
                       $kode_pos=$lokasi['kode_pos'];
                       $longitude=$lokasi['longitude'];
                       $latitude=$lokasi['latitude'];
                    ?>  
           <div class="modal fade" id="ModalTolak<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Menolak Lokasi Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Korbidpkl/Tolak_usulan_lokasi_baru'?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="id" value="<?php echo $id;?>"/>
                     <input type="hidden" name="nama" value="<?php echo $nama;?>"/>
                     <input type="hidden" name="alamat" value="<?php echo $alamat;?>"/>
                     <input type="hidden" name="telp" value="<?php echo $telp;?>"/>
                     <input type="hidden" name="kota" value="<?php echo $id_kota;?>"/>
                     <input type="hidden" name="kode_pos" value="<?php echo $kode_pos;?>"/>
                     <input type="hidden" name="longitude" value="<?php echo $longitude;?>"/>
                     <input type="hidden" name="latitude" value="<?php echo $latitude;?>"/> 
                     <p>Apakah Anda akan Menolak ajuan lokasi Baru <b><?php echo $nama;?></b> ?</p>
                               
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
    <script type='text/javascript'>

function button_pengajuan() {
    location.href='<?php echo base_url()?>Mahasiswa/tambah_usulan_lokasi';
};
  </script>
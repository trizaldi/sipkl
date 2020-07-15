    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">


    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><B>DATA PENGAJUAN LOKASI</B></h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
<a href="<?php echo base_url()?>Mahasiswa/tambah_lokasi_mahasiswa"><button type="button" class="btn btn-lg btn-primary">Ajukan Lokasi</button></a>
<br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="table-success">
                    <th width="10">No</th>
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
                       #$kode_pos=$lokasi['kode_pos'];
                       #$longitude=$lokasi['longitude'];
                       #$latitude=$lokasi['latitude'];
                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $nama ?></td>
                    <td><?php echo $alamat ?></td>
                    <td><?php echo $telp ?></td>
                    <td><?php echo $kota ?></td>
                    <td><?php if ($status_usulan==1){
                      echo "Usulan";
                      }elseif ($status_usulan=2) {
                        echo 'Setujui';
                      }
                      else{
                        echo 'Ditolak';
                      }
                      ?></td>

                    <td><?php if ($status_verifikasi==1){
                      echo "Belum Diverifikasi";
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

 <!--section kedua -->

     <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><B>DATA KELOMPOK</B></h3>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
<a href="<?php echo base_url()?>Mahasiswa/tambah_kelompok_mahasiswa"><button type="button" class="btn btn-lg btn-danger">Ajukan Kelompok</button></a>
<br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr class="table-success">
                    <th width="10">No</th>
                    <th width="20%">Identitas Kelompok</th>
                    <th width="20%">NIM</th>
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div> 



        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
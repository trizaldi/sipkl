
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
                <!--<a href="<?php echo base_url()?>Mahasiswa/tambah_lokasi" target="_parent"><button type="button" class="btn btn-primary">Tambah</button></a>
                  <a href="<?php echo base_url()?>Mahasiswa/tambah_lokasi" target="_parent"><button type="button" class="btn btn-success">Ajukan</button></a>-->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
        <!--      <a href="<?php echo base_url()?>Mahasiswa/get_tampil_update_password" target="_parent"><button type='button' class='btn btn-md btn-info '><i class='fa fa-plus' aria-hidden='true'></i> Ubah Password </button></a></a>-->
                
<br><br>
                <table id="example1" class="table table-bordered">
                  <thead>
                  <tr>
                    <!--<th width="10">No</th>
                    <th>Nama Lokasi</th>
                    <th>Alamat</th>
                    <th>No Telepon</th>
                    <th>Kota</th>
                    <th>Kode Pos</th>
                    <th>Longitude</th>
                    <th>Latitude</th>-->
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;
                    foreach ($data_pegawai as $value) {
                      $nip=$value->NIP;
                      $nama=$value->nama_pegawai;
                    #$nomor=$value->telp;
                    $nama_prodi=$value->nama_prodi;
                        ?>
                  <tr>
                  <td >NIM</td>
                  <td width="10px">:</td>
                  <td><?php echo $nip; ?></td>
                  </tr>
                  <tr>
                  <td>Nama</td>
                  <td>:</td>
                  <td><?php echo $nama; ?></td>
                  </tr>
                  <tr>
                  <td>Nama Prodi</td>
                  <td>:</td>
                    <td><?php echo $nama_prodi; ?></td>

                    <!--<td><?php echo $longitude ?></td>
                    <td><?php echo $latitude ?></td>-->
                    <?php } ?>
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

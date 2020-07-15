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
                <a href="<?php echo base_url()?>Admin/tambah_pegawai" target="_parent"><button type="button" class="btn btn-primary">Tambah</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Gelar</th>
                    <th>Program Studi</th>
                    <th width="10">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;
                    foreach ($data->result_array() as $Pegawai) :
                       $nip=$Pegawai['NIP'];
                       $nama_pegawai=$Pegawai['nama_pegawai'];
                       $gelar=$Pegawai['gelar'];
                       $prodi=$Pegawai['nama_prodi'];
                    ?>
                  <tr>
                    <td width="10"><?php echo $no++ ?></td>
                    <td><?php echo $nip ?></td>
                    <td><?php echo $nama_pegawai ?></td>
                    <td><?php echo $gelar ?></td>
                    <td width="10"><?php echo $prodi ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="<?php echo base_url()?>Admin/edit_pegawai/<?php echo $nip ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $nip;?>"><i class="fas fa-trash"></i></a>
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
                    $no=0;
                    foreach ($data->result_array() as $Pegawai) :
                      $no++;
                       $nip=$Pegawai['NIP'];
                       $nama_pegawai=$Pegawai['nama_pegawai'];
                       $gelar=$Pegawai['gelar'];
                       $prodi=$Pegawai['nama_prodi'];
                    ?>        
          <div class="modal fade" id="ModalHapus<?php echo $nip;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Pegawai</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Admin/delete_pegawai'?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="nip" value="<?php echo $nip;?>"/> 
                     <p>Apakah Anda akan menghapus pegawai bernama <b><?php echo $nama_pegawai;?></b> ?</p>
                               
                    </div>
             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>
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
                <a href="<?php echo base_url()?>Admin/tambah_prodi" target="_parent"><button type='button' class='btn btn-md btn-info '><i class='fa fa-plus' aria-hidden='true'></i> Tambah Prodi </button></a></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th>Prodi</th>
                    <th>Jurusan</th>
                    <th width="10">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;
                    foreach ($data->result_array() as $prodi) :
                       $id=$prodi['id_prodi'];
                       $nama_prodi=$prodi['nama_prodi'];
                       $nama_jurusan=$prodi['nama_jurusan'];
                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $nama_prodi ?></td>
                    <td><?php echo $nama_jurusan ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                        <a href="<?php echo base_url()?>Admin/edit_prodi/<?php echo $id ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><i class="fas fa-trash"></i></a>
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
                    foreach ($data->result_array() as $prodi) :
                       $id=$prodi['id_prodi'];
                       $nama_prodi=$prodi['nama_prodi'];
                       $nama_jurusan=$prodi['nama_jurusan'];
                    ?>
          <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Prodi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Admin/delete_prodi'?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="id" value="<?php echo $id;?>"/> 
                     <p>Apakah Anda akan menghapus PRODI <b><?php echo $nama_prodi;?></b> ?</p>
                               
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
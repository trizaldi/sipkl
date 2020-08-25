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
                <?php
                if($data->num_rows() >0){
                }
                else{
                ?>

                <a href="<?php echo base_url()?>Adminprodi/tambah_ttd" target="_parent"><button type='button' class='btn btn-md btn-info '><i class='fa fa-plus' aria-hidden='true'></i> Tambah Data Kajur Kaprodi </button></a></a>
              <?php } ?>

              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th >PRODI</th>
                    <th>Ketua Jurusan</th>
                    <th >Ketua PRODI</th>
                    <th >Korbid PKL</th>
                    <th width="12%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;
                    foreach ($data->result_array() as $Pegawai) :
                       $id=$Pegawai['id'];
                       $prodi=$Pegawai['prodi'];
                       $kajur=$Pegawai['kajur'];
                       $kaprodi=$Pegawai['kaprodi'];
                       $korbidpkl=$Pegawai['korbidpkl'];
                    ?>
                  <tr>
                    <td width="10"><?php echo $no++ ?></td>
                    <td><?php echo $prodi ?></td>
                    <td><?php echo $kajur ?></td>
                    <td><?php echo $kaprodi ?></td>
                    <td><?php echo $korbidpkl ?></td>
                    <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                      </div>
                        <a href="<?php echo base_url()?>Adminprodi/edit_ttd/<?php echo $id ?>" class="btn btn-info"><i class="fas fa-eye"></i></a>
                        <a class="btn btn-danger" data-toggle="modal" data-target="#ModalHapus<?php echo $id;?>"><i class="fa fa-eraser"></i></a>                </td>
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
                        $id=$Pegawai['id'];
                        $prodi=$Pegawai['prodi'];
                        $kajur=$Pegawai['kajur'];
                        $kaprodi=$Pegawai['kaprodi'];
                        $korbidpkl=$Pegawai['korbidpkl'];
                     ?>     
          <div class="modal fade" id="ModalHapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Hapus Data Kajur dan Kaprodi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Adminprodi/delete_ttd'?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="id" value="<?php echo $id;?>"/> 
                     <p>Apakah Anda akan menghapus Data Kajur dan Kaprodi ?</p>
                               
                    </div>
             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-danger" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>
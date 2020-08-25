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
 <!--               <a href="<?php echo base_url()?>Adminprodi/tambah_matkul" target="_parent"><button type='button' class='btn btn-md btn-info '><i class='fa fa-plus' aria-hidden='true'></i> Tambah Matkul </button></a></a>-->
                <?php $status=2; ?>
                <a class="btn btn-info view_detail" relid="<?php echo $status; ?>" title="Lihat Total Matkul"><i class="fas fa-search-plus">Cek Total Matkul</i></a>
                <span class="badge badge-pill badge-warning">Pilih Maksimal 7 Mata Kuliah Yang di Tampilkan </span>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="10">No</th>
                    <th>Nama Matkul</th>
                    <th>PRODI</th>
                    <th>status</th>
                    <th width="12%">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                   <?php
                    $no=1;
                    foreach ($data_matkul->result_array() as $matkul) :
                       $id=$matkul['kode_matkul'];
                       $nama_matkul=$matkul['nama_matkul'];
                       $prodi=$matkul['nama_prodi'];
                       $status=$matkul['stat'];
                    ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $nama_matkul ?></td>
                    <td><?php echo $prodi ?></td>
                    <td width="15">
                      <?php if ($status==1){
                      echo "<h5><span class='badge badge-danger'>Tidak Tampil</span></h5>";

                      }else {
                        echo "<h5><span class='badge badge-success'>Tampil</span></h5>";
                      }
                      ?></td>
                     <td class="text-right py-0 align-middle">
                      <div class="btn-group btn-group-sm">
                      </div>
                      <a class="btn btn-success" data-toggle="modal" data-target="#ModalTampil<?php echo $id;?>" title="Tampilkan Matkul"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                      <a class="btn btn-danger" data-toggle="modal" data-target="#ModalTidaktampil<?php echo $id;?>" title="Tidak Tampilkan Matkul"><i class="fa fa-ban" aria-hidden="true"></i></a>
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
                    foreach ($data_matkul->result_array() as $matkul) :
                       $id=$matkul['kode_matkul'];
                       $nama_matkul=$matkul['nama_matkul'];
                       $prodi=$matkul['nama_prodi'];
                       $status=$matkul['stat'];
                    ?>
        
          <div class="modal fade" id="ModalTidaktampil<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tidak tampilkan Mata Kuliah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Adminprodi/tidak_tampil_matkul'?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="id" value="<?php echo $id;?>"/> 
                     <p>Apakah Anda tidak akan menampilkan mata kuliah bernama <b><?php echo $nama_matkul;?></b> ?</p>
                               
                    </div>
             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger btn-flat" id="simpan">Tidak Di Tampilkan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>
       <!-- end hapus -->

       <?php
                    $no=1;
                    foreach ($data_matkul->result_array() as $matkul) :
                       $id=$matkul['kode_matkul'];
                       $nama_matkul=$matkul['nama_matkul'];
                       $prodi=$matkul['nama_prodi'];
                       $status=$matkul['stat'];
                    ?>
        
          <div class="modal fade" id="ModalTampil<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tampilkan Mata Kuliah</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'Adminprodi/tampilkan_matkul'?>" method="post" enctype="multipart/form-data">
                     <div class="modal-body">       
                     <input type="hidden" name="id" value="<?php echo $id;?>"/> 
                     <p>Apakah Anda akan menampilkan mata kuliah bernama <b><?php echo $nama_matkul;?></b> ?</p>
                               
                    </div>
             
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Tampilkan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>

  <div id="show_modal" class="modal fade bd-example-modal-lg" role="dialog" style="background: #000;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h3 style="font-size: 24px; color: #17919e; text-shadow: 1px 1px #ccc;"><i class="fa fa-folder"></i> Data Mata Kuliah</h3>
      </div>
      <div class="modal-body">
        <table id="Matkul" class="table table-bordered table-striped">
          <thead class="btn-primary">
            <tr>
              <th>No</th>
              <th>Nama Matakuliah</th>
              <th>PRODI</th>
            </tr>
          </thead>
          <tbody>
             <!--<tr>
              <td><p id="NIM_1"></p></td>
              <td><p id="nama_mahasiswa_1"></p></td>
             <td><p id="prodi_1"></p></td>
              <td><p id="angkatan_1"></p></td>
            </tr>-->
          </tbody>
       </table>
      </div>
      <div class="modal-footer">
        <button type="button"  class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
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
              url : "<?php echo base_url(); ?>Adminprodi/tampil_total_matkul",
              data:{id : id},
              method:'POST',
              dataType:'json',
              success: function(data){
                var i;
                for(i=0; i<data.length; i++){
                    nama_matkul = data[i].nama_matkul;
                    nama_prodi = data[i].nama_prodi;
                    //angkatan_1 += data[i].angkatan;
                    var tr_str = "<tr>" +
                    "<td>" + (i+1) + "</td>" +
                    "<td>" + nama_matkul + "</td>" +
                    "<td>" + nama_prodi + "</td>" +
                    "</tr>";

                $("#Matkul tbody").append(tr_str);
                
                }
                $('#show_modal').modal({backdrop: 'static', keyboard: true, show: true});
            }

          });
      });
    });
</script>

<script type="text/javascript">
$('#close').click(function(){
      location.reload();

    };
    </script>

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
       <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">

<div class="container">
  <!--<form class="form-horizontal" action="<?php echo base_url()?>Mahasiswa/insert_ajukan_lokasi" method="post" enctype="multipart/form-data">-->
<form class="form-horizontal" enctype="multipart/form-data" id="myForm" >
<input type="hidden" name="tahun" class="form-control" id="inputZip" required value="<?php echo $this->session->userdata('ses_angkatan')?>">
<input type="hidden" name="nim_k" class="form-control" id="inputZip" required value="<?php echo $this->session->userdata('ses_id')?>">
<input type="text" name="id" class="form-control" id="inputZip" required value="<?php echo $kode_usulan ?>">
  <div class="form-row">
    <div class="form-group col-md-5">
                  <label>Pilih Kota :</label>
                  <select name="kota" id="kota" class="form-control select2" style="width: 100%;">
                  <?php foreach($data->result() as $row):?>
                   <option value="<?php echo $row->id_kota;?>"><?php echo $row->kota;?></option>
                   <?php endforeach;?>

                  </select>
                </div>
    <div class="form-group col-md-5">
                  <label>Pilih Lokasi :</label>
                  <select name="lokasi" id="lokasi" class="form-control select2" required style="width: 100%;">
                    <option value=""></option>
                  </select>
                </div>

</div>
  <a href="<?php echo base_url()?>Mahasiswa/daftar_pkl_langsung" class="btn btn-secondary">Kembali</a>
  <button type="submit" id="submit" class="btn btn-primary">Simpan Lokasi & Isi Kelompok</button>
</form>
</div>
          </div>

        </div>

        </div>
        </div>
      </div>
    </section>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-2.2.3.min.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
        <script type="text/javascript">
  $(document).ready(function(){
    $('#kota').change(function(){
      var id=$(this).val();
      $.ajax({
        url : "<?php echo base_url();?>Mahasiswa/find_lokasi",
        method : "POST",
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
      });

  $(function () {
    $("#submit").click(function (event) {
      var lokasi = $("#lokasi").val();
      if (lokasi == ""){
        alert('Data tidak boleh kosong');
        location.reload();
      }else{
      var data = $('#myForm').serialize(); 
        $.ajax({
          type: "POST",
          url: "<?php echo base_url()?>Mahasiswa/insert_ajukan_lokasi",
          data: data,
          success: function (data) {
          alert('data berhasil di simpan');
                    //location.reload();
          window.location.href =('<?php echo base_url()?>Mahasiswa/tambah_kelompok_mahasiswa');

          }
        });
      }
      event.preventDefault();
    });
  });
  </script>
    

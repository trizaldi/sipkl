    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cetak Dokumen </h1>
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
                <h3 class='card-title'><B>DOKUMEN 1</B></h3>
              </div>

<div class='card-body'>
  <?php
  $status_usulan_lokasi=$this->session->userdata('ses_status');
  $status_verifikasi_lokasi=$this->session->userdata('ses_status_verifikasi');

    if($status_usulan_lokasi==1){
       echo "<h5><span class='badge badge-primary'>Anda Telah Mengajukan PKL Silahkan Tunggu Verifikasi</span></h5>";
      }
      elseif($status_usulan_lokasi==3){
echo "<h5><span class='badge badge-danger'>Silahkan Ajukan lokasi PKL</span></h5>";      }
      else{
      ?>


                <table id='example' class='table table-bordered table-striped'>
                  <thead>
                  <tr>
                    <th>Cover Proposal</th>
                    <th>Lembar Pengesahan</th>
                    <th>Lembar Kesediaan Menerima PKL</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td><center><img src='<?php echo base_url(); ?>assets/images/note.png' width='90' height='70' />
<div class='content'><p>Cover Proposal<br></p><a href='<?php echo base_url(); ?>assets/dokumen\dokumen_1\cover_proposal.jpeg' class='btn btn-default'>Lihat</a>
    </div></center></td>
                    <td><center><img src='<?php echo base_url(); ?>assets/images/note.png' width='90' height='70' />
<div class='content'><p>Lembar Pengesahan</p><a href='<?php echo base_url(); ?>Mahasiswa/cetak_lembar_pengesahan' class='btn btn-default' target='_BLANK'>Cetak Lembar Pengesahan</a>
    </div></center></td>
                    <td></td>
                   </tr>
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>


              </div>    

            </div>
          </div>
        </div>
<?php } ?>
 <!--section kedua 

     <div class='row' id='kelompok'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'><B>DOKUMEN 2</B></h3>

              </div>
              <div class='card-body'>
                <table id='example2' class='table table-bordered table-striped'>
                  <thead>
                  <tr>
                    <th width='10'>No</th>
                    <th>Surat Pengantar PKL</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td></td>
                    <td>Ketua kelompok</td>
                  </tr>

                  </tbody>
                </table>

              </div>    
            </div>
          </div>
        </div> -->

<!--section ketiga

     <div class='row' id='kelompok'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'><B>DOKUMEN 3</B></h3>

              </div>
              <div class='card-body'>
                <table id='example2' class='table table-bordered table-striped'>
                  <thead>
                  <tr>
                    <th width='10'>No</th>
                    <th>Surat Pelaksana</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                  <tr>
                    <td></td>
                    <td></td>
                  </tr>

                  </tbody>
                </table>

              </div>    
            </div>
          </div>
        </div>  -->




      </div>
    </section>
  </div>
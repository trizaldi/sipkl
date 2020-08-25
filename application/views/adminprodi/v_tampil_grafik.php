<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<!-- load library jquery dan highcharts -->
<script src="<?php echo base_url();?>assets/js/jquery.js"></script>
<script src="<?php echo base_url();?>assets/js/highcharts.js"></script>
<!-- end load library -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Mahasiswa Pengajuan PKL </h1>
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
                <h3 class='card-title'><B>GRAFIK USULAN PKL MAHASISWA</B></h3>
              </div>

<div class='card-body'>
       <?php
        foreach($total_usulan_pkl->result() as $data){
    $value[] = (float) $data->total;
    }
            foreach($total_usulan_pkl_disetujui->result() as $data){
    $value2[] = (float) $data->total;
    }
                foreach($total_usulan_pkl_ditolak->result() as $data){
    $value3[] = (float) $data->total;
    }
    ?> 
              <!-- Diagram 1 -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Grafik Info Korbid PKL
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                      class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <canvas id="usulan_pkl_mahasiswa_korbidpkl" style="max-width: 800px;"></canvas>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

            </div>
          </div>
        </div>
    </section>

    <section class="content">
    <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'><B>GRAFIK USULAN PKL MAHASISWA VERIFIKASI ADMIN</B></h3>
              </div>

<div class='card-body'>
       <?php
        foreach($total_usulan_pkl_diverifikasi_setuju->result() as $data){
    $telah_verifikasi[] = (float) $data->total;
    }
        foreach($total_usulan_pkl_belum_diverifikasi->result() as $data){
    $belum_verifikasi[] = (float) $data->total;
    }
    ?> 
              <!-- Diagram 2 -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Grafik info Admin Prodi
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                      class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <canvas id="usulan_pkl_mahasiswa_verifikasi_admin" style="max-width: 800px;"></canvas>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
 

            </div>
          </div>
        </div>
    </section>

    <section class="content">
    <div class='row'>
          <div class='col-12'>
            <div class='card'>
              <div class='card-header'>
                <h3 class='card-title'><B>GRAFIK USULAN LOKASI BARU</B></h3>
              </div>

<div class='card-body'>
       <?php
        foreach($total_usulan_lokasi_baru->result() as $data){
    $total_lokasi_baru[] = (float) $data->total;
    }
            foreach($total_usulan_lokasi_baru_disetujui->result() as $data){
    $usulan_lokasi_baru_disetujui[] = (float) $data->total;
    }
                foreach($total_usulan_lokasi_baru_ditolak->result() as $data){
    $usulan_lokasi_baru_ditolak[] = (float) $data->total;
    }
    ?> 
              <!-- Diagram 1 -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Grafik Info Lokasi Baru Korbid PKL
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                      class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <canvas id="grafik_usulan_lokasi_baru" style="max-width: 800px;"></canvas>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>

            </div>
          </div>
        </div>
    </section>
<script type="text/javascript">
var ctx = document.getElementById("usulan_pkl_mahasiswa_korbidpkl").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["Total Usulan", "Total Usulan Setuju", "Total Usulan Ditolak"],
datasets: [{
label: 'GRAFIK STATUS USULAN PKL MAHASISWA',
data: [<?php echo json_encode($value);?>,<?php echo json_encode($value2);?>,<?php echo json_encode($value3);?>],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});


var ctx = document.getElementById("usulan_pkl_mahasiswa_verifikasi_admin").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["Total Usulan Telah Diverifikasi Admin", "Total Usulan Belum Diverifikasi"],
datasets: [{
label: 'GRAFIK STATUS USULAN PKL TELAH DIVERIFIKASI',
data: [<?php echo json_encode($telah_verifikasi);?>,<?php echo json_encode($belum_verifikasi);?>],
backgroundColor: [
'rgba(255, 99, 132)',
'rgba(54, 162, 235)',
'rgba(255, 159, 64)'
],
borderColor: [
'rgba(255,99,132)',
'rgba(54, 162, 235)',
'rgba(255, 159, 64)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});


var ctx = document.getElementById("grafik_usulan_lokasi_baru").getContext('2d');
var myChart = new Chart(ctx, {
type: 'bar',
data: {
labels: ["Total Usulan Lokasi Baru", "Total Usulan Lokasi Baru Setuju", "Total Usulan Lokasi Baru Ditolak"],
datasets: [{
label: 'GRAFIK STATUS USULAN LOKASI BARU',
data: [<?php echo json_encode($total_lokasi_baru);?>,
<?php echo json_encode($usulan_lokasi_baru_disetujui);?>,
<?php echo json_encode($usulan_lokasi_baru_ditolak);?>],
backgroundColor: [
'rgba(255, 99, 132, 0.2)',
'rgba(54, 162, 235, 0.2)',
'rgba(255, 159, 64, 0.2)'
],
borderColor: [
'rgba(255,99,132,1)',
'rgba(54, 162, 235, 1)',
'rgba(255, 159, 64, 1)'
],
borderWidth: 1
}]
},
options: {
scales: {
yAxes: [{
ticks: {
beginAtZero: true
}
}]
}
}
});
  </script>

<script src="././js/plugins/hc/highcharts.js" type="text/javascript"></script>
<script src="././js/plugins/hc/js/exporting.js" type="text/javascript"></script>
<?php 
  if ($_GET['tahun']) {
?>
  <script type="text/javascript">
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
           chart: {
              renderTo: 'pasien',
              type: 'column'
           },   
           title: {
              text: "Data Jumlah Pasien Perbulan Tahun <?php if($_GET['tahun']){
                echo $_GET['tahun'];
              }else{
                echo date('Y');
              } ?>" 
           },
           xAxis: {
              categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des']
           },
           yAxis: {
              title: {
                 text: 'Jumlah Pasien'
              }
           },
              series:             
                [    
                  {
                    name: 'Jan, Feb, Mar, Apr, Mei, Jun, Jul, Ags, Sep, Okt, Nov, Des',
                    data: [<?php 
                             $qr1 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-01-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw1 = mysqli_fetch_array($qr1);
                             echo $rw1['jumlah'];
                           ; ?>,
                           <?php 
                             $qr2 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-02-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw2 = mysqli_fetch_array($qr2);
                             echo $rw2['jumlah'];
                           ; ?>,
                           <?php 
                             $qr3 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-03-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw3 = mysqli_fetch_array($qr3);
                             echo $rw3['jumlah'];
                           ; ?>,
                           <?php 
                             $qr4 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-04-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw4 = mysqli_fetch_array($qr4);
                             echo $rw4['jumlah'];
                           ; ?>,
                           <?php 
                             $qr5 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-05-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw5 = mysqli_fetch_array($qr5);
                             echo $rw5['jumlah'];
                           ; ?>,
                           <?php 
                             $qr6 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-06-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw6 = mysqli_fetch_array($qr6);
                             echo $rw6['jumlah'];
                           ; ?>,
                           <?php 
                             $qr7 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-07-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw7 = mysqli_fetch_array($qr7);
                             echo $rw7['jumlah'];
                           ; ?>,
                           <?php 
                             $qr8 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-08-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw8 = mysqli_fetch_array($qr8);
                             echo $rw8['jumlah'];
                           ; ?>,
                           <?php 
                             $qr9 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-09-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw9 = mysqli_fetch_array($qr9);
                             echo $rw9['jumlah'];
                           ; ?>,
                           <?php 
                             $qr10 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-010-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw10 = mysqli_fetch_array($qr10);
                             echo $rw10['jumlah'];
                           ; ?>,
                           <?php 
                             $qr11 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-11-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%'")or die(mysqli_error($koneksi));
                             $rw11 = mysqli_fetch_array($qr11);
                             echo $rw11['jumlah'];
                           ; ?>,
                           <?php 
                             $qr12 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-12-%' && tanggal_periksa LIKE '%".$_GET['tahun']."%' ")or die(mysqli_error($koneksi));
                             $rw12 = mysqli_fetch_array($qr12);
                             echo $rw12['jumlah'];
                           ; ?>]
                  },
                ]
  });
  }); 
  </script>
<?php
  }else{
?>
  <script type="text/javascript">
    var chart1; // globally available
    $(document).ready(function() {
        chart1 = new Highcharts.Chart({
           chart: {
              renderTo: 'pasien',
              type: 'column'
           },   
           title: {
              text: 'Data Jumlah Pasien Perbulan Tahun <?php echo date("Y"); ?>' 
           },
           xAxis: {
              categories: ['Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des']
           },
           yAxis: {
              title: {
                 text: 'Jumlah Pasien'
              }
           },
              series:             
                [    
                  {
                    name: 'Jan, Feb, Mar, Apr, Mei, Jun, Jul, Ags, Sep, Okt, Nov, Des',
                    data: [<?php 
                             $qr1 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-01-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw1 = mysqli_fetch_array($qr1);
                             echo $rw1['jumlah'];
                           ; ?>,
                           <?php 
                             $qr2 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-02-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw2 = mysqli_fetch_array($qr2);
                             echo $rw2['jumlah'];
                           ; ?>,
                           <?php 
                             $qr3 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-03-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw3 = mysqli_fetch_array($qr3);
                             echo $rw3['jumlah'];
                           ; ?>,
                           <?php 
                             $qr4 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-04-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw4 = mysqli_fetch_array($qr4);
                             echo $rw4['jumlah'];
                           ; ?>,
                           <?php 
                             $qr5 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-05-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw5 = mysqli_fetch_array($qr5);
                             echo $rw5['jumlah'];
                           ; ?>,
                           <?php 
                             $qr6 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-06-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw6 = mysqli_fetch_array($qr6);
                             echo $rw6['jumlah'];
                           ; ?>,
                           <?php 
                             $qr7 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-07-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw7 = mysqli_fetch_array($qr7);
                             echo $rw7['jumlah'];
                           ; ?>,
                           <?php 
                             $qr8 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-08-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw8 = mysqli_fetch_array($qr8);
                             echo $rw8['jumlah'];
                           ; ?>,
                           <?php 
                             $qr9 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-09-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw9 = mysqli_fetch_array($qr9);
                             echo $rw9['jumlah'];
                           ; ?>,
                           <?php 
                             $qr10 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-010-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw10 = mysqli_fetch_array($qr10);
                             echo $rw10['jumlah'];
                           ; ?>,
                           <?php 
                             $qr11 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-11-%' && tanggal_periksa LIKE '%".date("y")."%'")or die(mysqli_error($koneksi));
                             $rw11 = mysqli_fetch_array($qr11);
                             echo $rw11['jumlah'];
                           ; ?>,
                           <?php 
                             $qr12 = mysqli_query($koneksi,"SELECT count(stts) as jumlah FROM periksa WHERE stts='4' && tanggal_periksa LIKE '%-12-%' && tanggal_periksa LIKE '%".date("y")."%' ")or die(mysqli_error($koneksi));
                             $rw12 = mysqli_fetch_array($qr12);
                             echo $rw12['jumlah'];
                           ; ?>]
                  },
                ]
  });
  }); 
  </script>
<?php
  }
?>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <a href="index.php?tahun=2020">
              <span class="right small"> 
              #2020
              </span>
            </a>
            <li class="right small">---</li>
            <a href="index.php?tahun=2019">
              <span class="right small"> 
              #2019
              </span>
            </a>
            <li class="right small">---</li>
            <a href="index.php?tahun=2018">
              <span class="right small"> 
              #2018
              </span>
            </a>
            <li class="right small">---</li>
            <a href="index.php?tahun=2017">
              <span class="right small"> 
              #2017
              </span>
            </a>
            <li class="right small">---</li>
            <a href="index.php?tahun=2016">
              <span class="right small"> 
              #2016
              </span>
            </a>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="container">
  <div class="section" style="margin-left:-15px;margin-right:-15px;">
    <div id="responsive-table">
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card-panel">
            <div id="pasien" style="min-width: 200px; height: 400px; margin: 0 auto"></div>     
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


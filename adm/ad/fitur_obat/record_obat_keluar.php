<!-- START CONTENT -->
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="obat-masuk">Obat Keluar</a></li>
            <a href="obat-masuk">
              <span class="mdi-file-folder-shared right small"> Loket Obat</span>
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
    <!--DataTables example-->
    <!-- <div class="card-panel"> -->
    <div id="responsive-table">
      <div class="row">
        <div class="col l12 m12 s12">
          <div class="card-panel">
            <table id="tabel2" class="mdl-data-table" cellspacing="0" width="100%">
              <thead>
                <th>#</th>
                <th>ID Periksa</th>
                <th>Nama Obat</th>
                <th>Jumlah Obat</th>
                <th>Penanggung Jawab</th>
              </thead>
              <tbody>                  
                <!-- $date = date("Ymd");
                $qr   = mysqli_query($koneksi,"select * from view_om where id_om like '$date%' order by id_om desc");
                while ($rw = mysqli_fetch_array($qr))
                echo substr($rw['id_om'],8,20)+1; -->
                <?php 
                  $no = 1;
                  $qr = mysqli_query($koneksi,"select * from obat_keluar");
                  while ($rw = mysqli_fetch_array($qr)){                      
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $rw['id_periksa']; ?></td>
                  <td><?php echo $rw['nama_obat']; ?></td>
                  <td><?php echo $rw['jml_ok'] ?></td>
                  <td><?php echo ucfirst($rw['pj']); ?></td>
                </tr>
                <?php 
                  $no++;
                  }                
                ?>
              </tbody>
            </table>
            <br>
          </div>  
        </div>              
      </div>   
    </div>
  </div>
</div>
<!--end container-->
</section>
<!-- END CONTENT -->
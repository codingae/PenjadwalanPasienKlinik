<?php 
include ('././ad/jembatan.php');
$sesid = base64_decode(strrev(substr(strrev($_SESSION['id_pengguna']),2)));
?>
<!-- START CONTENT -->
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="periksa">Obat</a></li>            
            <a href="periksa">
              <span class="mdi-file-folder-shared right small"> Obat Keluar</span>
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
        <div class="col s12 m12 l12">
        <div class="card-panel">
          <h5>Pasien (Obat)</h5>
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Nama Pasien</th>
                <th>Tanggal Periksa</th>
                <th>Diagnosa Penyakit</th>
                <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
              $no        = 1;
              $query     = mysqli_query($koneksi,"SELECT * FROM view_layanan_sudah where stts='2' order by tanggal_periksa asc")or die (mysqli_error());
              while($row = mysqli_fetch_array($query)){
          ?>    
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo ucfirst($row['uname']);?></td>
                  <td><?php echo $row['tanggal_periksa'];?></td>
                  <td><?php echo $row['penyakit'];?></td>
                  <td>
                        <!-- untuk input layanan -->
                        <a href="index.php?klinik=action-ok&id=<?php echo $row['id_periksa'];?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Input Layanan">
                          <i class="mdi-action-speaker-notes"></i>
                        </a>
                  </td>                  
              </tr>
          <?php 
            $no++;
            }
          ?>
          </tbody>
        </table>
        </div>            
        </div>     
      </div>
    <br>   
  </div>
</div>
<!--end container-->
</section>
<!-- END CONTENT -->
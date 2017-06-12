<?php 
include ('././ad/jembatan.php');
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
            <li><a href="rekam-medis">Rekam Medik</a></li>            
            <a href="periksa">
              <span class="mdi-file-folder-shared right small"> Data Rekam Medik</span>
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
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Periksa</th>
                <th>No Antrian</th>
                <th>Waktu Periksa</th>
                <th>Status</th>
                <th style="width:10%">Detail</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
              $no        = 1;
              $query     = mysqli_query($koneksi,"SELECT * FROM periksa where id_pengguna='$sesid' && stts='4' order by tanggal_periksa DESC")or die (mysqli_error());
              while($row = mysqli_fetch_array($query)){
          ?>    
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['tanggal_periksa'];?></td>
                  <td><?php echo $row['no_antrian'];?></td>
                  <td><?php echo $row['waktu_periksa'];?></td>
                  <td><?php
                    $stts = $row['stts']; 
                    if ($stts=="1") {
                      echo "Menunggu...";
                    }elseif ($stts=="2") {
                      echo "Menunggu Obat";
                    }elseif ($stts=="3") {
                      echo "Tidak Datang";
                    }elseif ($stts=="4") {
                      echo "Selesai Periksa";
                    }
                  ?></td>
                  <td>
                    <a href="index.php?klinik=rm-detail&idperiksa=<?php echo $row['id_periksa'];?>" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Detail Periksa">
                      <i class="mdi-action-visibility"></i>
                    </a>
                    <?php 
                      $q = mysqli_query($koneksi,"SELECT * FROM testimoni WHERE id_testimoni = '$row[id_periksa]'");
                      $n = mysqli_num_rows($q);
                      if ($n>0) {
                        echo "";
                      }else{
                    ?>
                      <a href="#<?php echo $row['id_periksa'] ?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Testimoni">
                        <i class="mdi-communication-comment right"></i>
                      </a>
                    <?php                        
                      }
                    ?>
                  </td>
              </tr>
                      <div id="<?php echo $row['id_periksa'] ?>" class="modal bottom-sheet" style="height:60%">
                        <form method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                              <div class="row">
                                  <header><h4 class="light-green-text">Testimoni Pasien</h4></header>
                                  <div class="input-field col s12">
                                    <i class="mdi-communication-comment prefix"></i>
                                    <input type="hidden" name="id_periksa" value="<?php echo $row['id_periksa'] ?>">
                                    <!-- <input id="token_daftar" name="token_daftar" type="hidden" value="<?php echo $_SESSION['token_dftr']; ?> " > -->
                                    <textarea id="isi_testimoni" name="isi_testimoni" class="materialize-textarea" length="500" required></textarea>
                                    <label for="isi_testimoni">Testimoni</label>
                                  </div>
                              </div>
                              <br><br><br>
                        </div>
                        <div class="modal-footer">
                          <button class="waves-effect btn-flat" name="simpan_testimoni">Simpan</button>
                          <!-- <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close" type="submit">Simpan</a> -->
                          <button type="reset" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</button>
                          <!-- <a href="#" type="reset" class=" reset">Kembali</a> -->
                        </div>
                        </form>
                      </div>
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
<!-- tambah -->
<?php 
  if (isset($_POST['simpan_testimoni'])) {
    $id  = $_POST['id_periksa'];
    $isi = $_POST['isi_testimoni'];
    $tgl = date('Y-m-d');
    $query_isi = mysqli_query($koneksi,"insert into testimoni values('$id','$sesuname','$isi','$tgl','2')");
    if ($query_isi == TRUE) {
      echo "<script>Lobibox.notify('default', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Selamat Testimoni Telah Diisi'
          });</script><script>window.location='rm'</script>";
    }
  }
?>
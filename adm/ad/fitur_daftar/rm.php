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
          <form action="" method="POST">
            <div class="col s12 m4 l4">
              <h5>Rekam Medik</h5>
            </div>
            <div class="col s12 m3 l3 right-align">
              <select name="bulan" id="bulan">
                <option value="">--Pilih Bulan--</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div class="col s12 m3 l3 right-align">
              <select name="tahun" id="tahun">
                <option value="">--Pilih Tahun--</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
              </select>
            </div>
            <div class="col s12 m2 l2 left-align">
              <button type="submit" name="sort" class="waves-effect btn-flat light-green accent-3 right white-text left-align"><i class="mdi-action-print"></i> Cetak</button>
              <!-- <a href="html2pdf/examples/cetak_rum.php?id=<?php echo $sesid; ?>"><i class="mdi-action-print"></i> Cetak</a> -->
            </div>
          </form>
          <?php 
            if (isset($_POST['sort'])) {
              echo "<script>window.location='html2pdf/examples/cetak_rm.php?bulan=$_POST[bulan]&tahun=$_POST[tahun]'</script>";
              // header('location:html2pdf/examples/cetak_rum.php');
            }
          ?>
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Nama Pasien</th>
                <th>Tanggal Periksa</th>
                <th>No Antrian</th>
                <th>Waktu Periksa</th>
                <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
              $no        = 1;
              $query     = mysqli_query($koneksi,"SELECT * FROM view_layanan_belum where stts='4'")or die (mysqli_error($koneksi));
              while($row = mysqli_fetch_array($query)){
          ?>    
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo ucfirst($row['uname']);?></td>
                  <td><?php echo $row['tanggal_periksa'];?></td>
                  <td><?php echo $row['no_antrian'];?></td>
                  <td><?php echo $row['waktu_periksa'];?></td>
                  <td>
                    <a href="index.php?klinik=detail-rm&idperiksa=<?php echo $row['id_periksa'];?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Detail Periksa">
                      <i class="mdi-action-visibility"></i>
                    </a>
                    <?php 
                      $q = mysqli_query($koneksi,"SELECT * FROM testimoni WHERE id_testimoni = '$row[id_periksa]'");
                      $r = mysqli_fetch_array($q);
                      $n = mysqli_num_rows($q);
                      if ($n<=0) {
                        echo "";
                      }else{
                        $a = mysqli_query($koneksi,"SELECT * FROM testimoni WHERE id_testimoni = '$row[id_periksa]' && status='2'");
                        $b = mysqli_num_rows($a);
                        if ($b>0) {
                    ?>
                        <a href="#<?php echo $row['id_periksa'] ?>" class="tooltipped modal-trigger" data-position="top" data-delay="50" data-tooltip="Verifikasi Testimoni">
                          <i class="mdi-communication-comment right"></i>
                        </a>
                    <?php
                        }
                        $c = mysqli_query($koneksi,"SELECT * FROM testimoni WHERE id_testimoni = '$row[id_periksa]' && status='1'");
                        $d = mysqli_num_rows($c);
                        if ($d>0) {
                    ?>
                        <a href="#" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Testimoni Tampil">
                          <i class="mdi-action-assignment-turned-in  right"></i>
                        </a>
                    <?php
                        }
                        $f = mysqli_query($koneksi,"SELECT * FROM testimoni WHERE id_testimoni = '$row[id_periksa]' && status='3'");
                        $g = mysqli_num_rows($f);
                        if ($g>0) {
                    ?>
                        <a href="#" class="tooltipped" data-position="top" data-delay="50" data-tooltip="Testimoni Ditolak">
                          <i class="mdi-action-highlight-remove right"></i>
                        </a>
                    <?php
                        }
                      }
                    ?>
                  </td>
              </tr>
                      <div id="<?php echo $row['id_periksa'] ?>" class="modal bottom-sheet">
                        <form method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                              <div class="row">
                                  <header><h4 class="light-green-text">Testimoni dari <?php echo ucfirst($row['uname']) ?></h4></header>
                                  <div class="input-field col s12">
                                    <h5>Isi:</h5>
                                    <?php echo $r['isi']; ?><br><br>
                                    <input type="hidden" name="id_periksa" value="<?php echo $row['id_periksa'] ?>">
                                    <h5>Dikirim Pada:</h5>
                                    <?php echo $r['tanggal'] ?>
                                  </div>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button class="waves-effect btn-flat" name="terima_testimoni">Terima</button>
                          <button class="waves-effect btn-flat" name="tolak_testimoni">Tolak</button>
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
</div>
<!--end container-->
</section>
<!-- END CONTENT -->
<!-- tambah -->
<?php 
  if (isset($_POST['terima_testimoni'])) {
    $id  = $_POST['id_periksa'];
    $sql = mysqli_query($koneksi,"update testimoni set status='1' where id_testimoni='$id'");
    if ($sql==TRUE) {
      echo "<script>Lobibox.notify('default', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Selamat Testimoni Berhasil Ditampilkan'
          });</script><script>window.location='rekam-medis'</script>";
    }
  }elseif (isset($_POST['tolak_testimoni'])) {
    $id  = $_POST['id_periksa'];
    $sql = mysqli_query($koneksi,"update testimoni set status='3' where id_testimoni='$id'");
    if ($sql==TRUE) {
      echo "<script>Lobibox.notify('default', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Testimoni Telah Ditolak'
          });</script><script>window.location='rekam-medis'</script>";
    }
  }
?>
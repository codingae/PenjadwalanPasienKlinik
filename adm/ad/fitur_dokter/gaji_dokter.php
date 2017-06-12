<?php 
include ('././ad/jembatan.php');
?>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-pengguna">Input Gaji Dokter</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Input Gaji Dokter</span>
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
    <div id="responsive-table">
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card-panel">
          <?php 
            $bulan = date("m");
            $tahun = date("y");
          ?>
            <table cellspacing="0" width="100%">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Nama</th>
            <?php 
                  if ($bulan =="01") {
                    echo "<th>Gaji Bulan Januari</th>";
                  }elseif ($bulan=='02') {
                    echo "<th>Gaji Bulan Februari</th>";
                  }elseif ($bulan=='03') {
                    echo "<th>Gaji Bulan Maret</th>";
                  }elseif ($bulan=='04') {
                    echo "<th>Gaji Bulan April</th>";
                  }elseif ($bulan=='05') {
                    echo "<th>Gaji Bulan Mei</th>";
                  }elseif ($bulan=='06') {
                    echo "<th>Gaji Bulan Juni</th>";
                  }elseif ($bulan=='07') {
                    echo "<th>Gaji Bulan Juli</th>";
                  }elseif ($bulan=='08') {
                    echo "<th>Gaji Bulan Agustus</th>";
                  }elseif ($bulan=='09') {
                    echo "<th>Gaji Bulan September</th>";
                  }elseif ($bulan=='10') {
                    echo "<th>Gaji Bulan Oktober</th>";
                  }elseif ($bulan=='11') {
                    echo "<th>Gaji Bulan November</th>";
                  }elseif ($bulan=='12') {
                    echo "<th>Gaji Bulan Desember</th>";
                  }
             ?>
              </tr>
            </thead>
            <tbody>
            <?php   
                $no=1;
                $query     = mysqli_query($koneksi,"SELECT * FROM pengguna where level != '2' && level != '3' && level != '4' ")or die (mysqli_error($koneksi));
                while($row = mysqli_fetch_array($query)){
                  $idpp    = $row['id_pengguna'];
            ?>
                <tr>
                    <td><?php echo $row['id_pengguna'] ?></td>
                    <td><?php echo ucfirst($row['nama_depan'])." ".ucfirst($row['nama_belakang']) ?></td>
                    <td>
                      <?php 
                        $t      = date('m');
                        $query1 = mysqli_query($koneksi,"SELECT * FROM record_dokter where id_dokter='$idpp' && 
                                                         tanggal_record LIKE '%"."-".$t."-"."%'")or die (mysqli_error($koneksi));
                        // $row1   = mysqli_fetch_array($query1);
                        if (mysqli_num_rows($query1)>0) {
                      ?>
                        <a href="#">
                          <i class="mdi-action-assignment-turned-in"></i> Sudah Di Gaji
                        </a>
                      <?php                        
                        }else{
                      ?>  
                        <a href="#<?=$row['id_pengguna']?>" class="modal-trigger">
                          <i class="mdi-action-launch"></i> Belum Di Gaji
                        </a>
                        <div id="<?=$row['id_pengguna']?>" class="modal">
                        <div class="modal-content">
                          <h3 style="color:#00E676">Input Gaji a.n <?php echo ucfirst($row['uname']); ?></h3>        
                          <form method="post" enctype="multipart/form-data">
                          <div class="row">
                              <p>
                              <div class="input-field col s12">
                                <input type="hidden" name="id_pengguna" value="<?php echo $row['id_pengguna']; ?>">
                                <input type="hidden" name="level" value="<?php echo $row['level']; ?>">
                                <input type="hidden" name="id_dokter" value="<?php echo $idpp ?>">
                                <?php 
                                  $a = mysqli_query($koneksi,"SELECT count(id_periksa) as total 
                                                              FROM periksa 
                                                              WHERE nama_dokter = '$row[id_pengguna]' && id_periksa 
                                                              LIKE '%".$tahun.$bulan."%'");
                                  $b = mysqli_fetch_array($a);
                                ?>  
                                <h4>Bulan <?php if ($bulan =="01") {
                                    echo "Januari";
                                  }elseif ($bulan=='02') {
                                    echo "Februari";
                                  }elseif ($bulan=='03') {
                                    echo "Maret";
                                  }elseif ($bulan=='04') {
                                    echo "April";
                                  }elseif ($bulan=='05') {
                                    echo "Mei";
                                  }elseif ($bulan=='06') {
                                    echo "Juni";
                                  }elseif ($bulan=='07') {
                                    echo "Juli";
                                  }elseif ($bulan=='08') {
                                    echo "Agustus";
                                  }elseif ($bulan=='09') {
                                    echo "September";
                                  }elseif ($bulan=='10') {
                                    echo "Oktober";
                                  }elseif ($bulan=='11') {
                                    echo "November";
                                  }elseif ($bulan=='12') {
                                    echo "Desember";
                                  } ?> / Tanggal <?php echo date("d-m-Y") ?> <br><br>
                                  <?php 
                                    $q = mysqli_query($koneksi,"select gaji from master_gaji where jabatan = '1'");
                                    $r = mysqli_fetch_array($q);
                                    $o = $b['total']*$r['gaji'];
                                    echo "<b>Total Gaji:</b><br>Telah Memeriksa ".$b['total']." Pasien x (Rp.".number_format($r['gaji'],0,".",",").") <br>= Rp. ".number_format($o,0,".",",");
                                  ?>
                                  <input type="hidden" name="total_gaji" value="<?php echo $o;?>">
                                  <input type="hidden" name="jumlah_periksa" value="<?php echo $b['total'];?>">
                                </h4>                 
                              </div>
                              <div class="modal-footer">
                                  <button class="waves-effect waves-red btn-flat" name="sgd">Submit </button>
                                  <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</a>
                              </div>
                          </div>
                          </form>
                        </div>
                      </div>
                      <?php                          
                        }
                      ?>
                    </td>                    
                </tr>
            <?php 
              $no++;
            ?>
                
            <?php    
                }
                // menutup koneksi
                // mysqli_close($koneksi);              
            ?>
            </tbody>
            </table>
            <div class="divider"></div>
            <br>
          </div>
        </div>
      </div>
      <br>   
    </div>
  </div>
</div>
<!--end container-->
</section>
<?php 
if (isset($_POST['sgd'])) {
  $id_pengguna    = $_POST['id_pengguna'];
  $id_rd          = date("m").$id_pengguna;
  $level          = $_POST['level'];
  $id_dokter      = $_POST['id_dokter'];
  $jumlah_periksa = $_POST['jumlah_periksa'];
  $total_gaji     = $_POST['total_gaji'];
  $date           = date('d-m-Y');
  // $qrjum       = mysqli_query($koneksi,"SELECT sum(jml_pendapatan) AS jml FROM pendapatan");
  // $roww        = mysqli_fetch_array($qrjum);
  // $qrjum       = mysqli_query($koneksi,"SELECT sum(jml_pendapatan) AS jml FROM pendapatan");
  // $roww        = mysqli_fetch_array($qrjum);
  // // berhubung belum dapat pendapat untuk penggajian, ini untuk sementara tak tambahi 1jt di pendapatannya biar bisa eksekusi query gajinya
  // $pendapatan  = $roww['jml']+1000000;
  $qrjum1      = mysqli_query($koneksi,"SELECT gaji FROM master_gaji WHERE jabatan = '$level' ");
  $roww1       = mysqli_fetch_array($qrjum1);
  $gajinya     = $roww1['gaji'];
  /*$hasil       = $pendapatan - $gajinya;
  if ($hasil<0) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Maaf Anda Pendapatan Anda (-)'
                });</script><script>window.location='gaji'</script>";
  }else{*/
    $ProsesSimpan = mysqli_query($koneksi,"INSERT INTO record_dokter VALUES('$id_rd','$id_dokter','$date','$jumlah_periksa')")or die(mysqli_error($koneksi));            
    $ProsesUpdate = mysqli_query($koneksi,"INSERT INTO pengeluaran VALUES('','$id_rd','','$date','bayar_gaji','$total_gaji','$sesid')")or die(mysqli_error($koneksi));
    if (($ProsesSimpan && $ProsesUpdate) == TRUE) {
      echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat Berhasil Input Gaji'
                });</script><script>window.location='gaji-dokter'</script>";
    // }
  }
};
?>
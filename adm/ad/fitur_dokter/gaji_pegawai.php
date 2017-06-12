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
            <li><a href="data-pengguna">Input Gaji Pegawai</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Input Gaji Pegawai</span>
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
                $query     = mysqli_query($koneksi,"SELECT * FROM pengguna where level != '4' && level != '1' ")or die (mysqli_error($koneksi));
                while($row = mysqli_fetch_array($query)){
                  $idpp    = $row['id_pengguna'];
            ?>
                <tr>
                    <td><?php echo $row['id_pengguna'] ?></td>
                    <td><?php echo ucfirst($row['nama_depan'])." ".ucfirst($row['nama_belakang']) ?></td>
                    <td>
                      <?php 
                        $query1 = mysqli_query($koneksi,"SELECT * FROM 
                                                         view_rg 
                                                         where level != '4' && 
                                                         level != '1' && 
                                                         id_pengguna = '$idpp' && 
                                                         tanggal_gaji LIKE '%".date('m')."%'")or die (mysqli_error($koneksi));
                        // $row1   = mysqli_fetch_array($query1);
                        if (mysqli_num_rows($query1)>0) {
                      ?>
                        <a href="#<?=$row['id_pengguna']?>">
                          <i class="mdi-action-assignment-turned-in"></i> Sudah Di Gaji
                        </a>
                      <?php                        
                        }else{
                      ?>  
                        <a href="#<?=$row['id_pengguna']?>" class="modal-trigger">
                          <i class="mdi-action-launch"></i> Belum Di Gaji
                        </a>
                      <?php    
                        }
                      ?>
                    </td>                    
                </tr>
            <?php 
              $no++;
            ?>
                <div id="<?=$row['id_pengguna']?>" class="modal">
                  <div class="modal-content">
                    <h3 style="color:#00E676">Input Gaji a.n <?php echo ucfirst($row['uname']); ?></h3>        
                    <form method="post" enctype="multipart/form-data">
                    <div class="row">
                        <p>
                        <div class="input-field col s12">
                          <i class="mdi-action-account-circle prefix"></i>
                          <input type="hidden" name="id_pengguna" value="<?php echo $row['id_pengguna']; ?>">
                          <input type="hidden" name="level" value="<?php echo $row['level']; ?>">                          
                          <input id="bonus" name="bonus" type="number" class="validate" >
                          <label for="bonus">Bonus Gaji</label>
                        </div>
                        <div class="modal-footer">
                            <button class="waves-effect waves-red btn-flat" name="sg">Submit </button>
                            <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</a>
                        </div>
                    </div>
                    </form>
                  </div>
                </div>
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
if (isset($_POST['sg'])) {
  $id_pengguna = $_POST['id_pengguna'];
  // bulan dan id pengguna
  $id_rg       = date("m").$id_pengguna;
  $level       = $_POST['level'];
  $bonus       = $_POST['bonus'];
  $date        = date('d-m-Y');
  /*$qrjum       = mysqli_query($koneksi,"SELECT sum(jml_pendapatan) AS jml FROM pendapatan");
  $roww        = mysqli_fetch_array($qrjum);
  $qrjum       = mysqli_query($koneksi,"SELECT sum(jml_pendapatan) AS jml FROM pendapatan");
  $roww        = mysqli_fetch_array($qrjum);*/
  // berhubung belum dapat pendapat untuk penggajian, ini untuk sementara tak tambahi 1jt di pendapatannya biar bisa eksekusi query gajinya
  /*$pendapatan  = $roww['jml']+1000000;*/
  $qrjum1      = mysqli_query($koneksi,"SELECT gaji FROM master_gaji WHERE jabatan = '$level'  ")or die(mysqli_error($koneksi));
  $roww1       = mysqli_fetch_array($qrjum1);
  $gajinya     = $roww1['gaji']+$bonus;
  /*
  $hasil       = $pendapatan - $gajinya;
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
    $ProsesSimpan = mysqli_query($koneksi,"INSERT INTO record_gaji VALUES('$id_rg','$id_pengguna','$level','$date','$bonus')")or die(mysqli_error($koneksi));            
    $ProsesUpdate = mysqli_query($koneksi,"INSERT INTO pengeluaran VALUES('','$id_rg','','$date','bayar_gaji','$gajinya','$sesid')")or die(mysqli_error($koneksi));
    if (($ProsesSimpan && $ProsesUpdate) == TRUE) {
      echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat Berhasil Input Gaji'
                });</script><script>window.location='gaji-pegawai'</script>";
    }
}
?>
<?php 
include ('././ad/jembatan.php');
?>
<!-- START CONTENT -->
<section id="content">
<div class="fixed-action-btn">
	<a href="#tambah" class="btn-floating btn-large red accent-3 waves-effect waves-light modal-trigger">
		<i class="mdi-content-add"></i>
	</a>
</div>
<!-- untuk tambah data pengguna -->
<div id="tambah" class="modal modal-fixed-footer">
  <form method="post" enctype="multipart/form-data">
  <div class="modal-content">
        <div class="row">
            <header><h4 class="light-green-text">Input Pengguna</h4></header>
            <div class="input-field col s6">
              <i class="mdi-action-account-circle prefix"></i>
              <!-- <input id="token_daftar" name="token_daftar" type="hidden" value="<?php echo $_SESSION['token_dftr']; ?> " > -->
              <input id="nama_depan" name="nama_depan" type="text" class="validate"  required>
              <label for="nama_depan">Nama Depan</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-account-circle prefix"></i>
              <input id="nama_belakang" name="nama_belakang" type="text" class="validate"  required>
              <label for="nama_belakang">Nama Belakang</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-assignment-ind prefix"></i>
              <input id="uname" name="uname" type="text" class="validate"  required>
              <label for="uname">Username</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-lock prefix"></i>
              <input id="pass" name="pass" type="password" class="validate"  required>
              <label for="pass">Password</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-maps-place prefix"></i>
              <input id="tmp_lahir" name="tmp_lahir" type="text" class="validate"  required>
              <label for="tmp_lahir">Tempat Lahir</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-event prefix"></i>
              <input id="tgl_lahir" name="tgl_lahir" type="date" class="datepicker"  required>
            </div>
            <div class="input-field col s6">
                <i class="mdi-maps-layers prefix"></i>
                <select class="input-field col s10 right" id="level" name="level"  required>
                  <option value="" disabled selected>Pilih Level</option>
                  <option value="1">Dokter</option>
                  <option value="2">Loket Pendaftaran</option>
                  <option value="3">Loket Obat</option>
                  <option value="4">Pasien</option>
                </select>
            </div>
            <div class="input-field col s6">
                <i class="mdi-maps-layers prefix"></i>
                <select class="input-field col s10 right" id="jk" name="jk"  required>
                  <option value="" disabled selected>Pilih Gender</option>
                  <option value="L">Laki-Laki</option>
                  <option value="P">Perempuan</option>
                </select>
            </div>
            <div class="input-field col s6">
              <i class="mdi-communication-email prefix"></i>
              <input id="email" name="email" type="email" class="validate" required> 
              <label for="email">Email</label>
            </div>
            <div class="input-field col s6">
              <div class="file-field input-field col s12">
                <input class="file-path validate" type="text"/>
                <div class="btn">
                  <span>Foto</span>
                  <input type="file" name="foto" />
                </div>
              </div>
            </div>
            <div class="input-field col s12">
              <i class="mdi-action-home prefix"></i>
              <textarea id="alamat" name="alamat" class="materialize-textarea" length="250" required></textarea>
              <label for="alamat">Alamat</label>
            </div>
        </div>
        <br><br><br>
    
  </div>
  <div class="modal-footer">
    <button class="waves-effect btn-flat" name="simpan_user">Simpan</button>
    <!-- <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close" type="submit">Simpan</a> -->
    <button type="reset" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</button>
    <!-- <a href="#" type="reset" class=" reset">Kembali</a> -->
  </div>
  </form>
</div>
<script>
    $('.datepicker').pickadate({
        selectMonths;true,
        selectYears:90,
    });
</script>

<?php 
if (isset($_POST['simpan_user'])) {
    /*untuk input dari form*/
    // addslashes -> menambahkan backslash sebelum string '
    // htmlspecialchars -> membuat tag html encode -> ENT_QUOTES - Encodes double dan single quotes    
    $nama_depan    = addslashes(htmlspecialchars($_POST['nama_depan'],ENT_QUOTES));
    $nama_belakang = addslashes(htmlspecialchars($_POST['nama_belakang'],ENT_QUOTES));
    $uname         = addslashes(htmlspecialchars($_POST['uname'],ENT_QUOTES));
    $pass          = addslashes(htmlspecialchars($_POST['pass'],ENT_QUOTES));
    $email         = addslashes(htmlspecialchars($_POST['email'],ENT_QUOTES));
    $level         = addslashes(htmlspecialchars($_POST['level'],ENT_QUOTES));
    $jk            = addslashes(htmlspecialchars($_POST['jk'],ENT_QUOTES));
    $tmp_lahir     = addslashes(htmlspecialchars($_POST['tmp_lahir'],ENT_QUOTES));
    $tgl_lahir     = addslashes(htmlspecialchars($_POST['tgl_lahir'],ENT_QUOTES));
    $alamat        = addslashes(htmlspecialchars($_POST['alamat'],ENT_QUOTES));
    $tgl_daftar    = date('Y-m-d');
    $status        = "Aktif";
    $cek_uname     = mysqli_query($koneksi,"select * from pengguna where uname='$uname'") or die (mysqli_error($koneksi));
    if (mysqli_num_rows($cek_uname)>0) {
        echo "<script>Lobibox.notify('error', {
                      iconClass: false,
                      size: 'mini',
                      delayIndicator: true,
                      position: 'center top',
                      showClass: 'fadeInDown',
                      hideClass: 'fadeUpDown',
                      msg: 'Username Sudah Digunakan'
                  });</script>";
    }else{
      /*untuk id*/
      if ($level == "1" || $level == "2" || $level == "3") {
        $query1       = mysqli_query($koneksi,"select id_pengguna from pengguna where level = '$level' order by id_pengguna DESC limit 1") or die(mysqli_error());
        $row          = mysqli_fetch_array($query1);    
        $id_awal      = $row['id_pengguna'];
        $id_pisah     = substr($id_awal,4,4);
        $id_tambah    = $id_pisah+1;
        if ($jk=="L") {
          $jk="1";
        }elseif ($jk=="P") {
          $jk="2";
        }else{
          $jk="not used";
        }
        // echo "awal =".$id_awal."<br>pisah=".$id_pisah."<br>tambah=".$id_tambah;    
        // id pengguna = level+jeniskelamin+tahun diambil 2 terakhir+nomor urut
        $id_pengguna  = $level.$jk.substr(date('Y'), 2,2).$id_tambah;
        // die($id_pengguna);
      }elseif ($level=="4") {        
        $query2       = mysqli_query($koneksi,"SELECT id_pengguna FROM `pengguna` where level = '$level' ORDER BY `pengguna`.`id_pengguna` DESC LIMIT 1") or die(mysqli_error());
        // $query2       = mysqli_query($koneksi,"select id_pengguna from pengguna where level = '$level' order by id_pengguna DESC limit 1") or die(mysqli_error());
        $row          = mysqli_fetch_array($query2);
        if (mysqli_num_rows($query2)>0) {
          $id_awal      = $row['id_pengguna'];
          $id_pisah     = substr($id_awal,0,7);
          $id_tambah    = $id_pisah+1;
          // echo "awal =".$id_awal."<br>pisah=".$id_pisah."<br>tambah=".$id_tambah;    
          $id_pengguna_belum = $level.substr(date('Y'), 2,2).$id_tambah;
          $id_pengguna = substr($id_pengguna_belum, 3,7);
        }else{
          $id_pengguna  = $level.substr(date('Y'), 2,2)."0001";
        }
        // echo $id_pengguna.' - '.$id_pisah.' - '.$id_tambah;
        // die();
        // echo $id_pengguna; 
      }
      $pass = md5($pass).strrev($id_pengguna);
      // die($pass);
      /*untuk foto*/
      $time   = time();                               //waktu
      $foto   = $_FILES['foto']['name'];              //foto
      $ukuran = $_FILES['foto']['size'];              //size
      $error  = $_FILES['foto']['error'];             //error
      $asal   = $_FILES['foto']['tmp_name'];          //asal file
      $format = pathinfo($foto,PATHINFO_EXTENSION);   //format file
      $nmfile = "././ad/fitur_daftar/foto/".$foto;           //folder + nama image
      //seleksi ada foto atau tidak
      if (!empty($foto)) {
        // seleksi error
        if ($error === 0 ) {
          // seleksi ukuran ukuran dalam byte (ex: max 2000kb)
          if ($ukuran < 2000000) { 
            // seleksi format file
            if ($format === "jpg" || $format === "png") {
              //seleksi nama file
              if (file_exists($nmfile)) {
                $nmfile = str_replace(".".$format,"", $nmfile);
                $nmfile = $nmfile."_".$time.".".$format;
                $upload = move_uploaded_file($asal,$nmfile);
                // seleksi saat berhasil upload ke direktori
                if ($upload == TRUE) {
                  $input = mysqli_query($koneksi,"insert into pengguna values ('$id_pengguna',
                                                                      '$nama_depan',
                                                                      '$nama_belakang',
                                                                      '$uname',
                                                                      '$pass',
                                                                      '$email',
                                                                      '$level',
                                                                      '$jk',
                                                                      '$tmp_lahir',
                                                                      '$tgl_lahir',
                                                                      '$alamat',
                                                                      '$nmfile',
                                                                      '$tgl_daftar',
                                                                      '$status')") or die (mysqli_error());
                  // header("location:index.php?klinik=daftar");
                  if ($input == TRUE) {
                    echo "<script>Lobibox.notify('default', {
                                    iconClass: false,
                                    size: 'mini',
                                    delayIndicator: false,
                                    position: 'center top',
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    msg: 'Selamat Penambahan Akun Berhasil'
                                });</script>"."<script>window.location='data-pengguna'</script>";
                  }else{
                    echo "<script>alert('gagal')</script>";                  
                  }
                }else{
                  echo "salah upload";
                }         
              }else{
                $upload = move_uploaded_file($asal,$nmfile);
                // seleksi saat berhasil upload ke direktori
                if ($upload == TRUE) {
                  $input = mysqli_query($koneksi,"insert into pengguna values ('$id_pengguna',
                                                                      '$nama_depan',
                                                                      '$nama_belakang',
                                                                      '$uname',
                                                                      '$pass',
                                                                      '$email',
                                                                      '$level',
                                                                      '$jk',
                                                                      '$tmp_lahir',
                                                                      '$tgl_lahir',
                                                                      '$alamat',
                                                                      '$nmfile',
                                                                      '$tgl_daftar',
                                                                      '$status')") or die (mysqli_error());
                  // header("location:index.php?klinik=daftar");
                  if ($input == TRUE) {
                    echo "<script>Lobibox.notify('default', {
                                    iconClass: false,
                                    size: 'mini',
                                    delayIndicator: false,
                                    position: 'center top',
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    msg: 'Selamat Penambahan Akun Berhasil'
                                });</script>"."<script>window.location='data-pengguna'</script>";
                  }else{
                    echo "<script>alert('gagal')</script>";                  
                  }
                }else{
                  echo "salah upload";
                }
              }
            }else{
              echo "<script>Lobibox.notify('error', {
                                iconClass: false,
                                size: 'mini',
                                delayIndicator: false,
                                position: 'center top',
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                msg: 'Hanya Bisa Menerima Format File PNG & JPG'
                            });</script>"."<script>window.location='data-pengguna'</script>";
            }
          }else{
            echo "<script>Lobibox.notify('error', {
                                iconClass: false,
                                size: 'mini',
                                delayIndicator: false,
                                position: 'center top',
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                msg: 'Maaf File Maksimal 2MB'
                            });</script>"."<script>window.location='data-pengguna'</script>";
          }
        }else{
          echo "error";
        }
      }
      /*saat tidak ada gambar*/
      else{
        $nmfile = "";
        $input = mysqli_query($koneksi,"insert into pengguna values ('$id_pengguna',
                                                                      '$nama_depan',
                                                                      '$nama_belakang',
                                                                      '$uname',
                                                                      '$pass',
                                                                      '$email',
                                                                      '$level',
                                                                      '$jk',
                                                                      '$tmp_lahir',
                                                                      '$tgl_lahir',
                                                                      '$alamat',
                                                                      '$nmfile',
                                                                      '$tgl_daftar',
                                                                      '$status')") or die (mysqli_error($koneksi));
        // header("location:index.php?klinik=daftar");
        if ($input == TRUE) {
          echo "<script>Lobibox.notify('default', {
                          iconClass: false,
                          size: 'mini',
                          delayIndicator: false,
                          position: 'center top',
                          showClass: 'fadeInDown',
                          hideClass: 'fadeUpDown',
                          msg: 'Selamat Penambahan Akun Berhasil'
                      });</script>"."<script>window.location='data-pengguna'</script>";
        }else{
          echo "<script>alert('berhasil')</script>";
        }
      }
    }
}
?>
<!-- end data pengguna -->

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-pengguna">Pengguna</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Data Pengguna</span>
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
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Umur</th>
                <th>Level</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php 
              $query     = mysqli_query($koneksi,"SELECT * FROM pengguna");
              // $query = mysqli_query ("SELECT * FROM pegawai ORDER BY `id` DESC LIMIT $x, $limit") ;
              while($row = mysqli_fetch_array($query)){
              $no++;
              $bln = substr($row['tgl_lahir'], 3,2);
              if ($bln == "01") {
                  $bln = "Januari";
              }elseif ($bln == "02") {
                  $bln = "Februari";
              }elseif ($bln == "03") {
                  $bln = "Maret";
              }elseif ($bln == "04") {
                  $bln = "April";
              }elseif ($bln == "05") {
                  $bln = "Mei";
              }elseif ($bln == "06") {
                  $bln = "Juni";
              }elseif ($bln == "07") {
                  $bln = "Juli";
              }elseif ($bln == "08") {
                  $bln = "Agustus";
              }elseif ($bln == "09") {
                  $bln = "September";
              }elseif ($bln == "10") {
                  $bln = "Oktober";
              }elseif ($bln == "11") {
                  $bln = "November";
              }elseif ($bln == "12") {
                  $bln = "Desember";
              }else{
                  echo "Error Bulan";
              }
          ?>
              <tr>
                  <td><a href="#<?php echo $row['id_pengguna'] ?>" class="modal-trigger"><b> <?php echo $row['id_pengguna'] ?></b></a></td>
                  <td><?php echo ucfirst($row['uname'])?></td>
                  <td><?php echo ucfirst($row['tmp_lahir']).", ".
                            substr($row['tgl_lahir'],0,2)." ".$bln ." ".substr($row['tgl_lahir'],6,4) ?></td>
                  <td class="center"><?php 
                          $tgl_lahir = $row['tgl_lahir'];
                          $hari_ini  = date('d-m-Y');
                          $umur      = date_diff(date_create($tgl_lahir), date_create($hari_ini));                             
                          echo $umur->format('%Y')." th";
                      ?>
                  <!-- <td><?php echo $no ?></td> -->
                  </td>
                  <td class="center">
                  <?php   if ($row['level']=='1') {
                              echo "Dokter";
                          }elseif ($row['level']=='2') {
                              echo "Lo_daf";
                          }elseif ($row['level']=='3') {
                              echo "Lo_bat";
                          }elseif ($row['level']=='4') {
                              echo "Pasien";
                          }else{
                              echo "Error Level";
                          }
                  ?>
                  <td style="width:15%" class="center">
                      <?php 
                        if (empty($row['foto'])) {
                        ?>
                          <img src="ad/fitur_daftar/foto/no-img.png" alt="" class="circle responsive-img materialboxed" width="20%">
                        <?php
                        }else{
                        ?>
                          <img src="<?php echo $row['foto'] ?>" alt="" class="circle responsive-img materialboxed" width="20%">
                        <?php
                          }
                        ?>
                  </td>
                  </td>
                  <td>
                      <a href="#<?php echo $row['id_pengguna'].str_replace(" ", "", $row['uname']);?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Edit">
                          <i class="mdi-action-speaker-notes"></i>
                      </a>
                      <?php 
                        if ($row['level']=='4') {
                      ?>
                        <a href="html2pdf/examples/cetak.php?id=<?php echo $row['id_pengguna'];?>" data-position="top" data-delay="50" data-tooltip="cetak kartu">
                          <i class="mdi-action-print"></i>
                        </a>
                      <?php
                        }
                      ?>
                      <!-- <a href="#detail" onclick="Materialize.toast('<span class=&quot;red-text&quot;><b>Sabar ya <?= ucfirst($row['nama_depan'])?></span>', 10000)" data-position="top" data-delay="50" data-tooltip="cetak kartu">
                        <i class="mdi-action-print"></i>
                      </a> -->
                  </td>
                  <div id="<?php echo $row['id_pengguna'] ?>" class="modal">
                    <div class="modal-content">
                      <form method="post" enctype="multipart/form-data">
                      <div class="row">
                          <p>
                          <div class="input-field col s4">
                          </div>
                          <div class="input-field col s4">
                            <?php 
                              if (empty($row['foto'])) {
                              ?>
                                <img src="ad/fitur_daftar/foto/no-img.png" alt="" class="circle responsive-img materialboxed" width="170px">
                              <?php
                              }else{
                              ?>
                                <img src="<?php echo $row['foto'] ?>" alt="" class="circle responsive-img materialboxed" width="170px">
                              <?php
                                }
                              ?>
                          </div>
                          <div class="input-field col s4">
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input type="text" class="validate" value="<?php echo $row['nama_depan'];?>" readonly>
                            <label class="active">Nama Depan</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input type="text" class="validate" value="<?php echo $row['nama_belakang'];?>" readonly>
                            <label class="active">Nama Belakang</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-action-assignment-ind prefix"></i>
                            <input id="uname" name="uname" type="text" class="validate" value="<?php echo $row['uname'];?>" readonly>
                            <label for="uname" class="active">Username</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-communication-email prefix"></i>
                            <input id="email" name="email" type="email" class="validate" value="<?php echo $row['email'];?>" readonly> 
                            <label for="email" class="active">Email</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-maps-place prefix"></i>
                            <input id="tmp_lahir" name="tmp_lahir" type="text" class="validate" value="<?php echo $row['tmp_lahir'];?>" readonly>
                            <label for="tmp_lahir" class="active">Tempat Lahir</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-action-event prefix active"></i>
                            <input id="tgl_lahir" name="tgl_lahir" type="text" class="validate" value="<?php echo $row['tgl_lahir'];?>" readonly>
                          </div>
                          <div class="input-field col s12">
                            <i class="mdi-action-home prefix"></i>
                            <textarea id="alamat" name="alamat" class="materialize-textarea" length="250" readonly><?php echo $row['alamat'] ?></textarea>
                            <label for="alamat" class="active">Alamat</label>
                          </div>
                          </p>
                          <div class="modal-footer">
                              <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</a>
                          </div>
                      </div>
                      </form>
                    </div>
                  </div>
                  <div id="<?php echo $row['id_pengguna'].str_replace(" ", "", $row['uname']);?>" class="modal">
                    <div class="modal-content">
                      <h3 style="color:#00E676">Edit a.n <?php echo ucfirst($row['uname']); ?></h3>        
                      <form method="post" action="index.php?klinik=pengguna-edit&nid=<?php echo $row['id_pengguna'];?>" enctype="multipart/form-data">
                      <div class="row">
                          <p>
                          <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input id="nama_depan" name="nama_depan" type="text" class="validate" value="<?php echo $row['nama_depan'];?>" required>
                            <label for="nama_depan" class="active">Nama Depan</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-action-account-circle prefix"></i>
                            <input id="nama_belakang" name="nama_belakang" type="text" class="validate" value="<?php echo $row['nama_belakang'];?>" required>
                            <label for="nama_belakang" class="active">Nama Belakang</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-action-assignment-ind prefix"></i>
                            <input id="uname" name="uname" type="text" class="validate" value="<?php echo $row['uname'];?>" required>
                            <label for="uname" class="active">Username</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-action-lock prefix"></i>
                            <input id="pass" name="pass" type="password" class="validate" placeholder="***********">
                            <label for="pass" class="active">Password (Biarkan Bila Tidak Diganti)</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-maps-place prefix"></i>
                            <input id="tmp_lahir" name="tmp_lahir" type="text" class="validate" value="<?php echo $row['tmp_lahir'];?>" required>
                            <label for="tmp_lahir" class="active">Tempat Lahir</label>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-action-event prefix active"></i>
                            <input id="tgl_lahir" name="tgl_lahir" type="date" class="datepicker" value="<?php echo $row['tgl_lahir'];?>" required>
                          </div>
                          <div class="input-field col s6">
                            <i class="mdi-communication-email prefix"></i>
                            <input id="email" name="email" type="email" class="validate" value="<?php echo $row['email'];?>" required> 
                            <label for="email" class="active">Email</label>
                          </div>
                          <div class="input-field col s6">
                            <div class="file-field input-field col s12">
                              <input class="file-path validate" type="text"/>
                              <div class="btn">
                                <span>Foto</span>
                                <input type="file" name="foto" />
                              </div>
                            </div>
                          </div>
                          <div class="input-field col s12">
                            <i class="mdi-action-home prefix"></i>
                            <textarea id="alamat" name="alamat" class="materialize-textarea" length="250" required><?php echo $row['alamat'] ?></textarea>
                            <label for="alamat" class="active">Alamat</label>
                          </div>
                          </p>
                          <div class="modal-footer">
                              <button class="waves-effect waves-red btn-flat" name="perbarui" type="submit">Perbarui </button>
                              <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</a>
                          </div>
                      </div>
                      </form>
                    </div>
                  </div>                                             
              </tr>
            <?php 
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
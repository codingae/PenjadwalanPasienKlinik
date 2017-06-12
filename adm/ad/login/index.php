<?php 
  include "../jembatan.php";
  session_start();
  // if (file_exists("../jembatan.php")) {
  //   echo "ada";
  // }
  if (!isset($_SESSION['token_login'])) {
    $_SESSION['token_login'] = base64_encode(openssl_random_pseudo_bytes(32));
  }
?>
<!DOCTYPE html>

<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Klinik Dokter Pudji Umbaran Peterongan Jombang">
  <meta name="keywords" content="Klinik Dokter Pudji Umbaran Peterongan Jombang">
  <title>Login Klinik dr. Pudji Umbaran</title>

  <!-- Favicons-->
  <link rel="icon" href="../../images/favicon/favicon.ico" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="../../images/favicon/apple-touch-icon-152x152.png">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="../../images/favicon/mstile-144x144.png">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->  
  <link href="../../css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../../css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../../css/page-center.css" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="../../css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../../js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="../../js/plugins/lolibox/lobibox.css" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="green accent-3">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <div id="login-page" class="row" >
    <div class="col s12 z-depth-4 card-panel" style="border-radius:15px">
      <form class="login-form" action="" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            <img src="../../images/favicon/logo152.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text"><b>Login Klinik dr.Pudji Umbaran</b></p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="token_log" name="token_log" type="hidden" value="<?php echo $_SESSION['token_login']; ?> " >
            <input id="username" type="text" name="uname">
            <label for="username" class="center-align">Username</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="pass">
            <label for="password">Password</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button class="btn waves-effect waves-light col s12 green accent-3" name="masuk" type="submit"><b>Masuk</b></button>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="#tambah" class="modal-trigger"><b>Daftar Sekarang!</b></a></p>
          </div>
          <div class="input-field col s6 m6 l6">
              <p class="margin right-align medium-small"><a href="#!"><b>Bantuan?</b></a></p>
          </div>          
        </div>
      </form>
    </div>
  </div>

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

  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="../../js/jquery-1.11.2.min.js"></script>
  <!--materialize js-->
  <script type="text/javascript" src="../../js/materialize.js"></script>
  <!--prism-->
  <script type="text/javascript" src="../../js/prism.js"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="../../js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
  <script type="text/javascript" src="../../js/plugins/lolibox/lobibox.js"></script>
  <script type="text/javascript" src="../../js/plugins/lolibox/notifications.js"></script>
  <script type="text/javascript" src="../../js/plugins/lolibox/messageboxes.js"></script>  
  <!--plugins.js - Some Specific JS codes for Plugin Settings-->
  <script type="text/javascript" src="../../js/plugins.js"></script>

  <?php 
  // seleksi ada session nya ndak
  if (isset($_SESSION['uname'])) {
    echo "<script>window.location='../../'</script>";
  }else{
    // saat di klik submit masuk
    if (isset($_POST['masuk']) && $_SESSION['token_login'] || $_POST['token_log']) {    
      session_unset($_SESSION['token_login']);
      // addslashes -> menambahkan backslash sebelum string '
      // htmlspecialchars -> membuat tag html encode -> ENT_QUOTES - Encodes double dan single quotes
      $uname = addslashes(htmlspecialchars($_POST['uname'],ENT_QUOTES));
      $qr    = mysqli_query($koneksi,"select id_pengguna, uname, level from pengguna where uname='$uname'");
      $rw    = mysqli_fetch_array($qr);
      // input pass di md5 + id_pengguna dibalik
      $pass  = addslashes(htmlspecialchars(md5($_POST['pass']))).strrev($rw['id_pengguna']);
      $query = mysqli_query($koneksi,"select * from pengguna where uname='$uname' and pass='$pass' ");
      $rww   = mysqli_fetch_array($query);
      $isi   = mysqli_num_rows($query);
      // cek ada data atau tidak, saat data tidak ada
      if ($isi == 0) {
        echo "<script>
                    Lobibox.notify('error', {
                        iconClass: false,
                        size: 'mini',
                        delayIndicator: true,
                        position: 'center top',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        msg: 'Mohon Diisi Dengan Benar'
                    });
              </script>";
      }
      // saat data ada
      elseif($isi>0){
        // buat session
        $_SESSION['id_pengguna'] = base64_encode($rw['id_pengguna'])."id";
        $_SESSION['uname']       = base64_encode($rww['uname'])."un";
        $_SESSION['level']       = md5($rww['level']);
        // redirect laman awal
        echo "<script>
                    Lobibox.notify('default', {
                        iconClass: false,
                        size: 'mini',
                        delayIndicator: true,
                        position: 'center top',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        msg: 'Login Proses...'
                    });
              </script><meta http-equiv='refresh' content='2;url=../../' />";
      }
    }
  }
  ?>


</body>

</html>

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
      $nmfile = "../fitur_daftar/foto/".$foto;           //folder + nama image
      $nmfile1= "././ad/fitur_daftar/foto/".$foto;           //folder + nama image
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
                                                                      '$nmfile1',
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
                                });</script>"."<script>window.location='index.php'</script>";
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
                                                                      '$nmfile1',
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
                                });</script>"."<script>window.location='index.php'</script>";
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
                            });</script>"."<script>window.location='index.php'</script>";
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
                            });</script>"."<script>window.location='index.php'</script>";
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
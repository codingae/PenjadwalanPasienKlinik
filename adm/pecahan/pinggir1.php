    <?php 
        include ('./ad/jembatan.php');
        // fungsi ->  strrev(membalik string), 
                   // substr(mengambil karakter string, 2(dimulai dari karakter string ke 2))
                   // base64_decode(mengembalikan nilai enkrip menggunakan base64)
        $sesuname = base64_decode(strrev(substr(strrev($_SESSION['uname']),2)));
        $sesid    = base64_decode(strrev(substr(strrev($_SESSION['id_pengguna']),2)));
        $qr       = mysqli_query($koneksi,"select * from pengguna where id_pengguna='$sesid'");
        $row      = mysqli_fetch_array($qr);
     ?>
    <!-- START LEFT SIDEBAR NAV-->
    <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftside-navigation">
            <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <?php 
                            // seleksi foto yang ditampilkan                        
                            if ($row['foto']=="") {
                        ?>        
                                <img src="ad/fitur_daftar/foto/no-img.png" alt="" class="circle responsive-img valign profile-image">
                        <?php
                            }else{
                        ?>                                        
                                <img src="<?php echo substr($row['foto'], 2,100); ?>" alt="" class="circle responsive-img valign profile-image">
                        <?php
                            }
                        ?>
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="#profile" class="modal-trigger"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="./ad/login/metu.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>                        
                        <b>
                        <a class="btn-flat dropdown-button waves-effect waves-light black-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo ucfirst($row['uname']); ?><i class="mdi-navigation-arrow-drop-down right"></i></a>
                        <p class="user-roal black-text">DOKTER</p>
                        </b>
                    </div>
                </div>
            </li>
            <li class="bold"><a href="dokter-dashboard" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Dashboard</a>
            </li>
<!--             <li class="bold"><a href="index.php?klinik=penyakit" class="waves-effect waves-cyan"><i class="mdi-av-my-library-books"></i> Daftar Penyakit</a>
            </li> -->
            <?php 
              if ($sesid == "11161") {
            ?>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-assignment"></i> Gaji</a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="master-gaji">Master Gaji</a>
                                </li>                                        
                                <li><a href="gaji-pegawai">Input Gaji Pegawai</a>
                                </li>
                                <li><a href="gaji-dokter">Input Gaji Dokter</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <?php
              }
            ?>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-assignment"></i> Artikel
                    <?php 
                      $qjum1 = mysqli_query($koneksi,"select count(status) as semua from konsultasi where status='2'");
                      $rjum1 = mysqli_fetch_array($qjum1);                      
                      if ($rjum1['semua']>0) {
                        ?>
                          <span class="new badge">Baru</span>
                        <?php
                      }else{

                      }
                    ?>
                    </a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="postingan">Postingan<?php if ($rjum1['semua']>0) {
                                    echo "<span class='new badge'>".$rjum1['semua']."</span>";
                                  }else{

                                  } ?></a>
                                </li>                                        
                                <li><a href="artikel">Input Artikel</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <!-- <li class="bold"><a href="app-email.html" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Mailbox <span class="new badge">4</span></a> -->
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-communication-quick-contacts-mail"></i> Konsultasi
                    <?php 
                      $qjum = mysqli_query($koneksi,"select count(status) as semua from konsultasi where status='2'");
                      $rjum = mysqli_fetch_array($qjum);                      
                      if ($rjum['semua']>0) {
                        ?>
                          <span class="new badge">Baru</span>
                        <?php
                      }else{

                      }
                    ?>
                    </a>
                        <div class="collapsible-body">
                            <ul>
                                <li>
                                  <a href="konsultasi-belum">Konsultasi Pasien <?php if ($rjum['semua']>0) {
                                    echo "<span class='new badge'>".$rjum['semua']."</span>";
                                  }else{

                                  } ?></a>
                                </li>                                        
                                <li><a href="konsultasi-sudah">Konsultasi Dijawab</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="bold"><a href="keperluan-lain" class="waves-effect waves-cyan"><i class="mdi-av-subtitles"></i> Keperluan Lain</a></li>                               
            <li class="li-hover"><div class="divider"></div></li>
            <!-- <li class="li-hover"><p class="ultra-small margin more-text">Grafik Pengunjung</p></li>
            <li class="li-hover">
                <div class="row">
                    <div class="col s12 m12 l12">
                        <div class="sample-chart-wrapper">                            
                            <div class="ct-chart ct-golden-section" id="ct2-chart"></div>
                        </div>
                    </div>
                </div>
            </li> -->
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
    </aside>
    <div id="profile" class="modal">
      <div class="modal-content">
        <h3 style="color:#00E676">Edit a.n <?php echo ucfirst($row['uname']); ?></h3>        
        <form method="post" enctype="multipart/form-data">
        <div class="row">
            <p>
            <div class="input-field col s6">
              <i class="mdi-action-account-circle prefix"></i>
              <input id="nama_depan" name="nama_depan" type="text" class="validate" value="<?php echo $row['nama_depan'];?>" required>
              <label for="nama_depan">Nama Depan</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-account-circle prefix"></i>
              <input id="nama_belakang" name="nama_belakang" type="text" class="validate" value="<?php echo $row['nama_belakang'];?>" required>
              <label for="nama_belakang">Nama Belakang</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-assignment-ind prefix"></i>
              <input id="uname" name="uname" type="text" class="validate" value="<?php echo $row['uname'];?>" required>
              <label for="uname">Username</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-lock prefix"></i>
              <input id="pass" name="pass" type="password" class="validate" placeholder="***********">
              <label for="pass">Password (Biarkan Bila Tidak Diganti)</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-maps-place prefix"></i>
              <input id="tmp_lahir" name="tmp_lahir" type="text" class="validate" value="<?php echo $row['tmp_lahir'];?>" required>
              <label for="tmp_lahir">Tempat Lahir</label>
            </div>
            <div class="input-field col s6">
              <i class="mdi-action-event prefix active"></i>
              <input id="tgl_lahir" name="tgl_lahir" type="date" class="datepicker" value="<?php echo $row['tgl_lahir'];?>" required>
            </div>
            <div class="input-field col s6">
              <i class="mdi-communication-email prefix"></i>
              <input id="email" name="email" type="email" class="validate" value="<?php echo $row['email'];?>" required> 
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
              <textarea id="alamat" name="alamat" class="materialize-textarea" length="250" required><?php echo $row['alamat'] ?></textarea>
              <label for="alamat">Alamat</label>
            </div>
            </p>
            <div class="modal-footer">
                <button class="waves-effect waves-red btn-flat" name="pinggir1">Perbarui </button>
                <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</a>
            </div>
        </div>
        </form>
      </div>
    </div>
    <!-- END LEFT SIDEBAR NAV-->
    <?php 
    if (isset($_POST['pinggir1'])) {
      // addslashes -> menambahkan backslash sebelum string '
      // htmlspecialchars -> membuat tag html encode -> ENT_QUOTES - Encodes double dan single quotes  
      $nama_depan    = addslashes(htmlspecialchars($_POST['nama_depan'],ENT_QUOTES));
      $nama_belakang = addslashes(htmlspecialchars($_POST['nama_belakang'],ENT_QUOTES));
      $uname         = addslashes(htmlspecialchars($_POST['uname'],ENT_QUOTES));
      $email         = addslashes(htmlspecialchars($_POST['email'],ENT_QUOTES));
      $tmp_lahir     = addslashes(htmlspecialchars($_POST['tmp_lahir'],ENT_QUOTES));
      $tgl_lahir     = addslashes(htmlspecialchars($_POST['tgl_lahir'],ENT_QUOTES));
      $alamat        = addslashes(htmlspecialchars($_POST['alamat'],ENT_QUOTES));
      /*pass*/
      $pass          = addslashes(htmlspecialchars($_POST['pass'],ENT_QUOTES));
      $pass_awal     = $row['pass'];
      $pass_baru     = md5($pass).strrev($sesid);
      $pass_default  = md5($pass);                //pass kosong

      $foto_lama     = $row['foto'];
      $foto          = $_FILES['foto']['name'];
      $foto_default  = md5($foto);                //foto kosong
      /*saat password & foto tidak diisi*/
      if (($pass_default=="d41d8cd98f00b204e9800998ecf8427e") && ($foto_default=="d41d8cd98f00b204e9800998ecf8427e")) {
        // echo "password & foto tidak diisi";
        $update1 = mysqli_query($koneksi,"update pengguna set 
                                            nama_depan    = '$nama_depan',
                                            nama_belakang = '$nama_belakang',
                                            uname         = '$uname',
                                            pass          = '$pass_awal',
                                            email         = '$email',
                                            tmp_lahir     = '$tmp_lahir',
                                            tgl_lahir     = '$tgl_lahir',
                                            alamat        = '$alamat',
                                            foto          = '$foto_lama' where id_pengguna='$sesid'") or die (mysqli_error($koneksi));
        if ($update1 == TRUE) {
          echo "<script>Lobibox.notify('default', {
                        iconClass: false,
                        size: 'mini',
                        delayIndicator: false,
                        position: 'center top',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        msg: 'Pembaruan Berhasil'
                    });</script>";
          echo "<script>window.location='dokter-dashboard'</script>";
        }else{
          echo "<script>alert('gagal')</script>";
        }
      }
      /*saat password disi & foto tidak diisi*/
      elseif (($pass_default!=="d41d8cd98f00b204e9800998ecf8427e") && ($foto_default=="d41d8cd98f00b204e9800998ecf8427e")) {
        // echo "password disi & foto tidak diisi";
        $update1 = mysqli_query($koneksi,"update pengguna set 
                                            nama_depan    = '$nama_depan',
                                            nama_belakang = '$nama_belakang',
                                            uname         = '$uname',
                                            pass          = '$pass_baru',
                                            email         = '$email',
                                            tmp_lahir     = '$tmp_lahir',
                                            tgl_lahir     = '$tgl_lahir',
                                            alamat        = '$alamat',
                                            foto          = '$foto_lama' where id_pengguna='$sesid'") or die (mysqli_error($koneksi));
        if ($update1 == TRUE) {
          echo "<script>Lobibox.notify('default', {
                        iconClass: false,
                        size: 'mini',
                        delayIndicator: false,
                        position: 'center top',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        msg: 'Pembaruan Berhasil'
                    });</script>"."<script>window.location='dokter-dashboard'</script>";
        }else{
          echo "<script>alert('gagal')</script>";
        }
      }
      /*saat password tidak diisi & foto diisi*/
      elseif (($pass_default=="d41d8cd98f00b204e9800998ecf8427e") && ($foto_default!=="d41d8cd98f00b204e9800998ecf8427e")) {
        // echo "password tidak diisi & foto diisi";
        /*untuk foto*/    
        $time   = time();                               //waktu
        $foto   = $_FILES['foto']['name'];              //foto
        $ukuran = $_FILES['foto']['size'];              //size
        $error  = $_FILES['foto']['error'];             //error
        $asal   = $_FILES['foto']['tmp_name'];          //asal file
        $format = pathinfo($foto,PATHINFO_EXTENSION);   //format file
        $nmfile = "./ad/fitur_daftar/foto/".$foto;           //folder + nama image
        $nmfile1= "././ad/fitur_daftar/foto/".$foto;           //folder + nama image
        //seleksi ada foto atau tidak
        if (!empty($foto)) {
          // seleksi ada error atau tidak
          if ($error === 0 ) {
            // seleksi ukuran ukuran dalam byte (ex: max 2000kb)
            if ($ukuran < 2000000) { 
              // seleksi format file
              if ($format === "jpg" || $format === "png") {
                //seleksi nama file
                if (file_exists($nmfile)) {
                  unlink($foto_lama);
                  // str_replace ("string yang dicari", "pengganti","string yang diganti")
                  $nmfile = str_replace(".".$format,"", $nmfile);
                  $nmfile = $nmfile."_".$time.".".$format;
                  $nmfile1= str_replace(".".$format,"", $nmfile1);
                  $nmfile1= $nmfile1."_".$time.".".$format;                  
                  $upload = move_uploaded_file($asal,$nmfile);
                  // seleksi saat berhasil upload foro ke direktori
                  if ($upload == TRUE) {
                    $input = mysqli_query($koneksi,"update pengguna set 
                                                    nama_depan    = '$nama_depan',
                                                    nama_belakang = '$nama_belakang',
                                                    uname         = '$uname',
                                                    pass          = '$pass_awal',
                                                    email         = '$email',
                                                    tmp_lahir     = '$tmp_lahir',
                                                    tgl_lahir     = '$tgl_lahir',
                                                    alamat        = '$alamat',
                                                    foto          = '$nmfile1' where id_pengguna='$sesid'") or die (mysqli_error());
                    // seleksi saat berhasil edit data
                    if ($input == TRUE) {
                      echo "<script>Lobibox.notify('default', {
                                iconClass: false,
                                size: 'mini',
                                delayIndicator: false,
                                position: 'center top',
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                msg: 'Pembaruan Berhasil'
                            });</script>"."<script>window.location='dokter-dashboard'</script>";
                    }else{
                      echo "<script>alert('gagal')</script>";                  
                    }
                  }else{
                    echo "salah upload";
                  }         
                }else{
                  unlink($foto_lama);
                  $upload = move_uploaded_file($asal,$nmfile);
                  // seleksi saat berhasil upload ke direktori
                  if ($upload == TRUE) {
                    $input = mysqli_query($koneksi,"update pengguna set 
                                                    nama_depan    = '$nama_depan',
                                                    nama_belakang = '$nama_belakang',
                                                    uname         = '$uname',
                                                    pass          = '$pass_awal',
                                                    email         = '$email',
                                                    tmp_lahir     = '$tmp_lahir',
                                                    tgl_lahir     = '$tgl_lahir',
                                                    alamat        = '$alamat',
                                                    foto          = '$nmfile1' where id_pengguna='$sesid'") or die (mysqli_error());
                    // seleksi saat berhasil edit data
                    if ($input == TRUE) {
                      echo "<script>Lobibox.notify('default', {
                                    iconClass: false,
                                    size: 'mini',
                                    delayIndicator: false,
                                    position: 'center top',
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    msg: 'Pembaruan Berhasil'
                                });</script>"."<script>window.location='dokter-dashboard'</script>";
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
                              msg: 'Hanya Bisa Menerima PNG & JPG'
                          });</script>"."<script>window.location='dokter-dashboard'</script>";
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
                        });</script>"."<script>window.location='dokter-dashboard'</script>";
            }
          }else{
            echo "error";
          }
        }
      }
      /*saat password disi & foto diisi*/
      elseif (($pass_default!=="d41d8cd98f00b204e9800998ecf8427e") && ($foto_default!=="d41d8cd98f00b204e9800998ecf8427e")) {
        /*untuk foto*/    
        $time   = time();                               //waktu
        $foto   = $_FILES['foto']['name'];              //foto
        $ukuran = $_FILES['foto']['size'];              //size
        $error  = $_FILES['foto']['error'];             //error
        $asal   = $_FILES['foto']['tmp_name'];          //asal file
        $format = pathinfo($foto,PATHINFO_EXTENSION);   //format file
        $nmfile = "./ad/fitur_daftar/foto/".$foto;           //folder + nama image
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
                  unlink($foto_lama);
                  $nmfile = str_replace(".".$format,"", $nmfile);
                  $nmfile = $nmfile."_".$time.".".$format;
                  $nmfile1= str_replace(".".$format,"", $nmfile1);
                  $nmfile1= $nmfile1."_".$time.".".$format;
                  $upload = move_uploaded_file($asal,$nmfile);
                  // seleksi saat berhasil upload ke direktori
                  if ($upload == TRUE) {
                    $input = mysqli_query($koneksi,"update pengguna set 
                                                    nama_depan    = '$nama_depan',
                                                    nama_belakang = '$nama_belakang',
                                                    uname         = '$uname',
                                                    pass          = '$pass_baru',
                                                    email         = '$email',
                                                    tmp_lahir     = '$tmp_lahir',
                                                    tgl_lahir     = '$tgl_lahir',
                                                    alamat        = '$alamat',
                                                    foto          = '$nmfile1' where id_pengguna='$sesid'") or die (mysqli_error());
                    // header("location:dokter-dashboard");
                    if ($input == TRUE) {
                      echo "<script>Lobibox.notify('default', {
                                    iconClass: false,
                                    size: 'mini',
                                    delayIndicator: false,
                                    position: 'center top',
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    msg: 'Pembaruan Berhasil'
                                });</script>"."<script>window.location='dokter-dashboard'</script>";
                    }else{
                      echo "<script>alert('gagal')</script>";                  
                    }
                  }else{
                    echo "salah upload";
                  }         
                }else{
                  unlink($foto_lama);
                  $upload = move_uploaded_file($asal,$nmfile);
                  // seleksi saat berhasil upload ke direktori
                  if ($upload == TRUE) {
                    $input = mysqli_query($koneksi,"update pengguna set 
                                                    nama_depan    = '$nama_depan',
                                                    nama_belakang = '$nama_belakang',
                                                    uname         = '$uname',
                                                    pass          = '$pass_baru',
                                                    email         = '$email',
                                                    tmp_lahir     = '$tmp_lahir',
                                                    tgl_lahir     = '$tgl_lahir',
                                                    alamat        = '$alamat',
                                                    foto          = '$nmfile1' where id_pengguna='$sesid'") or die (mysqli_error());
                    // header("location:dokter-dashboard");
                    if ($input == TRUE) {
                      echo "<script><script>Lobibox.notify('default', {
                                    iconClass: false,
                                    size: 'mini',
                                    delayIndicator: false,
                                    position: 'center top',
                                    showClass: 'fadeInDown',
                                    hideClass: 'fadeUpDown',
                                    msg: 'Pembaruan Berhasil'
                                });</script>"."<script>window.location='dokter-dashboard'</script>";
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
                              msg: 'Hanya Bisa Menerima PNG & JPG'
                          });</script>"."<script>window.location='dokter-dashboard'</script>";
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
                          });</script>"."<script>window.location='dokter-dashboard'</script>";
            }
          }else{
            echo "error";
          }
        }    
      }
      else{
        echo "error akhir";
      }
    }
    ?>
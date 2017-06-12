<?php 
    $id = $_GET['nid'];
    include ('././ad/jembatan.php');
    $qr  = mysqli_query($koneksi,"select * from pengguna where id_pengguna='$id'");
    $row = mysqli_fetch_array($qr);
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
    $pass_baru     = md5($pass).strrev($id);
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
                                          foto          = '$foto_lama' where id_pengguna='$id'") or die (mysqli_error($koneksi));
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
        echo "<script>window.location='data-pengguna'</script>";
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
                                          foto          = '$foto_lama' where id_pengguna='$id'") or die (mysqli_error($koneksi));
      if ($update1 == TRUE) {
        echo "<script>Lobibox.notify('default', {
                      iconClass: false,
                      size: 'mini',
                      delayIndicator: false,
                      position: 'center top',
                      showClass: 'fadeInDown',
                      hideClass: 'fadeUpDown',
                      msg: 'Pembaruan Berhasil'
                  });</script>"."<script>window.location='data-pengguna'</script>";
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
                                                  foto          = '$nmfile1' where id_pengguna='$id'") or die (mysqli_error());
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
                          });</script>"."<script>window.location='data-pengguna'</script>";
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
                                                  foto          = '$nmfile1' where id_pengguna='$id'") or die (mysqli_error());
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
                            msg: 'Hanya Bisa Menerima PNG & JPG'
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
                                                  foto          = '$nmfile1' where id_pengguna='$id'") or die (mysqli_error());
                  // header("location:data-pengguna");
                  if ($input == TRUE) {
                    echo "<script>Lobibox.notify('default', {
                                  iconClass: false,
                                  size: 'mini',
                                  delayIndicator: false,
                                  position: 'center top',
                                  showClass: 'fadeInDown',
                                  hideClass: 'fadeUpDown',
                                  msg: 'Pembaruan Berhasil'
                              });</script>"."<script>window.location='data-pengguna'</script>";
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
                                                  foto          = '$nmfile1' where id_pengguna='$id'") or die (mysqli_error());
                  // header("location:data-pengguna");
                  if ($input == TRUE) {
                    echo "<script><script>Lobibox.notify('default', {
                                  iconClass: false,
                                  size: 'mini',
                                  delayIndicator: false,
                                  position: 'center top',
                                  showClass: 'fadeInDown',
                                  hideClass: 'fadeUpDown',
                                  msg: 'Pembaruan Berhasil'
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
                            msg: 'Hanya Bisa Menerima PNG & JPG'
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
    }
    else{
      echo "error akhir";
    }
  
  ?>   
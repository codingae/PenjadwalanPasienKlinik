<?php 
include ('././ad/jembatan.php');
?>
<script>
  function suggest(inputString){
    if(inputString.length == 0) {
      $('#suggestions').fadeOut();
    } else {
    $('#as').addClass('load');
      $.post("../adm/ad/fitur_obat/auto.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions').fadeIn();
          $('#suggestionsList').html(data);
          $('#as').removeClass('load');
        }
      });
    }
  }

  function fill2(thisValue) {
    $('#nama_obat').val(thisValue);
    setTimeout("$('#suggestions').fadeOut();", 100);
  }function fill3(thisValue) {
    $('#id_obat').val(thisValue);
    setTimeout("$('#suggestions').fadeOut();", 100);
  }function fill4(thisValue) {
    $('#harga').val(thisValue);
    setTimeout("$('#suggestions').fadeOut();", 100);
  }
</script>
<style>
#result {
  height:10px;
  font-size:9px;
  font-family:Arial, Helvetica, sans-serif;
  color:#FA2626;
  padding:0px;
  margin-bottom:0px;
  background-color:#00E676;
}
#as{
  padding:3px;
  border:1px #CCC solid;
  font-size:12px;
}
.suggestionsBox {
  border-radius: 9px;
  position: relative;
  left: 0px;
  top:0px;
  margin: 0px 0px 0px 0px;
  width: 100%;
  background-color:#00E676;
  border-top: 1px solid #999999;
  color: #F70B0B;
}
.suggestionList {
  margin: 0px;
  padding: 0px;
}
.suggestionList ul li {
  list-style:none;
  margin: 0px;
  padding: 6px;
  border-bottom:1px dotted #666;
  cursor: pointer;
}
.suggestionList ul li:hover {
  background-color: white;
  color:#F60C0C;
}
ul {
  font-family:Arial, Helvetica, sans-serif;
  font-size:11px;
  color:black;
  padding:0;
  margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
  position:relative;
}  
</style>
<!-- START CONTENT -->
<section id="content">

<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="obat-masuk">Obat Masuk</a></li>
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
        <div class="col l7 m7 s12">
        <div class="card-panel">
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
            <thead>
              <th>Obat</th>
              <th>Jumlah</th>
              <th>Kadaluarsa</th>
              <th>Action</th>
            </thead>
            <tbody>                  
              <!-- $date = date("Ymd");
              $qr   = mysqli_query($koneksi,"select * from view_om where id_om like '$date%' order by id_om desc");
              while ($rw = mysqli_fetch_array($qr))
              echo substr($rw['id_om'],8,20)+1; -->
              <?php 
                // $qr   = mysqli_query($koneksi,"select nama_obat,kadaluarsa,sum(total_biaya_om) as jumlah from view_om group by id_obat");
                $qr   = mysqli_query($koneksi,"select * from view_om");
                while ($rw = mysqli_fetch_array($qr)){                      
              ?>
              <tr>
                <td><?php echo $rw['nama_obat']; ?></td>
                <td><?php echo $rw['jml_om']; ?></td>
                <td><?php echo $rw['kadaluarsa']; ?></td>
                <td>
                  <?php 
                    $kadaluarsa = $rw['kadaluarsa'];
                    $th         = substr($kadaluarsa, 8,2) ;
                    $bln        = substr($kadaluarsa, 3,2) ;
                    $tgl        = substr($kadaluarsa, 0,2) ;
                    // tanggal kadaluarsa
                    $data1      = $th.$bln.$tgl;
                    // cek tanggal sekarang
                    $data2      = date("ymd");
                    $th2        = date("y");
                    $bln2       = date("m");
                    $tgl2       = date("d");
                    if ($th == $th2) {
                      // variabel peringatan
                      $peringatan = $data1-$data2;
                      // echo $data1."<br>".$data2."<br>";
                      // echo $peringatan;
                      // $peringatan = "15";
                      if ($peringatan > "15" && $peringatan < "31") {
                      ?>
                        <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat yellow darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                      <?php
                        }elseif ($peringatan > "3" && $peringatan < "16") {
                      ?>
                        <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat yellow darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><b style='font-size:9px'><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                      <?php
                        }elseif ($peringatan > "0" && $peringatan < "4") {
                      ?>
                        <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat red darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                      <?php
                        }elseif ($peringatan <= "0") {
                      ?>
                        <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat red darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat KADALUARSA">KADALUARSA</a>
                      <?php
                        }else{
                      ?>
                        <a href="index.php?klinik=obat-masuk<?php echo '&id_obat=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat blue white-text right" data-position="left" data-delay="50" data-tooltip="Edit">Edit</a>
                      <?php  
                      }
                    }else{
                      /*saat bulan desember tahun sekarang dan juga bulan januari tahun setelahnya*/
                      $cek        = $th-$th2;
                      if ($cek==1) {
                        if ($bln==01 && $bln2==12) {
                          $jmlhari    = cal_days_in_month(CAL_GREGORIAN, $bln2, $th2);
                          $peringatan = ($jmlhari-$tgl2)+$tgl;
                          if ($peringatan > "15" && $peringatan < "31") {
                          ?>
                            <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat yellow darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                          <?php
                            }elseif ($peringatan > "3" && $peringatan < "16") {
                          ?>
                            <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat yellow darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><b style='font-size:9px'><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                          <?php
                            }elseif ($peringatan > "0" && $peringatan < "4") {
                          ?>
                            <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat red darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                          <?php
                            }elseif ($peringatan <= "0") {
                          ?>
                            <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat red darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat KADALUARSA">KADALUARSA</a>
                          <?php
                            }else{
                          ?>
                            <a href="index.php?klinik=obat-masuk<?php echo '&id_obat=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat blue white-text right" data-position="left" data-delay="50" data-tooltip="Edit">Edit</a>
                          <?php  
                          }
                        }
                      }elseif ($cek>1) {
                        $peringatan = $data1-$data2;
                        if ($peringatan > "15" && $peringatan < "31") {
                        ?>
                          <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat yellow darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                        <?php
                          }elseif ($peringatan > "3" && $peringatan < "16") {
                        ?>
                          <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat yellow darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><b style='font-size:9px'><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                        <?php
                          }elseif ($peringatan > "0" && $peringatan < "4") {
                        ?>
                          <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat red darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat <?php echo $peringatan; ?> Hari Lagi Kadaluarsa"><?php echo $peringatan; ?> Hari Lagi..(BELI)</b></a>
                        <?php
                          }elseif ($peringatan <= "0") {
                        ?>
                          <a href="index.php?klinik=obat-masuk<?php echo '&id_obat_plus=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat red darken-4 white-text right" data-position="left" data-delay="50" data-tooltip="Obat KADALUARSA">KADALUARSA</a>
                        <?php
                          }else{
                        ?>
                          <a href="index.php?klinik=obat-masuk<?php echo '&id_obat=' . $rw['id_obat'].'&id_om=' . $rw['id_om']?>" class="tooltipped waves-effect btn-flat blue white-text right" data-position="left" data-delay="50" data-tooltip="Edit">Edit</a>
                        <?php  
                        }
                      }
                    }
                  ?>
                </td>
              </tr>
              <?php 
                }
                // untuk tambah obat masuk
                if (isset($_POST['tambah_obat'])) {
                  $date           = date('Ymd');
                  $qr             = mysqli_query($koneksi,"select * from obat_masuk where id_om like '$date%' order by id_om desc");
                  $rw             = mysqli_fetch_array($qr);
                  if ($rw['id_om']=="") {
                    $id_om        = $date."1";
                  }elseif ($rw['id_om']!=="") {
                    $id_om        = $date.substr($rw['id_om'],8,20)+1;
                  }
                  $id_obat        = mysqli_real_escape_string($koneksi,$_POST['id_obat']);
                  $cek            = mysqli_query($koneksi,"select * from obat_masuk where id_obat='$id_obat'");
                  $cekjumlah      = mysqli_num_rows($cek);
                  // if ($cekjumlah>0) {
                  //   echo "sudah ad";
                  // }else{
                  //   echo "tidak ada";
                  // }
                  // die();
                  $id_obat        = mysqli_real_escape_string($koneksi,$_POST['id_obat']);
                  $jml_om         = mysqli_real_escape_string($koneksi,$_POST['jml_om']);
                  $total_biaya_om = $jml_om*mysqli_real_escape_string($koneksi,$_POST['harga']);
                  $kadaluarsa     = mysqli_real_escape_string($koneksi,$_POST['kadaluarsa']);
                  $qr1            = mysqli_query($koneksi,"select * from master_obat where id_obat='$id_obat'");
                  $rw1            = mysqli_fetch_array($qr1);
                  $stok_lama      = $rw1['jml'];
                  $stok_baru      = $stok_lama+$jml_om;
                  if ($kadaluarsa=='') {
                      echo "<script>Lobibox.notify('error', {
                                  iconClass: false,
                                  size: 'mini',
                                  delayIndicator: true,
                                  position: 'center top',
                                  showClass: 'fadeInDown',
                                  hideClass: 'fadeUpDown',
                                  msg: 'Isi Dengan Lengkap'
                              });</script>";
                  }else{
                      $kueri          = mysqli_query($koneksi,"INSERT INTO obat_masuk (id_om,id_obat,jml_om,total_biaya_om,kadaluarsa) VALUES ('$id_om','$id_obat','$jml_om','$total_biaya_om','$kadaluarsa')");
                      $edit_obat      = mysqli_query($koneksi,"update master_obat set jml='$stok_baru' where id_obat='$id_obat'")or die(mysqli_error($koneksi));
                      $tgl_pengeluaran= date('d-m-Y');
                      $pengeluaran    = mysqli_query($koneksi,"INSERT INTO pengeluaran VALUES ('','','$id_om','$tgl_pengeluaran','','$total_biaya_om','$sesid')")or die(mysqli_error($koneksi));
                      if ($kueri==TRUE) {
                            echo "<script>Lobibox.notify('default', {
                                      iconClass: false,
                                      size: 'mini',
                                      delayIndicator: false,
                                      position: 'center top',
                                      showClass: 'fadeInDown',
                                      hideClass: 'fadeUpDown',
                                      msg: 'Record Obat Masuk Berhasil'
                                  });</script><script>window.location='obat-masuk'</script>";
                      }else{
                        echo "<script>alert('gagal')</script>";                  
                      }                    
                  }
                }
                /*end tambah*/
                /*untuk tambah warning*/
                elseif (isset($_POST['tambah_obat_plus'])) {
                  $id_om          = $_GET['id_om'];
                  $jml_om_lama    = $_POST['jml_om_lama'];
                  $kadaluarsa     = $_POST['kadaluarsa'];
                  $id_obat_plus   = $_GET['id_obat_plus'];
                  $jml_om         = $_POST['jml_om'];
                  $harga          = $_POST['harga'];
                  $kadaluarsa     = mysqli_real_escape_string($koneksi,$_POST['kadaluarsa']);
                  /*proses1 tambah obat kadaluarsa*/
                  $insert         = mysqli_query($koneksi,"insert into obat_kadaluarsa values ('$id_obat_plus','$id_om','$jml_om_lama','$kadaluarsa')");
                  /*end*/
                  $qr3            = mysqli_query($koneksi,"select harga_obat from master_obat where id_obat='$id_obat_plus'");
                  $rw3            = mysqli_fetch_array($qr3);
                  $total_biaya_om = $rw3['harga_obat']*$jml_om;
                  /*proses2 update obat masuk*/
                  $edit_obat      = mysqli_query($koneksi,"update obat_masuk set jml_om='$jml_om',total_biaya_om='$total_biaya_om',kadaluarsa='$kadaluarsa' where id_om='$id_om'")or die(mysqli_error($koneksi));
                  /*end*/
                  /*proses3 perhitungan stok*/
                  $qr1            = mysqli_query($koneksi,"select sum(jml_om) as jml from obat_masuk where id_obat='$id_obat_plus'");
                  $rw1            = mysqli_fetch_array($qr1);
                  $stok_awal1     = $rw1['jml'];
                  $qr11           = mysqli_query($koneksi,"select sum(jml_ok) as jml11 from obat_keluar where id_obat='$id_obat_plus'");
                  $rw11           = mysqli_fetch_array($qr11);
                  $stok_awal11    = $rw1['jml11'];
                  $stok_awal      = $stok_awal1-$stok_awal11;
                  /*end*/
                  // $qr2            = mysqli_query($koneksi,"select jml_om from obat_masuk where id_om='$id_obat_plus'");
                  // $rw2            = mysqli_fetch_array($qr2);
                  // $stok_sebelum   = $rw2['jml_om'];
                  // $stok_berubah   = $stok_awal-$stok_sebelum;
                  // $jml            = $stok_berubah+$_POST['jml_om'];
                  // echo $jml;
                  // echo "JML OM=".$jmlom."<br>stok awal= ".$stok_awal."<br>Stok Sebelum=".$stok_sebelum."<br>Stok Berubah=".$stok_berubah."<br>Stok Fix=".$jml;
                  $edit_mo        = mysqli_query($koneksi,"update master_obat set jml=$stok_awal where id_obat='$id_obat_plus'")or die(mysqli_error($koneksi));
                  $tgl_pengeluaran= date('d-m-Y');
                  $pengeluaran    = mysqli_query($koneksi,"INSERT INTO pengeluaran VALUES ('','','$id_om','$tgl_pengeluaran','','$total_biaya_om','$sesid')")or die(mysqli_error($koneksi));
                  if ($edit_obat && $edit_mo && $pengeluaran == TRUE) {
                        echo "<script>Lobibox.notify('default', {
                                iconClass: false,
                                size: 'mini',
                                delayIndicator: false,
                                position: 'center top',
                                showClass: 'fadeInDown',
                                hideClass: 'fadeUpDown',
                                msg: 'Selamat Record Pembaruan Obat Berhasil'
                            });</script><script>window.location='obat-masuk'</script>";
                  }else{
                    echo "<script>alert('gagal')</script>";                  
                  }  

                }
                /*edit tambah warning*/
                /*edit obat*/
                elseif (isset($_POST['edit_obat'])) {
                  $id_om          = $_GET['id_om'];
                  $id_obat        = $_GET['id_obat'];
                  $jmlom          = $_POST['jml_om'];
                  $kadaluarsa     = mysqli_real_escape_string($koneksi,$_POST['kadaluarsa']);
                  $qr3            = mysqli_query($koneksi,"select harga_obat from master_obat where id_obat='$id_obat'");
                  $rw3            = mysqli_fetch_array($qr3);
                  $total_biaya_om = $rw3['harga_obat']*$jmlom;
                  $edit_obat      = mysqli_query($koneksi,"update obat_masuk set jml_om='$jmlom',total_biaya_om='$total_biaya_om',kadaluarsa='$kadaluarsa' where id_om='$id_om'")or die(mysqli_error($koneksi));
                  $qr1            = mysqli_query($koneksi,"select sum(jml_om) as jml from obat_masuk where id_obat='$id_obat'");
                  $rw1            = mysqli_fetch_array($qr1);
                  $stok_awal1     = $rw1['jml'];
                  $qr11           = mysqli_query($koneksi,"select sum(jml_ok) as jml11 from obat_keluar where id_obat='$id_obat'");
                  $rw11           = mysqli_fetch_array($qr11);
                  $stok_awal11    = $rw1['jml11'];
                  $stok_awal      = $stok_awal1-$stok_awal11;
                  $qr2            = mysqli_query($koneksi,"select jml_om from obat_masuk where id_om='$id_om'");
                  $rw2            = mysqli_fetch_array($qr2);
                  $stok_sebelum   = $rw2['jml_om'];
                  $stok_berubah   = $stok_awal-$stok_sebelum;
                  $jml            = $stok_berubah+$_POST['jml_om'];
                  // echo $jml;
                  // echo "JML OM=".$jmlom."<br>stok awal= ".$stok_awal."<br>Stok Sebelum=".$stok_sebelum."<br>Stok Berubah=".$stok_berubah."<br>Stok Fix=".$jml;
                  $edit_mo        = mysqli_query($koneksi,"update master_obat set jml=$jml where id_obat='$id_obat'")or die(mysqli_error($koneksi));
                  $editpengeluaran= mysqli_query($koneksi,"update pengeluaran set total_biaya='$total_biaya_om' where id_om='$id_om'")or die(mysqli_error($koneksi));
                  if ($edit_obat && $edit_mo && $editpengeluaran == TRUE) {
                          echo "<script>Lobibox.notify('default', {
                                  iconClass: false,
                                  size: 'mini',
                                  delayIndicator: false,
                                  position: 'center top',
                                  showClass: 'fadeInDown',
                                  hideClass: 'fadeUpDown',
                                  msg: 'Record Obat Masuk Berhasil'
                              });</script><script>window.location='obat-masuk'</script>";
                    }else{
                      echo "<script>alert('gagal')</script>";                  
                    }  
                }
                /*end obat*/                      
              ?>
            </tbody>
          </table>
          <br>
        </div>  
        </div>
        <div class="col l5 m5 s12">
        <div class="card-panel">
          <!-- untuk form edit -->
          <?php 
            if (isset($_GET['id_obat'])) {
            $id      = $_GET['id_om'];
            $query   = mysqli_query($koneksi,"select * from view_om where id_om='$id'");
            $row     = mysqli_fetch_array($query);
          ?>
          <form action="" method="post">
              <div class="input-field">
                <div class="ui-widget">
                  <div id="suggest">
                    <i class="mdi-action-note-add prefix"></i>
                    <input type="text" class="form-control validate" id="nama_obat" autocomplete="off" name="nama_obat" onKeyUp="suggest(this.value);"onBlur="fill2();" value="<?= $row['nama_obat'] ?>" required>
                    <div class="suggestionsBox" id="suggestions" style="display: none;">
                      <div class="suggestionList" id="suggestionsList" style="color:red"> &nbsp; </div>
                    </div>
                    <label for="nama_obat" class="active">Nama Obat</label>
                  </div>
                </div>
              </div>
              <div class="input-field">
                <i class="mdi-action-account-balance prefix"></i>
                <input id="jml_omm" name="jml_omm" type="hidden" class="validate" value="<?= $row['jml_om'] ?>" required>
                <input id="jml_om" name="jml_om" type="number" class="validate" value="<?= $row['jml_om'] ?>" required>
                <label for="jml_om" class="active">Jumlah Obat</label>
              </div>
              <div class="input-field">
                <i class="mdi-action-event prefix"></i>
                <input id="kadaluarsa" name="kadaluarsa" type="date" class="datepicker" value="<?= $row['kadaluarsa'] ?>" required>
                <label class="active">kadaluarsa</label>
              </div>
              <a href="obat-masuk" class="waves-effect btn-flat light-green accent-3 left white-text">Kembali</a>
              <button class="waves-effect btn-flat light-green accent-3 right white-text" name="edit_obat" id="edit_obat"><b>Edit</b> <i class="mdi-content-add-box right"></i></button>
          </form>
          <!-- end form edit -->
          <!-- untuk form tambah obat peringatan -->
          <?php
            }elseif(isset($_GET['id_obat_plus'])){
            $id      = $_GET['id_obat_plus'];
            $id1     = $_GET['id_om'];
            $query   = mysqli_query($koneksi,"select * from master_obat where id_obat='$id'");
            $row     = mysqli_fetch_array($query);
            $query1  = mysqli_query($koneksi,"select jml_om,kadaluarsa from obat_masuk where id_om='$id1'");
            $row1    = mysqli_fetch_array($query1);
          ?>
          <form action="" method="post">
            <div class="input-field">
              <div class="ui-widget">
                  <i class="mdi-action-note-add prefix"></i>
                  <input type="text" class="form-control validate" id="nama_obat" value="<?= $row['nama_obat'] ?>" required readonly>
                  <label for="nama_obat" class="active">Nama Obat</label>
              </div>
            </div>
            <div class="input-field">
              <i class="mdi-action-account-balance prefix"></i>
              <input id="kadaluarsa" name="kadaluarsa" value="<?php echo $row1['kadaluarsa']; ?>" type="hidden" class="validate">
              <input id="jml_om_lama" name="jml_om_lama" value="<?php echo $row1['jml_om']; ?>" type="hidden" class="validate">
              <input id="harga" name="harga" value="<?php echo $row['harga_obat']; ?>" type="hidden" class="validate">
              <input id="jml_om" name="jml_om" type="number" class="validate" required>                    
              <label for="jml_om">Jumlah Obat</label>
            </div>
            <div class="input-field">
              <i class="mdi-action-event prefix"></i>
              <input id="kadaluarsa" name="kadaluarsa" type="date" class="datepicker" required>
              <label>kadaluarsa</label>
            </div>
            <a href="obat-masuk" class="waves-effect btn-flat light-green accent-3 left white-text">Kembali</a>
            <button class="waves-effect btn-flat light-green accent-3 right white-text" name="tambah_obat_plus" id="tambah_obat_plus"><b>Tambah Obat</b> <i class="mdi-content-add-box right"></i></button>
          </form>
          <!-- end tambah obat peringatan -->
          <!-- untuk tambah obat -->
          <?php
            }
            else{
          ?>
          <form action="" method="post">
            <div class="input-field">
              <div class="ui-widget">
                <div id="suggest">
                  <i class="mdi-action-note-add prefix"></i>
                  <input type="text" class="form-control validate" id="nama_obat" name="nama_obat" onKeyUp="suggest(this.value);"onBlur="fill2();" required>
                  <div class="suggestionsBox" id="suggestions" style="display: none;">
                    <div class="suggestionList" id="suggestionsList" style="color:red"> &nbsp; </div>
                  </div>
                  <label for="nama_obat">Nama Obat</label>
                </div>
              </div>
            </div>
            <div class="input-field">
              <i class="mdi-action-account-balance prefix"></i>
              <input id="id_obat" name="id_obat" type="hidden" class="validate">
              <input id="harga" name="harga" type="hidden" class="validate">
              <input id="jml_om" name="jml_om" type="number" class="validate"  required>                    
              <label for="jml_om">Jumlah Obat</label>
            </div>
            <div class="input-field">
              <i class="mdi-action-event prefix"></i>
              <input id="kadaluarsa" name="kadaluarsa" type="date" class="datepicker" required>
              <label>kadaluarsa</label>
            </div>
            <button class="waves-effect btn-flat light-green accent-3 right white-text" name="tambah_obat" id="tambah_obat"><b>Tambah</b> <i class="mdi-content-add-box right"></i></button>
          </form>
          <!-- end form tambah om -->
          <?php              
            }
          ?>                 
          <br><br><br>
        </div>  
        </div>               
      </div>   
    </div>
  </div>
</div>
<!--end container-->
</section>
<!-- END CONTENT -->
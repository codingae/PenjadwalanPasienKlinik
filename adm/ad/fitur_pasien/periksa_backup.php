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
            <li><a href="periksa">Periksa</a></li>            
            <a href="periksa">
              <span class="mdi-file-folder-shared right small"> Daftar Periksa</span>
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
        <div class="col s12 m6 l6">
        <div class="card-panel">
          <h5>Riwayat Periksa</h5>
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Periksa</th>
                <th>No Antrian</th>
                <th>Waktu Periksa</th>
                <th>Status</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
              $no        = 1;
              $query     = mysqli_query($koneksi,"SELECT * FROM periksa where id_pengguna='$sesid' order by tanggal_periksa DESC")or die (mysqli_error());
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
                      echo "Sudah Diperiksa";
                    }elseif ($stts=="3") {
                      echo "Tidak Datang";
                    }elseif ($stts=="4") {
                      echo "Selesai Periksa";
                    }
                  ?></td>
              </tr>
          <?php 
              $no++;
              }
          ?>
          </tbody>
        </table>
        </div>            
        </div>
        <div class="col s12 m6 l6">
        <div class="card-panel">
          <?php 
            $id = $_GET['id'];
            if (isset($_GET['id'])) {
              $query1 = mysqli_query($koneksi,"SELECT * FROM master_obat where id_obat='$id'")or die (mysqli_error());  
              $row1   = mysqli_fetch_array($query1);
          ?>
            <form action="" method="post">
              <header><h4 class="light-green-text">Edit Obat</h4></header>
                <div class="input-field">
                  <i class="mdi-action-account-circle prefix"></i>
                  <input id="nama_obat" name="nama_obat" type="text" class="validate" value="<?php echo $row1['nama_obat']; ?>"  required>
                  <label for="nama_obat" class="active">Nama Obat</label>
                </div>
                <div class="input-field">
                  <i class="mdi-editor-attach-money prefix"></i>
                  <input id="harga_obat" name="harga_obat" type="number" class="validate" value="<?php echo $row1['harga_obat']; ?>"  required>
                  <label for="nama_obat" class="active">Harga Obat</label>
                </div>
                <button class="waves-effect btn-flat light-green accent-3 right white-text" name="edit-obat"><b>Edit</b></button>
              <a href="obat" class="btn red waves-effect">Kembali</a>    
            </form>
          <?php
            }else{
          ?>
            <form action="" method="post">
              <header><h4 class="light-green-text">Daftar Periksa</h4></header>
                <div class="input-field">
                  <i class="mdi-action-event prefix"></i>
                  <input id="tgl_daftar" name="tgl_daftar" type="date" class="datepicker" class="validate"  required>
                  <label for="tgl_daftar">Pilih Tanggal Periksa</label>
                </div>
                <button class="waves-effect btn-flat light-green accent-3 right white-text" name="ambil-antrian"><b>Ambil No Antrian</b></button>    
            </form>
          <?php             
            }
          ?>
        <br><br>
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
if (isset($_POST['ambil-antrian'])) {
$tgl_daftar  = $_POST['tgl_daftar'];
$thn         = substr($_POST['tgl_daftar'],8,2);
$bln         = substr($_POST['tgl_daftar'],3,2);
$tgl         = substr($_POST['tgl_daftar'],0,2);
// cek apakah sudah ada yang daftar di tgl tsb atau belum
$cek_tanggal = $thn.$bln.$tgl;
$qr          = mysqli_query($koneksi,"select id_periksa,waktu_periksa from periksa where id_periksa like '%$cek_tanggal%' order by id_periksa desc");
$rw          = mysqli_fetch_array($qr);
// saat pada tgl tsb sudah ada yang daftar
if (mysqli_num_rows($qr)>0) {
  // tgl sekarang
  // $dateskrg  = date("d-m-Y");
  // $datepilih = $_POST['tgl_daftar'];
  $thn1          = substr($_POST['tgl_daftar'],6,4);
  $dateskrg      = date("Ymd");
  $datepilih     = $thn1.$bln.$tgl;
  // die();
  // id periksa terakhir
  $id_sebelum    = $rw['id_periksa'];
  // id periksa terakhir ditambah 1
  $id_periksa    = $id_sebelum+1;
  //  id periksa dibalik, di ambil 3 digit awal dari hasi id periksa yang dibalik, lalu di 3 digit yang diambil tadi di balik lagi
  $no_antrian    = strrev(substr(strrev($id_periksa),0,3));
  // waktu sekarang
  // $waktuskrg  = "13:30";
  $waktuskrg     = date("H:i");
  // pisah jam
  $jm            = substr($waktuskrg, 0,2);
  // pisah menit
  $mn            = substr($waktuskrg, 3,2);
  // jam +1
  $jmplus        = $jm+1;
  // jam pendaftar sebelumnya
  $jam_sebelum   = substr($rw['waktu_periksa'],0,2);
  // menit pendaftar sebelumnya
  $menit_sebelum = substr($rw['waktu_periksa'],3,2);
  // tes logika
  $jam_tes       = $jam_sebelum-$jm;
  $menit_tes     = $menit_sebelum-$mn;
  // untuk jam terakhir
  $jam_akhir     = $jm+1;
  // saat pasien memilih tanggal sebelum hari ini
  if ($datepilih<$dateskrg) {
    echo "<script>Lobibox.notify('default', {
            iconClass: false,
            size: 'mini',
            delayIndicator: true,
            position: 'center top',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            msg: 'Pilih Tanggal Dengan Benar'
        });</script>";
  }
  // saat pendaftar dengan hari lain
  elseif ($datepilih>$dateskrg) {
    // ambil 2 digit angka urutan nomer 3 dari waktu periksa kemudian ditambah 15 (asumsi periksa 15 menit)
    $waktu_periksa = substr($rw['waktu_periksa'],3,2)+15;
    // digabung dengan dengan 2 digit awal waktu periksa untuk memudahkan menunjuk waktu
    $waktu_periksa = substr($rw['waktu_periksa'],0,2).":".$waktu_periksa;
    // echo $waktu_periksa;
  }
  // saat pendaftar pada hari tersebut
  else{
    // saat pendaftar berbeda jam, menit <= menit saat ini
    if ($jam_tes!="0" && $menit_sebelum <= $mn) {
      // saat jam sekarang < jam pendaftar sebelumnya maka akan muncul alert
      if ($jm<$jam_sebelum) {
        echo "<script>Lobibox.notify('default', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Gunakan Pengaturan Tanggal Timezone Asia/Jakarta'
          });</script>";
      }
      // jika tidak maka akan proses waktu periksa
      else{
        if ($mn > "00" && $mn <= "15") {
          $waktu_periksa = $jm.":"."15";
        }elseif ($mn>"15" && $mn <= "30") {
          $waktu_periksa = $jm.":"."30";
        }elseif ($mn>"30" && $mn <= "45") {
          $waktu_periksa = $jm.":"."45";
        }elseif ($mn>"45" && $mn <= "59") {
          $waktu_periksa = $jam_akhir.":"."00";
        }
      }
    }
    // saat pendaftar berbeda jam, menit >= menit saat ini
    elseif ($jam_tes!="0" && $menit_sebelum >= $mn) {
      // saat jam sekarang < jam pendaftar sebelumnya maka akan muncul alert
      if ($jm<$jam_sebelum) {
        echo "<script>Lobibox.notify('default', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Gunakan Pengaturan Tanggal Timezone Asia/Jakarta'
          });</script>";
      }
      // saat tidak maka akan proses waktu periksa
      else{
        if ($mn > "00" && $mn <= "15") {
          $waktu_periksa = $jm.":"."15";
        }elseif ($mn>"15" && $mn <= "30") {
          $waktu_periksa = $jm.":"."30";
        }elseif ($mn>"30" && $mn <= "45") {
          $waktu_periksa = $jm.":"."45";
        }elseif ($mn>"45" && $mn <= "59") {
          $waktu_periksa = $jam_akhir.":"."00";
        }      
      }
    }
    // saat pendaftar jam sama menit <= menit saat ini
    elseif ($jam_tes=="0" && $menit_sebelum <= $mn) {
      // saat menit sekarang < menit pendaftar sebelumnya maka akan muncul alert    
      if ($mn<$menit_sebelum) {
        echo "<script>Lobibox.notify('default', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Gunakan Pengaturan Tanggal Timezone Asia/Jakarta'
          });</script>";
      }
      // jika tidak akan memproses waktu periksa
      else{
        if ($mn >= "00" && $mn < "15") {
          $waktu_periksa = $jam_sebelum.":"."15";
        }elseif ($mn>="15" && $mn < "29") {
          $waktu_periksa = $jam_sebelum.":"."30";
        }elseif ($mn>="30" && $mn < "45") {
          $waktu_periksa = $jam_sebelum.":"."45";
        }elseif ($mn>="45" && $mn <= "59") {
          $waktu_periksa = $jam_akhir.":"."00";
        }
      }
    }
    // saat pendaftar jam sama menit > menit saat ini
    elseif ($jam_tes=="0" && $menit_sebelum >= $mn) {
      // saat jam sekarang < jam pendaftar sebelumnya maka akan muncul alert    
      if ($mn<$menit_sebelum) {
        echo "<script>Lobibox.notify('default', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Gunakan Pengaturan Tanggal Timezone Asia/Jakarta'
          });</script>";
      }
      // jika tidak akan di proses waktu periksa
      else{
        if ($mn >= "00" && $mn < "15") {
          $waktu_periksa = $jam_sebelum.":"."15";
        }elseif ($mn>="15" && $mn < "30") {
          $waktu_periksa = $jam_sebelum.":"."30";
        }elseif ($mn>="30" && $mn < "45") {
          $waktu_periksa = $jam_sebelum.":"."45";
        }elseif ($mn>="45" && $mn <= "59") {
          $waktu_periksa = $jam_akhir.":"."00";
        }
      }
    }
    else{
      echo "<script>alert('logika masih kurang silakan hubungi administrator')</script>";
    }
  }
  // echo $waktu_periksa;
  // seleksi untuk perbaikan format penulisan waktu periksa
  if ($waktu_periksa=="08:60") {
    $waktu_periksa = "09:00";
  }elseif ($waktu_periksa=="09:60") {
    $waktu_periksa = "10:00";
  }elseif ($waktu_periksa=="10:60") {
    $waktu_periksa = "11:00";
  }elseif ($waktu_periksa=="11:60") {
    $waktu_periksa = "12:00";
  }elseif ($waktu_periksa=="12:60") {
    $waktu_periksa = "13:00";
  }elseif ($waktu_periksa=="13:60") {
    $waktu_periksa = "14:00";
  }elseif ($waktu_periksa=="14:60") {
    $waktu_periksa = "15:00";
  }elseif ($waktu_periksa=="15:60") {
    $waktu_periksa = "16:00";
  }
}
// saat pada tgl tsb belum ada yang daftar
else{
  $thn            = substr($_POST['tgl_daftar'],8,2);
  $bln            = substr($_POST['tgl_daftar'],3,2);
  $tgl            = substr($_POST['tgl_daftar'],0,2);
  $id_awal        = $thn.$bln.$tgl;
  // buat id periksa
  $id_periksa     = $id_awal."01";
  // echo $id_periksa."<br>";
  $no_antrian     = strrev(substr(strrev($id_periksa),0,3));
  // waktu sekarang
  $waktuskrg      = date("H:i");
  $jm             = substr($waktuskrg, 0,2);
  $mn             = substr($waktuskrg, 3,2);
  $jmplus         = $jm+1;
  // tgl sekarang
  // $dateskrg    = date("d-m-Y");
  // // $dateskrg = date("d-m-Y");
  // $datepilih   = $_POST['tgl_daftar'];
  $thn1           = substr($_POST['tgl_daftar'],6,4);
  $dateskrg       = date("Ymd");
  $datepilih      = $thn1.$bln.$tgl;
  // kalau periksa di hari lain
  if ($datepilih != $dateskrg) {
    if ($datepilih<=$dateskrg) {
      echo "<script>Lobibox.notify('default', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Pilih Tanggal Periksa Dengan Benar'
          });</script>";
      }else{
         $waktu_periksa = "08:00";
      } 
  }
  // kalau periksa di hari tsb
  else{
    if ($jm>="8") {
      if ($mn >="0" && $mn <= "30") {
        $waktu_periksa = $jm.":"."30";
      }
      elseif ($mn >= "30" && $mn <="59") {
        $waktu_periksa = $jmplus.":"."00";
      }else{
        $waktu_periksa = "08:00";    
      }
    }elseif ($jm<="8") {
      $waktu_periksa = "08:00";
    }
  }
}
// echo $waktu_periksa;
// saat pasien periksa sudah jam 16:00 maka pasien tidak bisa daftar online lagi, dipersilahkan untuk daftar di hari lain
if ($waktu_periksa > "16") {
    echo "<script>Lobibox.notify('default', {
            iconClass: false,
            size: 'mini',
            delayIndicator: true,
            position: 'center top',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            msg: 'Maaf Antrian Hari Tersebut Sudah Full,<br> dan atau Sudah Tutup, Silakan Cari Hari Lain'
        });</script>";
}
// saat masih jam kerja, pasien langsung di proses jadwal periksa dan diberikan nomer antrian
elseif ($waktu_periksa > "08" && $waktu_periksa <= "16" && $datepilih>=$dateskrg) {
  // echo "benar";
  // echo $waktu_periksa;
  $ambil_antrian = mysqli_query($koneksi,"insert into periksa values('$id_periksa','$sesid','$tgl_daftar','$no_antrian','$waktu_periksa','','1','')")or die(mysqli_error($koneksi));
  if ($ambil_antrian == TRUE) {
          echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat No Antrian Berhasil Dibuat'
                });</script><script>window.location='periksa'</script>";
    }else{
      echo "<script>alert('gagal')</script>";                  
    }
  }
}


/*jam baru*/


    /*saat mengambil ambil antrian kurang dari pukul 06:00 maka dia akan mencetak antrian pukul 06:00*/
    if ($gabungjamenit<600) {
        $waktu_periksa = "06:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 600 && $gabungjamenit < 615 ) {
      $waktu_periksa = "06:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 615 && $gabungjamenit < 630 ) {
      $waktu_periksa = "06:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 630 && $gabungjamenit < 645 ) {
      $waktu_periksa = "06:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 645 && $gabungjamenit < 660 ) {
      $waktu_periksa = "07:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 700 && $gabungjamenit < 715 ) {
      $waktu_periksa = "07:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 715 && $gabungjamenit < 730 ) {
      $waktu_periksa = "07:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 730 && $gabungjamenit < 745 ) {
      $waktu_periksa = "07:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 745 && $gabungjamenit < 1600 ) {
      $waktu_periksa = "16:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1600 && $gabungjamenit < 1615 ) {
      $waktu_periksa = "16:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1615 && $gabungjamenit < 1630 ) {
      $waktu_periksa = "16:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1630 && $gabungjamenit < 1645 ) {
      $waktu_periksa = "16:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1645 && $gabungjamenit < 1660 ) {
      $waktu_periksa = "17:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1700 && $gabungjamenit < 1715 ) {
      $waktu_periksa = "17:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1715 && $gabungjamenit < 1730 ) {
      $waktu_periksa = "17:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1730 && $gabungjamenit < 1745 ) {
      $waktu_periksa = "17:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1745 && $gabungjamenit < 1760 ) {
      $waktu_periksa = "18:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1800 && $gabungjamenit < 1815 ) {
      $waktu_periksa = "18:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1815 && $gabungjamenit < 1830 ) {
      $waktu_periksa = "18:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1830 && $gabungjamenit < 1845 ) {
      $waktu_periksa = "18:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1845 && $gabungjamenit < 1860 ) {
      $waktu_periksa = "19:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1900 && $gabungjamenit < 1915 ) {
      $waktu_periksa = "19:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1915 && $gabungjamenit < 1930 ) {
      $waktu_periksa = "19:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit >= 1930 && $gabungjamenit < 1945 ) {
      $waktu_periksa = "19:45";
    }else{
      echo "<script>Lobibox.notify('error', {
              iconClass: false,
              size: 'mini',
              delayIndicator: true,
              position: 'center top',
              showClass: 'fadeInDown',
              hideClass: 'fadeUpDown',
              msg: 'Maaf, Klinik Sudah Tutup'
          });</script>";
      $waktu_periksa = '';
    }
  /*SELEKSI KEDUA*/
  if ($waktu_periksa != '') {
    $thn            = substr($_POST['tgl_daftar'],8,2);
    $bln            = substr($_POST['tgl_daftar'],3,2);
    $tgl            = substr($_POST['tgl_daftar'],0,2);
    $id_awal        = $thn.$bln.$tgl;
    // buat id periksa
    $id_periksa     = $id_awal."01";
    echo $id_periksa;
    echo $waktu_periksa;
  }
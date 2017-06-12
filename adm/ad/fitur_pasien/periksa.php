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
        <div class="col s12 m8 l8">
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
                <th>Cetak Kartu</th>
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
                      echo "Menunggu Obat";
                    }elseif ($stts=="3") {
                      echo "Tidak Datang";
                    }elseif ($stts=="4") {
                      echo "Selesai Periksa";
                    }
                  ?></td>
                  <td>
                    <a href="html2pdf/examples/cetak_kartuperiksa.php?idnya=<?= $row['id_periksa'] ?>" class="tooltipped right" data-position="left" data-delay="50" data-tooltip="Cetak Kartu">
                      <i class="mdi-action-print" data-tooltip="cetak kartu"></i>
                    </a>
                  </td>
              </tr>
          <?php 
              $no++;
              }
          ?>
          </tbody>
        </table>
        </div>            
        </div>
        <div class="col s12 m4 l4">
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
$tgl_daftar = $_POST['tgl_daftar'];
$day        = date('D', strtotime($tgl_daftar));
$dayList = array(
  'Sun' => 'Minggu',
  'Mon' => 'Senin',
  'Tue' => 'Selasa',
  'Wed' => 'Rabu',
  'Thu' => 'Kamis',
  'Fri' => 'Jumat',
  'Sat' => 'Sabtu'
);
$hari = $dayList[$day];
/*UNTUK INPUTAN KE DATABASE*/
// $sesid untuk id_pengguna
// $tanggalskrng  = date("d-m-Y"); untuk tanggal periksa

/*pemisahan tanggal daftar pasien*/
$thn                 = substr($_POST['tgl_daftar'],8,2);
$bln                 = substr($_POST['tgl_daftar'],3,2);
$tgl                 = substr($_POST['tgl_daftar'],0,2);
/*cek query ada pasien yang daftar di sistem pada tanggal yang dipilih pasien atau tidak*/
$cek_tanggal         = $thn.$bln.$tgl;
/*cek jam*/
// $waktuskrg        = "06:59";
$waktuskrg           = date("H:i");
/*tanggal sekarang*/
// $tanggalskrng        = "28-12-2016";
$tanggalskrng        = date("d-m-Y");
/*pisah jam*/
$jmskrg              = substr($waktuskrg, 0,2);
/*pisah menit*/
$mntskrg             = substr($waktuskrg, 3,2);
$gabungjamenit_skrng = $jmskrg.$mntskrg;
// $gabungjamenit_skrng = "1950";
/*query*/
$qr                  = mysqli_query($koneksi,"select id_periksa,waktu_periksa,no_antrian from periksa where id_periksa like '%$cek_tanggal%' order by id_periksa desc");
$rw                  = mysqli_fetch_array($qr);

/*saat pada tgl tsb sudah ada yang daftar*/
if (mysqli_num_rows($qr)>0) {
  $waktu_periksa_sebelumnya = $rw['waktu_periksa'];
  /*pisah jam*/
  $jmskrg_sebelumnya        = substr($waktu_periksa_sebelumnya, 0,2);
  /*pisah menit*/
  $mntskrg_sebelumnya       = substr($waktu_periksa_sebelumnya, 3,2);
  $gabungjmenit_sebelumnya  = $jmskrg_sebelumnya.$mntskrg_sebelumnya;
  // echo $gabungjamenit_skrng.$gabungjmenit_sebelumnya.'<br>';
  // $cek_jam = $gabungjamenit_skrng-$gabungjmenit_sebelumnya;
  if ($gabungjamenit_skrng <= $gabungjmenit_sebelumnya) {
    // $waktu_periksa = $waktu_periksa_sebelumnya+15;
    if ($jmskrg_sebelumnya == 06 && $mntskrg_sebelumnya == 00) {
      $waktu_periksa = "06:15";
    }elseif ($jmskrg_sebelumnya == 06 && $mntskrg_sebelumnya == 15) {
      $waktu_periksa = "06:30";
    }elseif ($jmskrg_sebelumnya == 06 && $mntskrg_sebelumnya == 30) {
      $waktu_periksa = "06:45";
    }elseif ($jmskrg_sebelumnya == 06 && $mntskrg_sebelumnya == 45) {
      $waktu_periksa = "07:00";
    }elseif ($jmskrg_sebelumnya == 07 && $mntskrg_sebelumnya == 00) {
      $waktu_periksa = "07:15";
    }elseif ($jmskrg_sebelumnya == 07 && $mntskrg_sebelumnya == 15) {
      $waktu_periksa = "07:30";
    }elseif ($jmskrg_sebelumnya == 07 && $mntskrg_sebelumnya == 30) {
      $waktu_periksa = "07:45";
    }elseif ($jmskrg_sebelumnya == 07 && $mntskrg_sebelumnya == 45) {
      $waktu_periksa = "16:00";
    }elseif ($jmskrg_sebelumnya == 16 && $mntskrg_sebelumnya == 00) {
      $waktu_periksa = "16:15";
    }elseif ($jmskrg_sebelumnya == 16 && $mntskrg_sebelumnya == 15) {
      $waktu_periksa = "16:30";
    }elseif ($jmskrg_sebelumnya == 16 && $mntskrg_sebelumnya == 30) {
      $waktu_periksa = "16:45";
    }elseif ($jmskrg_sebelumnya == 16 && $mntskrg_sebelumnya == 45) {
      $waktu_periksa = "17:00";
    }elseif ($jmskrg_sebelumnya == 17 && $mntskrg_sebelumnya == 00) {
      $waktu_periksa = "17:15";
    }elseif ($jmskrg_sebelumnya == 17 && $mntskrg_sebelumnya == 15) {
      $waktu_periksa = "17:30";
    }elseif ($jmskrg_sebelumnya == 17 && $mntskrg_sebelumnya == 30) {
      $waktu_periksa = "17:45";
    }elseif ($jmskrg_sebelumnya == 17 && $mntskrg_sebelumnya == 45) {
      $waktu_periksa = "18:00";
    }elseif ($jmskrg_sebelumnya == 18 && $mntskrg_sebelumnya == 00) {
      $waktu_periksa = "18:15";
    }elseif ($jmskrg_sebelumnya == 18 && $mntskrg_sebelumnya == 15) {
      $waktu_periksa = "18:30";
    }elseif ($jmskrg_sebelumnya == 18 && $mntskrg_sebelumnya == 30) {
      $waktu_periksa = "18:45";
    }elseif ($jmskrg_sebelumnya == 18 && $mntskrg_sebelumnya == 45) {
      $waktu_periksa = "19:00";
    }elseif ($jmskrg_sebelumnya == 19 && $mntskrg_sebelumnya == 00) {
      $waktu_periksa = "19:15";
    }elseif ($jmskrg_sebelumnya == 19 && $mntskrg_sebelumnya == 15) {
      $waktu_periksa = "19:30";
    }elseif ($jmskrg_sebelumnya == 19 && $mntskrg_sebelumnya == 30) {
      $waktu_periksa = "19:45";
    }
  }elseif ($gabungjamenit_skrng > $gabungjmenit_sebelumnya) {
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    if ($gabungjamenit_skrng >= 600 && $gabungjamenit_skrng < 615 ) {
      $waktu_periksa = "06:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 615 && $gabungjamenit_skrng < 630 ) {
      $waktu_periksa = "06:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 630 && $gabungjamenit_skrng < 645 ) {
      $waktu_periksa = "06:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 645 && $gabungjamenit_skrng < 660 ) {
      $waktu_periksa = "07:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 700 && $gabungjamenit_skrng < 715 ) {
      $waktu_periksa = "07:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 715 && $gabungjamenit_skrng < 730 ) {
      $waktu_periksa = "07:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 730 && $gabungjamenit_skrng < 745 ) {
      $waktu_periksa = "07:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 745 && $gabungjamenit_skrng < 1600 ) {
      $waktu_periksa = "16:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1600 && $gabungjamenit_skrng < 1615 ) {
      $waktu_periksa = "16:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1615 && $gabungjamenit_skrng < 1630 ) {
      $waktu_periksa = "16:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1630 && $gabungjamenit_skrng < 1645 ) {
      $waktu_periksa = "16:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1645 && $gabungjamenit_skrng < 1660 ) {
      $waktu_periksa = "17:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1700 && $gabungjamenit_skrng < 1715 ) {
      $waktu_periksa = "17:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1715 && $gabungjamenit_skrng < 1730 ) {
      $waktu_periksa = "17:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1730 && $gabungjamenit_skrng < 1745 ) {
      $waktu_periksa = "17:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1745 && $gabungjamenit_skrng < 1760 ) {
      $waktu_periksa = "18:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1800 && $gabungjamenit_skrng < 1815 ) {
      $waktu_periksa = "18:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1815 && $gabungjamenit_skrng < 1830 ) {
      $waktu_periksa = "18:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1830 && $gabungjamenit_skrng < 1845 ) {
      $waktu_periksa = "18:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1845 && $gabungjamenit_skrng < 1860 ) {
      $waktu_periksa = "19:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1900 && $gabungjamenit_skrng < 1915 ) {
      $waktu_periksa = "19:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1915 && $gabungjamenit_skrng < 1930 ) {
      $waktu_periksa = "19:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1930 && $gabungjamenit_skrng < 1945 ) {
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
  }
  /*SELEKSI PERTAMA*/
  /*digabungkan dulu tanggal postnya*/
  $thn_pilih = substr($_POST['tgl_daftar'],8,2);
  $bln_pilih = substr($_POST['tgl_daftar'],3,2);
  $tgl_pilih = substr($_POST['tgl_daftar'],0,2);
  // $datepilih = "161223";
  $datepilih = $thn_pilih.$bln_pilih.$tgl_pilih;
  /*digabungkan dulu tanggal sekarangnya*/
  $thn_skrg  = substr($tanggalskrng,8,2);
  $bln_skrg  = substr($tanggalskrng,3,2);
  $tgl_skrg  = substr($tanggalskrng,0,2);
  $dateskrg  = $thn_skrg.$bln_skrg.$tgl_skrg;
  // echo $dateskrg ." - ".$datepilih;
  /*saat yang pilih tanggal yang sudah lewat*/
  if ($dateskrg > $datepilih) {
    echo "<script>Lobibox.notify('error', {
            iconClass: false,
            size: 'mini',
            delayIndicator: true,
            position: 'center top',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            msg: 'Sepertinya Input Tanggal Tidak Sesuai'
        });</script>";
  }elseif ($hari=="Minggu") {
    echo "<script>alert('Maaf Hari Minggu Klinik Tutup')</script>";
  }elseif ($dateskrg<=$datepilih) {
    /*SELEKSI KEDUA*/
    if ($waktu_periksa != '') {
      // buat id periksa
      $id_periksa = $rw['id_periksa']+1;
      $no_antrian = $rw['no_antrian']+1;
      // echo $id_periksa;
      // echo "<br>".$no_antrian;
      // echo "<br>".$waktu_periksa;
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
}
/*Saat Belum Ada Yang Daftar*/
else{
  /*SELEKSI PERTAMA*/
  /*digabungkan dulu tanggal postnya*/
  $thn_pilih = substr($_POST['tgl_daftar'],8,2);
  $bln_pilih = substr($_POST['tgl_daftar'],3,2);
  $tgl_pilih = substr($_POST['tgl_daftar'],0,2);
  // $datepilih = "161223";
  $datepilih = $thn_pilih.$bln_pilih.$tgl_pilih;
  /*digabungkan dulu tanggal sekarangnya*/
  $thn_skrg  = substr($tanggalskrng,8,2);
  $bln_skrg  = substr($tanggalskrng,3,2);
  $tgl_skrg  = substr($tanggalskrng,0,2);
  $dateskrg  = $thn_skrg.$bln_skrg.$tgl_skrg;
  // echo $dateskrg ." - ".$datepilih;
  /*saat yang pilih tanggal yang sudah lewat*/
  if ($dateskrg > $datepilih) {
    echo "<script>Lobibox.notify('error', {
            iconClass: false,
            size: 'mini',
            delayIndicator: true,
            position: 'center top',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            msg: 'Sepertinya Input Tanggal Tidak Sesuai'
        });</script>";
  }elseif ($hari=="Minggu") {
    echo "<script>alert('Maaf Hari Minggu Klinik Tutup')</script>";
  }elseif ($dateskrg<$datepilih) {
    $waktu_periksa = "06:00";
    /*SELEKSI KEDUA*/
    if ($waktu_periksa != '') {
      // buat id periksa
      $id_periksa = $datepilih."01";
      $no_antrian = "1";
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
  }elseif ($dateskrg==$datepilih) {
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    if ($gabungjamenit_skrng >= 600 && $gabungjamenit_skrng < 615 ) {
      $waktu_periksa = "06:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 615 && $gabungjamenit_skrng < 630 ) {
      $waktu_periksa = "06:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 630 && $gabungjamenit_skrng < 645 ) {
      $waktu_periksa = "06:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 645 && $gabungjamenit_skrng < 660 ) {
      $waktu_periksa = "07:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 700 && $gabungjamenit_skrng < 715 ) {
      $waktu_periksa = "07:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 715 && $gabungjamenit_skrng < 730 ) {
      $waktu_periksa = "07:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 730 && $gabungjamenit_skrng < 745 ) {
      $waktu_periksa = "07:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 745 && $gabungjamenit_skrng < 1600 ) {
      $waktu_periksa = "16:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1600 && $gabungjamenit_skrng < 1615 ) {
      $waktu_periksa = "16:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1615 && $gabungjamenit_skrng < 1630 ) {
      $waktu_periksa = "16:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1630 && $gabungjamenit_skrng < 1645 ) {
      $waktu_periksa = "16:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1645 && $gabungjamenit_skrng < 1660 ) {
      $waktu_periksa = "17:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1700 && $gabungjamenit_skrng < 1715 ) {
      $waktu_periksa = "17:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1715 && $gabungjamenit_skrng < 1730 ) {
      $waktu_periksa = "17:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1730 && $gabungjamenit_skrng < 1745 ) {
      $waktu_periksa = "17:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1745 && $gabungjamenit_skrng < 1760 ) {
      $waktu_periksa = "18:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1800 && $gabungjamenit_skrng < 1815 ) {
      $waktu_periksa = "18:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1815 && $gabungjamenit_skrng < 1830 ) {
      $waktu_periksa = "18:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1830 && $gabungjamenit_skrng < 1845 ) {
      $waktu_periksa = "18:45";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1845 && $gabungjamenit_skrng < 1860 ) {
      $waktu_periksa = "19:00";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1900 && $gabungjamenit_skrng < 1915 ) {
      $waktu_periksa = "19:15";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1915 && $gabungjamenit_skrng < 1930 ) {
      $waktu_periksa = "19:30";
    }
    /*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng >= 1930 && $gabungjamenit_skrng < 1945 ) {
      $waktu_periksa = "19:45";
    }/*saat mengambil ambil antrian antara pukul 06:00 - 06:30 maka sistem akan mencetak antrian pukul 06:45*/
    elseif ($gabungjamenit_skrng < 600 ) {
      $waktu_periksa = "06:00";
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
      // buat id periksa
      $id_periksa = $datepilih."01";
      $no_antrian = "1";
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


  /*saat tanggal yang dipilih < tanggal sekarang*/
}
}
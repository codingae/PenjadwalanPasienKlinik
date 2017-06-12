<?php 
include ('././ad/jembatan.php');
$sesid = base64_decode(strrev(substr(strrev($_SESSION['id_pengguna']),2)));
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
            <li><a href="periksa">Layanan</a></li>            
            <a href="periksa">
              <span class="mdi-file-folder-shared right small"> Layanan-Belum</span>
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
          <h5>Riwayat Periksa</h5>
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Nama Pasien</th>
                <th>Tanggal Periksa</th>
                <th>No Antrian</th>
                <th>Waktu Periksa</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
              $no        = 1;
              $query     = mysqli_query($koneksi,"SELECT * FROM view_layanan_belum where stts='1' order by tanggal_periksa asc")or die (mysqli_error());
              while($row = mysqli_fetch_array($query)){
          ?>    
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo ucfirst($row['uname']);?></td>
                  <td><?php echo $row['tanggal_periksa'];?></td>
                  <td><?php echo $row['no_antrian'];?></td>
                  <td><?php echo $row['waktu_periksa'];?></td>
                  <td><?php 
                      // cek tanggal periksa
                      $data  = $row['tanggal_periksa'];
                      $th    = substr($data, 6,4) ;
                      $bln   = substr($data, 3,2) ;
                      $tgl   = substr($data, 0,2) ;
                      $data1 = $th.$bln.$tgl;
                      // cek tanggal sekarang
                      $data2 = date("Ymd");
                      // $data2 = "20161228";
                      // echo $data1."-".$data2;
                      // seleksi saat tanggal periksa sudah lewat
                      if ($data1>=$data2) {
                        echo "Menunggu...";
                      }else{
                        echo "Pasien Tidak Datang";
                      }
                  ?>
                  </td>
                  <td>
                    <?php 
                      if ($data1>$data2) {
                    ?>
                        <a href="#!" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Belum Waktunya Dilayani">
                          <i class="mdi-action-history"></i>
                        </a>
                    <?php
                      }
                      elseif($data1==$data2){
                    ?>
                        <!-- untuk input layanan -->
                        <a href="index.php?klinik=beri-layanan&id=<?php echo $row['id_periksa'];?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Input Layanan">
                          <i class="mdi-action-speaker-notes"></i>
                        </a>
                    <?php
                      }else{
                    ?>
                        <a href="#<?php echo $row['id_periksa']."peringatan";?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Peringatan">
                          <i class="mdi-content-clear"></i>
                        </a>
                        <!-- untuk peringatan -->
                        <div id="<?php echo $row['id_periksa']."peringatan";?>" class="modal">
                          <div class="modal-content">
                            <h3 style="color:#00E676" class="center">Peringati <?php echo ucfirst($row['uname'])." (".$row['no_antrian'].")"; ?></h3>        
                            <form method="post" enctype="multipart/form-data">
                            <div class="row">
                              <br>
                                <p>
                                  <h5 class="center">Silakan Berikan Pemberitahuan Karena Tidak Datang Untuk Periksa</h5>
                                </p>
                                <div class="input-field col s12"> 
                                <div class="modal-footer">                      
                                    <input name="idp" type="hidden" value="<?php echo $row['id_periksa']; ?>" required> 
                                    <button class="waves-effect waves-red btn-flat" name="peringatan" type="submit">Kirim </button>
                                    <a href="#" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</a>
                                </div>
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
<!--end container-->
</section>
<!-- END CONTENT -->
<!-- tambah -->
<?php 

// saat dipilih peringatan
if (isset($_POST['peringatan'])) {
  $idp = $_POST['idp'];
  $qr  = mysqli_query($koneksi,"update periksa set stts='3',pj='$sesid' where id_periksa = '$idp'");
  if ($qr==TRUE) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat Pemberitahuan Telah Dikirim'
                });</script><script>window.location='layanan-belum'</script>";
  }else{
    echo "<script>alert('gagal silakan hubungi administrator')</script>";
  }
}
?>
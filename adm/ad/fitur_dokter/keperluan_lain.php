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
            <li><a href="index.php?klinik=masterlayanan">Keperluan Lain</a></li>
            <a href="index.php?klinik=masterlayanan">
              <span class="mdi-file-folder-shared right small"> Keperluan Lain</span>
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
        <div class="col s12 m7 l7">
        <div class="card-panel">
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Keperluan</th>
                <th>Total Biaya</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php   
              $no=1;
              $query     = mysqli_query($koneksi,"SELECT id_pengeluaran, tgl_pengeluaran, keperluan, total_biaya FROM pengeluaran WHERE keperluan != '' ")or die (mysqli_error($koneksi));
              while($row = mysqli_fetch_array($query)){
          ?>
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo ucfirst($row['tgl_pengeluaran']) ?></td>
                  <td><?php echo ucfirst($row['keperluan']) ?></td>
                  <td><?php echo ucfirst($row['total_biaya']) ?></td>
                  <td>
                      <a href="index.php?klinik=keperluan-lain<?php echo '&id=' . $row['id_pengeluaran']; ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Edit">
                          <i class="mdi-action-speaker-notes"></i>
                      </a>
                      <!-- <a href="#" onclick="Materialize.toast('<span class=&quot;red-text&quot;><b>Anda Yakin Akan Menghapus <?= ucfirst($row['layanan'])?></span><a class=&quot;btn-flat white waves-effect waves-red red-text&quot; href=&quot;index.php?klinik=data-layanan-delete&id=<?= $row['id_masterlayanan']?>&quot;>Yes</b><a>', 10000)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Hapus">
                          <i class="mdi-action-delete"></i>
                      </a> -->
                  </td>
              </tr>
          <?php 
            $no++;
              }
              // menutup koneksi
              // mysqli_close($koneksi);              
          ?>
          </tbody>
          </table>                
        </div>
        </div>

        <div class="col s12 m5 l5">
        <div class="card-panel">
        	<?php 
        		$id = $_GET['id'];
        		if (isset($_GET['id'])) {
            $query1 = mysqli_query($koneksi,"SELECT id_pengeluaran, tgl_pengeluaran, keperluan, total_biaya FROM pengeluaran WHERE keperluan != '' && id_pengeluaran='$id'")or die (mysqli_error());	
        		$row1		= mysqli_fetch_array($query1);
        	?>
	        	<form action="" method="post">
	        		<header><h4 class="light-green-text">Edit Pengeluaran</h4></header>
                <div class="input-field">
                  <i class="mdi-maps-local-convenience-store prefix"></i>
                  <input id="keperluan" name="keperluan" type="text" class="validate" value="<?php echo $row1['keperluan']; ?>"  required>
                  <label for="keperluan" class="active">Keperluan</label>
                </div>
		            <div class="input-field">
		              <i class="mdi-editor-attach-money  prefix"></i>
		              <input id="total_biaya" name="total_biaya" type="number" class="validate" value="<?php echo $row1['total_biaya']; ?>"  required>
		              <label for="total_biaya" class="active">Biaya Yang Dibutuhkan</label>
		            </div>
              <button class="waves-effect btn-flat light-green accent-3 right white-text" name="edit-keperluan"><b>Edit</b></button>
	        		<a href="#!" class="btn red waves-effect">Kembali</a>    
            </form>
          <?php
            }else{
          ?>
            <form action="" method="post">
              <header><h4 class="light-green-text">Input Keperluan</h4></header>
                <div class="input-field">
                  <i class="mdi-maps-local-convenience-store  prefix"></i>
                  <input id="keperluan" name="keperluan" type="text" class="validate" required>
                  <label for="keperluan">Keperluan</label>
                </div>
              <div class="input-field">
                  <i class="mdi-editor-attach-money  prefix"></i>
                  <input id="total_biaya" name="total_biaya" type="number" class="validate" required>
                  <label for="total_biaya">Biaya Yang Dibutuhkan</label>
                </div>
                <button class="waves-effect btn-flat light-green accent-3 right white-text" name="tambah-keperluan"><b>Simpan</b></button>
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
<?php 
if (isset($_POST['tambah-keperluan'])) {
  $tanggal     = date("d-m-Y");
  $keperluan   = addslashes(htmlspecialchars($_POST['keperluan'],ENT_QUOTES));
  $total_biaya = addslashes(htmlspecialchars($_POST['total_biaya'],ENT_QUOTES));
  $simpan      = mysqli_query($koneksi,"insert into pengeluaran values('','','','$tanggal','$keperluan','$total_biaya','$sesid')")or die(mysqli_error($koneksi));
  if ($simpan=TRUE) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat Penambahan Keperluan Berhasil'
                });</script><script>window.location='keperluan-lain'</script>";
  }
}elseif (isset($_POST['edit-keperluan'])) {
  $id          = $_GET['id'];
  $keperluan   = addslashes(htmlspecialchars($_POST['keperluan'],ENT_QUOTES));
  $total_biaya = addslashes(htmlspecialchars($_POST['total_biaya'],ENT_QUOTES));
  $simpan      = mysqli_query($koneksi,"update pengeluaran set keperluan='$keperluan',total_biaya='$total_biaya' where id_pengeluaran='$id'")or die(mysqli_error($koneksi));
  if ($simpan=TRUE) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Berhasil Perbarui Layanan'
                });</script><script>window.location='keperluan-lain'</script>";
  }
}

?>
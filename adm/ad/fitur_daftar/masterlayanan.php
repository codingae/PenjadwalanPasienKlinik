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
            <li><a href="index.php?klinik=masterlayanan">Master Layanan</a></li>
            <a href="index.php?klinik=masterlayanan">
              <span class="mdi-file-folder-shared right small"> Layanan</span>
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
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>ID</th>
                <th>Nama Layanan</th>
                <th>Biaya Layanan</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php   
              $no=1;
              $query     = mysqli_query($koneksi,"SELECT * FROM master_layanan where id_masterlayanan !='5' ")or die (mysqli_error());
              while($row = mysqli_fetch_array($query)){
          ?>
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo ucfirst($row['layanan']) ?></td>
                  <td><?php echo ucfirst($row['biaya_layanan']) ?></td>
                  <td>
                      <a href="index.php?klinik=data-layanan<?php echo '&id=' . $row['id_masterlayanan']; ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Edit">
                          <i class="mdi-action-speaker-notes"></i>
                      </a>
                      <a href="#" onclick="Materialize.toast('<span class=&quot;red-text&quot;><b>Anda Yakin Akan Menghapus <?= ucfirst($row['layanan'])?></span><a class=&quot;btn-flat white waves-effect waves-red red-text&quot; href=&quot;index.php?klinik=data-layanan-delete&id=<?= $row['id_masterlayanan']?>&quot;>Yes</b><a>', 10000)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Hapus">
                          <i class="mdi-action-delete"></i>
                      </a>
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
          <center>  
        </center>                    
        </div>
        </div>

        <div class="col s12 m6 l6">
        <div class="card-panel">
        	<?php 
        		$id = $_GET['id'];
        		if (isset($_GET['id'])) {
            $query1 = mysqli_query($koneksi,"SELECT * FROM master_layanan where id_masterlayanan='$id'")or die (mysqli_error());	
        		$row1		= mysqli_fetch_array($query1);
        	?>
	        	<form action="" method="post">
	        		<header><h4 class="light-green-text">Edit Layanan</h4></header>
                <div class="input-field">
                  <i class="mdi-maps-local-convenience-store prefix"></i>
                  <input id="layanan" name="layanan" type="text" class="validate" value="<?php echo $row1['layanan']; ?>"  required>
                  <label for="layanan" class="active">Layanan</label>
                </div>
		            <div class="input-field">
		              <i class="mdi-editor-attach-money  prefix"></i>
		              <input id="biaya_layanan" name="biaya_layanan" type="number" class="validate" value="<?php echo $row1['biaya_layanan']; ?>"  required>
		              <label for="biaya_layanan" class="active">Biaya Layanan</label>
		            </div>
              <button class="waves-effect btn-flat light-green accent-3 right white-text" name="edit-layanan"><b>Edit</b></button>
	        		<a href="index.php?klinik=data-layanan" class="btn red waves-effect">Kembali</a>    
            </form>
          <?php
            }else{
          ?>
            <form action="" method="post">
              <header><h4 class="light-green-text">Input Layanan</h4></header>
                <div class="input-field">
                  <i class="mdi-maps-local-convenience-store  prefix"></i>
                  <input id="layanan" name="layanan" type="text" class="validate"  >
                  <label for="layanan">Layanan</label>
                </div>
              <div class="input-field">
                  <i class="mdi-editor-attach-money  prefix"></i>
                  <input id="biaya_layanan" name="biaya_layanan" type="number" class="validate"  >
                  <label for="biaya_layanan">Biaya Layanan</label>
                </div>
                <button class="waves-effect btn-flat light-green accent-3 right white-text" name="tambah-layanan"><b>Simpan</b></button>
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
if (isset($_POST['tambah-layanan'])) {
  $layanan       = addslashes(htmlspecialchars($_POST['layanan'],ENT_QUOTES));
  $biaya_layanan = addslashes(htmlspecialchars($_POST['biaya_layanan'],ENT_QUOTES));
  $simpan        = mysqli_query($koneksi,"insert into master_layanan values('','$layanan','$biaya_layanan')")or die(mysqli_error($koneksi));
  if ($simpan=TRUE) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat Penambahan Layanan Berhasil'
                });</script><script>window.location='data-layanan'</script>";
  }
}elseif (isset($_POST['edit-layanan'])) {
  $id = $_GET['id'];
  $layanan       = addslashes(htmlspecialchars($_POST['layanan'],ENT_QUOTES));
  $biaya_layanan = addslashes(htmlspecialchars($_POST['biaya_layanan'],ENT_QUOTES));
  $simpan        = mysqli_query($koneksi,"update master_layanan set layanan='$layanan',biaya_layanan='$biaya_layanan' where id_masterlayanan='$id'")or die(mysqli_error($koneksi));
  if ($simpan=TRUE) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Berhasil Perbarui Layanan'
                });</script><script>window.location='data-layanan'</script>";
  }
}

?>
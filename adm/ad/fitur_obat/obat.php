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
            <li><a href="obat">Obat</a></li>            
            <a href="obat">
              <span class="mdi-file-folder-shared right small"> Data Obat</span>
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
                <th>Nama Obat</th>
                <!-- <th>Nama Obat</th> -->
                <th>Harga Obat</th>
                <th>Stok</th>
                <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
              $query     = mysqli_query($koneksi,"SELECT * FROM master_obat")or die (mysqli_error());
              while($row = mysqli_fetch_array($query)){
          ?>    
              <tr>
                  <!-- <td><?php echo $row['id_obat'] ?></td> -->
                  <td><?php echo ucfirst($row['nama_obat']) ?></td>
                  <td><?php echo $row['harga_obat'] ?></td>
                  <td><?php echo $row['jml'] ?></td>
                  <td>
                      <a href="index.php?klinik=obat<?php echo '&id=' . $row['id_obat']; ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Edit">
                          <i class="mdi-action-speaker-notes"></i>
                      </a>
                      <a href="#" onclick="Materialize.toast('<span class=&quot;red-text&quot;><b>Anda Yakin Akan Menghapus <?= ucfirst($row['nama_obat'])?></span><a class=&quot;btn-flat white waves-effect waves-red red-text&quot; href=&quot;index.php?klinik=obatdelete&id=<?= $row['id_obat']?>&quot;>Yes</b><a>', 10000)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Hapus">
                          <i class="mdi-action-delete"></i>
                      </a>
                  </td>
              </tr>
          <?php 
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
        		$query1     = mysqli_query($koneksi,"SELECT * FROM master_obat where id_obat='$id'")or die (mysqli_error());	
        		$row1		= mysqli_fetch_array($query1);
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
	        		<header><h4 class="light-green-text">Input Obat</h4></header>
		            <div class="input-field">
                  <i class="mdi-action-account-circle prefix"></i>
                  <input id="nama_obat" name="nama_obat" type="text" class="validate"  required>
                  <label for="nama_obat">Nama Obat</label>
                </div>
                <div class="input-field">
		              <i class="mdi-editor-attach-money prefix"></i>
		              <input id="harga_obat" name="harga_obat" type="number" class="validate"  required>
		              <label for="harga_obat">Harga Obat</label>
		            </div>
              		<button class="waves-effect btn-flat light-green accent-3 right white-text" name="simpan-obat"><b>Simpan</b></button>    
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
if (isset($_POST['simpan-obat'])) {
  $obat  = $_POST['nama_obat'];
  $harga = $_POST['harga_obat'];
	$input = mysqli_query($koneksi,"insert into master_obat values('','$obat','$harga','')") or die (mysqli_error());
	if ($input == TRUE) {
          echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat Penambahan Obat Berhasil'
                });</script><script>window.location='obat'</script>";
    }else{
      echo "<script>alert('gagal')</script>";                  
    }
}
/*edit*/
if (isset($_POST['edit-obat'])) {
  $obat  = $_POST['nama_obat'];
  $harga = $_POST['harga_obat'];
  $id    = $_GET['id'];
	$edit = mysqli_query($koneksi,"update master_obat set nama_obat='$obat', harga_obat='$harga' where id_obat='$id'")or die(mysqli_error());
	if ($edit == TRUE) {
          echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat Pembaruan Nama Obat Berhasil'
                });</script><script>window.location='obat'</script>";
    }else{
      echo "<script>alert('gagal')</script>";                  
    }		# code...
}


?>
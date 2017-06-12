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
            <li><a href="index.php?klinik=masterlayanan">Gaji</a></li>
            <a href="index.php?klinik=masterlayanan">
              <span class="mdi-file-folder-shared right small"> Data Gaji</span>
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
                <th>Jabatan</th>
                <th>Gaji</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php   
              $no=1;
              $query     = mysqli_query($koneksi,"SELECT * FROM master_gaji ")or die (mysqli_error());
              while($row = mysqli_fetch_array($query)){
          ?>
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php if ($row['jabatan']=='1') {
                      echo "Dokter";
                    }elseif ($row['jabatan']=='2') {
                      echo "Loket Pendaftaran";
                    }elseif ($row['jabatan']=='3') {
                      echo "Loket Obat";
                    }
                    ?></td>
                  <td><?php echo "Rp. " .number_format($row['gaji'],0,'.','.') ?></td>
                  <td>
                      <a href="index.php?klinik=master-gaji<?php echo '&id=' . $row['id_mg']; ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Edit">
                          <i class="mdi-action-speaker-notes"></i>
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
        </div>
        </div>

        <div class="col s12 m6 l6">
        <div class="card-panel">
        	<?php 
        		$id = $_GET['id'];
        		if (isset($_GET['id'])) {
            $query1 = mysqli_query($koneksi,"SELECT * FROM master_gaji where id_mg='$id'")or die (mysqli_error($koneksi));	
        		$row1		= mysqli_fetch_array($query1);
        	?>
	        	<form action="" method="post">
	        		<header><h4 class="light-green-text">Edit Master Gaji</h4></header>
                <div class="input-field">
                  <i class="mdi-maps-local-convenience-store prefix"></i>
                  <input id="jabatan" name="jabatan" type="text" class="validate" value="<?php 
                    if ($row1['jabatan']=='1') {
                      echo "Dokter";
                    }elseif ($row1['jabatan']=='2') {
                      echo "Loket Pendaftaran";
                    }elseif ($row1['jabatan']=='3') {
                      echo "Loket Obat";
                    }
                   ?>"  required>
                  <label for="jabatan" class="active">Jabatan</label>
                </div>
		            <div class="input-field">
		              <i class="mdi-editor-attach-money  prefix"></i>
		              <input id="gaji" name="gaji" type="number" class="validate" value="<?php echo $row1['gaji']; ?>"  required>
		              <label for="gaji" class="active">Jumlah Gaji</label>
		            </div>
              <button class="waves-effect btn-flat light-green accent-3 right white-text" name="edit-mg"><b>Edit</b></button>
	        		<a href="index.php?klinik=master-gaji" class="btn red waves-effect">Kembali</a>    
            </form>
          <?php
            }else{
          ?>
            <form action="" method="post">
              <header><h4 class="light-green-text">Input Master Gaji</h4></header>
                <div class="input-field">
                  <i class="mdi-maps-local-convenience-store  prefix"></i>
                  <select class="input-field" id="jabatan" name="jabatan" required>
                    <option value="" disabled selected>Pilih Level</option>
                  <?php 
                    $qr = mysqli_query($koneksi,"select distinct level from pengguna where level != '4'");
                    while ($rw = mysqli_fetch_array($qr)) {
                  ?>
                    <option value="<?php echo $rw['level']; ?>">
                    <?php if ($rw['level']=='1') {
                      echo "Dokter";
                    }elseif ($rw['level']=='2') {
                      echo "Loket Pendaftaran";
                    }elseif ($rw['level']=='3') {
                      echo "Loket Obat";
                    }
                    ?>
                    </option>
                  <?php
                    }
                  ?>
                  </select>
                </div>
              <div class="input-field">
                  <i class="mdi-editor-attach-money prefix"></i>
                  <input id="gaji" name="gaji" type="number" class="validate"  >
                  <label for="gaji">Jumlah Gaji</label>
                </div>
                <button class="waves-effect btn-flat light-green accent-3 right white-text" name="tambah-mg"><b>Simpan</b></button>
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
</div>
<!--end container-->

</section>


<!-- END CONTENT -->
<?php 
if (isset($_POST['tambah-mg'])) {
  $jabatan = addslashes(htmlspecialchars($_POST['jabatan'],ENT_QUOTES));
  $gaji    = addslashes(htmlspecialchars($_POST['gaji'],ENT_QUOTES)); 
  $qr      = mysqli_query($koneksi,"select * from master_gaji where jabatan = '$jabatan'");
  $jum     = mysqli_num_rows($qr);
  if ($jum>0) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Maaf Untuk Level Yang Anda Masukkan <br>Sudah Masuk Di Database Master Gaji'
                });</script><script>window.location='master-gaji'</script>";
  }else{
    $simpan  = mysqli_query($koneksi,"insert into master_gaji values('','$jabatan','$gaji')")or die(mysqli_error($koneksi));
    if ($simpan=TRUE) {
      echo "<script>Lobibox.notify('default', {
                      iconClass: false,
                      size: 'mini',
                      delayIndicator: false,
                      position: 'center top',
                      showClass: 'fadeInDown',
                      hideClass: 'fadeUpDown',
                      msg: 'Selamat Penambahan Master Gaji Berhasil'
                  });</script><script>window.location='master-gaji'</script>";
    }
  }
}elseif (isset($_POST['edit-mg'])) {
  $id     = $_GET['id'];
  $gaji   = addslashes(htmlspecialchars($_POST['gaji'],ENT_QUOTES)); 
  $simpan = mysqli_query($koneksi,"update master_gaji set gaji='$gaji' where id_mg='$id'")or die(mysqli_error($koneksi));
  if ($simpan=TRUE) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Berhasil Perbarui Master Gaji'
                });</script><script>window.location='master-gaji'</script>";
  }
}

?>
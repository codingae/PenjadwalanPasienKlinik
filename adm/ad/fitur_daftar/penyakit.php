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
            <li><a href="penyakit">Penyakit</a></li>            
            <a href="penyakit">
              <span class="mdi-file-folder-shared right small"> Daftar Penyakit</span>
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
                <th>#</th>
                <!-- <th>Nama Obat</th> -->
                <th>Nama Penyakit</th>
                <th>Action</th>
            </tr>
          </thead>          
          <tbody>
          <?php 
          	  $no=1;
              $query     = mysqli_query($koneksi,"SELECT * FROM penyakit order by nama_penyakit")or die (mysqli_error());
              while($row = mysqli_fetch_array($query)){
          ?>    
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['nama_penyakit'] ?></td>
                  <td>
                      <a href="index.php?klinik=penyakit<?php echo '&id=' . $row['id_penyakit']; ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Edit">
                          <i class="mdi-action-speaker-notes"></i>
                      </a>
                      <a href="#" onclick="Materialize.toast('<span class=&quot;red-text&quot;><b>Anda Yakin Akan Menghapus <?= ucfirst($row['nama_penyakit'])?></span><a class=&quot;btn-flat white waves-effect waves-red red-text&quot; href=&quot;index.php?klinik=penyakit-delete&id=<?= $row['id_penyakit']?>&quot;>Yes</b><a>', 10000)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Hapus">
                          <i class="mdi-action-delete"></i>
                      </a>
                  </td>
              </tr>
          <?php 
          		$no++;
              }
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
            // saat mendapatkan id maka muncul form edit
            if (isset($_GET['id'])) {
            $query1     = mysqli_query($koneksi,"SELECT * FROM penyakit where id_penyakit='$id'")or die (mysqli_error()); 
            $row1   = mysqli_fetch_array($query1);
          ?>
            <form action="" method="post">
              <header><h4 class="light-green-text">Edit Penyakit</h4></header>
                <div class="input-field">
                    <i class="mdi-action-account-circle prefix"></i>
                    <input id="nama_penyakit" name="nama_penyakit" type="text" class="validate" value="<?php echo $row1['nama_penyakit']; ?>"  required>
                    <label for="nama_penyakit">Nama Penyakit</label>
                  </div>
                <button class="waves-effect btn-flat light-green accent-3 right white-text" name="edit"><b>Edit</b></button>
                <a href="penyakit" class="btn red waves-effect">Kembali</a>    
            </form>
          <?php
            }
            // jika tidak mendapatkan id maka akan muncul form input
            else{
           ?>
            <form action="" method="post">
              <header><h4 class="light-green-text">Input Penyakit</h4></header>
                <div class="input-field">
                    <i class="mdi-action-account-circle prefix"></i>
                    <input id="nama_penyakit" name="nama_penyakit" type="text" class="validate"  required>
                    <label for="nama_penyakit">Nama Penyakit</label>
                  </div>
                  <button class="waves-effect btn-flat light-green accent-3 right white-text" name="penyakit-simpan"><b>Simpan</b></button>    
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
if (isset($_POST['penyakit-simpan'])) {
  $penyakit = ucfirst($_POST['nama_penyakit']);
  $input    = mysqli_query($koneksi,"insert into penyakit values('','$penyakit')") or die (mysqli_error());
	if ($input == TRUE) {
          echo "<script>Lobibox.notify('default', {
                        iconClass: false,
                        size: 'mini',
                        delayIndicator: false,
                        position: 'center top',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        msg: 'Berhasil Menambah Data Penyakit'
                    });</script><script>window.location='penyakit'</script>";
    }else{
      echo "<script>alert('gagal')</script>";                  
    }
}
/*edit*/
if (isset($_POST['edit'])) {
	$penyakit = ucfirst($_POST['nama_penyakit']);
	$id   = $_GET['id'];
	$edit = mysqli_query($koneksi,"update penyakit set nama_penyakit='$penyakit' where id_penyakit='$id'")or die(mysqli_error());
	if ($edit == TRUE) {
          echo "<script>Lobibox.notify('default', {
                        iconClass: false,
                        size: 'mini',
                        delayIndicator: false,
                        position: 'center top',
                        showClass: 'fadeInDown',
                        hideClass: 'fadeUpDown',
                        msg: 'Pembaruan Berhasil'
                    });</script><script>window.location='penyakit'</script>";
    }else{
      echo "<script>alert('gagal')</script>";                  
    }
}


?>
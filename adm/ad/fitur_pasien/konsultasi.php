<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-pengguna">Konsultasi</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Form Konsultasi</span>
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
    <div id="responsive-table">
      <div class="row">
        <div class="col s12 m12 l12">
          <div class="card-panel">
            <div class="row">
                <form action="" method="POST">
                  <div class="input-field col s12">
                  	<i class="mdi-action-spellcheck prefix"></i>
                    <input id="judul" name="judul" length="50" type="text">
                    <label for="judul">Kata Kunci</label>
                  </div>
                  <div class="input-field col s12">
					          <i class="mdi-action-info prefix"></i>
	              	  <textarea id="konsultasi" name="konsultasi" class="materialize-textarea" length="225" required></textarea>
	              	  <label for="konsultasi">Penjelasan Singkat</label>
                  </div>                  
                  <div class="input-field col s12">
                      <br>
                      <button class="btn cyan waves-effect waves-light right" name="isi" type="submit">
                      <i class="mdi-content-send right"></i> Simpan
                      </button>
                  </div>
                </form>
            </div>
          </div>
        </div>
      </div>
      <br>   
    </div>
  </div>
</div>
<!--end container-->
</section>
<?php 
  if (isset($_POST['konsultasi'])) {
    $judul = $_POST['judul'];
    $isi   = $_POST['konsultasi'];
    $date  = date("d-m-Y");
    $query = mysqli_query($koneksi,"INSERT INTO konsultasi VALUES ('','$judul','$isi','','$date','$sesuname','','2')")or die(mysqli_error($koneksi));
    if ($query==TRUE) {
      echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Konsultasi Berhasil di Kirim'
                });</script><script>window.location='record-konsultasi'</script>";
    }
  }
?>
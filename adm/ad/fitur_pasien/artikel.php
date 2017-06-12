<?php 
include ('././ad/jembatan.php');
?>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-pengguna">Input Artikel</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Input Artikel</span>
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
              <?php 
                if ($_GET['id_artikel']) {
                $qr = mysqli_query($koneksi,"SELECT * FROM artikel WHERE id_artikel = '$_GET[id_artikel]'")or die (mysqli_error($koneksi));
                $rw = mysqli_fetch_array($qr);
              ?>
                <form action="" method="POST">
                  <div class="input-field col s12">
                    <input name="id" type="hidden" value="<?php echo $_GET['id_artikel']; ?>">
                    <input id="judul" name="judul" type="text" value="<?php echo $rw['judul']; ?>">
                    <label for="judul">Judul Artikel</label>
                  </div>
                  <div class="col s12">
                    <textarea id="ckeditor" name="ckeditor"><?php echo $rw['isi']; ?></textarea>
                  </div>
                  <div class="input-field col s12">
                      <button class="btn cyan waves-effect waves-light right" name="artikel_edit" type="submit">
                      <i class="mdi-content-send right"></i> Simpan
                      </button>
                  </div>
                </form>
              <?php
                }else{
              ?>
                <form action="" method="POST">
                  <div class="input-field col s12">
                    <input id="judul" name="judul" type="text">
                    <label for="judul">Judul Artikel</label>
                  </div>
                  <div class="col s12">
                    <textarea id="ckeditor1" name="ckeditor"></textarea>
                  </div>
                  <div class="input-field col s12">
                      <button class="btn cyan waves-effect waves-light right" name="artikel" type="submit">
                      <i class="mdi-content-send right"></i> Simpan
                      </button>
                  </div>
                </form>
              <?php
                }
              ?>
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
  if (isset($_POST['artikel'])) {
    $judul = $_POST['judul'];
    $isi   = $_POST['ckeditor'];
    $date  = date("Y-m-d");
    $query = mysqli_query($koneksi,"INSERT INTO artikel VALUES ('','$judul','$isi','','$sesuname','$date','2')");
    if ($query==TRUE) {
      echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Artikel Berhasil di Kirim'
                });</script><script>window.location='postingan'</script>";
    }
  }
  if (isset($_POST['artikel_edit'])) {
    $judul = $_POST['judul'];
    $isi   = $_POST['ckeditor'];
    $id    = $_POST['id'];
    // $date  = date("Y-m-d");
    $query = mysqli_query($koneksi,"UPDATE artikel set judul='$judul',isi='$isi' WHERE id_artikel='$id'");
    if ($query==TRUE) {
      echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Selamat Artikel Anda Sudah Diperbarui'
                });</script><script>window.location='postingan'</script>";
    }
  }
?>
<script type="text/javascript" src="././js/plugins/ckeditor/ckeditor.js"></script>
<script>
    $(function () {
        CKEDITOR.replace('ckeditor');
    });
</script>
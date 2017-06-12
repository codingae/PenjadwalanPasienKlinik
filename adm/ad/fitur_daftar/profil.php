<?php 
include ('././ad/jembatan.php');
?>
<!-- START CONTENT -->
<section id="content">
<script>
    $('.datepicker').pickadate({
        selectMonths;true,
        selectYears:90,
    });
</script>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-pengguna">Profil</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Data Profil</span>
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
    <div id="basic-form" class="section">
      <div class="row">
        <div class="col s12 m12 l12">
          <?php 
            $q = mysqli_query($koneksi,"select * from profile where id='1'");
            $r = mysqli_fetch_array($q);
            $s = mysqli_num_rows($q);
            if ($s>0) {
          ?>
              <div class="card-panel">
                <h4 class="header2">Data Profil</h4>
                <div class="row">
                  <form class="col s12"  method="post" action="">
                    <div class="row">
                      <div class="input-field col s12">
                        <i class="mdi-maps-local-hospital prefix"></i>
                        <input id="klinik" name="klinik" type="text"  value="<?php echo $r['nama_klinik'] ?>">
                        <label for="klinik">Nama Klinik</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s6">
                        <i class="mdi-maps-place prefix"></i>
                        <textarea name="maps" id="maps" cols="30" rows="10" class="materialize-textarea"><?php echo $r['maps'] ?></textarea>
                        <label for="maps">Link Embed Maps</label>
                      </div>
                      <div class="input-field col s6">
                        <i class="mdi-maps-directions prefix"></i>
                          <textarea name="alamat" id="alamat" cols="30" rows="10" class="materialize-textarea"><?php echo $r['alamat'] ?></textarea>
                          <label for="alamat">Alamat</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s4">
                        <i class="mdi-maps-local-phone prefix"></i>
                        <input id="no_telp" name="no_telp" type="text" value="<?php echo $r['no_telp'] ?>">
                        <label for="no_telp">Nomer Telpon</label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-maps-local-post-office  prefix"></i>
                        <input id="kode_pos" name="kode_pos" type="number" value="<?php echo $r['kode_pos'] ?>">
                        <label for="kode_pos">Kode Pos</label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-maps-local-post-office  prefix"></i>
                        <input id="email" name="email" type="text" value="<?php echo $r['email'] ?>">
                        <label for="email">Email</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="input-field col s4">
                        <i class="mdi-maps-local-hospital prefix"></i>
                        <input id="fb" name="fb" type="text" value="<?php echo $r['fb']  ?>">
                        <label for="fb">Link Fanspage FB</label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-maps-local-hospital prefix"></i>
                        <input id="ig" name="ig" type="text" value="<?php echo $r['ig'] ?>">
                        <label for="ig">Link Instagram</label>
                      </div>
                      <div class="input-field col s4">
                        <i class="mdi-maps-local-hospital prefix"></i>
                        <input id="twitter" name="twitter" type="text" value="<?php echo $r['tweet']  ?>">
                        <label for="twitter">Twitter</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="row">
                        <div class="input-field col s12">
                          <button class="btn cyan waves-effect waves-light right" type="submit" name="edit_profil">Submit
                            <i class="mdi-content-send right"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
          <?php
            }else{
          ?>
            <div class="card-panel">
              <h4 class="header2">Data Profil</h4>
              <div class="row">
                <form class="col s12" method="post" action="">
                  <div class="row">
                    <div class="input-field col s12">
                      <i class="mdi-maps-local-hospital prefix"></i>
                      <input id="klinik" name="klinik" type="text">
                      <label for="klinik">Nama Klinik</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      <i class="mdi-maps-place prefix"></i>
                      <textarea name="maps" id="maps" cols="30" rows="10" class="materialize-textarea"></textarea>
                      <label for="maps">Link Embed Maps</label>
                    </div>
                    <div class="input-field col s6">
                      <i class="mdi-maps-directions prefix"></i>
                        <textarea name="alamat" id="alamat" cols="30" rows="10" class="materialize-textarea"></textarea>
                        <label for="alamat">Alamat</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s4">
                      <i class="mdi-maps-local-phone prefix"></i>
                      <input id="no_telp" name="no_telp" type="text">
                      <label for="no_telp">Nomer Telpon</label>
                    </div>
                    <div class="input-field col s4">
                      <i class="mdi-content-inbox prefix"></i>
                      <input id="kode_pos" name="kode_pos" type="text">
                      <label for="kode_pos">Kode Pos</label>
                    </div>
                    <div class="input-field col s4">
                      <i class="mdi-maps-local-post-office  prefix"></i>
                      <input id="email" name="email" type="text">
                      <label for="email">Email</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s4">
                      <i class="mdi-maps-local-hospital prefix"></i>
                      <input id="fb" name="fb" type="text">
                      <label for="fb">Link Fanspage FB</label>
                    </div>
                    <div class="input-field col s4">
                      <i class="mdi-maps-local-hospital prefix"></i>
                      <input id="ig" name="ig" type="text">
                      <label for="ig">Link Instagram</label>
                    </div>
                    <div class="input-field col s4">
                      <i class="mdi-maps-local-hospital prefix"></i>
                      <input id="twitter" name="twitter" type="text">
                      <label for="twitter">Twitter</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="row">
                      <div class="input-field col s12">
                        <button class="btn cyan waves-effect waves-light right" type="submit" name="simpan_profil">Submit
                          <i class="mdi-content-send right"></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          <?php              
            }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end container-->
</section>
<?php 
  if (isset($_POST['simpan_profil'])) {
    $klinik   = $_POST['klinik'];
    $alamat   = $_POST['alamat'];
    $no_telp  = $_POST['no_telp'];
    $email    = $_POST['email'];
    $kode_pos = $_POST['kode_pos'];
    $maps     = $_POST['maps'];
    $fb       = $_POST['fb'];
    $ig       = $_POST['ig'];
    $twitter  = $_POST['twitter'];
    $que = mysqli_query($koneksi,"insert into profile values('$klinik','$alamat','$no_telp','$email','$kode_pos','$maps','$fb','$ig','$tweet','')")or die(mysqli_error($koneksi));
    if ($que == TRUE) {
      echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Berhasil Membuat Profil'
                });</script><script>window.location='profil'</script>";
    }
  }elseif (isset($_POST['edit_profil'])) {
    $klinik   = $_POST['klinik'];
    $alamat   = $_POST['alamat'];
    $no_telp  = $_POST['no_telp'];
    $email    = $_POST['email'];
    $kode_pos = $_POST['kode_pos'];
    $maps     = $_POST['maps'];
    $fb       = $_POST['fb'];
    $ig       = $_POST['ig'];
    $twitter  = $_POST['twitter'];
    $que = mysqli_query($koneksi,"update profile set nama_klinik='$klinik',
                                                     alamat = '$alamat',
                                                     no_telp = '$no_telp',
                                                     email = '$email',
                                                     kode_pos = '$kode_pos',
                                                     maps = '$maps',
                                                     fb = '$fb',
                                                     ig = '$ig',
                                                     tweet = '$twitter'
                                                     where id='1'" );
  if ($que==TRUE) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Berhasil Memperbarui   Profil'
                });</script><script>window.location='profil'</script>";
  }
  }
?>
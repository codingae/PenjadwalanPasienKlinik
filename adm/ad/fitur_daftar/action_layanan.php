<?php 
include ('././ad/jembatan.php');
$sesid = base64_decode(strrev(substr(strrev($_SESSION['id_pengguna']),2)));
?>
<script>
  function suggest(inputString){
    if(inputString.length == 0) {
      $('#suggestions').fadeOut();
    } else {
    $('#as').addClass('load');
      $.post("../adm/ad/fitur_daftar/auto1.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions').fadeIn();
          $('#suggestionsList').html(data);
          $('#as').removeClass('load');
        }
      });
    }
  }

  function fill1(thisValue) {
    $('#diagnosa_penyakit').val(thisValue);
    setTimeout("$('#suggestions').fadeOut();", 100);
  }
  // function fill3(thisValue) {
  //   $('#id_obat').val(thisValue);
  //   setTimeout("$('#suggestions').fadeOut();", 100);
  // }
</script>
<style>
#result {
  height:10px;
  font-size:9px;
  font-family:Arial, Helvetica, sans-serif;
  color:#FA2626;
  padding:0px;
  margin-bottom:0px;
  background-color:#00E676;
}
#as{
  padding:3px;
  border:1px #CCC solid;
  font-size:12px;
}
.suggestionsBox {
  border-radius: 9px;
  position: relative;
  left: 0px;
  top:0px;
  margin: 0px 0px 0px 0px;
  width: 100%;
  background-color:#00E676;
  border-top: 1px solid #999999;
  color: #F70B0B;
}
.suggestionList {
  margin: 0px;
  padding: 0px;
}
.suggestionList ul li {
  list-style:none;
  margin: 0px;
  padding: 6px;
  border-bottom:1px dotted #666;
  cursor: pointer;
}
.suggestionList ul li:hover {
  background-color: white;
  color:#F60C0C;
}
ul {
  font-family:Arial, Helvetica, sans-serif;
  font-size:11px;
  color:black;
  padding:0;
  margin:0;
}

.load{
background-image:url(loader.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest {
  position:relative;
}  
</style>
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
            <li><a href="data-pengguna">Layanan</a></li>
            <?php 
             $id = $_GET['id'];
             // echo $id;
             $qq  = mysqli_query($koneksi,"select id_periksa,uname from view_layanan_belum where id_periksa='$id'")or die(mysqli_error($koneksi));
             $rr  = mysqli_fetch_array($qq);
            ?>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Beri Layanan</span>
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
          <div class="card-panel">
            <h3 style="color:#00E676">Input Layanan Untuk <?php echo ucfirst($rr['uname']); ?></h3>        
              <form method="post" enctype="multipart/form-data">
              <div class="row">
                  <p>
                  <div class="input-field col s12">
                  <div id="suggest">
                    <i class="mdi-action-note-add prefix"></i>
                    <input name="id_periksa" type="hidden" value="<?php echo $rr['id_periksa']; ?>" required> 
                    <input type="text" class="form-control validate" id="diagnosa_penyakit" name="diagnosa_penyakit" autocomplete="off" onKeyUp="suggest(this.value);"onBlur="fill1();" required>
                    <div class="suggestionsBox" id="suggestions" style="display: none;">
                      <div class="suggestionList" id="suggestionsList" style="color:red"> &nbsp; </div>
                    </div>
                    <label for="diagnosa_penyakit">Diagnosa Penyakit</label>
                  </div>
                  </div>
                  <?php
                    // untuk menampilkan master layanan 
                    $layanan_qr        = mysqli_query($koneksi,"select * from master_layanan");
                    $jumlah_layanan    = mysqli_num_rows($layanan_qr);
                    while ($layanan_rw = mysqli_fetch_array($layanan_qr)) {                        
                    if ($layanan_rw['id_masterlayanan']==1) {
                  ?>
                    <div class="input-field col s4">
                      <input name="layanan1" type="hidden" value="<?php echo $layanan_rw['id_masterlayanan']; ?>" required> 
                      <input type="checkbox" class="filled-in" name="<?php echo $layanan_rw['id_masterlayanan']; ?>" checked disabled/>
                      <label for="<?php echo $layanan_rw['id_masterlayanan']; ?>"><?php echo $layanan_rw['layanan']; ?></label>
                    </div>                      
                  <?php
                    }elseif($layanan_rw['id_masterlayanan']==5){
                  ?>
                      <input type="hidden" required>                            
                  <?php
                    }else{
                  ?>
                    <div class="input-field col s4">
                      <input type="checkbox" class="filled-in" id="<?php echo $layanan_rw['id_masterlayanan']; ?>" name="<?php echo 'layanan'.$layanan_rw['id_masterlayanan']; ?>"/>
                      <label for="<?php echo $layanan_rw['id_masterlayanan']; ?>" style="color:black"><?php echo $layanan_rw['layanan']; ?></label>
                    </div>
                  <?php 
                    }
                  }
                  ?>
                  </p>

                  <div class="input-field col s12">
                  <br />
                  </div> 
                  <div class="input-field col s4"> 
                    <i class="mdi-action-note-add prefix"></i>                            
                    <input name="layanan_tambahan" type="text"> 
                    <label for="layanan_tambahan">Layanan Tambahan</label>
                  </div>
                  <div class="input-field col s4"> 
                    <i class="mdi-action-note-add prefix"></i>                            
                    <input name="biaya_tambahan" type="number" > 
                    <label for="biaya_tambahan">Biaya Tambahan</label>
                  </div>
                  <div class="input-field col s4">
                      <i class="mdi-maps-layers prefix"></i>
                      <select class="input-field col s11 right" id="dokter" name="dokter"  required>
                        <option value="" disabled selected>Pilih Dokter</option>
                      <?php 
                        $mqr = mysqli_query($koneksi,"select id_pengguna,uname from pengguna where level='1'")or die(mysqli_error($koneksi));
                        while ($mrw = mysqli_fetch_array($mqr)) {
                      ?>
                        <option value="<?php echo $mrw['id_pengguna']; ?>"><?php echo ucfirst($mrw['uname']); ?></option>
                      <?php 
                      }
                      ?>
                      </select>
                  </div>                  
                  <div class="input-field col s12"> 
                  <div class="modal-footer">                      
                      <button class="waves-effect waves-red btn-flat" name="input_layanan" type="submit">Input </button>
                      <a href="layanan-belum" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</a>
                  </div>
                  </div>
              </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end container-->

</section>
<?php 
if (isset($_POST['input_layanan'])) {
  $uname             = $rr['uname'];
  $dokter            = $_POST['dokter'];
  $id_periksa        = $_POST['id_periksa'];
  $diagnosa_penyakit = $_POST['diagnosa_penyakit'];
  $layanan_tambahan  = $_POST['layanan_tambahan'];
  $biaya_tambahan    = $_POST['biaya_tambahan'];
  // echo $diagnosa_penyakit."<br>";
  // echo $id_periksa."<br>";
  // echo $layanan_tambahan."<br>";
  // echo $biaya_tambahan."<br>";
  // perulangan untuk ambil pecahan id
  // layanan 1
  for ($post=1; $post <= $jumlah_layanan; $post++) { 
    if ($post==1) {
      $layanan1_ok   = $_POST['layanan1'];
      $ok21          = mysqli_query($koneksi,"select * from master_layanan where id_masterlayanan='$layanan1_ok'");
      $ok22          = mysqli_fetch_array($ok21);
      $biaya1        = $ok22['biaya_layanan'];
      $nama_layanan1 = $ok22['layanan'];
    }elseif ($post==2) {
      $layanan2 = $_POST['layanan2'];
    }elseif ($post==3) {
      $layanan3 = $_POST['layanan3'];
    }elseif ($post==4) {
      $layanan4 = $_POST['layanan4'];
    }elseif ($post==5) {
      $layanan5 = $_POST['layanan5'];
    }else{
      echo "<script>Lobibox.notify('default', {
                iconClass: false,
                size: 'mini',
                delayIndicator: false,
                position: 'center top',
                showClass: 'fadeInDown',
                hideClass: 'fadeUpDown',
                msg: 'Silakan Hubungi Administrator<br>Ada Masalah Di Input Layanan'
            });</script>";
    }
  }
  // layanan 2
  if ($layanan2=="on") {
    $layanan2_ok   = "2";
    $ok21          = mysqli_query($koneksi,"select * from master_layanan where id_masterlayanan='$layanan2_ok'");
    $ok22          = mysqli_fetch_array($ok21);
    $biaya2        = $ok22['biaya_layanan'];
    $nama_layanan2 = $ok22['layanan'];
  }else{
    $layanan2_ok   = "5";
    $nama_layanan2 = "kosong";
    $ok21          = mysqli_query($koneksi,"select * from master_layanan where id_masterlayanan='$layanan2_ok'");
    $ok22          = mysqli_fetch_array($ok21);
    $biaya2        = $ok22['biaya_layanan'];    
  }  
  // layanan 3
  if ($layanan3=="on") {
    $layanan3_ok   = "3";
    $ok21          = mysqli_query($koneksi,"select * from master_layanan where id_masterlayanan='$layanan3_ok'");
    $ok22          = mysqli_fetch_array($ok21);
    $biaya3        = $ok22['biaya_layanan'];
    $nama_layanan3 = $ok22['layanan'];
  }else{
    $layanan3_ok   = "5";
    $nama_layanan3 = "kosong";
    $ok21          = mysqli_query($koneksi,"select * from master_layanan where id_masterlayanan='$layanan3_ok'");
    $ok22          = mysqli_fetch_array($ok21);
    $biaya3        = $ok22['biaya_layanan'];
  }
  // layanan 4
  if ($layanan4=="on") {
    $layanan4_ok   = "4";
    $ok21          = mysqli_query($koneksi,"select * from master_layanan where id_masterlayanan='$layanan4_ok'");
    $ok22          = mysqli_fetch_array($ok21);
    $biaya4        = $ok22['biaya_layanan'];
    $nama_layanan4 = $ok22['layanan'];
  }else{
    $layanan4_ok   = "5";
    $nama_layanan4 = "kosong";
    $ok21          = mysqli_query($koneksi,"select * from master_layanan where id_masterlayanan='$layanan4_ok'");
    $ok22          = mysqli_fetch_array($ok21);
    $biaya4        = $ok22['biaya_layanan'];
  }

  // echo "Layanan 1=".$layanan1_ok." biayanya = ".$biaya1."<br>";
  // echo "Layanan 2=".$layanan2_ok." biayanya = ".$biaya2."<br>";
  // echo "Layanan 3=".$layanan3_ok." biayanya = ".$biaya3."<br>";
  // echo "Layanan 4=".$layanan4_ok." biayanya = ".$biaya4."<br>";

    $total_biaya = $biaya1+$biaya2+$biaya3+$biaya4+$biaya_tambahan;
    // echo $total_biaya;
    
    $date = date("Ymd");
    $qr   = mysqli_query($koneksi,"select id_layanan from layanan where id_layanan like '%$date%' order by id_periksa desc");
    $rw   = mysqli_fetch_array($qr);
    // saat pada tgl tsb sudah ada yang daftar
    if (mysqli_num_rows($qr)>0) {
    // id layanan terakhir
    $id_sebelum = $rw['id_layanan'];
    // id layanan terakhir ditambah 1
    $id_layanan = $id_sebelum+1;  
    }
    else{
    $id_layanan = $date."0001";
  }
  // echo $id_layanan;
  // die($id_layanan);
  $il_query = mysqli_query($koneksi,"insert into layanan values('$id_layanan','$uname','$id_periksa',
                            '$nama_layanan1','$nama_layanan2','$nama_layanan3',
                            '$nama_layanan4','$layanan_tambahan','$biaya_tambahan',
                            '$diagnosa_penyakit','$total_biaya','$sesid')")or die(mysqli_error($koneksi));
  $date_sekarang = date('d-m-Y');
  $il_pendapatan = mysqli_query($koneksi,"insert into pendapatan values('','$id_layanan',
                            '$date_sekarang','$total_biaya','$sesid')")or die(mysqli_error($koneksi));
  $update_prksa_stts = mysqli_query($koneksi,"update periksa set stts='2',nama_dokter='$dokter',pj='$sesid' where id_periksa='$id_periksa'");
  if ($il_query&&$update_prksa_stts&&$il_pendapatan==TRUE) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Layanan Pasien Berhasil Di Input'
                });</script><script>window.location='layanan-belum'</script>";
  }  
}
?>
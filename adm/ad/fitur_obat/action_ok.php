<?php 
include ('././ad/jembatan.php');
$sesid = base64_decode(strrev(substr(strrev($_SESSION['id_pengguna']),2)));
?>
<script>
  function suggest1(inputString){
    if(inputString.length == 0) {
      $('#suggestions1').fadeOut();
    } else {
    $('#as').addClass('load');
      $.post("../adm/ad/fitur_obat/auto_ok/auto1.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions1').fadeIn();
          $('#suggestionsList1').html(data);
          $('#as').removeClass('load');
        }
      });
    }
  }
  function fill1(thisValue) {
    $('#nama_obat1').val(thisValue);
    setTimeout("$('#suggestions1').fadeOut();", 100);
  }
  function fill11(thisValue) {
    $('#id_obat1').val(thisValue);
    setTimeout("$('#suggestions1').fadeOut();", 100);
  }
  function fill111(thisValue) {
    $('#jml_obat1').val(thisValue);
    setTimeout("$('#suggestions1').fadeOut();", 100);
  }
  function suggest2(inputString){
    if(inputString.length == 0) {
      $('#suggestions2').fadeOut();
    } else {
    $('#as').addClass('load');
      $.post("../adm/ad/fitur_obat/auto_ok/auto2.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions2').fadeIn();
          $('#suggestionsList2').html(data);
          $('#as').removeClass('load');
        }
      });
    }
  }
  function fill2(thisValue) {
    $('#nama_obat2').val(thisValue);
    setTimeout("$('#suggestions2').fadeOut();", 100);
  }
  function fill22(thisValue) {
    $('#id_obat2').val(thisValue);
    setTimeout("$('#suggestions2').fadeOut();", 100);
  }
  function fill222(thisValue) {
    $('#jml_obat2').val(thisValue);
    setTimeout("$('#suggestions2').fadeOut();", 100);
  }
  function suggest3(inputString){
    if(inputString.length == 0) {
      $('#suggestions3').fadeOut();
    } else {
    $('#as').addClass('load');
      $.post("../adm/ad/fitur_obat/auto_ok/auto3.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions3').fadeIn();
          $('#suggestionsList3').html(data);
          $('#as').removeClass('load');
        }
      });
    }
  }
  function fill3(thisValue) {
    $('#nama_obat3').val(thisValue);
    setTimeout("$('#suggestions3').fadeOut();", 100);
  }
  function fill33(thisValue) {
    $('#id_obat3').val(thisValue);
    setTimeout("$('#suggestions3').fadeOut();", 100);
  }
  function fill333(thisValue) {
    $('#jml_obat3').val(thisValue);
    setTimeout("$('#suggestions3').fadeOut();", 100);
  }
  function suggest4(inputString){
    if(inputString.length == 0) {
      $('#suggestions4').fadeOut();
    } else {
    $('#as').addClass('load');
      $.post("../adm/ad/fitur_obat/auto_ok/auto4.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions4').fadeIn();
          $('#suggestionsList4').html(data);
          $('#as').removeClass('load');
        }
      });
    }
  }
  function fill4(thisValue) {
    $('#nama_obat4').val(thisValue);
    setTimeout("$('#suggestions4').fadeOut();", 100);
  }
  function fill44(thisValue) {
    $('#id_obat4').val(thisValue);
    setTimeout("$('#suggestions4').fadeOut();", 100);
  }
  function fill444(thisValue) {
    $('#jml_obat4').val(thisValue);
    setTimeout("$('#suggestions4').fadeOut();", 100);
  }
  function suggest5(inputString){
    if(inputString.length == 0) {
      $('#suggestions5').fadeOut();
    } else {
    $('#as').addClass('load');
      $.post("../adm/ad/fitur_obat/auto_ok/auto5.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions5').fadeIn();
          $('#suggestionsList5').html(data);
          $('#as').removeClass('load');
        }
      });
    }
  }
  function fill5(thisValue) {
    $('#nama_obat5').val(thisValue);
    setTimeout("$('#suggestions5').fadeOut();", 100);
  }
  function fill55(thisValue) {
    $('#id_obat5').val(thisValue);
    setTimeout("$('#suggestions5').fadeOut();", 100);
  }
  function fill555(thisValue) {
    $('#jml_obat5').val(thisValue);
    setTimeout("$('#suggestions5').fadeOut();", 100);
  }
  function suggest6(inputString){
    if(inputString.length == 0) {
      $('#suggestions6').fadeOut();
    } else {
    $('#as').addClass('load');
      $.post("../adm/ad/fitur_obat/auto_ok/auto6.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions6').fadeIn();
          $('#suggestionsList6').html(data);
          $('#as').removeClass('load');
        }
      });
    }
  }
  function fill6(thisValue) {
    $('#nama_obat6').val(thisValue);
    setTimeout("$('#suggestions6').fadeOut();", 100);
  }
  function fill66(thisValue) {
    $('#id_obat6').val(thisValue);
    setTimeout("$('#suggestions6').fadeOut();", 100);
  }
  function fill666(thisValue) {
    $('#jml_obat6').val(thisValue);
    setTimeout("$('#suggestions6').fadeOut();", 100);
  }
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
background-image:url(rolling.gif);
background-position:right;
background-repeat:no-repeat;
}

#suggest1 {
  position:relative;
} 
#suggest2 {
  position:relative;
}  
#suggest3 {
  position:relative;
} 
#suggest4 {
  position:relative;
}  
#suggest5 {
  position:relative;
} 
#suggest6 {
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
            <h3 style="color:#00E676">Input Pemberian Obat Untuk <?php echo ucfirst($rr['uname']); ?></h3>        
              <form method="post" enctype="multipart/form-data">
              <div class="row">
                  <p>
                  <div class="input-field col s6">
                  <div id="suggest1">
                    <i class="mdi-image-filter-1 prefix"></i>
                    <input name="id_periksa" type="hidden" value="<?php echo $rr['id_periksa']; ?>"> 
                    <input type="text" class="form-control validate" id="nama_obat1" name="nama_obat1" autocomplete="off" onKeyUp="suggest1(this.value);"onBlur="fill1();" required>
                    <div class="suggestionsBox" id="suggestions1" style="display: none;">
                      <div class="suggestionList" id="suggestionsList1" style="color:red"> &nbsp; </div>
                    </div>
                    <label for="nama_obat1">Input Obat 1</label>
                  </div>
                  </div>
                  <input id="id_obat1" name="id_obat1" type="hidden" class="validate">
                  <input id="jml_obat1" name="jml_obat1" type="hidden" class="validate">
                  <div class="input-field col s6"> 
                    <i class="mdi-image-filter-1 prefix"></i>                            
                    <input name="jumlah_obat1" type="number" > 
                    <label for="jumlah_obat1">Jumlah Obat 1</label>
                  </div>
                  <div class="input-field col s6">
                  <div id="suggest2">
                    <i class="mdi-image-filter-2 prefix"></i>
                    <input type="text" class="form-control validate" id="nama_obat2" name="nama_obat2" autocomplete="off" onKeyUp="suggest2(this.value);"onBlur="fill2();">
                    <div class="suggestionsBox" id="suggestions2" style="display: none;">
                      <div class="suggestionList" id="suggestionsList2" style="color:red"> &nbsp; </div>
                    </div>
                    <label for="nama_obat2">Input Obat 2</label>
                  </div>
                  <input id="id_obat2" name="id_obat2" type="hidden" class="validate">
                  <input id="jml_obat2" name="jml_obat2" type="hidden" class="validate">
                  </div>
                  <div class="input-field col s6"> 
                    <i class="mdi-image-filter-2 prefix"></i>                            
                    <input name="jumlah_obat2" type="number" > 
                    <label for="jumlah_obat2">Jumlah Obat 2</label>
                  </div>
                  <div class="input-field col s6">
                  <div id="suggest3">
                    <i class="mdi-image-filter-3 prefix"></i>
                    <input type="text" class="form-control validate" id="nama_obat3" name="nama_obat3" autocomplete="off" onKeyUp="suggest3(this.value);"onBlur="fill3();">
                    <div class="suggestionsBox" id="suggestions3" style="display: none;">
                      <div class="suggestionList" id="suggestionsList3" style="color:red"> &nbsp; </div>
                    </div>
                    <label for="nama_obat3">Input Obat 3</label>
                  </div>
                  </div>
                  <input id="id_obat3" name="id_obat3" type="hidden" class="validate">
                  <input id="jml_obat3" name="jml_obat3" type="hidden" class="validate">
                  <div class="input-field col s6"> 
                    <i class="mdi-image-filter-3 prefix"></i>                            
                    <input name="jumlah_obat3" type="number" > 
                    <label for="jumlah_obat3">Jumlah Obat 3</label>
                  </div>  
                  <div class="input-field col s6">
                  <div id="suggest4">
                    <i class="mdi-image-filter-4 prefix"></i>
                    <input type="text" class="form-control validate" id="nama_obat4" name="nama_obat4" autocomplete="off" onKeyUp="suggest4(this.value);"onBlur="fill4();">
                    <div class="suggestionsBox" id="suggestions4" style="display: none;">
                      <div class="suggestionList" id="suggestionsList4" style="color:red"> &nbsp; </div>
                    </div>
                    <label for="nama_obat4">Input Obat 4</label>
                  </div>
                  </div>
                  <input id="id_obat4" name="id_obat4" type="hidden" class="validate">
                  <input id="jml_obat4" name="jml_obat4" type="hidden" class="validate">
                  <div class="input-field col s6"> 
                    <i class="mdi-image-filter-5 prefix"></i>                            
                    <input name="jumlah_obat4" type="number" > 
                    <label for="jumlah_obat4">Jumlah Obat 4</label>
                  </div>
                  <div class="input-field col s6">
                  <div id="suggest5">
                    <i class="mdi-image-filter-5 prefix"></i>
                    <input type="text" class="form-control validate" id="nama_obat5" name="nama_obat5" autocomplete="off" onKeyUp="suggest5(this.value);"onBlur="fill5();">
                    <div class="suggestionsBox" id="suggestions5" style="display: none;">
                      <div class="suggestionList" id="suggestionsList5" style="color:red"> &nbsp; </div>
                    </div>
                    <label for="nama_obat5">Input Obat 5</label>
                  </div>
                  </div>
                  <input id="id_obat5" name="id_obat5" type="hidden" class="validate">
                  <input id="jml_obat5" name="jml_obat5" type="hidden" class="validate">
                  <div class="input-field col s6"> 
                    <i class="mdi-image-filter-5 prefix"></i>                            
                    <input name="jumlah_obat5" type="number" > 
                    <label for="jumlah_obat5">Jumlah Obat 5</label>
                  </div> 
                  <div class="input-field col s6">
                  <div id="suggest6">
                    <i class="mdi-image-filter-6 prefix"></i>
                    <input type="text" class="form-control validate" id="nama_obat6" name="nama_obat6" autocomplete="off" onKeyUp="suggest6(this.value);"onBlur="fill6();">
                    <div class="suggestionsBox" id="suggestions6" style="display: none;">
                      <div class="suggestionList" id="suggestionsList6" style="color:red"> &nbsp; </div>
                    </div>
                    <label for="nama_obat6">Input Obat 6</label>
                  </div>
                  </div>
                  <input id="id_obat6" name="id_obat6" type="hidden" class="validate">
                  <input id="jml_obat6" name="jml_obat6" type="hidden" class="validate">
                  <div class="input-field col s6"> 
                    <i class="mdi-image-filter-6 prefix"></i>                            
                    <input name="jumlah_obat6" type="number" > 
                    <label for="jumlah_obat6">Jumlah Obat 6</label>
                  </div> 
                  <div class="input-field col s12"> 
                  <div class="modal-footer">                      
                      <button class="waves-effect waves-red btn-flat" name="input_obat" type="submit">Input </button>
                      <a href="obat-keluar" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</a>
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
if (isset($_POST['input_obat'])) {
  $id_periksa   = $_POST['id_periksa'];
  /*nama obat*/
  $nama_obat1   = $_POST['nama_obat1'];
  $nama_obat2   = $_POST['nama_obat2'];
  $nama_obat3   = $_POST['nama_obat3'];
  $nama_obat4   = $_POST['nama_obat4'];
  $nama_obat5   = $_POST['nama_obat5'];
  $nama_obat6   = $_POST['nama_obat6'];
  /*jumlah obat yang di input*/  
  $jumlah_obat1 = $_POST['jumlah_obat1'];
  $jumlah_obat2 = $_POST['jumlah_obat2'];
  $jumlah_obat3 = $_POST['jumlah_obat3'];
  $jumlah_obat4 = $_POST['jumlah_obat4'];
  $jumlah_obat5 = $_POST['jumlah_obat5'];
  $jumlah_obat6 = $_POST['jumlah_obat6'];
  /*jumlah obat sebelumnya*/
  $jml_obat1    = $_POST['jml_obat1'];
  $jml_obat2    = $_POST['jml_obat2'];
  $jml_obat3    = $_POST['jml_obat3'];
  $jml_obat4    = $_POST['jml_obat4'];
  $jml_obat5    = $_POST['jml_obat5'];
  $jml_obat6    = $_POST['jml_obat6'];
  /*id obat*/
  $id_obat1     = $_POST['id_obat1'];
  $id_obat2     = $_POST['id_obat2'];
  $id_obat3     = $_POST['id_obat3'];
  $id_obat4     = $_POST['id_obat4'];
  $id_obat5     = $_POST['id_obat5'];
  $id_obat6     = $_POST['id_obat6'];
  // echo "tes".$id_obat1.$id_obat2.$id_obat3.$id_obat4.$id_obat5.$id_obat6;
  // $sesuname;
  if ($id_obat1 == $id_obat2 || $id_obat1 == $id_obat3 || $id_obat1 == $id_obat4 || $id_obat1 == $id_obat5 || $id_obat1 == $id_obat6) {
    echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Ada Obat Yang Sama Diinputkan, Silakan Cek Ulang'
                });</script><script>window.location='index.php?klinik=action-ok&id=$id_periksa'</script>";
  }else{
    $q = mysqli_query($koneksi,"select uname from pengguna where id_pengguna = '$sesid'");
    $r = mysqli_fetch_array($q);
    $un= $r['uname'];
    if (!empty($nama_obat1)) {
      // insert ok
      $insert = mysqli_query($koneksi,"insert into obat_keluar values ('','$id_periksa','$nama_obat1','$jumlah_obat1','$un')");
      // update master obat
      $stokbaru= $jml_obat1 - $jumlah_obat1;
      // echo $stokbaru.$id_obat1;
      // die();
      $update1 = mysqli_query($koneksi,"update master_obat set jml='$stokbaru' where id_obat='$id_obat1'");
      // update stts periksa
      $update2 = mysqli_query($koneksi,"update periksa set stts='4' where id_periksa='$id_periksa'");
    }
    if (!empty($nama_obat2)) {
      // insert ok
      $insert = mysqli_query($koneksi,"insert into obat_keluar values ('','$id_periksa','$nama_obat2','$jumlah_obat2','$un')");
      // update master obat
      $stokbaru= $jml_obat2 - $jumlah_obat2;
      // echo $stokbaru.$id_obat1;
      // die();
      $update1 = mysqli_query($koneksi,"update master_obat set jml='$stokbaru' where id_obat='$id_obat2'");
      // update stts periksa
      $update2 = mysqli_query($koneksi,"update periksa set stts='4' where id_periksa='$id_periksa'");
    }
    if (!empty($nama_obat3)) {
      // insert ok
      $insert = mysqli_query($koneksi,"insert into obat_keluar values ('','$id_periksa','$nama_obat3','$jumlah_obat3','$un')");
      // update master obat
      $stokbaru= $jml_obat3 - $jumlah_obat3;
      // echo $stokbaru.$id_obat1;
      // die();
      $update1 = mysqli_query($koneksi,"update master_obat set jml='$stokbaru' where id_obat='$id_obat3'");
      // update stts periksa
      $update2 = mysqli_query($koneksi,"update periksa set stts='4' where id_periksa='$id_periksa'");
    }
    if (!empty($nama_obat4)) {
      // insert ok
      $insert = mysqli_query($koneksi,"insert into obat_keluar values ('','$id_periksa','$nama_obat4','$jumlah_obat4','$un')");
      // update master obat
      $stokbaru= $jml_obat4 - $jumlah_obat4;
      // echo $stokbaru.$id_obat1;
      // die();
      $update1 = mysqli_query($koneksi,"update master_obat set jml='$stokbaru' where id_obat='$id_obat4'");
      // update stts periksa
      $update2 = mysqli_query($koneksi,"update periksa set stts='4' where id_periksa='$id_periksa'");
    }
    if (!empty($nama_obat5)) {
      // insert ok
      $insert = mysqli_query($koneksi,"insert into obat_keluar values ('','$id_periksa','$nama_obat5','$jumlah_obat5','$un')");
      // update master obat
      $stokbaru= $jml_obat5 - $jumlah_obat5;
      // echo $stokbaru.$id_obat1;
      // die();
      $update1 = mysqli_query($koneksi,"update master_obat set jml='$stokbaru' where id_obat='$id_obat5'");
      // update stts periksa
      $update2 = mysqli_query($koneksi,"update periksa set stts='4' where id_periksa='$id_periksa'");
    }
    if (!empty($nama_obat6)) {
      // insert ok
      $insert = mysqli_query($koneksi,"insert into obat_keluar values ('','$id_periksa','$nama_obat6','$jumlah_obat6','$un')");
      // update master obat
      $stokbaru= $jml_obat6 - $jumlah_obat6;
      // echo $stokbaru.$id_obat1;
      // die();
      $update1 = mysqli_query($koneksi,"update master_obat set jml='$stokbaru' where id_obat='$id_obat6'");
      // update stts periksa
      $update2 = mysqli_query($koneksi,"update periksa set stts='4' where id_periksa='$id_periksa'");
    }
      echo "<script>Lobibox.notify('default', {
                      iconClass: false,
                      size: 'mini',
                      delayIndicator: false,
                      position: 'center top',
                      showClass: 'fadeInDown',
                      hideClass: 'fadeUpDown',
                      msg: 'Layanan Pasien Berhasil Di Input'
                  });</script><script>window.location='obat-keluar'</script>";
  }  
}
?>
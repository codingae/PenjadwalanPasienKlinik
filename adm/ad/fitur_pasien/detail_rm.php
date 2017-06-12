<?php 
include ('././ad/jembatan.php');
$idp = $_GET['idperiksa'];
$mqr = mysqli_query($koneksi,"select * from layanan where id_periksa='$idp'");
$mrw = mysqli_fetch_array($mqr);
$idd = $mrw['id_layanan'];
$thn = substr($idd, 0,4);
$bln = substr($idd, 4,2);
$tgl = substr($idd, 6,2);
?>
<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-pengguna">Rekam Medis</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Rekam Medis</span>
            </a>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--breadcrumbs end-->
<!--start container-->
<div class="container">
  <div id="invoice">
    <div class="invoice-header">
      <div class="row section">
        <div class="col s12 m6 l6">
          <img src="images/generic-logo.png" alt="company logo">
        </div>

        <div class="col s12 m6 l6">
          <div class="invoce-company-address right-align">
            <span class="invoice-icon"><i class="mdi-social-location-city cyan-text"></i></span>

            <p><span class="strong">Kliniki dr. Pudji Umbaran</span>
              <br/>
              <span>Peterongan - Jombang</span>
              <br/>
              <span>East Java</span>
              <br/>
              <span>+62 321 000 000</span>
            </p>
          </div>

        </div>
      </div>
    </div>

    <div class="invoice-lable">
      <div class="row">
        <div class="col s12 m12 l12 cyan">
          <h4 class="white-text invoice-text">Detail Periksa Tanggal <?php echo $tgl."/".$bln."/".$thn; ?> (<?php echo $mrw['id_layanan']; ?>)</h4>
        </div>
      </div>
    </div>

    <div class="invoice-table">
      <div class="row">
        <h5>Rekam Medis a/n <?php echo ucfirst($mrw['nama_pasien']); ?></h5> <br>
        <div class="col s4 m4 l4">
          <p><b>List Periksa</b></p>
          <ol>
            <?php 
              $periksa1 = $mrw['id_masterlayanan1'];
              $periksa2 = $mrw['id_masterlayanan2'];
              $periksa3 = $mrw['id_masterlayanan3'];
              $periksa4 = $mrw['id_masterlayanan4'];
              $periksa5 = $mrw['layanan_tambahan'];
              if ($periksa1 !== "kosong") {
            ?>  
              <li><?php echo ucfirst($periksa1); ?></li>
            <?php  
              }else{
                echo "";
              }
              if ($periksa2 !== "kosong") {
            ?>
              <li><?php echo ucfirst($periksa2); ?></li>
            <?php  
              }else{
                echo "";
              }if ($periksa3 !== "kosong") {
            ?>
              <li><?php echo ucfirst($periksa3); ?></li>
            <?php  
              }else{
                echo "";
              }if ($periksa4 !== "kosong") {
            ?>
              <li><?php echo ucfirst($periksa4); ?></li>
            <?php  
              }else{
                echo "";
              }if ($periksa5 !== "") {
            ?>
              <li><?php echo ucfirst($periksa5); ?></li>
            <?php  
              }else{
                echo "";
              }
            ?>
          </ol>
        </div>
        <div class="col s4 m4 l4">
          <p><b>Diagnosa Penyakit</b></p>
          <ul>
            <li><b><?php echo ucfirst($mrw['penyakit']); ?></b></li>
          </ul>
        </div>
        <div class="col s4 m4 l4">
          <p><b>Total Biaya</b></p>
          <b><?php echo "Rp.". number_format($mrw['total_biaya'],2,",","."); ?></b>
        </div>
      </div>
    </div>
    
    <div class="invoice-footer">
      <div class="row">
        <div class="col s12 m6 l6">
          <p></p>          
        </div>
        <div class="col s12 m6 l6 center-align">
          <p>Mengetahui,</p>
          <img src="images/signature-scan.png" alt="signature">
          <p class="header">Nama</p>
        </div>
      </div>
    </div>
  </div>
</div>
<!--end container-->

</section>
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
            <li><a href="rekap-uang-masuk">Rekap Uang Masuk</a></li>            
            <a href="periksa">
              <span class="mdi-file-folder-shared right small"> Data Rekap</span>
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
        <div class="col s12 m12 l12">
        <div class="card-panel">
          <h5> 
            <form action="" method="POST">
            <div class="col s12 m4 l4">
              Rekap Uang Masuk  
            </div>
            <div class="col s12 m3 l3 right-align">
              <select name="bulan" id="bulan">
                <option value="">--Pilih Bulan--</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
              </select>
            </div>
            <div class="col s12 m3 l3 right-align">
              <select name="tahun" id="tahun">
                <option value="">--Pilih Tahun--</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2026">2026</option>
                <option value="2027">2027</option>
              </select>
            </div>
            <div class="col s12 m2 l2 left-align">
              <button type="submit" name="sort" class="waves-effect btn-flat light-green accent-3 right white-text left-align"><i class="mdi-action-print"></i> Cetak</button>
              <!-- <a href="html2pdf/examples/cetak_rum.php?id=<?php echo $sesid; ?>"><i class="mdi-action-print"></i> Cetak</a> -->
            </div>
            </form>
          </h5> 
          <?php 
            if (isset($_POST['sort'])) {
              echo "<script>window.location='html2pdf/examples/cetak_rum.php?bulan=$_POST[bulan]&tahun=$_POST[tahun]'</script>";
              // header('location:html2pdf/examples/cetak_rum.php');
            }
          ?>
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Tanggal Periksa</th>
                <th>Jumlah Pendapatan</th>
                <th>Penanggung Jawab</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
// SELECT COALESCE(tgl_pendapatan,'TOTAL') AS tgl_pendapatan,
// SUM(jml_pendapatan) AS jml_pendapatan, uname 
// FROM view_pendapatan 
// GROUP BY tgl_pendapatan WITH ROLLUP
              $no        = 1;
              $query     = mysqli_query($koneksi,"SELECT COALESCE(tgl_pendapatan,'TOTAL') AS tgl_pendapatan,
                                                         SUM(jml_pendapatan) AS jml_pendapatan, uname 
                                                  FROM view_pendapatan 
                                                  GROUP BY tgl_pendapatan")or die (mysqli_error());
              while($row = mysqli_fetch_array($query)){
          ?>    
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['tgl_pendapatan'];?></td>
                  <td><?php echo "Rp.". number_format($row['jml_pendapatan'],2,",","."); ?></td>
                  <td><?php echo ucfirst($row['uname']);?></td>
              </tr>
          <?php 
              $no++;
              }
          ?>
          </tbody>
        </table>
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
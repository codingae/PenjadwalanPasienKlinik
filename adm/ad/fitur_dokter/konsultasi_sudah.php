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
            <li><a href="periksa">Konsultasi</a></li>            
            <a href="periksa">
              <span class="mdi-file-folder-shared right small"> Data Konsultasi Sudah</span>
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
          <h5>Konsultasi Pasien</h5>
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Nama Pasien</th>
                <th>Tanggal Kosultasi</th>
                <th>Kata Kunci</th>
                <th>Isi</th>
                <th>Jawaban</th>
                <th>Action</th>
            </tr>
          </thead>
          
          <tbody>
          <?php 
              $no        = 1;
              $query     = mysqli_query($koneksi,"SELECT * FROM konsultasi where status='1' || status='3'")or die (mysqli_error($koneksi));
              while($row = mysqli_fetch_array($query)){
          ?>    
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo ucfirst($row['pengirim']);?></td>
                  <td><?php echo $row['tgl_konsultasi'];?></td>
                  <td><?php echo $row['kata_kunci'];?></td>
                  <td><?php echo substr($row['isi'], 0,50)."..";?></td>
                  <td><?php echo substr($row['jawaban'], 0,50)."..";?></td>
                  <td>
                    <a href="#<?php echo $row['id_konsultasi'];?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Beri Jawaban">
                      <i class="mdi-action-visibility"></i>
                    </a>
                    <div id="<?php echo $row['id_konsultasi']; ?>" class="modal modal-fixed-footer">
                      <div class="modal-content">
                        <div class="row">
                        <header><h4 class="light-green-text"><?php echo $row['kata_kunci']; ?></h4></header>
                        <b style='font-size:15px'>Petanyaan: <br></b>
                        <p style='font-size:15px'>
                          <?php 
                            echo $row['isi'];
                          ?>
                        </p>
                        <b style='font-size:15px'>Jawaban: <br></b>
                        <p style='font-size:15px'>
                          <?php 
                            echo $row['isi'];
                          ?>
                        </p>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="reset" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</button>
                      </div>
                    </div>
                  </td>
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
<?php 
if (isset($_POST['jawab'])) {
  $id = $_POST['id_konsultasi'];
  $jawab = base64_encode($_POST['jawaban']);
  echo "<script>window.location='index.php?klinik=konsultasi-jawab&id=$id&token=$jawab'</script>";
}
?>
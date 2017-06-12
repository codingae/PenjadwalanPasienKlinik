<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-pengguna">Konsultasi</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Record Konsultasi</span>
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
          <table id="tabel" class="mdl-data-table" cellspacing="0" width="100%">
          <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal Terbit</th>
                <th>Posted By</th>
                <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php   
              $no=1;
              $query     = mysqli_query($koneksi,"SELECT * FROM konsultasi WHERE pengirim='$sesuname'")or die (mysqli_error($koneksi));
              while($row = mysqli_fetch_array($query)){
          ?>
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['kata_kunci'] ?></td>
                  <td><?php echo substr($row['isi'], 0,25).".." ?></td>
                  <td><?php echo $row['tgl_konsultasi'] ?></td>
                  <td><?php echo ucfirst($row['pengirim']) ?></td>
                  <td>
                    <?php 
                      if ($row['pengirim']==$sesuname) {
                        if ($row['status']==1) {
                    ?>
                        <a href="#<?php echo $row['id_konsultasi'];?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Lihat Jawaban">
                            <i class="mdi-action-visibility"></i> Lihat Jawaban
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
                            <form action="" method="post">  
                            <input type="hidden" name="id_konsultasinya" value="<?php echo $row['id_konsultasi'];?>">                            
                            <button type="submit" class="waves-effect waves-red btn-flat modal-action modal-close" name="balek">Kembali</button>
                            <!-- <button type="reset" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</button> -->
                            </form>
                          </div>
                        </div>                    
                    <?php
                        }elseif ($row['status']==3) {
                    ?>
                        <a href="#<?php echo $row['id_konsultasi'];?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Lihat Jawaban">
                            <i class="mdi-action-visibility"></i> Lihat Jawaban
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
                    <?php
                        }else{
                    ?>
                        <a href="#!" class="tooltipped" class="btn red waves-effect waves-light right" data-position="left" data-delay="50" data-tooltip="Masih Di Proses">
                          <i class="mdi-av-timer"></i>
                          Menunggu..
                        </a>                      
                    <?php
                        }
                      }
                    ?>
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
      </div>
    <br>   
    </div>
  </div>
</div>
<?php 
  if (isset($_POST['balek'])) {
    $id_konsultasi = $_POST['id_konsultasinya'];
    $q = mysqli_query($koneksi,"update konsultasi set status='3' where id_konsultasi='$id_konsultasi'");
    if ($q) {
      echo "<script>window.location='record-konsultasi'</script>";
    }
  }
?>
<!--end container-->
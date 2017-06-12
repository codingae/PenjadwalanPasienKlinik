<!--breadcrumbs start-->
<div id="breadcrumbs-wrapper" class="white z-depth-1">
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <ol class="breadcrumb">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="data-pengguna">Postingan</a></li>
            <a href="data-pengguna">
              <span class="mdi-file-folder-shared right small"> Data Postingan</span>
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
              $query     = mysqli_query($koneksi,"SELECT * FROM artikel")or die (mysqli_error($koneksi));
              while($row = mysqli_fetch_array($query)){
          ?>
              <tr>
                  <td><?php echo $no ?></td>
                  <td><?php echo $row['judul'] ?></td>
                  <td><?php echo strip_tags(substr($row['isi'], 0,25)).".." ?></td>
                  <td><?php echo substr($row['post_date'], 8,2)."-".substr($row['post_date'], 5,2)."-".substr($row['post_date'], 0,4) ?></td>
                  <td><?php echo ucfirst($row['post_by']) ?></td>
                  <td>
                    <?php 
                      if ($row['post_by']==$sesuname) {
                    ?>
                      <a href="index.php?klinik=artikel<?php echo '&id_artikel=' . $row['id_artikel']; ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Edit">
                          <i class="mdi-action-speaker-notes"></i>
                      </a>                      
                    <?php
                      }else{
                        if ($row['status']==2) {
                    ?>
                        <a href="#verified<?php echo $row['id_artikel']; ?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Cek Artikel">
                            <i class="mdi-action-visibility"></i>
                        </a>
                        <div id="verified<?php echo $row['id_artikel']; ?>" class="modal modal-fixed-footer">
                            <form method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                  <div class="row">
                                  <header><h4 class="light-green-text"><?php echo $row['judul']; ?></h4></header>
                                  <?php 
                                    echo $row['isi'];
                                  ?>
                                  <br><br><br>
                                  </div>
                            </div>
                            <div class="modal-footer">
                              <input type="hidden" name="id_artikel" value="<?php echo $row['id_artikel']; ?>">
                              <button class="waves-effect waves-green btn-flat" name="terima">Terima</button>
                              <button class="waves-effect waves-green btn-flat" name="tolak">Tolak</button>
                              <!-- <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close" type="submit">Simpan</a> -->
                              <button type="reset" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</button>
                              <!-- <a href="#" type="reset" class=" reset">Kembali</a> -->
                            </div>
                            </form>
                        </div>
                    <?php                          
                        }elseif ($row['status']==1) {
                        ?>
                          <a href="#<?php echo $row['id_artikel']; ?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Lihat Artikel">
                            <i class="mdi-action-verified-user"></i>
                          </a>
                        <?php
                        }elseif ($row['status']==3) {
                        ?>
                          <a href="#<?php echo $row['id_artikel']; ?>" class="tooltipped modal-trigger" data-position="left" data-delay="50" data-tooltip="Tidak Tampil">
                            <i class="mdi-action-visibility-off"></i>
                          </a>
                          <div id="<?php echo $row['id_artikel']; ?>" class="modal modal-fixed-footer">
                            <form method="post" enctype="multipart/form-data">
                            <div class="modal-content">
                                  <div class="row">
                                  <header><h4 class="light-green-text"><?php echo $row['judul']; ?></h4></header>
                                  <?php 
                                    echo $row['isi'];
                                  ?>
                                  <br><br><br>
                                  </div>
                            </div>
                            <div class="modal-footer">
                              <button type="reset" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</button>
                            </div>
                            </form>
                          </div>
                        <?php
                        }
                      ?>
                      <div id="<?php echo $row['id_artikel']; ?>" class="modal modal-fixed-footer">
                        <form method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                              <div class="row">
                              <header><h4 class="light-green-text"><?php echo $row['judul']; ?></h4></header>
                              <?php 
                                echo $row['isi'];
                              ?>
                              <br><br><br>
                              </div>
                        </div>
                        <div class="modal-footer">
                          <button type="reset" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</button>
                        </div>
                        </form>
                      </div>                      
                      <?php
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
<!--end container-->
<?php 
if (isset($_POST['terima'])) {
  $id = $_POST['id_artikel'];
  echo "<script>window.location='index.php?klinik=pos&id=$id&status=1'</script>";
}elseif (isset($_POST['tolak'])) {
  $id = $_POST['id_artikel'];
  echo "<script>window.location='index.php?klinik=pos&id=$id&status=3'</script>";
}
?>
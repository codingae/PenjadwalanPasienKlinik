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
              $query     = mysqli_query($koneksi,"SELECT * FROM artikel WHERE post_by='$sesuname'")or die (mysqli_error($koneksi));
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
                        if ($row['status']==1) {
                    ?>
                        <a href="index.php?klinik=artikel<?php echo '&id_artikel=' . $row['id_artikel']; ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Edit">
                            <i class="mdi-action-speaker-notes"></i>
                        </a>                      
                    <?php
                        }elseif($row['status']==3){
                    ?>
                        <a href="#!" class="tooltipped" class="btn red waves-effect waves-light right" data-position="left" data-delay="50" data-tooltip="Ditolak">
                          <i class="mdi-action-visibility-off"></i> 
                        </a>                      
                    <?php
                        }else{
                    ?>
                        <a href="#!" class="tooltipped" class="btn red waves-effect waves-light right" data-position="left" data-delay="50" data-tooltip="Masih Di Proses">
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
<!--end container-->
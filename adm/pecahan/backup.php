<div id="table-datatables">
      <h4 class="header2"></h4>
      <div class="row">
        <div class="col s12 m8 l12" style="margin-top:-30px;">
          <table id="data-table-simple" class="responsive-table display" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Umur</th>
                    <th>Level</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
         
            <!-- <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </tfoot> -->
            <?php 
                $no = 0;
                $query     = mysqli_query($koneksi,"SELECT * FROM pengguna order by id_pengguna asc");
                while($row = mysqli_fetch_array($query)){
                $no++;
                $bln = substr($row['tgl_lahir'], 3,2);
                if ($bln == "01") {
                    $bln = "Januari";
                }elseif ($bln == "02") {
                    $bln = "Februari";
                }elseif ($bln == "03") {
                    $bln = "Maret";
                }elseif ($bln == "04") {
                    $bln = "April";
                }elseif ($bln == "05") {
                    $bln = "Mei";
                }elseif ($bln == "06") {
                    $bln = "Juni";
                }elseif ($bln == "07") {
                    $bln = "Juli";
                }elseif ($bln == "08") {
                    $bln = "Agustus";
                }elseif ($bln == "09") {
                    $bln = "September";
                }elseif ($bln == "10") {
                    $bln = "Oktober";
                }elseif ($bln == "11") {
                    $bln = "November";
                }elseif ($bln == "12") {
                    $bln = "Desember";
                }else{
                    echo "Error Bulan";
                }
            ?>
            <tbody>
                <tr>
                    <td><?php echo $row['id_pengguna'] ?></td>
                    <td><?php echo ucfirst($row['nama_depan'])." ".$row['nama_belakang'] ?></td>
                    <td><?php echo ucfirst($row['tmp_lahir']).", ".
                              substr($row['tgl_lahir'],0,2)." ".$bln ." ".substr($row['tgl_lahir'],6,4) ?></td>
                    <td class="center"><?php 
                            $tgl_lahir = $row['tgl_lahir'];
                            $hari_ini  = date('d-m-Y');
                            $umur      = date_diff(date_create($tgl_lahir), date_create($hari_ini));                             
                            echo $umur->format('%Y')." th";
                        ?>
                    <!-- <td><?php echo $no ?></td> -->
                    </td>
                    <td class="center">
                    <?php   if ($row['level']=='1') {
                                echo "Dokter";
                            }elseif ($row['level']=='2') {
                                echo "Lo_daf";
                            }elseif ($row['level']=='3') {
                                echo "Lo_bat";
                            }elseif ($row['level']=='4') {
                                echo "Pasien";
                            }else{
                                echo "Error Level";
                            }
                    ?>
                    <td style="width:15%" class="center"><?php 
                          if (empty($row['foto'])) {
                          ?>
                            <img src="ad/fitur/foto/no-img.png" alt="" class="circle responsive-img materialboxed" width="20%">
                          <?php
                          }else{
                          ?>
                            <img src="<?php echo $row['foto'] ?>" alt="" class="circle responsive-img materialboxed" width="20%">
                        <?php
                          }
                        ?>
                    </td>
                    </td>
                    <td>
                        <a href="index.php?klinik=edit-pengguna<?php echo '&id=' . $row['id_pengguna']; ?>" class="tooltipped" data-position="left" data-delay="50" data-tooltip="Edit">
                            <i class="mdi-action-speaker-notes"></i>
                        </a>
                        <a href="#detail" class="tooltipped modal-trigger" data-position="top" data-delay="50" data-tooltip="cetak kartu">
                          <i class="mdi-action-print"></i>
                        </a>
                        <a href="#" onclick="Materialize.toast('<span class=&quot;red-text&quot;><b>Anda Yakin Akan Menghapus <?= ucfirst($row['uname'])?></span><a class=&quot;btn-flat white waves-effect waves-red red-text&quot; href=&quot;index.php?klinik=daftardelete&id=<?= $row['id_pengguna']?>&quot;>Yes</b><a>', 10000)" class="tooltipped" data-position="right" data-delay="50" data-tooltip="Hapus">
                            <i class="mdi-action-delete"></i>
                        </a>
                    </td>
                </tr>
                <!-- <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011/04/25</td>
                    <td>$320,800</td>
                </tr> -->
            </tbody>
            <div id="detail" class="modal modal-fixed-footer">
              <form method="post" enctype="multipart/form-data">
              <div class="modal-content">
                    <div class="row">
                      <header><h4 class="light-green-text">Input Pengguna</h4></header>
                        
                    </div>
              </div>
              <div class="modal-footer">
                <button class="waves-effect btn-flat" name="simpan">Simpan</button>
                <!-- <a href="#" class="waves-effect waves-green btn-flat modal-action modal-close" type="submit">Simpan</a> -->
                <button type="reset" class="waves-effect waves-red btn-flat modal-action modal-close">Kembali</button>
                <!-- <a href="#" type="reset" class=" reset">Kembali</a> -->
              </div>
              </form>
            </div>            
            <?php 
                }
                // menutup koneksi
                mysqli_close($koneksi);
            ?>
          </table>
        </div>
      </div>
    </div>
    </div>
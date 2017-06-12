<?php
/**
 * HTML2PDF Library - example
 *
 * HTML => PDF convertor
 * distributed under the LGPL License
 *
 * @package   Html2pdf
 * @author    Laurent MINGUET <webmaster@html2pdf.fr>
 * @copyright 2016 Laurent MINGUET
 *
 * isset($_GET['vuehtml']) is not mandatory
 * it allow to display the result in the HTML format
 */
// get the HTML
// koneksi-query
    include '../../ad/jembatan.php';
    ob_start();
    $idp   = $_GET['idp'];
    $mqr   = mysqli_query($koneksi,"select * from layanan where id_periksa='$idp'");
    $mrw   = mysqli_fetch_array($mqr);
    $mqrr  = mysqli_query($koneksi,"select uname from view_layanan_sudah_pj where id_periksa='$idp'");
    $mrww  = mysqli_fetch_array($mqrr);
    $mqrrr = mysqli_query($koneksi,"select * from obat_keluar where id_periksa='$idp'");
    $idd   = $mrw['id_layanan'];
    $thn   = substr($idd, 0,4);
    $bln   = substr($idd, 4,2);
    $tgl   = substr($idd, 6,2);

?>
<style type="text/css">
<!--
    div.zone { border: none; border-radius: 4mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 2.7mm;}
    h1 { padding: 0; margin: 0; color: #00E676; font-size: 7mm; }
    h2 { padding: 0; margin: 0; color: #222222; font-size: 5mm; position: relative; }
-->
</style>
<page format="100x100" orientation="L" backcolor="#00E676" style="font: arial;">
    <div style="rotate: 90; position: absolute; width: 100mm; height: 4mm; left: 195mm; top: 0; font-style: italic; font-weight: normal; text-align: center; font-size: 2.5mm;">
        <b> <?php echo ucfirst($id_periksa); ?></b>
    </div>
    <table style="width: 100%;border: none;" cellspacing="4mm" cellpadding="0">
        <tr>
            <td style="width: 100%;">
                <div class="zone" style="height: 5mm;vertical-align: middle;text-align: center;">
                    <b><h4>Rekam Medik a.n <?php echo ucfirst($mrw['nama_pasien']) ?><br>
                    Klinik dr. Pudji Umbaran </h4>
                    (No. Telp : +62 321 000000)</b>
                </div>
            </td>
        </tr>
        <tr>            
            <td style="width: 100%">
                <div class="zone" style="height: 40mm;vertical-align: middle; text-align: justify ;font-size:4mm">
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tanggal Periksa <?php echo $tgl."/".$bln."/".$thn; ?></b><br><br>
                        Diagnosa Penyakit : <br> <i>"<b><?php echo ucfirst($mrw['penyakit']); ?></b>"</i> <br><br>
                        List Periksa : <br>
                        <b> "
                        <?php 
                          $periksa1 = $mrw['id_masterlayanan1'];
                          $periksa2 = $mrw['id_masterlayanan2'];
                          $periksa3 = $mrw['id_masterlayanan3'];
                          $periksa4 = $mrw['id_masterlayanan4'];
                          $periksa5 = $mrw['layanan_tambahan'];
                          if ($periksa1 !== "kosong") {
                        ?>  
                          <?php echo ucfirst($periksa1).", "; ?>
                        <?php  
                          }else{
                            echo "";
                          }
                          if ($periksa2 !== "kosong") {
                        ?>
                          <?php echo ucfirst($periksa2).", "; ?>
                        <?php  
                          }else{
                            echo "";
                          }if ($periksa3 !== "kosong") {
                        ?>
                          <?php echo ucfirst($periksa3).", "; ?>
                        <?php  
                          }else{
                            echo "";
                          }if ($periksa4 !== "kosong") {
                        ?>
                          <?php echo ucfirst($periksa4).", "; ?>
                        <?php  
                          }else{
                            echo "";
                          }if ($periksa5 !== "") {
                        ?>
                          <?php echo ucfirst($periksa5).", "; ?>
                        <?php  
                          }else{
                            echo "";
                          }
                        ?>
                        </b>"
                        <br>
                        <br>
                        Daftar Obat : <br>
                        "<b>
                        <?php 
                            while ($mrwww = mysqli_fetch_array($mqrrr)) {
                        ?>
                            <?php echo $mrwww['nama_obat']. '('.$mrwww['jml_ok'].')' ?>
                        <?php
                            }
                        ?>
                        </b>"
                    
                    <br>
                    
                </div>
            </td>
        </tr>
    </table>
</page>
<?php
     $content = ob_get_clean();
     $nama = "kartu_berobat_".$cetakrw['uname'].".pdf";
    // convert
    require_once(dirname(__FILE__).'/../vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->Output($nama);
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }


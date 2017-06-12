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
    $id = $_GET['idnya'];
    $cetakqr  = mysqli_query($koneksi,"select * from view_layanan_belum where id_periksa='$id'");
    $cetakrw  = mysqli_fetch_array($cetakqr);

    ob_start();
    $id_periksa      = $cetakrw['id_periksa'];
    $uname           = $cetakrw['uname'];
    $tanggal_periksa = $cetakrw['tanggal_periksa'];
    $no_antrian      = $cetakrw['no_antrian'];
    $waktu_periksa   = $cetakrw['waktu_periksa'];

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
                    <qrcode value="<?php echo $id_periksa ?>" ec="Q" style="width: 30mm; border: none;" ></qrcode>
                </div>
            </td>
        </tr>
        <tr>            
            <td style="width: 100%">
                <div class="zone" style="height: 40mm;vertical-align: middle; text-align: justify ;font-size:4mm">
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-=Kartu Periksa=-</b><br><br>
                        Nama Pasien : <b><?php echo ucfirst($uname); ?></b> <br>
                        Tanggal Lahir : <b><?php echo $tanggal_periksa ?></b> <br>
                        No Antrian : <b><?php echo $no_antrian ?></b> <br>
                        Waktu Periksa : <b><?php echo $waktu_periksa ?></b> <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <br>
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


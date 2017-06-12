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
    $id = $_GET['id'];
    $cetakqr  = mysqli_query($koneksi,"select * from pengguna where id_pengguna='$id'");
    $cetakrw  = mysqli_fetch_array($cetakqr);

    ob_start();
    $id_pengguna   = $cetakrw['id_pengguna'];
    $uname         = $cetakrw['uname'];
    $nama_depan    = $cetakrw['nama_depan'];
    $nama_belakang = $cetakrw['nama_belakang'];
    $email         = $cetakrw['email'];
    $level         = $cetakrw['level'];
    $jk            = $cetakrw['jk'];
    $tmp_lahir     = $cetakrw['tmp_lahir'];
    $tgl_lahir     = $cetakrw['tgl_lahir'];
    $alamat        = $cetakrw['alamat'];
    $tgl_daftar    = $cetakrw['tgl_daftar'];
?>
<style type="text/css">
<!--
    div.zone { border: none; border-radius: 4mm; background: #FFFFFF; border-collapse: collapse; padding:3mm; font-size: 2.7mm;}
    h1 { padding: 0; margin: 0; color: #00E676; font-size: 7mm; }
    h2 { padding: 0; margin: 0; color: #222222; font-size: 5mm; position: relative; }
-->
</style>
<page format="100x200" orientation="L" backcolor="#00E676" style="font: arial;">
    <div style="rotate: 90; position: absolute; width: 100mm; height: 4mm; left: 195mm; top: 0; font-style: italic; font-weight: normal; text-align: center; font-size: 2.5mm;">
        <b> <?php echo ucfirst($uname); ?></b>
    </div>
    <table style="width: 99%;border: none;" cellspacing="4mm" cellpadding="0">
        <tr>
            <td colspan="2" style="width: 100%">
                <div class="zone" style="height: 34mm;position: relative;font-size: 5mm;">
                    <div style="position: absolute; right: 3mm; top: 3mm; text-align: right; font-size: 3mm; ">
                        <b><i><?php echo substr($tgl_daftar, 8,2).'/'.substr($tgl_daftar, 5,2).'/'.substr($tgl_daftar, 0,4); ?></i></b>
                    </div>
                    <div style="position: absolute; right: 65mm; bottom: 8mm; margin-right:-30px; text-align: left; font-size: 3.5mm; ">
                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kartu Berobat</h4>
                    <h1>Klinik dr. Pudji Umbaran</h1>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:3mm">Peterongan - Jombang - East Java</b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="font-size:2mm">No. Telp : +62 321 862105</b><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
                    </div>
                    <b><?php echo $id_pengguna; ?></b><br>
                    <!-- <img src="./res/logoo.gif" alt="logo"> -->
                </div>
            </td>
        </tr>
        <tr>
            <td style="width: 25%;">
                <div class="zone" style="height: 40mm;vertical-align: middle;text-align: center;">
                    <qrcode value="<?php echo $id_pengguna ?>" ec="Q" style="width: 37mm; border: none;" ></qrcode>
                </div>
            </td>
            <td style="width: 75%">
                <div class="zone" style="height: 40mm;vertical-align: middle; text-align: justify ;font-size:4mm">
                    <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-=Detail Pasien=-</b><br><br>
                        Nama Lengkap : <b> <?php echo ucfirst($nama_depan)." ".$nama_belakang; ?></b>.<br>
                        Username : <b><?php echo ucfirst($uname); ?></b> <br>
                        Gender : <b><?php if ($jk == "L") {
                            echo "Pria";
                        }elseif ($jk == "P") {
                            echo "Wanita";
                        } ?></b> <br>
                        Tempat Lahir : <b><?php echo ucfirst($tmp_lahir) ?></b> <br>
                        Tanggal Lahir : <b><?php echo $tgl_lahir ?></b> <br>
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


<?php
    include '../../ad/jembatan.php';
    $bulan = $_GET['bulan'];
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
    if ($bulan==1) {
        $bulan="Januari";
    }elseif ($bulan==2) {
        $bulan="Februari";
    }elseif ($bulan==3) {
        $bulan="Maret";
    }elseif ($bulan==4) {
        $bulan="April";
    }elseif ($bulan==5) {
        $bulan="Mei";
    }elseif ($bulan==6) {
        $bulan="Juni";
    }elseif ($bulan==7) {
        $bulan="Juli";
    }elseif ($bulan==8) {
        $bulan="Agustus";
    }elseif ($bulan==9) {
        $bulan="September";
    }elseif ($bulan==10) {
        $bulan="Oktober";
    }elseif ($bulan==11) {
        $bulan="November";
    }elseif ($bulan==12) {
        $bulan="Desember";
    }
ob_start();
?>
<style type="text/css">
<!--
    table.page_header {width: 100%; border: none; background-color: #00E676; border-bottom: solid 1mm #00B205; padding: 2mm }
    table.page_footer {width: 100%; border: none; background-color: #00E676; border-top: solid 1mm #00B205; padding: 2mm}
    h1 {color: #000033}
    h2 {color: #000055}
    h3 {color: #000077}

    div.niveau
    {
        padding-left: 5mm;
    }
    table {
    /*border-collapse: collapse;*/
    width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #00E676;
        color: white;
    }
-->
</style>
<page backtop="14mm" backbottom="14mm" backleft="10mm" backright="10mm" style="font-size: 12pt">
    <page_header>
        <table class="page_header">
            <tr>
                <td style="width: 100%; text-align: left">
                    Klinik dr.Pudji Umbaran (No. Telp : +62 321 862105)
                </td>
            </tr>
        </table>        
    </page_header>
    <page_footer>
        <table class="page_footer">
            <tr>
                <td style="width: 100%; text-align: right">
                    Halaman [[page_cu]]/[[page_nb]]
                </td>
            </tr>
        </table>
    </page_footer>
    <br><br><br>
    <table>
        <tr>
            <th style="width:5%">#</th>
            <th style="width:10%;text-align:center">Tanggal Periksa</th>
            <th style="width:13%;text-align:center">Nama Pasien</th>
            <th style="width:22%;text-align:center">Diagnosa Penyakit</th>
            <th style="width:30%;text-align:center">Layanan</th>
            <th style="width:20%;text-align:center">Obat</th>
        </tr>
    <?php 
        $no=1;
        $cetakqr  = mysqli_query($koneksi,"SELECT * FROM layanan WHERE id_layanan 
                                                                 LIKE '%".$_GET['tahun'].$_GET['bulan']."%'");
        while ($cetakrw=mysqli_fetch_array($cetakqr)) {        
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td style="width:10%;text-align:center"><?php echo substr($cetakrw['id_layanan'], 6,2)."/".substr($cetakrw['id_layanan'], 4,2)."/".substr($cetakrw['id_layanan'], 0,4);?></td>
            <td style="width:13%;"><?php echo ucfirst($cetakrw['nama_pasien']);?></td>
            <td style="width:22%;"><?php echo $cetakrw['penyakit'];?></td>
            <td style="width:30%;text-align:center">
                <?php
                    echo ucfirst($cetakrw['id_masterlayanan1']).", ";
                    if ($cetakrw['id_masterlayanan2']!="kosong") {
                    echo $cetakrw['id_masterlayanan2'].", ";
                    }if ($cetakrw['id_masterlayanan3']!="kosong") {
                    echo $cetakrw['id_masterlayanan3'].", ";
                    }if ($cetakrw['id_masterlayanan4']!="kosong") {
                    echo $cetakrw['id_masterlayanan4'].", ";
                    }if ($cetakrw['layanan_tambahan']!="kosong") {
                    echo $cetakrw['layanan_tambahan'];
                    }
                ?>
            </td>
            <td style="width:20%;text-align:center">
                <?php 
                    $idperiksa = $cetakrw['id_periksa']; 
                    $que = mysqli_query($koneksi,"SELECT * FROM obat_keluar WHERE id_periksa='$idperiksa'");
                    while ($row = mysqli_fetch_array($que)) {
                        echo $row['nama_obat']."(".$row['jml_ok'].")<br>";
                    }
                ?>
            </td>
        </tr>
    <?php 
    $no++;
    }
    ?>
    </table>
</page>
<?php
    $content = ob_get_clean();

    require_once(dirname(__FILE__).'/../vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('L', 'A4', 'fr', true, 'UTF-8', 0);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->createIndex('Rekam Medis Bulan '.$bulan." ".$_GET['tahun'], 25, 12, false, true, 1);
        $html2pdf->Output('record.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

<?php
    include '../../ad/jembatan.php';
    
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
            <th style="width:5">#</th>
            <th style="width:25%;text-align:center">Tanggal Pendapatan</th>
            <th style="width:35%;text-align:center">Penanggung Jawab</th>
            <th style="width:35%;text-align:center">Total Pendapatan</th>
        </tr>
    <?php 
        $no=1;
        $like  = mysqli_real_escape_string($koneksi,$bulan);
        $cetakqr  = mysqli_query($koneksi,"SELECT COALESCE(tgl_pendapatan,'TOTAL') AS tgl_pendapatan,
                                                         SUM(jml_pendapatan) AS jml_pendapatan, uname 
                                                  FROM view_pendapatan WHERE tgl_pendapatan LIKE '%".$_GET['bulan'].'-'.$_GET['tahun']."%'
                                                  GROUP BY tgl_pendapatan");
        while ($cetakrw=mysqli_fetch_array($cetakqr)) {        
    ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td style="width:25%;text-align:center"><?php echo $cetakrw['tgl_pendapatan'];?></td>
            <td style="width:35%;text-align:center"><?php echo ucfirst($cetakrw['uname']); ?></td>
            <td style="width:35%;text-align:center"><?php echo "Rp. ". number_format($cetakrw['jml_pendapatan'],2,",","."); ?></td>
        </tr>
    <?php 
    $no++;
    }
    ?>
        <tr>
            <b><i>        
            <td colspan="3" style="text-align:right;background:#00E676;color:white;">Total Pendapatan Bulan 
            <?php 
                $bulan = $_GET['bulan'];
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
                echo $bulan." ".$_GET['tahun'];
            ?>
            </td>
            </i></b>
            <b><i>
            <td style="text-align:center;background:#00E676;color:white;">
                <?php 
                    $cetakqr1  = mysqli_query($koneksi,"SELECT SUM(jml_pendapatan) AS jml_pendapatan 
                                                       FROM view_pendapatan WHERE tgl_pendapatan LIKE '%".$_GET['bulan']."%' ");
                    $cetakrw1  = mysqli_fetch_array($cetakqr1);
                    echo "Rp. ". number_format($cetakrw1['jml_pendapatan'],2,",",".");
                ?>
            </td>
            </i></b>
        </tr>
    </table>
</page>
<?php
    $content = ob_get_clean();

    require_once(dirname(__FILE__).'/../vendor/autoload.php');
    try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'fr', true, 'UTF-8', 0);
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $html2pdf->createIndex('Record Uang Masuk Bulan '.$bulan." ".$_GET['tahun'], 20, 12, false, true, 1);
        $html2pdf->Output('record.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }

<?php 
session_start();
if (!isset($_SESSION['id_pengguna'])&&!isset($_SESSION['uname'])&&!isset($_SESSION['level'])) {
    header('location:ad/login');
}
/*header*/
include "pecahan/atas.php" 
?>
<!-- START MAIN -->
<div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">
        <?php 
            /*sidebar*/
            $seslev = $_SESSION['level'];
            switch ($seslev) {
                // dokter
                case 'c4ca4238a0b923820dcc509a6f75849b':
                    include "pecahan/pinggir1.php";
                    break;
                // pendaftaran
                case 'c81e728d9d4c2f636f067f89cc14862c':
                    include "pecahan/pinggir2.php";
                    break;
                // obat
                case 'eccbc87e4b5ce2fe28308fd9f2a7baf3':
                    include "pecahan/pinggir3.php";
                    break;
                // pasien
                case 'a87ff679a2f3e71d9181a67b7542122c':
                    include "pecahan/pinggir4.php";
                    break;                
            }
        ?>
        <!-- START CONTENT -->
        <section id="content">
            <!--start container-->
            <div class="container">

                <?php $klinik = (!empty($_GET['klinik'])) ? $_GET['klinik'] : "kosong";                    
                    if ($_SESSION['level']=='c4ca4238a0b923820dcc509a6f75849b') {
                        switch ($klinik) {
                        // case 'penyakit': include "ad/fitur_dokter/penyakit.php"; break;
                        // case 'penyakit-delete': include "ad/fitur_dokter/penyakit_delete.php"; break;
                        case 'artikel': include "ad/fitur_dokter/artikel.php"; break;
                        case 'postingan': include "ad/fitur_dokter/postingan.php"; break;
                        case 'pos': include "ad/fitur_dokter/postingan_verified.php"; break;
                        case 'master-gaji': include "ad/fitur_dokter/master_gaji.php"; break;
                        case 'gaji-pegawai': include "ad/fitur_dokter/gaji_pegawai.php"; break;
                        case 'gaji-dokter': include "ad/fitur_dokter/gaji_dokter.php"; break;
                        case 'konsultasi-belum': include "ad/fitur_dokter/konsultasi_belum.php"; break;
                        case 'konsultasi-sudah': include "ad/fitur_dokter/konsultasi_sudah.php"; break;
                        case 'konsultasi-jawab': include "ad/fitur_dokter/konsultasi_jawab.php"; break;
                        case 'laporan': include "ad/fitur_dokter/laporan.php"; break;
                        case 'keperluan-lain': include "ad/fitur_dokter/keperluan_lain.php"; break;
                        case 'dokter-dashboard': include "ad/awal/index_a.php"; break;
                        default:include'ad/awal/index_a.php';
                        }                    
                    }elseif ($_SESSION['level']=='c81e728d9d4c2f636f067f89cc14862c') {
                        switch ($klinik) {
                        // case 'layanandelete': include "ad/fitur_daftar/layanan_delete.php"; break;
                        // case 'daftardelete': include "ad/fitur_daftar/daftar_delete.php"; break;
                        case 'daftar-dashboard': include "ad/awal/index_b.php"; break;
                        case 'data-pengguna': include "ad/fitur_daftar/daftar_b.php"; break;
                        case 'pengguna-edit': include "ad/fitur_daftar/daftar_edit.php"; break;
                        case 'data-layanan': include "ad/fitur_daftar/masterlayanan.php"; break;
                        case 'data-layanan-delete': include "ad/fitur_daftar/layanan_delete.php"; break;
                        case 'profil': include "ad/fitur_daftar/profil.php"; break;
                        case 'penyakit': include "ad/fitur_daftar/penyakit.php"; break;
                        case 'penyakit-delete': include "ad/fitur_daftar/penyakit_delete.php"; break;
                        case 'layanan-belum': include "ad/fitur_daftar/layanan-belum.php"; break;
                        case 'beri-layanan': include "ad/fitur_daftar/action_layanan.php"; break;
                        case 'layanan-sudah': include "ad/fitur_daftar/layanan-sudah.php"; break;
                        case 'detail-rm': include "ad/fitur_daftar/detail_rm.php"; break;
                        case 'rekap-uang-masuk': include "ad/fitur_daftar/r_uangmasuk.php"; break;
                        case 'rekam-medis': include "ad/fitur_daftar/rm.php"; break;
                        default:include'ad//fitur_daftar/daftar_b.php';
                        // default:include'ad/awal/index_b.php';
                        }                    
                    }elseif ($_SESSION['level']=='eccbc87e4b5ce2fe28308fd9f2a7baf3') {
                        switch ($klinik) {
                        case 'obat': include "ad/fitur_obat/obat.php"; break;
                        case 'obat-masuk': include "ad/fitur_obat/obat_masuk.php"; break;
                        case 'obat-keluar': include "ad/fitur_obat/obat_keluar.php"; break;
                        case 'record-obat-masuk': include "ad/fitur_obat/record_obat_masuk.php"; break;
                        case 'record-obat-keluar': include "ad/fitur_obat/record_obat_keluar.php"; break;
                        case 'obatdelete': include "ad/fitur_obat/obat_delete.php"; break;
                        case 'action-ok': include "ad/fitur_obat/action_ok.php"; break;
                        case 'obat-dashboard': include "ad/awal/index_c.php"; break;
                        default:include'ad/fitur_obat/obat.php';
                        // default:include'ad/awal/index_c.php';
                        }                    
                    }elseif ($_SESSION['level']=='a87ff679a2f3e71d9181a67b7542122c') {
                        switch ($klinik) {
                        case 'periksa': include "ad/fitur_pasien/periksa.php"; break;
                        case 'rm': include "ad/fitur_pasien/rm.php"; break;
                        case 'rm-detail': include "ad/fitur_pasien/rm_detail.php"; break;
                        case 'artikel': include "ad/fitur_pasien/artikel.php"; break;
                        case 'postingan': include "ad/fitur_pasien/postingan.php"; break;
                        case 'record-konsultasi': include "ad/fitur_pasien/record_konsultasi.php"; break;
                        case 'konsultasi': include "ad/fitur_pasien/konsultasi.php"; break;
                        case 'pasien-dashboard': include "ad/awal/index_d.php"; break;
                        default:include'ad/fitur_pasien/periksa.php';
                        // default:include'ad/awal/index_d.php';
                        }
                    }else{
                        echo "<script>alert('Anda Tidak Punya Akses')</script>";
                    }           
                ?>
            </div>
            <!--end container-->
        </section>
        <!-- END CONTENT -->
        <!-- untuk pesan -->
        <?php include "pecahan/kanan.php" ?>    
    </div>
    <!-- END WRAPPER -->
</div>
<!-- END MAIN -->
<!-- untuk footer -->
<?php include "pecahan/bawah.php"; ?>
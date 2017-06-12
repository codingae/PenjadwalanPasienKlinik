<?php
include ('././ad/jembatan.php');
// echo $_POST;
$qr             = mysqli_query($koneksi,"select * from obat_masuk where id_om like '$date%' order by id_om desc");
$rw             = mysqli_fetch_array($qr);

$id_om          = substr($rw['id_om'],8,20)+1;

$id_obat        = mysqli_real_escape_string($koneksi,$_POST['id_obat']);
$jml_om         = mysqli_real_escape_string($koneksi,$_POST['jml_om']);
$total_biaya_om = mysqli_real_escape_string($koneksi,$_POST['total_biaya_om']);
$kadaluarsa     = mysqli_real_escape_string($koneksi,$_POST['kadaluarsa']);

echo $_POST['id_obat'];

$query          = "INSERT INTO obat_masuk (id_om,id_obat,jml_om,total_biaya_om,kadaluarsa) VALUES ('$id_om','$id_obat','$jml_om','$total_biaya_om','$kadaluarsa')";
if (mysqli_query($koneksi,$query)) {
  echo "<script>alert('berhasil')</script>";
}else{
  echo "<script>alert('gagal')</script>";
}
?>
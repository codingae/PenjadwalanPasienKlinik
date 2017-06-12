<?php 
include ('././ad/jembatan.php');
$id = $_GET['id'];
$q = mysqli_query($koneksi,"select * from pengguna where id_pengguna='$id'") or die (mysqli_error($koneksi));
$r = mysqli_fetch_array($q);
$del = mysqli_query($koneksi,"delete from pengguna where id_pengguna='$id'") or die (mysqli_error($koneksi));
if ($del == TRUE) {
	unlink($r['foto']);
	echo "<script>window.location='index.php?klinik=daftar'</script>";
}else{
	echo "<script>alert('gagal')</script>";
}
?>
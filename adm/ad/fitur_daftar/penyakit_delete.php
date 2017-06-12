<?php 
include ('././ad/jembatan.php');
$id = $_GET['id'];
$del = mysqli_query($koneksi,"delete from penyakit where id_penyakit='$id'") or die (mysqli_error($koneksi));
if ($del == TRUE) {
	echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Berhasil Menghapus Penyakit'
                });</script><script>window.location='penyakit'</script>";
}else{
	echo "<script>alert('gagal')</script>";
}
?>
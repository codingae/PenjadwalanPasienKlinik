<?php 
include ('././ad/jembatan.php');
$id = $_GET['id'];
$del = mysqli_query($koneksi,"delete from master_obat where id_obat='$id'") or die (mysqli_error($koneksi));
if ($del == TRUE) {
	echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Obat Telah Dihapus'
                });</script><script>window.location='obat'</script>";
}else{
	echo "<script>alert('gagal')</script>";
}
?>
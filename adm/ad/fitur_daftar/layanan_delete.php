<?php 
include ('././ad/jembatan.php');
$id = $_GET['id'];
$del = mysqli_query($koneksi,"delete from master_layanan where id_masterlayanan='$id'") or die (mysqli_error($koneksi));
if ($del == TRUE) {
	echo "<script>Lobibox.notify('default', {
                    iconClass: false,
                    size: 'mini',
                    delayIndicator: false,
                    position: 'center top',
                    showClass: 'fadeInDown',
                    hideClass: 'fadeUpDown',
                    msg: 'Berhasil Menghapus'
                });</script><script>window.location='data-layanan'</script>";
}else{
	echo "<script>alert('gagal')</script>";
}
?>
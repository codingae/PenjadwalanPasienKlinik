<?php 
include ('../../ad/jembatan.php');
if (isset($_GET['id'])) {
	$id   = $_GET['id'];
	$stts = $_GET['status'];
	// echo $id.$stts;
	$qr = mysqli_query($koneksi,"UPDATE artikel set status='$stts' WHERE id_artikel='$id'")or die(mysqli_error($koneksi));
	if ($qr==TRUE) {
	    echo "<script>Lobibox.notify('default', {
	          iconClass: false,
	          size: 'mini',
	          delayIndicator: false,
	          position: 'center top',
	          showClass: 'fadeInDown',
	          hideClass: 'fadeUpDown',
	          msg: 'Status Telah Diperbarui'
	      });</script><script>window.location='postingan'</script>";
  	}
}
?>
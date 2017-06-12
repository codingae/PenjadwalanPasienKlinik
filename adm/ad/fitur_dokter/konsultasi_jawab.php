
<?php 
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $jawaban = base64_decode($_GET['token']);
  // echo $id.$stts;
  $qr = mysqli_query($koneksi,"UPDATE konsultasi set status='1',jawaban='$jawaban',penjawab='$sesuname' WHERE id_konsultasi='$id'")or die(mysqli_error($koneksi));
  if ($qr==TRUE) {
      echo "<script>Lobibox.notify('default', {
            iconClass: false,
            size: 'mini',
            delayIndicator: false,
            position: 'center top',
            showClass: 'fadeInDown',
            hideClass: 'fadeUpDown',
            msg: 'Selamat Konsultasi Sudah Dijawab'
        });</script><script>window.location='konsultasi-belum'</script>";
    }
}
?>
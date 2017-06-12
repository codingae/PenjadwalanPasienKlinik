<?php
// $nama_baru = variable nama file baru dari sebuah gambar 
// $file      = name dari input dengan type file 
// $dir       = direktory penyimpanan gambar
// $width     = variable yang berfungsi mengatur ukuran kompresi gambar
function UploadImageResize($nama_baru,$file,$dir,$width){
   /*direktori gambar*/
	$vdir_upload  = $dir;
	$vfile_upload = $vdir_upload . $_FILES[''.$file.'']["name"];

   /*Simpan gambar dalam ukuran sebenarnya*/
   move_uploaded_file($_FILES[''.$file.'']["tmp_name"], $dir.$_FILES[''.$file.'']["name"]);

   /*identitas file asli*/
    // imagecreatefromjpeg berfungsi membuat salinan gambar dari file asli,
    // imageSX berfungsi mengambil lebar gambar,
    // imageSY mengambil tinggi gambar
	$im_src     = imagecreatefromjpeg($vfile_upload);
	$src_width  = imageSX($im_src);
	$src_height = imageSY($im_src);

   /*Set ukuran gambar hasil perubahan*/
	$dst_width  = $width;
	// $dst_height merupakan perhitungan proporsional dari ukuran asli terhadap ukuran yang dikopresi
	// untuk menghasilkan gambar yang proporsional maka (lebar yang disetting dibagi ukuran asli dan dikali tinggi asli gambar)
	$dst_height = ($dst_width/$src_width)*$src_height;

   /*proses perubahan ukuran*/
	$im = imagecreatetruecolor($dst_width,$dst_height);
	imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

   /*Simpan gambar*/
   imagejpeg($im,$vdir_upload . $nama_baru,100);
   
   /*Hapus gambar di memori komputer*/
   imagedestroy($im_src);
   imagedestroy($im);
   $remove_small = unlink("$vfile_upload");
 }
?>
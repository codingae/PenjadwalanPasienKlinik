<?php
	include ('../../ad/jembatan.php');

	if(!$koneksi) {
	echo 'Tidak bisa terhubung dengan database';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $koneksi->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = $koneksi->query("SELECT * FROM master_obat WHERE nama_obat LIKE '$queryString%'");
				
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
         			echo '<li onClick="fill2(\''.addslashes($result->nama_obat).'\');
         			                   fill3(\''.addslashes($result->id_obat).'\');
         			                   fill4(\''.addslashes($result->harga_obat).'\');
         			                   ">'.$result->nama_obat.'&nbsp;&nbsp;'.$result->harga_obat.'</li>';
	         		}
				echo '</ul>';
					
				} else {
					echo 'OOPS ada masalah :(';
				}
			} else {
				// do nothing
			}
		} else {
			echo 'ERROR!';
		}
	}
?>
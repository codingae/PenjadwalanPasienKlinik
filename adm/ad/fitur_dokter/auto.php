<?php
	include ('../../ad/jembatan.php');

	if(!$koneksi) {
	echo 'Tidak bisa terhubung dengan database';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $koneksi->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = $koneksi->query("SELECT DISTINCT level FROM pengguna WHERE level != '4' LIKE '$queryString%'");
				
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
						if ($result->level==1) {
							$level = "Dokter";
						}
						if ($result->level==2) {
							$level = "Loket Pendaftaran";
						}
						if ($result->level==3) {
							$level = "Loket Obat";
						}
         			echo '<li onClick="fill2(\''.addslashes($level).'\');
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
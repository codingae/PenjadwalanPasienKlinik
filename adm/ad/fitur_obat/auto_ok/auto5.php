<?php
	include ('../../../ad/jembatan.php');

	if(!$koneksi) {
	echo 'Tidak bisa terhubung dengan database';
	} else {
	
		if(isset($_POST['queryString'])) {
			$queryString = $koneksi->real_escape_string($_POST['queryString']);
			
			if(strlen($queryString) >0) {

				$query = $koneksi->query("SELECT * FROM master_obat WHERE jml != '0' and nama_obat LIKE '$queryString%'");
				
				if($query) {
				echo '<ul>';
					while ($result = $query ->fetch_object()) {
         			echo '<li onClick="fill5(\''.addslashes($result->nama_obat).'\');
         							   fill55(\''.addslashes($result->id_obat).'\');
         							   fill555(\''.addslashes($result->jml).'\');
							">'.$result->nama_obat.'</li>';
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
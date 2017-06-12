<?php
		include ('../../ad/jembatan.php');
	
		if(!$koneksi) {
		echo 'Tidak bisa terhubung dengan database';
		} else {
		
			if(isset($_POST['queryString'])) {
				$queryString = $koneksi->real_escape_string($_POST['queryString']);
				
				if(strlen($queryString) >0) {

					$query = $koneksi->query("SELECT * FROM penyakit WHERE nama_penyakit LIKE '$queryString%'");
					
					if($query) {
					echo '<ul>';
						while ($result = $query ->fetch_object()) {
	         			echo '<li onClick="fill1(\''.addslashes($result->nama_penyakit).'\');">'.$result->nama_penyakit.'</li>';
		         		}
					echo '</ul>';
						
					} else {
						echo 'OOPS ada masalah :(';
					}
				} else {
					echo "string";
				}
			} else {
				echo 'ERROR!';
			}
		}
?>
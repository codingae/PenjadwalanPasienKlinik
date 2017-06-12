<?php 
include ('././ad/jembatan.php');
echo $_COOKIE['klinikdrpudji']."<br>";
echo $_SESSION['id_pengguna']."<br>";
echo $_SESSION['level']."<br>";
echo $_SESSION['uname']."<br>";
?>
<div class="row">
	<div class="col s12 m6 l3">
	    <div class="card">
	        <div class="card-content green white-text">
	            <p class="card-stats-title"><i class="mdi-social-group-add"></i> Pengguna</p>
	            <h4 class="card-stats-number">
	            <?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_pengguna) as jumlah FROM pengguna");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['jumlah']." Pengguna";
	            ?>
	            </h4>
				<div class="col s6 m6 l6">
	            <?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_pengguna) as jumlah FROM pengguna where level=1");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['jumlah']." Dokter";
	            ?>
	            </div>
				<div class="col s6 m6 l6">
	            <?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_pengguna) as jumlah FROM pengguna where level=2");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['jumlah']." Loket Daftar";
	            ?>
	            </div>
				<div class="col s6 m6 l6">
	            <?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_pengguna) as jumlah FROM pengguna where level=3");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['jumlah']." Loket Obat";
	            ?>
				</div>
				<div class="col s6 m6 l6">				
	            <?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_pengguna) as jumlah FROM pengguna where level=4");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['jumlah']." Pasien";
	            ?>	
				</div>
				<br>
	        </div>
	        <div class="card-action  green darken-2">
	            <div id="clients-bar">
	            </div>
	        </div>
	    </div>
	</div>
</div>

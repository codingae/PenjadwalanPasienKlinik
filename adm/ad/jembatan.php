<?php 

$host="localhost";  
$user="root";
$pass="asd";
$database="db_sim";
$koneksi=new mysqli($host,$user,$pass,$database);
if (mysqli_connect_errno()) {
  trigger_error('Koneksi ke database gagal: '  . mysqli_connect_error(), E_USER_ERROR); 
}

// $query=mysqli_query($koneksi,"SELECT * FROM remember_me");
// $r=mysqli_fetch_array($query)

?>
<!--A Design by W3layouts 
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php 
include ('./adm/ad/jembatan.php');
// if (file_exists('./adm/ad/jembatan.php')) {
//  echo "ada";
// }else{
//  echo "ndak ada";
// }
$qisi = mysqli_query($koneksi,"select * from profile where id='1'");
$risi = mysqli_fetch_array($qisi);
?>
<!DOCTYPE html>
<html>
<head>
<title><?php echo $risi['nama_klinik'] ?></title>
<!-- Favicons-->
<link rel="icon" href="adm/images/favicon/favicon.ico" sizes="32x32">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!-- Custom Theme files -->
<script src="js/jquery.min.js"></script>
<!--theme-style-->
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Klinik dr.Pudji Umbaran Merupakan klinik yang bertempat di Peterongan Jombang" />
<script type="application/x-javascript"> 
addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".scroll").click(function(event){		
		event.preventDefault();
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
	});
});
</script>
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<link href="css/index.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Noto+Sans:400,700' rel='stylesheet' type='text/css'>
<style>
    .google-maps {
        position: relative;
        padding-bottom: 50.3%; // This is the aspect ratio
        height: 0;
        overflow: hidden;
        top:50px;
    }
    .google-maps iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100% !important;
        height: 80% !important;
    }
    
.btnn {
      background: none repeat scroll 0 0 #2C97DF;
      border: medium none;
      /*border-radius:50%;*/
	  color:white;
      height: 40px;
      /*left: 5%;*/
      position: fixed;
      top: 50px;
	  border-top:0;
	  border-left:0;
	  border-right:0;
	  border-bottom:5px solid #2A80B9;
	  padding:10px 20px;
	  text-decoration:none;
	  font-family:sans-serif;
	  font-size:11pt;
	  z-index: 9;
    }
    .btnn span {
	  color: #fff;
	  position: relative;
	  z-index: 1;
	}
	
	.btnn::before {
	  content: '';
	  position: absolute;
	  background: #071017;
	  border: 50vh solid #1d4567;
	  width: 30vh;
	  height: 30vh;
	  border-radius: 50%;
	  display: block;
	  top: 50%;
	  left: 50%;
	  z-index: 0;
	  opacity: 1;
	  -webkit-transform: translate(-50%, -50%) scale(0);
	          transform: translate(-50%, -50%) scale(0);
	}
	.btnn:hover {
	  color: #D81900;
	  box-shadow: 0 6px 10px 0 rgba(0, 0, 0, 0.14), 0 1px 18px 0 rgba(0, 0, 0, 0.12), 0 3px 5px -1px rgba(0, 0, 0, 0.2);
	}
	.btnn:active::before, .btnn:focus::before {
	  -webkit-transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
	  transition: opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
	  transition: transform 1.12s ease, opacity 0.28s ease 0.364s;
	  transition: transform 1.12s ease, opacity 0.28s ease 0.364s, -webkit-transform 1.12s ease;
	  -webkit-transform: translate(-50%, -50%) scale(1);
	          transform: translate(-50%, -50%) scale(1);
	  opacity: 0;
	}
	.btnn:focus {
	  outline: none;
	}
	a:link {
	text-decoration: none;
	}
	// Link yang akan ditampilkan berwarna hitam
	a:hover {
	color:#18A116;
	}
	// Jika mouse Anda arahkan pada link maka akan berubah menjadi warna putih
	a:visited {
	color:#18A116;
	}
</style>

</head>
<body>
<!-- <a class="btnn" href="#"></a> -->

<a href="adm/" ><div class="btnn"><i class="glyphicon glyphicon-log-in"></i><span></span></div></a>
<!--header-->
<div class="header" id="header">
	<div class="head" >
		<div class="navbar-fixed-top">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
				 <div class="navbar-brand logo ">
					<h1 class="animated wow pulse" data-wow-delay=".2s">
					<a href="./"><?php echo $risi['nama_klinik'] ?> </a></h1>
				</div>
			<div class="clearfix"></div>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse nav-wil links" id="bs-example-navbar-collapse-1">
			<div class="fill">
			<ul class="nav navbar-nav ">
				<!-- <li >
				<a href="index.html" class="scroll active" data-hover="Home">Home</a> 
				</li> -->
				<li ><a href="index.php?#layanan" data-hover="About">
				<i class="glyphicon glyphicon-list"></i>
				Layanan</a> </li>
				<li><a href="index.php?#success" data-hover="Gallery">
				<i class="glyphicon glyphicon-stats"></i>
				Statistik</a></li>
				<li><a href="index.php?#testimoni" data-hover="Gallery">
				<i class="glyphicon glyphicon-user"></i>
				Testimoni</a></li>
				<li><a href="index.php?#gallery" data-hover="Gallery">
				<i class="glyphicon glyphicon-picture"></i>
				Galeri</a></li>
				<li><a href="index.php?#medis" data-hover="Codes">
				<i class="glyphicon glyphicon-list-alt"></i>
				Dokter </a></li>
				<li><a href="blog.php" data-hover="Codes">
				<i class="glyphicon glyphicon-book"></i>
				Blog </a></li>
			  </ul>
			  <div class="clearfix"></div>
			</div>
			</div><!-- /.navbar-collapse -->
		</div>
			  <div class="clearfix"></div>	
	</div>
</div>
<br><br><br><br>
<?php 
	if ($_GET['id']) {
?>
<div class="container">
	<div class="row">
	  <div class="col-md-9">
		<?php 
			$q = mysqli_query($koneksi,"select * from artikel where id_artikel='$_GET[id]'");
			$r = mysqli_fetch_array($q);			
		?>
		<h3>
			<?php echo $r['judul'] ?>
		</h3>
		<br>
		<p>
			<?php echo $r['isi'] ?>
		</p>
		<br>
		<i>
		<b>
		<p>Diterbitkan Oleh: <?php echo ucfirst($r['post_by']) ?>; Pada Tanggal: <?php echo $r['post_date'] ?></p></b></i>
	  </div>
	  <div class="col-md-3 text-xs-center">
		<img src="images/bann.jpg" alt="banner" class="rounded">
	  </div>
	</div>
</div>
<br><br><br><br>
<?php
	}else{
?>
<div class="container">
	<div class="row">
	  <div class="col-md-9">
		<h3>
			Kami Menyediakan Berbagai Informasi, Tips Trik, Maupun Informasi Terbaru Terkait Dunia Kesehatan
		</h3>
		<br>
		<?php 
			$q = mysqli_query($koneksi,"select * from artikel");
			while ($r = mysqli_fetch_array($q)) {		
		?>
		<div class="col-md-9" style="line-height:30px">
			<a href="blog.php?id=<?php echo $r['id_artikel'] ?>"><?php echo $r['judul'] ?></a>	
		</div>
		<div class="col-md-3">
			<?php 
				if (substr($r['post_date'], 5,2)==12) {
					$bulan="Des";
				}elseif (substr($r['post_date'], 5,2)==01) {
					$bulan="Jan";
				}elseif (substr($r['post_date'], 5,2)==02) {
					$bulan="Feb";
				}elseif (substr($r['post_date'], 5,2)==03) {
					$bulan="Mar";
				}elseif (substr($r['post_date'], 5,2)==04) {
					$bulan="Apr";
				}elseif (substr($r['post_date'], 5,2)==05) {
					$bulan="Mei";
				}elseif (substr($r['post_date'], 5,2)==06) {
					$bulan="Jun";
				}elseif (substr($r['post_date'], 5,2)==07) {
					$bulan="Jul";
				}elseif (substr($r['post_date'], 5,2)==08) {
					$bulan="Ags";
				}elseif (substr($r['post_date'], 5,2)==09) {
					$bulan="Sep";
				}elseif (substr($r['post_date'], 5,2)==10) {
					$bulan="Okt";
				}elseif (substr($r['post_date'], 5,2)==11) {
					$bulan="Nov";
				}
			?>
			<?php echo substr($r['post_date'], 8,2)." ".$bulan." ".substr($r['post_date'], 0,4) ?>
		</div>
		<?php 
		}
		?>
	  </div>
	  <div class="col-md-3">
		<img src="images/bann.jpg" alt="banner" class="img-responsive">
	  </div>
	</div>
</div>
<br><br><br><br>
<?php
	}
?>


<!--footer-->
<div class="copy">
	<p class="footer-grid" >© 2016 <?php echo $risi['nama_klinik'] ?>
	<!-- <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p> -->
</div>
<script type="text/javascript">
	$(document).ready(function() {
		/*
		var defaults = {
  			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
 		};
		*/
		$().UItoTop({ easingType: 'easeOutQuart' });		
	});
</script>
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- for bootstrap working -->
<script src="js/bootstrap.min.js"></script>
<!-- //for bootstrap working -->
</body>
</html>
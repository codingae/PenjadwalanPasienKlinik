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
        /*top:20px;*/
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
				<li ><a href="#layanan" class="scroll" data-hover="About">
				<i class="glyphicon glyphicon-list"></i>
				Layanan</a> </li>
				<li><a href="#success" class="scroll" data-hover="Gallery">
				<i class="glyphicon glyphicon-stats"></i>
				Statistik</a></li>
				<li><a href="#testimoni" class="scroll" data-ho	ver="Gallery">
				<i class="glyphicon glyphicon-user"></i>
				Testimoni</a></li>
				<li><a href="#gallery" class="scroll" data-hover="Gallery">
				<i class="glyphicon glyphicon-picture"></i>
				Galeri</a></li>
				<li><a href="#medis" class="scroll" data-hover="Codes">
				<i class="glyphicon glyphicon-list-alt"></i>
				Dokter </a></li>
				<li><a href="blog.php" data-hover="Codes">
				<i class="glyphicon glyphicon-book"></i>
				Blog </a></li>
				<!-- <li><a href="adm/" data-hover="Contact">
				<i class="glyphicon glyphicon-log-in"> </i>
				&nbsp;Login</a></li> -->
			  </ul>
			  <div class="clearfix"></div>
			</div>
			</div><!-- /.navbar-collapse -->
		</div>
			  <div class="clearfix"></div>	
	</div>
</div>
<!--content-->
<script src="js/responsiveslides.min.js"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
      $("#slider2").responsiveSlides({
        auto: true,
        pager: true,
        speed: 300,
        namespace: "callbacks",
      });
    });
</script>
<!--banner-->
<div class="banner">
	<div class="container">
		 <div class="slider">
			<ul class="rslides" id="slider2">
			  <li>
			  	<div class="banner-text"><b>[</b>
					<h2>Lorem ipsum <span>Dolor sit amet</span></h2>
					<h6>There are many variations of passages</h6><b class="right-a">]</b>
				</div>
			  </li>
			  <li>
			  	<div class="banner-text"><b>[</b>
					<h2> Masagni dolores  <span> Voluptaquisquam</span></h2>
					<h6>There are many variations of passages</h6><b class="right-a">]</b>
				</div>
			  </li>
			  <li>
			  	<div class="banner-text"><b>[</b>
					<h2>Lorem ipsum <span>Dolor sit amet</span></h2>
					<h6>There are many variations of passages</h6><b class="right-a">]</b>
				</div>
			  </li>		 
			</ul>
		</div>	
	</div>
</div>
<!--content-->
<div class="service" id="layanan">
	<div class="container">
		<div class="ser-top">
			<h3>Layanan</h3>
			<div class="ser-t">
				<b class="line"></b>
			</div>
			<!-- <p> Klinik dr.Pudji Umbaran memiliki berbagai pelayanan yang akan sangat membantu pasien dalam mengatasi berbagai keluhan kesehatannya, diantarnya:</p> -->
		</div>
		<div class="service-head">
			<div class="col-md-12 ser-head1">
				<?php 
					$query = mysqli_query($koneksi,"SELECT layanan,biaya_layanan FROM master_layanan WHERE id_masterlayanan != '5'");
					while ($row = mysqli_fetch_array($query)) {
				?>
				<div class="col-md-6 ser-grid ">
					<div class=" hi-icon-effect-7 hi-icon-effect-7a">
						<i class="glyphicon glyphicon-leaf hi-icon "> </i>
					</div>					
					<h3><?php echo $row['layanan']; ?></h3>
					<p>Biaya: Rp. <?php echo number_format($row['biaya_layanan'],0,'.',','); ?></p>
				</div>				
				<?php
					}
				?>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>

<!-- statistics -->
<div class="statistics" id="success">
	<div class="container">
		<div class="ser-top ser-top1">
			<h3>Statistik</h3>
			<div class="ser-t">
				<b></b>
				<b class="line"></b>
			</div>
		</div>
		<div class="statistics-grids">
			<div class="col-md-3 statistics-grid">
				<div class="statistics-text">
					<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-delay='.5' data-increment="100">
					<?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_pengguna) as jumlah FROM pengguna WHERE level=4");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['jumlah'];
	            	?>
					</div>
					<h5>Pasien Terdaftar</h5>
					<div class="sar-t">
						<b></b>
						<b class="line-1"></b>
					</div>
				</div>
			</div>
			<div class="col-md-3 statistics-grid">
				<div class="statistics-text">
					<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-delay='.5' data-increment="100">
					<?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_obat) as count FROM master_obat");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['count'];
	            	?>
					</div>
					<h5>Jenis Obat</h5>
					<div class="sar-t">
						<b></b>
						<b class="line-1"></b>
					</div>
				</div>
			</div>
			<div class="col-md-3 statistics-grid">
				<div class="statistics-text">
					<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-delay='.5' data-increment="100">
					<?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_periksa) as count FROM periksa");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['count'];
	            	?>
					</div>
					<h5>Jumlah Periksa</h5>
					<div class="sar-t">
						<b></b>
						<b class="line-1"></b>
					</div>
				</div>
			</div>
			<div class="col-md-3 statistics-grid">
				<div class="statistics-text">
					<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-delay='.5' data-increment="100">
					<?php 
	            	$sql=mysqli_query($koneksi,"SELECT count(id_pengguna) as count FROM pengguna WHERE level!=4");
	            	$a=mysqli_fetch_array($sql);
	            	echo $a['count'];
	            	?>
					</div>
					<h5>Pegawai</h5>
					<div class="sar-t">
						<b></b>
						<b class="line-1"></b>
					</div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- statistics -->

<!--gallery-->
<div class="gallery" id="gallery">
	<div class="container">
		<div class="ser-top ga-top">
			<h3>Gallery</h3>
			<div class="ser-t">
				<b></b>
				<b class="line"></b>
			</div>
			<p> There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour.</p>
		</div>
        <ul class="simplefilter">
            <li class="active" data-filter="all">All</li>
            <li data-filter="1">Category</li>
            <li data-filter="2">Category1</li>
            <li data-filter="3">Category2</li>
            <li data-filter="4">Category3</li>
            <li data-filter="5">Category4</li>
        </ul>
        <div class="filtr-container">
                <div class="  filtr-item gallery-t" data-category="1, 5" data-sort="Busy streets">
                <a href="images/ga.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga.jpg" class="img-responsive" alt=" " />	
					<figcaption>
						<h3>Prevailing</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</figcaption>
					</figure>
				</a>
                </div>
                <div class=" filtr-item" data-category="2, 5" data-sort="Luminous night">
                   <a href="images/ga1.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga1.jpg" class="img-responsive" alt=" " />	
					<figcaption>
					<h3>Prevailing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					</figcaption>
					</figure>
					</a>
                </div>
                <div class=" filtr-item" data-category="1, 4" data-sort="City wonders">
                    <a href="images/ga2.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga2.jpg" class="img-responsive" alt=" " />	
					<figcaption>
						<h3>Prevailing</h3>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
						</p>
					</figcaption>
					</figure>
				</a>
                </div>
                <div class="  filtr-item" data-category="3" data-sort="In production">
                   <a href="images/ga3.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga3.jpg" class="img-responsive" alt=" " />	
					<figcaption>
					<h3>Prevailing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					</figcaption>
					</figure>
				</a>
                </div>
                <div class=" filtr-item" data-category="3, 4" data-sort="Industrial site">
    	        <a href="images/ga4.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga4.jpg" class="img-responsive" alt=" " />	<figcaption>
					<h3>Prevailing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					</figcaption>
					</figure>
				</a>
                </div>
                <div class=" filtr-item" data-category="2, 4" data-sort="Peaceful lake">
                    <a href="images/ga5.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga5.jpg" class="img-responsive" alt=" " />	
					<figcaption>
					<h3>Prevailing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					</figcaption>
					</figure>
				</a>
                </div>
                <div class="  filtr-item" data-category="1, 5" data-sort="City lights">
                <a href="images/ga6.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga6.jpg" class="img-responsive" alt=" " />	
					<figcaption>
					<h3>Prevailing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					</figcaption>
					</figure>
				</a>
                </div>
                <div class=" filtr-item" data-category="2, 4" data-sort="Dreamhouse">
                <a href="images/ga7.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga7.jpg" class="img-responsive" alt=" " />	
					<figcaption>
					<h3>Prevailing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					</figcaption>
					</figure>
				</a>
                </div>
				<div class=" filtr-item" data-category="2, 4" data-sort="Dreamhouse">
                <a href="images/ga8.jpg" rel="title" class="b-link-stripe b-animate-go  thickbox">
					<figure>
					<img src="images/ga8.jpg" class="img-responsive" alt=" " />	
					<figcaption>
					<h3>Prevailing</h3>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
					</p>
					</figcaption>
					</figure>
				</a>
                </div>
               <div class="clearfix"> </div>
        </div>
    </div>
</div>

<!-- Include jQuery & Filterizr -->
<script src="js/jquery.filterizr.js"></script>
<script src="js/controls.js"></script>

<!-- Kick off Filterizr -->
<script type="text/javascript">
    $(function() {
        //Initialize filterizr with default options
        $('.filtr-container').filterizr();
    });
</script>
	
<script src="js/jquery.chocolat.js"></script>
<link rel="stylesheet" href="css/chocolat.css" type="text/css" media="screen" charset="utf-8">
<!--light-box-files -->
<script type="text/javascript" charset="utf-8">
$(function() {
	$('.filtr-item a').Chocolat();
});
</script>
<!--//gallery-->
<link href="css/owl.carousel.css" rel="stylesheet">
<script src="js/owl.carousel.js"></script>
 <!-- requried-jsfiles-for owl -->
<script>
    $(document).ready(function() {
      $("#owl-demo2").owlCarousel({
        items : 1,
        lazyLoad : false,
        autoPlay : true,
        navigation : false,
        navigationText :  false,
        pagination : true,
      });
    });
</script>
<!-- //requried-jsfiles-for owl -->
<!-- start content_slider -->
<div class="test" id="testimoni">
	<div class="container">
		<div class="ser-top ser-top1">
			<h3>Testimoni</h3>
			<div class="ser-t">
				<b></b>
				<b class="line"></b>
			</div>
		</div>
		<div class="test-grid-1">
			<div class="col-md-12 test-grid1">
				<div id="owl-demo2" class="owl-carousel">
				<?php 
					$q = mysqli_query($koneksi,"SELECT * FROM testimoni");
					while ($r = mysqli_fetch_array($q)) {
				?>
					<div class="test-grid">
						<p><?php echo ucfirst($r['isi']) ?></p>
						<h4><?php echo ucfirst($r['uname']) ?></h4>
						<span style="color:white"><?php echo $r['id_testimoni'] ?></span>
					</div>					
				<?php
					}
				?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
			
	</div>
</div>
<!---->
<div class="team" id="medis">
	<div class="container">
		<div class="ser-top ga-top">
			<h3>Tenaga Medis</h3>
			<div class="ser-t">
				<b></b>
				<b class="line"></b>
			</div>
		</div>
		<?php 
			$a = mysqli_query($koneksi,"select * from pengguna where level ='1' ");
			while ($b = mysqli_fetch_array($a)) {
		?>
			<div class="col-md-6 bottom-grid ">
				<div class="btm-right">
					<div class="text-xs-center">
					<img src="<?php echo 'adm/'.substr($b['foto'], 4,200) ?>" class="rounded" style="text-align: center;" alt=" ">
					</div>
					<div class="captn">						
						<h4><?php echo ucfirst($b['nama_depan'])." ".ucfirst($b['nama_belakang']) ?></h4>
						<p>Dokter Umum</p>
					</div>
				</div>
			</div>
		<?php		
			}
		?>
		<div class="clearfix"></div>
	</div>
</div>	

<!--contact-->
<div class="map-top" id="contact">
	<div class="col-md-8 map">
		<div class="google-maps">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d879.4315192259851!2d112.28313502917393!3d-7.519167170088041!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e781527250b185f%3A0x41ba37b5072e38a7!2sKlinik+dr.Pudji+Umbaran!5e1!3m2!1sen!2sid!4v1483323515096" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="col-md-4 address">
		<div class="contact-grid1">
			<h4>Alamat</h4>
			<p><?php echo $risi['alamat'] ?></p>
		</div>
		<div class="contact-grid1">
			<h4>Nomer Telpon</h4>
			<p><?php echo $risi['no_telp'] ?></p>
		</div>				
		<div class="contact-grid1">
			<h4>Email</h4>
			<p><a href="mailto:<?php echo $risi['email'] ?>"><?php echo $risi['email'] ?></a></p>
		</div>
		<br>
	</div>
	<div class="clearfix"> </div>
</div>
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
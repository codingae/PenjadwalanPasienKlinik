<!DOCTYPE html>
<html lang="en">
<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 1.0
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Klinik Dokter Pudji Umbaran Peterongan Jombang">
    <meta name="keywords" content="Klinik Dokter Pudji Peterongan Jombang">
    <title>Klinik dr.Pudji Umbaran</title>
    <!-- Favicons-->
    <link rel="icon" href="images/favicon/favicon.ico" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="images/favicon/logo152.png">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="images/favicon/mstile-144x144.png">
    <!-- For Windows Phone -->
    <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <!-- <link href="js/plugins/datatables/material.min.css" type="text/css" rel="stylesheet" media="screen,projection"> -->
    <link href="js/plugins/datatables/dataTables.material.css" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- <link href="js/plugins/datatables/demo.css" type="text/css" rel="stylesheet" media="screen,projection"> -->
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/plugins/datatables/jquery.dataTables.js"></script>
    <script src="js/plugins/datatables/dataTables.material.js"></script>
    <script src="js/plugins/datatables/demo.js"></script>
    <script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {
        $('#tabel').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        } );
        $('#tabel2').DataTable( {
            columnDefs: [
                {
                    targets: [ 0, 1, 2 ],
                    className: 'mdl-data-table__cell--non-numeric'
                }
            ]
        } );
    } );
    </script>    
    <!-- INCLUDED PLUGIN CSS ON THIS PAGE  
    <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">-->
    <link href="css/prism.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="js/plugins/chartist-js/chartist.min.css" type="text/css" rel="stylesheet" media="screen,projection">        
    <link href="js/plugins/jvectormap/jquery-jvectormap.css" type="text/css" rel="stylesheet" media="screen,projection">    
    <!-- lolibox notif -->
    <link href="js/plugins/lolibox/lobibox.css" type="text/css" rel="stylesheet" media="screen,projection">    
    <script type="text/javascript" src="js/plugins/lolibox/lobibox.js"></script>    
    <script type="text/javascript" src="js/plugins/lolibox/notifications.js"></script>
    <script type="text/javascript" src="js/plugins/lolibox/messageboxes.js"></script>  
</head>
<body>
    <!-- Start Page Loading -->
    <!-- <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div> -->
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar background-container">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="light-green accent-3">
                <div class="nav-wrapper">
                    <h1 class="logo-wrapper"><a href="index.php" class="brand-logo darken-1">
                        <img src="images/logo.png"></a> 
                        <span class="logo-text">Logo</span>
                    </h1>
                    <ul class="right hide-on-med-and-down">
                        <li class="search-out">
                            <input type="text" class="search-out-text">
                        </li>
<!--                         <li>    
                            <a href="javascript:void(0);" class="waves-effect waves-block waves-light show-search"><i class="mdi-action-search"></i></a>                              
                        </li> -->
<!--                         <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light"><i class="mdi-social-notifications"></i></a>
                        </li> -->
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <!-- Dropdown Trigger -->                        
<!--                         <li><a href="#" data-activates="chat-out" class="waves-effect waves-block waves-light chat-collapse"><i class="mdi-communication-chat"></i></a>
                        </li> -->
                    </ul>
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->
  <!-- Start Page Loading -->
<!--   <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div> -->
  <!-- End Page Loading -->
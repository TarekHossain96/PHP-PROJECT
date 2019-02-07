<?php 
  include '../lib/Session.php';
  Session::checkSession();
?>
<?php include '../config/config.php';?>
<?php include '../lib/Database.php';?>
<?php include '../helpers/formate.php';?>
<?php 
      $db = new Database();
      $fm = new Formate();
?>
<!-- --------------- Start Cache-Control HTTP Headers ------------- -->
    <?php
      header("Cache-Control: no-cache, must-revalidate"); 
      header("Pragma: no-cache");
      header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
      header("Cache-Control: max-age=2592000"); 
    ?>
<!-- --------------- End Cache-Control HTTP Headers --------------- -->
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="manifest" href="site.webmanifest">
        <link rel="apple-touch-icon" href="icon.png">
        <!-- Place favicon.ico in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/bootstrap.css">

    </head>
    <body class="color">
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

        <!-- Add your site or application content here -->
        <div class="templet">
            <?php
               if (isset($_GET['action']) && $_GET['action'] == "logout") {
                     Session::destroy();
                 }  
            ?>
        <header class="headeroption clear">
            <h2>Admin Area</h2>
            <nav class="mainmenu clear">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="user.php">About</a></li>
                     <li><a href="inbox.php">Inbox
                      <?php
                      $query = "SELECT* FROM tbl_contact WHERE status ='0' ORDER BY id DESC";
                      $msg = $db->select($query); 
                      if ($msg) {
                        $count = mysqli_num_rows($msg);
                        echo "(".$count.")";
                      }else{
                        echo "(0)";
                      }
                      ?>
                     </a></li>
                      
           <li><a href="theme.php">Theme</a></li>
                   
                    <li><a href="?action=logout">Logout</a></li>
                </ul>
            </nav>
        </header>
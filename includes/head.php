<?php
ob_start();

header('Content-type: text/html; charset=utf-8');
date_default_timezone_set('Europe/Paris');

include("../configuration/connect.php");
require ("../connexiondiscord/discord.php");

if (!isset($_SESSION)) {
    session_start();
}

if (isset($_SESSION['user'])) {
    $username = $_SESSION['user']['USERNAME'];
    $id = $_SESSION['user']['ID'];

    $time = time();

    $result = mysqli_query($con, "SELECT * FROM `users` WHERE USERNAME = '$username'") or die(mysqli_error($con));
    while ($row = mysqli_fetch_array($result)) {
        $rank = $row['RANK'];
        $ID_CLIENT = $row['ID_CLIENT'];
        $statusClient = $row['STATUS'];
		$prenom = $row['PRENOM'];
    }
	

    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>LeBonCoin | GrandParisRP</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Site LeBonCoin du serveur grandparisrp" name="description">

  <!-- Favicons -->
  <link href="../assets/img/flavicon.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="../assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="../assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  
    <!-- Autre CSS -->
	<meta name="discord:image" content="http://193.70.77.120/assets/img/intro-img.svg" />
    <link href="../assets/css/style.css" rel="stylesheet">
	<link href="../assets/css/responsive.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
	<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	


  
  	<script>
	window.addEventListener("load", function(){
	window.cookieconsent.initialise({
	  "palette": {
	    "popup": {
	      "background": "#0495D6",
	      "text": "#ffffff"
	    },
	    "button": {
	      "background": "#000000",
	      "text": "#ffffff",
	      "border": "#ffffff"
	    }
	  },
	  "position": "bottom-right",
	  "content": {
	    "message": "Notre site Web utilise des cookies pour vous assurer une meilleure expérience. ",
	    "dismiss": "Accepter",
	    "link": "En savoir plus",
	    "href": "https://leboncoin-grandparisrp.store"
	  }
	})});
	</script>
	  <script src="http://code.jquery.com/jquery-2.0.3.min.js" ></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

</head>

<body>
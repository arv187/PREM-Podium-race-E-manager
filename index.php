<?
// Start the session
require_once("session_start.php");

// Which page is requested?
$page = isset($_GET['page']) ? $_GET['page'] : PAGE_DEFAULT;
if($page == PAGE_ERROR) {
	$error = $_GET['error'];
}
if(!is_file($page . ".php") || (!is_readable($page . ".php"))) {
	$error = "Page '$page' does not exist or is not readable\n";
	$page = PAGE_ERROR;
}

if(!defined("CONFIG")) {
	$error = TITLE . " is not configured\n";
	$page = "error";
}

if($page != "error") {
	if(defined("USE_LOGIN") & defined("USER_MUST_LOGIN")) {
		// Check if user is logged in else kick to login page
		if(!isset($login)) {
			$page = "login";
		}
	}
}

if(defined("USE_MYSQL")) {
	// Connect to the database
	mysqlconnect();
}

// Start output
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title><?=TITLE?> - <?=$config['org']?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="PREM-Podium-Racing-E-Manager is management software for races and race leagues. It can be used to create overviews of race results.">
<meta name="keywords" content="Podium, PREM, manager, racing, assetto corsa, Life for Speed, Rfactor">
<meta name="author" content="Spark, InGuNi">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="refresh" content="900">

<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="w3-colors-signal.css">
<!--
<link rel="stylesheet" type="text/css" href="w3.css">
<link rel="stylesheet" type="text/css" href="font-awesome_min.css">
<link rel="stylesheet" type="text/css" href="style.css">
-->


<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>


<!--[if lt IE 7]>
<script defer type="text/javascript" src="pngfix.js"></script>
<![endif]-->
</head>
<body>

<div id="nav">
<? include("nav.php"); ?>
</div>

<div id="head">
<? include("header.php"); ?>
</div>

<div class="w3-container">
<div id="content">
<? include("msg.php"); ?>
<? include("$page.php"); ?>
</div>
</div>
<!-- Footer -->
<footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
  <a href="#" class="w3-hover-text-indigo"><i class="fa fa-facebook-official"></i></a>
  <a href="#" class="w3-hover-text-red"><i class="fa fa-pinterest-p"></i></a>
  <a href="#" class="w3-hover-text-light-blue"><i class="fa fa-twitter"></i></a>
  <a href="#" class="w3-hover-text-grey"><i class="fa fa-flickr"></i></a>
  <a href="#" class="w3-hover-text-indigo"><i class="fa fa-linkedin"></i></a>
  <p class="w3-medium">Powered by <a href="http://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>

<script>
  // When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>
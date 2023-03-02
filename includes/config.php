<?php

// Site Settings
$siteName = 'http://23.102.4.246/Mob-ster/index.php';
$siteEmail = 'adrian9211@gmail.com';

// Database configuration

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '1xCMat5k5Cb4';
$database = 'mobster';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $database) or die('Could not connect: ' . mysqli_connect_error());


/* Changes are not required, used for internal purpose */
$siteURL = (!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on")?'https://':'http://';
$siteURL = $siteURL.$_SERVER["SERVER_NAME"].dirname($_SERVER['REQUEST_URI']).'/';

?>
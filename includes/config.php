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

?>
<?php
    session_start();
    // if the user is logged in, unset the session
    unset($_SESSION['logged-in']);
    session_destroy();
    header('Location:index.php');
    exit;
?>




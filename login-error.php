

<?php
# Set page title
$page_title = "Login Error";
# Include header file
include('includes/header.php');
include('includes/navbar.php');

?>


<h4 class="latest-text Limelight_latest_text m-5">Login error</h4>

<div class="container m-2">
    <h2>Incorrect username or password. Please try again.</h2>
    <br>
    <br>
</div>

<script>
    setTimeout(function (){ window.location.href= 'http://23.102.4.246/Mob-ster/clientLogin.php';},5000);
</script>

<?php

# Include footer
include('includes/footer.php');
?>

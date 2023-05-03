<?php
$page_title = "Payment Cancelled";
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

    <div class="container">
        <div class="text-center mt-5 mb-5 pt-5">
            <img src="images/fail.png" alt="fail img">
            <h1 class="mb-5 pb-5">Payment couldn't be processed</h1>
        </div>
    </div>

    <script>
        setTimeout(function(){window.location.href = "http://23.102.4.246/Mob-ster/cart.php";}, 3000);
    </script>
<?php
include('includes/footer.php');
?>
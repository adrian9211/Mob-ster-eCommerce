<?php
$page_title = "Payment Successful";
session_start();
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container">
    <div class="text-center mt-5 mb-5 pt-5">
        <img src="images/checked.png" alt="checked img">
        <h1 class="mb-5 pb-5">Payment Successful</h1>
    </div>
</div>
<?php
unset($_SESSION['cart']);
?>
<script>
    setTimeout(function(){window.location.href = "http://23.102.4.246/Mob-ster/index.php";}, 3000);
</script>

<?php
include('includes/footer.php');
?>
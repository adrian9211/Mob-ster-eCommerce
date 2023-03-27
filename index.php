<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
$page_title = "Home Page";

?>

<section>
    <div id="owl-demo" class="owl-carousel owl-theme">
        <div class="item">
            <img src="images/brands/huawei.png" alt="Owl Image">
        </div>
        <div class="item">
            <img src="images/brands/blackberry.png" alt="Owl Image">
        </div>
        <div class="item">
            <img src="images/brands/htc.png" alt="Owl Image">
        </div>
        <div class="item">
            <img src="images/brands/lg.png" alt="Owl Image">
        </div>
        <div class="item">
            <img src="images/brands/nokia.png" alt="Owl Image">
        </div>
        <div class="item">
            <img src="images/brands/apple.png" alt="Owl Image">
        </div>
        <div class="item">
            <img src="images/brands/samsung.png" alt="Owl Image">
        </div>
        <div class="item">
            <img src="images/brands/sony.png" alt="Owl Image">
        </div>
    </div>

    </section>
<section class="header-section">
    <img src="images/headerImage.png" class="img-fluid mx-auto d-block" alt="header1">
    <img src="images/header2Image.png" class="img-fluid mx-auto d-block" alt="header2">
    <img src="images/header3Image.png" class="img-fluid mx-auto d-block" alt="header3">
    <img src="images/header4Image.png" class="img-fluid mx-auto d-block" alt="header4">

</section>

<div class="container">

</div>




<?php
include('includes/footer.php');
?>
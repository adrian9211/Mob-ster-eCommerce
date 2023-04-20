<?php
$totalQuantity = 0;
if(isset($_SESSION['cart'])) {
    foreach($_SESSION['cart'] as $item) {
        $totalQuantity += $item['quantity'];
    }
}
?>


<body>

<!--Navbar section, bootstrap v5.2.3-->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand mb-3" href="./index.php">
            <img src="./images/logo_small4.png" alt="Mobster logo"  class="d-inline-block  align-text-top m-auto ps-5 ps-sm-1">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto  mb-2 mb-lg-0 ">
                <li class="nav-item ps-3 pe-3 p-sm-0 ">
                    <a class="nav-link m-3" href="./index.php">Home</a>
                </li>
                <li class="nav-item ps-3 pe-3 p-sm-0">
                    <a class="nav-link m-3" href="./products.php">Products</a>
                </li>
                <li class="nav-item ps-3 pe-3 p-sm-0">
                    <a class="nav-link m-3" href="./about.php">About</a>
                </li>
                <li class="nav-item  ps-3 pe-3 p-sm-0">
                    <a class="nav-link m-3" href="./contact.php">Contact</a>
                </li>


                <li class="nav-item dropdown ps-3 pe-3 p-sm-0">
                    <a class="nav-link dropdown-toggle m-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" <?php if (isset($_SESSION['logged-in'])) {
                        echo 'style="display:none;"';
                    }
                    else {
                        echo 'style="display:block;"';
                    }
                    ?>>
                        Account
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="adminLogin.php">Admin Login</a></li>
                        <li><a class="dropdown-item" href="clientLogin.php">Client Login</a></li>
                    </ul>
                </li>

                <?php if (isset($_SESSION['logged-in'])) {
                    echo ' <li class="nav-item ps-3 pe-3 p-sm-0">
                    <a class="nav-link m-3"  href="user-dashboard.php">Account</a>
                </li>';
                    echo ' <li class="nav-item ps-3 pe-3 p-sm-0">
                    <a   class="nav-link m-3"  id="logout" href="#" >Logout</a>
                </li>';
                }
                else {
//                            echo 'style="display:none;"';
                }
                ?>


                <li class="cart ps-3 pe-3 p-sm-0 d-flex">
                    <a href="cart.php" class="nav-link m-3">
                        <i class="fas fa-shopping-basket"></i> Basket
                        <?php if(isset($_SESSION['cart'])) { ?>
                            <span class="badge bg-secondary"><?php echo $totalQuantity; ?></span>
                        <?php } ?>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>




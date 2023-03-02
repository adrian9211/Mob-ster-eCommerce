<?php
session_start();
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<body class="bg-dark">
<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Client Login Panel</div>
        <div class="card-body">
            <form method ="POST">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" name="email" id="inputEmail" class="form-control"  required="required" autofocus="autofocus">
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" name="password" id="inputPassword" class="form-control"  required="required">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <input type="submit" name="user_login" class="btn btn-primary" value="Login">
            </form>
            <div class="text-center">
                <a class="m-2" href="includes/register.php">Register an Account</a>
                <a class="m-2" href="client/forgot-password.php">Forgot Password?</a>
                <a class="m-2" href="/index.php">Home</a>
            </div>
        </div>
    </div>
</div>
</body>


<?php
include('includes/footer.php');
?>
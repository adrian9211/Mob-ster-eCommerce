<?php
session_start();
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');
$page_title = "Administrator Login Panel";

if (isset($_POST['admin_login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['email'];

    $query = "SELECT id, Username, Password FROM admin WHERE Username = '$email' AND Password = '$password'";
    $query_run = mysqli_query($conn, $query);
    if(mysqli_fetch_array($query_run)){
        $row = mysqli_fetch_array($query_run);
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];
        $_SESSION['logged-in'] = true;
        $_SESSION['user'] = $email; //set the username session variable
        echo "<script>";
        echo "setTimeout(function (){ window.location.href= 'http://23.102.4.246/Mob-ster/admin-dashboard.php';},10);";
        echo " </script>";
    }
    else{
        $_SESSION['status'] = 'Email/Password is Invalid';
        echo "<script>";
        echo "setTimeout(function (){ window.location.href= 'http://23.102.4.246/Mob-ster/login-error.php';},10);";
        echo " </script>";
    }
}
?>

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Login</div>
        <div class="card-body">

            <form method="POST">
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="password" id="inputPassword" name ="password" class="form-control" placeholder="Password" required="required">
                        <label for="inputPassword">Password</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me">
                            Remember Password
                        </label>
                    </div>
                </div>
                <input type="submit" class="btn btn-primary" name="admin_login" value="Login">
            </form>

            <div class="text-center">
                <a class="d-block small mt-3" href="index.php">Home</a>
                <a class="d-block small" href="includes/forgot-password.php">Forgot Password?</a>
            </div>

        </div>
    </div>
</div>



<?php
include('includes/footer.php');
?>
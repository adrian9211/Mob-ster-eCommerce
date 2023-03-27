<?php
session_start();
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');
$page_title = "Client Login Panel";

if (isset($_POST['user_login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = $_POST['email'];

    $query = "SELECT id, Username, Password FROM users WHERE Username = '$email' AND Password = '$password'";
    $query_run = mysqli_query($conn, $query);
    if(mysqli_fetch_array($query_run)){
        $row = mysqli_fetch_array($query_run);
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $row['id'];
        $_SESSION['logged-in'] = true;
        $_SESSION['user'] = $email; //set the username session variable
        echo "<script>";
        echo "setTimeout(function (){ window.location.href= 'http://23.102.4.246/Mob-ster/user-dashboard.php';},10);";
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
                <a class="m-2" href="usr-register.php">Register an Account</a>
                <a class="m-2" href="includes/forgot-password.php">Forgot Password?</a>
                <a class="m-2" href="index.php">Home</a>
            </div>
        </div>
    </div>
</div>

</body>


<?php
include('includes/footer.php');
?>
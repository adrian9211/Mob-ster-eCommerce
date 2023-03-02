<?php
session_start();
include('includes/config.php');
include('includes/header.php');
include('includes/navbar.php');


if(isset($_POST['admin_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $query_run = mysqli_query($conn, $query);

    if(mysqli_fetch_array($query_run)) {
        $_SESSION['email'] = $email;
        header('Location: admin/dashboard.php');
    } else {
        $_SESSION['status'] = 'Email or password is invalid';
        header('Location: adminLogin.php');
    }
}
?>

<body>

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
                <a class="d-block small mt-3" href="/index.php">Home</a>
                <a class="d-block small" href="includes/forgot-password.php">Forgot Password?</a>
            </div>

        </div>
    </div>
</div>

</body>


<?php
include('includes/footer.php');
?>
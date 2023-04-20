<!--Server Side Scripting To inject Login-->
<?php
  session_start();
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/config.php');
  if(isset($_POST['add_user']))
    {
            $FirstName= $_POST['FirstName'];
            $Surname = $_POST['Surname'];
            $Username= $_POST['Username'];
            $Password= $_POST['Password'];
            $Phone= $_POST['Phone'];
            $Address= $_POST['Address'];
            $checkUser = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$Username'");
                if (mysqli_num_rows($checkUser) > 0) {
                    $err= "Account already exists";
                    echo "<script>";
                    echo "setTimeout(function (){ window.location.href= 'http://23.102.4.246/Mob-ster/clientLogin.php';},5000);";
                    echo "</script>";

                } else {
                    $sql = mysqli_prepare($conn, "INSERT INTO `users` (Username, Password, FirstName, Surname, Phone, Address) VALUES ('$_POST[Username]', '$_POST[Password]', '$_POST[FirstName]', '$_POST[Surname]', '$_POST[Phone]', '$_POST[Address]')");

                    if($sql !== FALSE){
                        if(mysqli_stmt_execute($sql)){
                            $succ= "Account Created";
                            echo "<script>";
                            echo "setTimeout(function (){ window.location.href= 'http://23.102.4.246/Mob-ster/clientLogin.php';},5000);";
                            echo "</script>";
                        } else {
                            echo mysqli_stmt_error($sql);
                        }
                    } else{
                        echo mysqli_error($conn);
                    }
                }


}
?>




<section class="bg-dark">
    <?php if(isset($succ)) {?>
        <!--This code for injecting an alert-->
        <script>
            setTimeout(function ()
                {
                    Swal.fire({
                        position: 'Center',
                        icon: 'success',
                        title: 'Your successfully registered',
                        text: 'You will be redirected to the login page in 5 seconds',
                        showConfirmButton: false,
                        timer: 5000
                    })
                },
                100);
        </script>

    <?php } ?>
    <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
            setTimeout(function ()
                {
                    Swal.fire({
                        position: 'Center',
                        icon: 'warning',
                        title: 'Your account already exists, Please login',
                        text: 'You will be redirected to the login page in 5 seconds',
                        showConfirmButton: false,
                        timer: 5000
                    })
                },
                100);
        </script>

    <?php } ?>
<div class="container">
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Create An Account With Us</div>
        <div class="card-body">
            <!--Start Form-->
            <form method = "post">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <input type="text" required class="form-control" id="exampleInputEmail1" name="FirstName">
                                <label for="firstName">First name</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Surname">
                                <label for="lastName">Last name</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-label-group">
                                <input type="text" class="form-control" id="exampleInputEmail1" name="Phone">
                                <label for="lastName">Contact Number</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-label-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" name="Address">
                        <label for="inputEmail">Address</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-label-group">
                        <input type="email" class="form-control" name="Username"">
                        <label for="inputEmail">Email address</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-label-group">
                                <input type="password" class="form-control" name="Password" id="exampleInputPassword1">
                                <label for="inputPassword">Password</label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" name="add_user" class="btn btn-success">Create Account</button>
            </form>
            <!--End FOrm-->
            <div class="text-center">
                <a class="d-block small mt-3" href="clientLogin.php">Login Page</a>
                <a class="d-block small" href="usr-forgot-pwd.php">Forgot Password?</a>
            </div>

        </div>
    </div>
</div>

</section>


<?php
include ('includes/footer.php');
?>

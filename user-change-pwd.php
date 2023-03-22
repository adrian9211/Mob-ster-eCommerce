
<?php
# Set page title
$page_title = "User Profile";
session_start();
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/config.php');
include ('includes/checklogin.php');
$user = $_SESSION['user'];
check_login();
$aid=$_SESSION['id'];

// if statement to check if user is logged in
if(isset($_SESSION['logged-in'])) {

    if (isset($_POST['update_password']))
    {
        $resultSingleUser = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$user'");
        $row = mysqli_fetch_array($resultSingleUser, MYSQLI_ASSOC);
        $databasePassword = $row['Password'];
//        $databasePassword = "SELECT Password FROM users WHERE Username = '$user'";
        $oldPassword = $_POST['OldPassword'];
        $newPassword1 = $_POST['NewPassword1'];
        $newPassword2 = $_POST['NewPassword2'];

        if ($oldPassword == null ) {
            $error1 =  "Please enter your old password";
        }
        elseif ($oldPassword != $databasePassword) {
            $error2 = "Please provide correct old password";
        }
        elseif ($newPassword1 != $newPassword2) {
            $error3 = "Please make sure your new passwords match";
        }
        else {
            $updateQuerry = "UPDATE users SET Password = '$_POST[NewPassword2]' WHERE Username = '$user'";
            mysqli_query($conn, $updateQuerry) or die ("couldn't run query");
            if (mysqli_query($conn, $updateQuerry)) {
                $success = "Profile Updated";
            } else {
                $error = "Please Try Again Later";
                echo "Error updating record: " . mysqli_error($conn);
            }
        }
    }
    ?>


    <!--    Content of the page-->

<!--Modal messages for each scenario -->
    <div class="container">
        <?php if(isset($success)) {?>
            <!--This code for injecting an alert-->
            <script>
                setTimeout(function ()
                    {
                        Swal.fire({
                            position: 'Center',
                            icon: 'success',
                            title: 'Your password has been changed',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    },
                    100);
            </script>

        <?php } ?>
        <?php if(isset($error1)) {?>
            <!--This code for injecting an alert-->
            <script>
                setTimeout(function ()
                    {
                        Swal.fire({
                            position: 'Center',
                            icon: 'warning',
                            title: 'Please enter your old password',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    },
                    100);
            </script>

        <?php } ?>

        <?php if(isset($error2)) {?>
            <!--This code for injecting an alert-->
            <script>
                setTimeout(function ()
                    {
                        Swal.fire({
                            position: 'Center',
                            icon: 'warning',
                            title: 'Please provide correct old password',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    },
                    100);
            </script>

        <?php } ?>

        <?php if(isset($error3)) {?>
            <!--This code for injecting an alert-->
            <script>
                setTimeout(function ()
                    {
                        Swal.fire({
                            position: 'Center',
                            icon: 'warning',
                            title: 'Please make sure your new passwords match',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    },
                    100);
            </script>

        <?php } ?>
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="user-dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="user-view-profile.php">Profile</a>
            </li>
            <li class="breadcrumb-item active">Change Password</li>
        </ol>

        <hr>
        <div class="card">
            <div class="card-header">
                Update Password
            </div>
            <div class="card-body">

                <form method ="POST">
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Old Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1" name="OldPassword" required >
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">New Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1"  name="NewPassword1" required>
                    </div>
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Confirm Password</label>
                        <input type="password" class="form-control" id="exampleInputEmail1"  name="NewPassword2" required>
                    </div>

                    <button type="submit" name="update_password" value="update_password"  class="btn btn-outline-danger">Change Pasword</button>
                </form>
                <!-- End Form-->
            </div>
        </div>

        <hr>
    </div>
    <!-- /.content-wrapper -->

    <!-- /#wrapper -->

    <!--    Content of the page-->


    <?php
}
// else statement to checked if user is logged in
else {
    echo '<div class="container">';
    echo 'not logged yet';
    echo '<br>';
    echo 'Please login';
    echo '<br>';
    echo 'You will be redirected to the main page in 5 seconds';
    echo '</div>';
    echo '<script>';
    echo 'setTimeout(function(){window.location.href = "http://23.102.4.246/Mob-ster/clientLogin.php";}, 5000);';
    echo '</script>';
};
// end of else statement
?>



<?php
include('includes/footer.php');
?>
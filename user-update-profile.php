
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

    if (isset($_POST['Update']))
    {
        $updateQuerry = "UPDATE users SET Username = '$_POST[Username]' ,FirstName = '$_POST[FirstName]', Surname = '$_POST[Surname]' , Phone = '$_POST[Phone]', Address = '$_POST[Address]' WHERE Username = '$user'";
        mysqli_query($conn, $updateQuerry) or die ("couldn't run query");
        if (mysqli_query($conn, $updateQuerry)) {
            $success = "Profile Updated";
        } else {
            $error = "Please Try Again Later";
            echo "Error updating record: " . mysqli_error($conn);
        }


    }
    if (isset($_POST['delete']))
    {
        $deleteQuerry = "DELETE FROM users WHERE id = '$_POST[hidden]'";
        mysqli_query($conn, $deleteQuerry) or die ("couldn't run query");
        //            echo 'User deleted';
    }

    if (isset($_POST['insert']))
    {
        $insertQuerry = "INSERT INTO users (Username, Password, FirstName, Surname) VALUES ('$_POST[Username]', '$_POST[Password]','$_POST[FirstName]', '$_POST[Surname]')";
        mysqli_query($conn, $insertQuerry)
        or die ("couldn't run query");
        //            echo "New User record inserted";
    }

    if (isset($_POST['updateSingleUser']))
    {
        $updateQuerry = "UPDATE users SET Username = '$_POST[Username]', Password = '$_POST[Password]', FirstName = '$_POST[FirstName]', Surname = '$_POST[Surname]'  WHERE id = '$_POST[hidden]'";
        mysqli_query($conn, $updateQuerry) or die ("couldn't run query");
        //            echo "Record updated";
    }

    $result = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$user'");
    $resultAdmin = mysqli_query($conn, "SELECT * FROM users");

    function registerUser() {
        echo "<form action='user-dashboard.php' method='post'>";
        echo "<tr>";
        echo "<td><input type='text' class='form-control' name='hidden' placeholder='Do not need to be filled up  ' value='" . $row['id'] . "'></td>";
        echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
        echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
        echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
        echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
        echo "<td><input type='submit' name='insert' class='btn btn-primary' onclick='insertUser()' value='insert'></td>";
        echo "</tr>";
        echo "</form>";
    };

    ?>


    <!--    Content of the page-->


    <div class="container">
        <?php if(isset($success)) {?>
            <!--This code for injecting an alert-->
            <script>
                setTimeout(function ()
                    {
                        Swal.fire({
                            position: 'Center',
                            icon: 'success',
                            title: 'Your profile has been updated',
                            showConfirmButton: false,
                            timer: 2500
                        })
                    },
                    100);
            </script>

        <?php } ?>
        <?php if(isset($error)) {?>
            <!--This code for injecting an alert-->
            <script>
                setTimeout(function ()
                    {
                        Swal.fire({
                            position: 'Center',
                            icon: 'warning',
                            title: 'Your profile could not be updated',
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
            <li class="breadcrumb-item active">Update Profile</li>
        </ol>

        <h2>Profile</h2>
        <div class="row justify-content-center">
            <?php
            //                                get details of logged in User
            $aid=$_SESSION['logged-in'];
            $profileData= mysqli_query($conn, "select Username, FirstName, Surname, Phone, Address  from users where Username = '$user'");

            while($row = mysqli_fetch_array($profileData, MYSQLI_ASSOC))
            {
                ?>
                <!--Update Details-->
                <form method ="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First Name</label>
                        <input type="text" value="<?php echo $row['FirstName']?>" required class="form-control" id="exampleInputEmail1" name="FirstName">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $row['Surname']?>" id="exampleInputEmail1" name="Surname">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Username</label>
                        <input type="text" class="form-control" value="<?php echo $row['Username']?>" id="exampleInputEmail1" name="Username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone</label>
                        <input type="text" class="form-control" value="<?php echo '0'. $row['Phone']?>" id="exampleInputEmail1" name="Phone">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" value="<?php echo $row['Address']?>" id="exampleInputEmail1" name="Address">
                    </div>

                    <div class="form-group" style="display:none">
                        <label for="exampleInputEmail1">Category</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" value="User" name="u_category">
                    </div>
                    <input type="submit" name="Update" value="Update" class="btn btn-outline-success mt-3">
                </form>
            <?php }?>
        </div>
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

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

    if (isset($_POST['update']))
    {
        $updateQuerry = "UPDATE users SET Username = '$_POST[Username]', Password = '$_POST[Password]' ,FirstName = '$_POST[FirstName]', Surname = '$_POST[Surname]' WHERE id = '$_POST[hidden]'";
        mysqli_query($conn, $updateQuerry) or die ("couldn't run query");
        //            echo "Record updated";
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

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="user-dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="user-view-profile.php">Profile</a>
            </li>
            <li class="breadcrumb-item active">View Profile</li>
        </ol>

        <h2>Profile</h2>
        <div class="row">
            <?php
            //                                get details of logged in User
            $aid=$_SESSION['logged-in'];
            $profileData= mysqli_query($conn, "select Username, FirstName, Surname, Phone, Address  from users where Username = '$user'");

            while($row = mysqli_fetch_array($profileData, MYSQLI_ASSOC))
            {
                ?>
                <!--Profile Details-->
                <div class="card col-md-8" >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['FirstName']?> <?php echo $row['Surname']?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Email Address / Username:</b> <?php echo $row['Username']?></li>
                    </ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Phone</b> <?php echo '0' . $row['Phone']?></li>
                    </ul>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Address</b> <?php echo $row['Address']?></li>
                    </ul>
                    <div class="card-body">
                        <a href="user-update-profile.php" class="btn btn-outline-primary card-link "><i class ="fa fa-user-edit"></i> Update Profile</a>
                        <a href="user-change-pwd.php" class="btn btn-outline-primary card-link"><i class ="fa fa-key"></i> Change Password</a>
                    </div>
                </div>
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
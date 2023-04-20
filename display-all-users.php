<?php
# Set page title
$page_title = "User Dashboard";
session_start();
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/config.php');
include ('includes/checklogin.php');
$user = $_SESSION['user'];
check_login();
$aid=$_SESSION['u_id'];

// if statement to check if user is logged in
if(isset($_SESSION['logged-in'])) {

    if (isset($_POST['update']))
    {
        $updateQuerry = "UPDATE users SET Username = '$_POST[Username]', Password = '$_POST[Password]' ,FirstName = '$_POST[FirstName]', Surname = '$_POST[Surname]', Phone = '$_POST[Phone]', Address = '$_POST[Address]' WHERE id = '$_GET[id]'";
        mysqli_query($conn, $updateQuerry) or die ("couldn't run query");
    }
    if (isset($_POST['delete']))
    {
        $deleteQuerry = "DELETE FROM users WHERE id = '$_POST[id]'";
        mysqli_query($conn, $deleteQuerry) or die ("couldn't run query");
    }

    ?>


    <div class="container">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="admin-dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Display all customers</li>
    </ol>

    <!-- Icon Cards-->
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-user"></i>
                    </div>
                    <div class="mr-5">My Profile</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="admin-view-profile.php">
                    <span class="float-left">View</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-cart-shopping"></i>
                    </div>
                    <div class="mr-5">Products management</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="admin-products-management.php">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-user"></i>
                    </div>
                    <div class="mr-5">All customers</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="display-all-users.php">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fas fa-fw fa-store"></i>
                    </div>
                    <div class="mr-5">Our Offer</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="products.php">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>




    <div class="row">
        <div class="col-12">

            <?php
            $resultSingleUser = mysqli_query($conn, "SELECT * FROM users");


            echo "<div class='all users'>";

            echo "<table border='1'>
                        <tr>
                            <th>Username</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>";

            while ($row = mysqli_fetch_array($resultSingleUser, MYSQLI_ASSOC)) {
                echo "<form action='display-all-users.php' method='post'>";
                echo "<tr>";
                echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
                echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
                echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
                echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
                echo "<td><input type='text' class='form-control' name='Phone' value='" . $row['Phone'] . "'></td>";
                echo "<td><input type='text' class='form-control' name='Address' value='" . $row['Address'] . "'></td>";
                echo "<td><input type='submit' name='update' class='btn btn-success'  value='update'></td>";
                echo "<td><input type='submit' name='delete' class='btn btn-danger'   value='delete'></td>";
                echo "</tr>";
                echo "</form>";
            }
            echo "</table>";

            echo "</div>";
            ?>
        </div>

    </div>






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
    echo 'setTimeout(function(){window.location.href = "http://23.102.4.246/Mob-ster/adminLogin.php";}, 5000);';
    echo '</script>';
};
// end of else statement
?>

    </div>


<?php
include('includes/footer.php');
?>
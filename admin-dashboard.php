<?php
    # Set page title
    $page_title = "Admin Dashboard";
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


        <div class="container">
            <p class="text-center m-3 ">
                <a class="btn btn-info mt-2" data-bs-toggle="collapse" href="#multiCollapseExample6" role="button" aria-expanded="false" aria-controls="multiCollapseExample6">Hide all details</a>
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="collapse show " id="multiCollapseExample6">
                        <div>Welcome : <?php
                            echo "$user . You are successfully logged in";
                            echo "<br>";

                            ?>
                        </div>
                        <br>
                        <p>Great to see you again</p>
                        <br>
                    </div>
                    <?php
                    $resultSingleUser = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$user'");

                    echo "<div class='single user'>";

                    echo "<table border='1'>
                        <tr>
                            <th>UserID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Surname</th>
                        </tr>";

                    while ($row = mysqli_fetch_array($resultSingleUser, MYSQLI_ASSOC)) {
                        echo "<form action='user-dashboard.php' method='post'>";
                        echo "<tr>";
                        echo "<td><input type='text' class='form-control' name='hidden' value='" . $row['UserID'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
                        echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
                        echo "<td><input type='submit' name='updateSingleUser' class='btn btn-success'  value='updateSingleUser'></td>";
                        echo "<td><input type='submit' name='delete' class='btn btn-danger'  onclick='deleted()' value='delete'></td>";
                        echo "</tr>";
                        echo "</form>";
                    }
                    echo "</table>";

                    echo "</div>";
                    ?>
                    <div class="container p-0">
                        <p class="text-center m-3 ">
                            <a class="btn btn-primary mt-2" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">Add Movie</a>
                            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Edit Movies</button>
                            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Display Movies</button>
                            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">Edit Users</button>
                            <button class="btn btn-primary mt-2 " type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">Display your details</button>
                            <button class="btn btn-primary  mt-2" type="button" data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2 multiCollapseExample3 multiCollapseExample4 multiCollapseExample5">Show all</button>
                        </p>
                        <div class="row">
                            <div class="col-12">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <?php
                                    echo "<h2>Add new movie</h2>";
                                    ?>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="collapse multi-collapse" id="multiCollapseExample2">

                                </div>
                            </div>
                            <div class="col-12">
                                <div class="collapse multi-collapse" id="multiCollapseExample3">
                                    <h2>Available movies</h2>
                                    <div class="container">
                                        <div class="row justify-content-md-center">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-5">
                                <div class="collapse multi-collapse" id="multiCollapseExample4">
                                    <?php
                                    $resultAdmin = mysqli_query($conn, "SELECT * FROM users");
                                    echo "<table border='1'>
                        <tr>
                            <th>UserID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            
                        </tr>";
                                    while ($row = mysqli_fetch_array($resultAdmin, MYSQLI_ASSOC)) {
                                        echo "<form action='user-dashboard.php' method='post'>";
                                        echo "<tr>";
                                        echo "<td><input type='text' class='form-control' name='hidden' value='" . $row['id'] . "'></td>";
                                        echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
                                        echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
                                        echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
                                        echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
                                        echo "<td><input type='submit' name='update' class='btn btn-success'  value='update'></td>";
                                        echo "<td><input type='submit' name='delete' class='btn btn-danger'   value='delete'></td>";
                                        echo "</tr>";
                                        echo "</form>";
                                    }
                                    registerUser(); // calling function to insert new user
                                    echo "</table>";

                                    ?>
                                </div>
                            </div>

                            <div class="col-12 mb-5">
                                <div class="collapse multi-collapse" id="multiCollapseExample5">
                                    <?php
                                    $resultSingleUser = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$user'");

                                    echo "<div class='single user'>";

                                    echo "<table border='1'>
                        <tr>
                            <th>UserID</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>First Name</th>
                            <th>Surname</th>
                            <th>Date of birth</th>
                        </tr>";

                                    while ($row = mysqli_fetch_array($resultSingleUser, MYSQLI_ASSOC)) {
                                        echo "<form action='user-dashboard.php' method='post'>";
                                        echo "<tr>";
                                        echo "<td><input type='text' class='form-control' name='hidden' value='" . $row['UserID'] . "'></td>";
                                        echo "<td><input type='text' class='form-control' name='Username' value='" . $row['Username'] . "'></td>";
                                        echo "<td><input type='text' class='form-control' name='Password' value='" . $row['Password'] . "'></td>";
                                        echo "<td><input type='text' class='form-control' name='FirstName' value='" . $row['FirstName'] . "'></td>";
                                        echo "<td><input type='text' class='form-control' name='Surname' value='" . $row['Surname'] . "'></td>";
                                        echo "<td><input type='submit' name='updateSingleUser' class='btn btn-success'  value='updateSingleUser'></td>";
                                        echo "<td><input type='submit' name='delete' class='btn btn-danger'  onclick='deleted()' value='delete'></td>";
                                        echo "</tr>";
                                        echo "</form>";
                                    }
                                    echo "</table>";

                                    echo "</div>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    echo 'setTimeout(function(){window.location.href = "http://23.102.4.246/Mob-ster/clientLogin.php";}, 5000);';
    echo '</script>';
};
// end of else statement
?>

    </div>


<?php
include('includes/footer.php');
?>
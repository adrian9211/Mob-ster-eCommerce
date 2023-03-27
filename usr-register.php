<!--Server Side Scripting To inject Login-->
<?php
  //session_start();
  include('vendor/inc/config.php');
  if(isset($_POST['add_user']))
    {

            $FirstName=$_POST['FirstName'];
            $Surname = $_POST['Surname'];
            $Username=$_POST['Username'];
            $Password=$_POST['Password'];
            $Phone=$_POST['Phone'];
            $Address=$_POST['Address'];
        $checkUser = mysqli_query($conn, "SELECT * FROM users WHERE Username = '$Username'");
        if (mysqli_num_rows($checkUser) > 0) {
            echo "Username already exists - Please Login or choose another username";
        } else {
            $sql = mysqli_prepare($conn, "INSERT INTO `users` (Username, Password, FirstName, Surname, Phone, Address) VALUES ('$_POST[Username]', '$_POST[Password]', '$_POST[FirstName]', '$_POST[Surname]', '$_POST[Phone]', '$_POST[Address]')");
            if($sql !== FALSE){
                if(mysqli_stmt_execute($sql)){
                    echo "New record created successfully";
                    echo "<br>";
                    echo "You will be redirected to the login page in 5 seconds";
                    header("location:members.php?user=$Username");
                } else {
                    echo mysqli_stmt_error($sql);
                }
            } else{
                echo mysqli_error($conn);
            }
        }
    }
?>
<!--End Server Side Scriptiong-->
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Tranport Management System, Saccos, Matwana Culture">
  <meta name="author" content="MartDevelopers ">

  <title>Transport Managemennt System Client- Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="vendor/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-dark">
<?php if(isset($succ)) {?>
                        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Success!","<?php echo $succ;?>!","success");
                    },
                        100);
        </script>

        <?php } ?>
        <?php if(isset($err)) {?>
        <!--This code for injecting an alert-->
        <script>
                    setTimeout(function () 
                    { 
                        swal("Failed!","<?php echo $err;?>!","Failed");
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
            <div class="form-row">
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
                  <label for="phone">Contact</label>
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
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
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

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <!--INject Sweet alert js-->
 <script src="vendor/js/swal.js"></script>

</body>

</html>

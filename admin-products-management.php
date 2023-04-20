<?php
# Set page title
$page_title = "Products management";
session_start();
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/config.php');
include ('includes/checklogin.php');
$user = $_SESSION['user'];
check_login();
$aid=$_SESSION['u_id'];
// Connect to the database
$con = mysqli_connect('localhost', 'root', '1xCMat5k5Cb4', 'mobster')
// Check connection
or die ("could not connect network");
    $query = " select * from products";
    $result = mysqli_query($con,$query);
    
    ?>



<div class="col ">



    <div class="container">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="admin-dashboard.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="admin-products-management.php">Manage products</a>
            </li>
            <li class="breadcrumb-item active">View Products</li>
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

        <h1 class="text-center">Manage products</h1>
<br><br>
<hr>
        <a href="add.php" class="btn btn-primary my-3">Add Product</a>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>



            </tr>
            <tbody>
                <?php
            // Connect to the database
                $con = mysqli_connect('localhost', 'root', '1xCMat5k5Cb4', 'mobster')
            // Check connection
            or die ("could not connect network");

            // Select all products from the products table
            $sql = "SELECT * FROM products";
            $result = mysqli_query($con, $sql);
            // Loop through the result set and display the products
            while($product = mysqli_fetch_assoc($result)) {

                $id = $product['id'];
                $category = $product['Category'];
                $image = $product['file_name'];
                $title = $product['Title'];
                $description = $product['Description'];
                $price = $product['Price'];
            
                ?>


                <td><?php echo $id ?></td>
                <td><?php echo $category ?></td>
                <td> <img style='height:130px;  width:120px' src='uploads/<?php echo $product ['file_name']; ?>'
                        alt='<?php echo $product ['file_name']; ?>'></td>
                <td><?php echo $title ?></td>
                <td><?php echo $description?></td>
                <td><?php echo $price?></td>

                <td> <a class="btn btn-warning" href="edit.php?GetID=<?php echo $id?>">Edit</a></td>
                <td><a class="btn btn-danger" href="delete.php?Del=<?php echo $id?>">Delete</a> </td>


                <?php
              echo "</tr>";
            }
            // Close the database connection
            mysqli_close($con);
          ?>
            </tbody>
        </table>
    </div>


</div>



<?php
include('includes/footer.php');
?>
<?php
$page_title = "Edit Product";
session_start();
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/config.php');

$id = $_GET['GetID'];
$query = " select * from products where id='".$id."'";

$result = mysqli_query($conn,$query);

while($row=mysqli_fetch_assoc($result))
{
    $category = $row['Category'];
    $title = $row['Title'];
    $description = $row['Description'];
    $price = $row['Price'];
    $image = $row['file_name'];

}

?>

        <div class="container">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="admin-dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="admin-products-management.php">Manage products</a>
                </li>

                <li class="breadcrumb-item active">Edit product</li>
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

            <div class="row mb-5">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-warning text-white text-center py-3">Edit Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="update.php?id=<?php echo $id ?>" method="post">
                                <select class="form-control mb-2 form-select" name="Category">
                                    <option value="category" disabled>Select category</option>
                                    <option value="Iphone" <?php if ($category === 'Iphone') { echo 'selected'; } ?>>
                                        Iphone</option>
                                    <option value="Samsung" <?php if ($category === 'Samsung') { echo 'selected'; } ?>>
                                        Samsung</option>
                                    <option value="Huawei" <?php if ($category === 'Huawei') { echo 'selected'; } ?>>
                                        Huawei</option>
                                    <option value="sony" <?php if ($category === 'sony') { echo 'selected'; } ?>>sony
                                    </option>

                                </select>
                                <input type="text" class="form-control mb-2" name="Title" placeholder="Title"
                                    value="<?php echo $title ?>">

                                <textarea class="form-control mb-2" name="Description"
                                    placeholder="Description"><?php echo $description?></textarea>
                                <input type="text" class="form-control mb-2" name="Price" placeholder="Price"
                                    value="<?php echo $price ?>">
                                <input type="text" class="form-control mb-2" placeholder="image name" name="file_name"
                                    value="<?php echo $image ?>">
                                <button type="submit" class="btn btn-warning" name="update">Update</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include('includes/footer.php');
?>

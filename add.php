<?php
$page_title = "Add Product";
session_start();
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/config.php');

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
                <li class="breadcrumb-item active">Add product</li>
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

            <div class="text-center">
                <h2 class="text-success">Add new product</h2>
            </div>

            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="card mt-5">
                        <div class="card-title">
                            <h3 class="bg-primary text-white text-center py-3">Add new Product</h3>
                        </div>
                        <div class="card-body">
                            <form action="insert.php" method="post">
                                <label for="Title">Title:</label>
                                <input type="text" class="form-control mb-2" name="Title" >

                                <label for="Brand">Brand:</label>
                                <select class="form-control mb-2 form-select" name="Brand" >
                                    <option value="" disabled selected>Select brand</option>
                                    <option value="Iphone">Iphone</option>
                                    <option value="Samsung">Samsung</option>
                                    <option value="Huawei">Huawei</option>
                                    <option value="Sony">Sony</option>
                                </select>

                                <label for="Description">Description:</label>
                                <textarea class="form-control mb-2" name="Description" rows="5" ></textarea>

                                <label for="Category">Category:</label>
                                <select class="form-control mb-2 form-select" name="Category" >
                                    <option value="" disabled selected>Select category</option>
                                    <option value="Smartphone">Smartphone</option>
                                    <option value="Phone case">Phone case</option>
                                    <option value="Tripod">Tripod</option>
                                    <option value="Headphones">Haedphones</option>
                                </select>

                                <label for="Stock">Stock:</label>
                                <input type="number" class="form-control mb-2" name="Stock" step="1" >

                                <label for="Colour">Colour</label>
                                <input type="text" class="form-control mb-2" name="Colour"  >

                                <label for="Colour">Colour</label>
                                <input type="text" class="form-control mb-2" name="Colour2"  >

                                <label for="Colour">Colour</label>
                                <input type="text" class="form-control mb-2" name="Colour3"  >

                                <label for="Colour">Colour</label>
                                <input type="text" class="form-control mb-2" name="Colour4"  >

                                <label for="Colour">Colour</label>
                                <input type="text" class="form-control mb-2" name="Colour5"  >

<!--                                <label for="file_name">Image</label>-->
<!--                                <input type="file" class="form-control mb-2" name="file" >-->

                                <label for="Price">Price:</label>
                                <input type="number" class="form-control mb-2" name="Price" step="0.01" >

                                <button type="submit" class="btn btn-primary" name="submit">Add Product</button>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
include('includes/footer.php');
?>

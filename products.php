<?php
$page_title = "Products";

session_start();
include('includes/header.php');
include('includes/navbar.php');
include ('includes/config.php');

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


    <div class="container mt-5">
        <h1>Our offer</h1>
        <div class="row">
            <?php
            $con = mysqli_connect('localhost', 'root', '1xCMat5k5Cb4', 'mobster')
            or die ("could not connect network");

            $query = "SELECT id, Title, Brand, Description, Category, Stock, file_name, Price, quantity FROM products";
            $result = mysqli_query($con, $query);



            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $category = $row['Category'];
                $title = $row['Title'];
                $description = $row['Description'];
                $price = $row['Price'];
                $image = $row['file_name'];

                ?>
            <div class="col-12 col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <a  href="single-product.php?id= <?php echo $row['id']; ?>">
                    <img src="uploads/<?php echo $row['file_name']; ?>" alt="<?php echo $row['file_name']; ?>"
                         class="card-img-top img-fluid">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $title; ?></h5>
                        <p class="card-text"><?php echo $description; ?></p>
                        <p class="card-text"><?php echo $price; ?></p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#productModal-<?php echo $id; ?>">View Product</button>
                    </div>
                </div>

                <!-- Product Modal -->
                <div class="modal fade" id="productModal-<?php echo $id; ?>" tabindex="-1"
                     aria-labelledby="productModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="productModalLabel"><?php echo $title; ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <img src="uploads/<?php echo $image; ?>" alt="<?php echo $image; ?>"
                                     class="img-fluid mb-3">
                                <p class="card-text"><?php echo $description; ?></p>
                                <p class="card-text"><?php echo $price; ?></p>
                                <form action="add-to-basket.php" method="post">
                                    <input type="hidden" name="product_id" value="<?php echo $id; ?>">
                                    <div class="form-group mb-3">
                                        <label for="quantity">Quantity:</label>
                                        <input type="number" id="quantity" name="quantity" value="1" min="1"
                                               max="10" class="form-control">
                                    </div>
                                    <div class="d-grid">
                                        <button type="submit" class="btn btn-primary">Add to Basket</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <?php
            }
            ?>
        </div>
        </div>
        </div>





<?php
include('includes/footer.php');
?>
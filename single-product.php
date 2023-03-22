<?php
$page_title = "Single Product";

session_start();
include('includes/header.php');
include('includes/navbar.php');
include ('includes/config.php');

?>

    <body>

    <div class="general">
        <div class="container">
            <div class="row justify-content-md-center">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM products WHERE id = " . $_GET['id']);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                    $id = $row['id'];
                    $category = $row['category'];
                    $title = $row['title'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $image = $row['image'];
                    $stock = $row['Stock'];
                    echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column'> ";
                    echo "<h3 class='hvr-shutter-out-horizontal card-img-top'><img src='uploads/" . $row['file_name'] . "' title='album-name' class='card-img-top' alt='File from database ".$row['file_name2']."' />
                                ";
                    echo "</h3>";
                    echo "</div>";
                    echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column '>";
                    echo "<h3 class='hvr-shutter-out-horizontal card-img-top '><img src='uploads/" . $row['file_name2'] . "' title='album-name' class='img-fluid' alt='File from database ".$row['file_name2']."' />
                                ";
                    echo "</h3>";
                    echo "<h6 class='card-title'><b>" .$row['Brand'].' '. $row['Title'] . "</b></h6>";
                    echo "<p class='card-text'>" . $row['Description'] . "</p>";
                    echo "<br>";
                    echo "<div class='mid-2 agile_mid_2_home'>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-6 col-xsm-6'>";
                    echo "<h6>Category</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Stock Available</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Price</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Available colours</h6>";
                    echo "</div>";
                    echo "<div class='col-md-6 col-xsm-6'>";
                    echo "<h6 class='card-title'>" . $row['Category'] . "</h6>";
                    echo "<br>";
                    if ($stock > 0) {
                        echo "<h6 class='card-title'>" . $row['Stock'] . "</h6>";
                    } else {
                        echo "<h6 class='card-title' style='background-color: red;' >" . $row['Stock'] . "</h6>";

                    }
                    echo "<br>";
                    echo "<h6 class='card-title'>" . '£'. $row['Price'] . "</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>" . $row['Colour1'] .' ' .$row['Colour2'].' '. $row['Colour3'].' ' . $row['Colour4'] .' '. $row['Colour5'] .' '." </h6>";
                    echo "<br>";
//                    echo '<option value="" disabled selected>Please choose colour</option>';
//                    foreach ($row as $Colour1 => $itemColour1) {
//                        echo '<option value="' . $itemColour1 . '">' . $itemColour1 . '</option>';
//                    }
//                    echo '</select></div>';
                    echo "<form action='add-to-basket.php' method='post'>";
                    echo "<input type='hidden' name='product_id' value='" . $row['id'] . "'>";
                    echo "<div class='form-group mb-3'>";
                    echo "<label for='quantity'>Quantity:</label>";
                    echo "<input type='number' id='quantity' name='quantity' value='1' min='1' max='10' class='form-control'>";
                    echo "</div>";
                    echo '<div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Add to Basket</button>
                          </div>';
                    echo "</form>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                };
                ?>

            </div>
        </div>
    </div>


    </body>



<?php
include('includes/footer.php');
?>
<?php
# Set page title
$page_title = "Single movie";
# Include header file
include('includes/header.php');
require_once ("db.php");

//if (isset($_GET['MovieID'])) {
////        // Prepare statement and execute, prevents SQL injection
//    $stmt = $conn->prepare('SELECT * FROM movies WHERE MovieID = ?');
//    $stmt->execute([$_GET['MovieID']]);
////    // Fetch the product from the database and return the result as an Array
//    $product = $stmt->fetch(PDO::FETCH_ASSOC);
////    // Check if the product exists (array is not empty)
////    if (!$product) {
////        // Simple error to display if the id for the product doesn't exists (array is empty)
////        exit('Product does not exist!');
////    }
////} else {
////    // Simple error to display if the id wasn't specified
////    exit('Product does not exist!');
////}
$result = mysqli_query($conn, "SELECT file_name_narrow FROM movies WHERE MovieID = " . $_GET['MovieID']);
$row = mysqli_fetch_array($result);
echo "<img src='uploads/" . $row['file_name_narrow'] . "' title='album-name' class='card-img-top' alt=' ' />";

?>


    <div class="general">
        <h4 class="latest-text Limelight_latest_text">Single Movie</h4>
        <div class="container">
            <div class="row justify-content-md-center">
                <?php
                $result = mysqli_query($conn, "SELECT * FROM movies WHERE MovieID = " . $_GET['MovieID']);
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $stock = $row['Stock'];
//                    echo "<img src='uploads/" . $row['file_name_narrow'] . "' title='album-name' class='card-img-top' alt=' ' />";
                    echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column'> ";
                    echo "<h3 class='hvr-shutter-out-horizontal card-img-top'><img src='uploads/" . $row['file_name'] . "' title='album-name' class='card-img-top' alt='File from database ".$row['file_name_narrow']."' />
                                <div class='Limelightl-action-icon'><i class='fa fa-play-circle' aria-hidden='true'></i></div>
                                ";
                    echo "</h3>";
                    echo "</div>";
                    echo "<div class='col-md-6 col-sm-12 shadow-sm p-3 d-flex flex-column'>";
                    echo "<h6 class='card-title'><b>" . $row['Title'] . "</b></h6>";
                    echo "<p class='card-text'>" . $row['Description'] . "</p>";
                    echo "<h6>" . $row['Type'] . "</h6>";
                    echo "<div class='mid-2 agile_mid_2_home'>";
                    echo "<div class='block-stars'>";
                    echo "<ul class='Limelightl-ratings'>";
//                    echo "<p>" . $row['Rating'] . "</p>";
                    while ($row['Rating'] > 0) {
                        echo "<li><a href='#'><i class='fa fa-star' aria-hidden='true'></i></a></li>";
                        $row['Rating']--;
                    }
                    echo "</ul>";
                    echo "</div>";
                    echo "<div class='clearfix'></div>";
                    echo "<div class='row'>";
                    echo "<div class='col-md-6 col-xsm-6'>";
                    echo "<h6 class='card-title'>Category</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Likes <i class='ps-2 fa fa-thumbs-up fa-lg'></i></h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Stock Available</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Rating</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>Length</h6>";
                    echo "</div>";
                    echo "<div class='col-md-6 col-xsm-6'>";
                    echo "<h6 class='card-title'>" . $row['Category'] . "</h6>";
                    echo "<br>";
                    echo "<form action='single-products.php' method='post'>";
                    echo "<h6 class='card-title'>" . $row['Likes'] . " </h6>";
                    echo "<br>";
                    if ($stock > 0) {
                        echo "<h6 class='card-title'>" . $row['Stock'] . "</h6>";
                    } else {
                        echo "<h6 class='card-title' style='background-color: red;' >" . $row['Stock'] . "</h6>";

                    }
                    echo "<br>";
                    echo "<h6 class='card-title'>" . $row['Rating'] . "</h6>";
                    echo "<br>";
                    echo "<h6 class='card-title'>" . $row['Length'] . " min</h6>";
                    echo "<br>";
                    echo "</div>";
                    echo "</div>";
                    echo "<div class='time-buttons m-3'>";
                    echo "<form action='' method='post'>";

                    if ($stock > 0) {
                        if (isset($_SESSION['logged-in'])) {
                            if ($_SESSION['age'] >= 18) {
                                echo "<button class='btn btn-primary m-4' type='button' data-bs-toggle='modal' data-bs-target='#order' value='Display time 1' name='Display time 1'>Book</button>";
                            } else {
                                echo "<p class='text-danger'>You are not adult user. <br> Only verified adults can Purchase tickets</p>";
                            }
                        } else {
                            echo "<button type='submit' name='rent' class='btn btn-primary' disabled>Please Login</button>";
                        }
                    } else {
                        echo "<button class='btn btn-primary m-4' type='button' data-bs-toggle='modal' data-bs-target='#order' value='Display time 1' name='Display time 1' disabled>Book</button>";

                    }
                    echo "</form>";;
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    };
                    ?>

            </div>
        </div>
    </div>



<!--Order modal-->
    <!-- bootstrap-pop-up -->
    <div class="modal video-modal fade" id="order" tabindex="-1" role="dialog" aria-labelledby="order">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <section>
                    <div class="modal-body">
                        <div class="form">
                            <h3>Select number of tickets</h3>
                            <form action="order.php" method="post">
                                <?php
                                $result = mysqli_query($conn, "SELECT * FROM movies WHERE MovieID = " . $_GET['MovieID']);
                                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                                    echo "<h6 class='card-title'>Movie title: <b>" . $row['Title'] . "</b></h6>";
                                    echo "<h6 class='card-title'>Display time:";
                                    echo "<select name='screening_time' class='ms-2'>"; // start the dropdown menu
                                    echo "<option value='" . $row['Display time 1'] . "'>" . $row['Display time 1'] . "</option>";
                                    echo "<option value='" . $row['Display time 2'] . "'>" . $row['Display time 2'] . "</option>";
                                    echo "<option value='" . $row['Display time 3'] . "'>" . $row['Display time 3'] . "</option>";
                                    echo "</select>"; // close the dropdown menu
                                    echo "</h6>";

                                    $movieID = $row['MovieID'];
                                    $_SESSION['movieID'] = $movieID;
                                }

                                ?>
                                <div class="input-group plus-minus-input mt-2">
                                    <div class="input-group-button">
                                        <button type="button" class="button rounded-circle" data-quantity="minus" data-field="quantity">
                                            <i class="fa fa-minus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <input class="input-group-field" type="number" name="quantity" value="1">
                                    <div class="input-group-button">
                                        <button type="button" class="button rounded-circle" data-quantity="plus" data-field="quantity">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                </div>
                                <input class='btn btn-primary m-4' type="submit" value="order" name="submit">
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

<script>
    jQuery(document).ready(function(){
        // This button will increment the value
        $('[data-quantity="plus"]').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('data-field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If is not undefined
            if (!isNaN(currentVal)) {
                // Increment
                $('input[name='+fieldName+']').val(currentVal + 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
        // This button will decrement the value till 0
        $('[data-quantity="minus"]').click(function(e) {
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            fieldName = $(this).attr('data-field');
            // Get its current value
            var currentVal = parseInt($('input[name='+fieldName+']').val());
            // If it isn't undefined or its greater than 0
            if (!isNaN(currentVal) && currentVal > 0) {
                // Decrement one
                $('input[name='+fieldName+']').val(currentVal - 1);
            } else {
                // Otherwise put a 0 there
                $('input[name='+fieldName+']').val(0);
            }
        });
    });


</script>

<?php
# Include footer
include('includes/footer.php');
?>
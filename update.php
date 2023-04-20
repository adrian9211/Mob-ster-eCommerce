<?php
include('includes/config.php');


//// Retrieve the product from the database
//$id = $_GET['id'];
//$query = "SELECT * FROM products WHERE id = ?";
//$stmt = mysqli_prepare($conn, $query);
//mysqli_stmt_bind_param($stmt, "i", $id);
//mysqli_stmt_execute($stmt);
//$result = mysqli_stmt_get_result($stmt);
//$product = mysqli_fetch_assoc($result);
//mysqli_stmt_close($stmt);

if (isset($_POST['update'])) {
    $id = $_GET['id'];
    $category = $_POST['Category'];
    $title = $_POST['Title'];
    $description = $_POST['Description'];
    $price = $_POST['Price'];
    $image = $_POST['file_name'];

    // Perform some basic validation
    if (empty($category) || empty($title) || empty($description) || empty($price) || empty($image)) {
        echo "Please fill in all fields";
    } elseif (!is_numeric($price)) {
        echo "Price must be a number";

    } else {
        // Update the product in the database

        $query = "update products set Category = '".$category."', Title='".$title."', Description='".$description."',Price='".$price."', file_name='".$image."' where id ='".$id."'";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

//        // Redirect to the appropriate page based on the category
//        $result = true;
//
//
//        if($result)
//        {
//            header("location:admin-products-management.php");
//        }
//        else
//        {
//            echo 'Please Check Your Query insert';
//        }
    }
}
//mysqli_close($conn);
?>
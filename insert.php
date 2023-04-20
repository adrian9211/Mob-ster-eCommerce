<?php

$page_title = "Add Product";
session_start();
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/config.php');

if(isset($_POST['submit'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "uploads/" . $filename;

    $query = " insert into products ( Title, Brand, Description, Category, Stock, file_name, Colour1, Colour2, Colour3, Colour4 , Colour5, Price) values('$_POST[Title]', '$_POST[Brand]', '$_POST[Description]', '$_POST[Category]', '$_POST[Stock]', '$filename', '$_POST[Colour]', '$_POST[Colour2]'  , '$_POST[Colour3]'  , '$_POST[Colour4]' , '$_POST[Colour5]' , '$_POST[Price]')";

    $stmt = mysqli_prepare($conn, $query);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {

        echo "Product Added Successfully";

// Now let's move the uploaded image into the folder: image
        if (move_uploaded_file($tempname, $folder)) {
            echo "<h3>  Image uploaded successfully!</h3>";
        } else {
            echo "<h3>  Failed to upload image!</h3>";
        }

        echo "<script type='text/javascript'>window.top.location='http://23.102.4.246/Mob-ster/admin-products-management.php';</script>"; exit;

// Display status message
    } else {
        echo 'Please Check Your Query insert';
    }
}

//    $statusMsg = '';
//
//// File upload path
//    $targetDir = "uploads/";
//    $fileName = basename($_FILES["file"]["name"]);
//    $targetFilePath = $targetDir . $fileName;
//    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
//
//    if (isset($_POST["submit"]) && !empty($_FILES["file"]["name"])) {
//        // Allow certain file formats
//        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');
//        if (in_array($fileType, $allowTypes)) {
//            // Upload file to server
//            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
//                // Insert image file name into database
//                $insert = $conn->query("INSERT into images (file_name, uploaded_on) VALUES ('" . $fileName . "', NOW())");
//                if ($insert) {
//                    $statusMsg = "The file " . $fileName . " has been uploaded successfully.";
//                } else {
//                    $statusMsg = "File upload failed, please try again.";
//                }
//            } else {
//                $statusMsg = "Sorry, there was an error uploading your file.";
//            }
//        } else {
//            $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//        }
//    } else {
//        $statusMsg = 'Please select a file to upload.';
//    }
//
//// Display status message
//    echo $statusMsg;
//
//}

include('includes/footer.php');

?>

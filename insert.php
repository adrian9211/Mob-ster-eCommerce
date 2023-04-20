<?php

$page_title = "Add Product";
session_start();
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/config.php');

if(isset($_POST['submit'])) {
//    $title = $_POST['Title'];
//    $brand = $_POST['Brand'];
//    $description = $_POST['Description'];
//    $category = $_POST['Category'];
//    $stock = $_POST['Stock'];
//    $image = $_POST['file'];
//    $colour = $_POST['Colour'];
//    $price = $_POST['Price'];

//
//    $statusMsg = '';
//    $targetDir = "uploads/";
//    $fileName = basename($_FILES["file"]["name"]);
//    $targetFilePath = $targetDir . $fileName;
//    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
//    // Allow certain file formats
//    $allowTypes = array('jpg','png','jpeg','gif','JPG','PNG','JPEG','GIF');
//    if(in_array($fileType, $allowTypes)){
//        // Upload file to server
//        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
//            // Insert image file name into database
//            $insert = $conn->query(" insert into products (Title, ) values('$title')");
//            if($insert){
//                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
//                header("location:admin-products-management.php");
//            }else{
//                $statusMsg = "File upload failed, please try again.";
//            }
//        }else{
//            $statusMsg = "Sorry, there was an error uploading your file.";
//        }
//    }else{
//        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
//    }
//} else {
//        $statusMsg = 'Please select a file to upload.';
//    }


    $query = " insert into products ( Title, Brand, Description, Category, Stock, Colour1, Colour2, Colour3, Colour4 , Colour5, Price) values('$_POST[Title]', '$_POST[Brand]', '$_POST[Description]', '$_POST[Category]', '$_POST[Stock]', '$_POST[Colour]', '$_POST[Colour2]'  , '$_POST[Colour3]'  , '$_POST[Colour4]' , '$_POST[Colour5]' , '$_POST[Price]')";

    $stmt = mysqli_prepare($conn, $query);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        header("location:admin-products-management.php");
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

<?php
include('includes/config.php');
if(isset($_GET['Del']))
         {
             $id = $_GET['Del'];
             $query = " delete from products where id = '".$id."'";
             $result = mysqli_query($conn,$query);
             echo "query";
             if($result)
             {
                 header("location:admin-products-management.php");
             }
             else
             {
                 echo ' Please Check Your Query ';
             }
        }
        else
        {
            echo 'Please Check Your Query insert';
        }
    
         ?>
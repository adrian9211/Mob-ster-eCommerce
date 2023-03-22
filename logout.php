<?php
    session_start();
    // if the user is logged in, unset the session
//    unset($_SESSION['logged-in']);
//    session_destroy();
    if (session_destroy()) {
        ?>
            <script>
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                })
            </script>
    <?php
    }
    else {
        echo "You are not logged in";
    }
echo '<script>';
echo 'setTimeout(function(){window.location.href = "http://23.102.4.246/Mob-ster/index.php";}, 100);';
echo '</script>';
//    header('Location:index.php');
    exit;
?>




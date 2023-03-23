<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include ('includes/config.php');
$page_title = "Send message";




            if (isset($_POST['submit']))
            {
                $firstname = $_POST['FirstName'];
                $email = $_POST['Email'];
                $surname = $_POST['Surname'];
                $subject = $_POST['Subject'];
                $message = $_POST['Message'];

                $insterquery = "INSERT INTO contact (FirstName, Email, Surname, Subject, Message) VALUES ('$firstname', '$email', '$surname', '$subject', '$message')";
                $query_run = mysqli_query($conn, $insterquery);

                if (mysqli_query($conn, $insterquery)) {
                    $success = "Message sent";
                } else {
                    $error = "Please Try Again Later";
                    echo "Message couldn not be sent: " . mysqli_error($conn);
                }
            }

                if(isset($success)) {?>
                    <!--This code for injecting an alert-->
                    <script>
                        setTimeout(function ()
                            {
                                Swal.fire({
                                    position: 'Center',
                                    icon: 'success',
                                    title: 'Your message has been sent
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                            },
                            100);
                    </script>

                <?php } ?>
                <?php if(isset($error)) {?>
                    <!--This code for injecting an alert-->
                    <script>
                        setTimeout(function ()
                            {
                                Swal.fire({
                                    position: 'Center',
                                    icon: 'warning',
                                    title: 'Your message has not been sent',
                                    showConfirmButton: false,
                                    timer: 2500
                                })
                            },
                            100);
                    </script>

                <?php }
?>
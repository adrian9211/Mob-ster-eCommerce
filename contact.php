<?php
session_start();
include('includes/header.php');
include('includes/navbar.php');
include ('includes/config.php');
$page_title = "Contact Us";


if (isset($_POST['submit2']))
{
    $firstname = $_POST['FirstName'];
    $email = $_POST['Email'];
    $surname = $_POST['Surname'];
    $subject = $_POST['Subject'];
    $message = $_POST['Message'];

    $insterquery = "INSERT INTO contact (FirstName, Email, Surname, Subject, Message) VALUE ('$firstname', '$email', '$surname', '$subject', '$message')";
    if (mysqli_query($conn, $insterquery)) {
        $success1 = "Message sent";
    } else {
        $error1 = "Please Try Again Later";
        echo "Message couldn not be sent: " . mysqli_error($conn);
    }
}
?>


        <iframe
                width="100%"
                height="450"
                style="border:0"
                loading="lazy"
                allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120519.31565742021!2d-3.2476778117608336!3d55.85550172864269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887b9a7365fccff%3A0x52629bc613f4b94b!2sEdinburgh%20College!5e0!3m2!1spl!2suk!4v1674021147748!5m2!1spl!2suk">
        </iframe>


        <div class="container text-center contact-page mt-5">
            <div class="row mb-5">
                <div class="col-xl-3 col-sm-6  col-xs-12 column mb-5 mb-sm-5 ">
                    <section class="contact-box element">
                        <div class="circle-icon mt-3">
                            <i class="fa fa-phone "></i>
                        </div>
                        <h4 class="contact-text"><b>Phone</b></h4>
                        <p class="contact-text">Customer Service</p>
                        <p class="contact-text">0333 003 3450</p>
                        <p class="contact-text">Sales</p>
                        <p class="contact-text">0333 003 3411</p>
                    </section>
                </div>

                <div class="col-xl-3 col-sm-6  col-xs-12 column  mb-5 mb-sm-5 ">
                    <section class="contact-box element">
                        <div class="circle-icon mt-3">
                            <i class="fa fa-envelope "></i>
                        </div>
                        <h4 class="contact-text"><b>Email</b></h4>
                        <p class="contact-text">customer.services@mob-ster.co.uk</p>
                        <p class="contact-text">or</p>
                        <p class="contact-text bottom">general.enquires@mob-ster.co.uk</p>
                    </section>
                </div>

                <div class="col-xl-3 col-sm-6 col-xs-12 column mb-5 mb-sm-5 ">
                    <section class="contact-box element">
                        <div class="circle-icon mt-3">
                            <i class="fa fa-map"></i>
                        </div>
                        <h4 class="contact-text"><b>Address</b></h4>
                        <p class="contact-text">Edinburgh College</p>
                        <p class="contact-text">Milton Rd, Campus</p>
                        <p class="contact-text">Edinburgh</p>
                        <p class="contact-text">EH11 4BN</p>
                    </section>
                </div>
                <div class="col-xl-3 col-sm-6 col-xs-12 column  mb-5 mb-sm-5 ">
                    <section class="contact-box element">
                        <div class="circle-icon mt-3">
                            <i class="fa fa-user "></i>
                        </div>
                        <!--Social media icons-->
                        <h4 class="contact-text"><b>Social media</b></h4>
                        <nav class="social_media">
                            <ul>
                                <li class=""><a  href="http://facebook.com" target="_blank"> <i class="fab fa-facebook fa-xl pe-3 "></i>Facebook</a></li>
                                <li class=""><a  href="https://twitter.com" target="_blank"> <i class="fab fa-twitter fa-xl pe-3 mt-3"></i>Twitter</a></li>
                                <li class=""><a  href="https://instagram.com" target="_blank"><i class="fab fa-instagram fa-xl pe-3 mt-3"></i>Instagram</a></li>
                                <li class=""><a  href="https://youtube.com" target="_blank"><i class="fab fa-youtube fa-xl pe-3 mt-3"></i>YouTube</a></li>
                            </ul>
                        </nav>
                        <!--Social media icons-->
                    </section>
                </div>
            </div>

            <?php if(isset($success1)) {?>
                <!--This code for injecting an alert-->
                <script>
                    setTimeout(function ()
                        {
                            Swal.fire({
                                position: 'Center',
                                icon: 'success',
                                title: 'Your message has been sent',
                                showConfirmButton: false,
                                timer: 2500
                            })
                        },
                        100);
                </script>

            <?php } ?>

            <?php if(isset($error1)) {?>
                <!--This code for injecting an alert-->
                <script>
                    setTimeout(function ()
                        {
                            Swal.fire({
                                position: 'Center',
                                icon: 'warning',
                                title: 'Your message has not been sent, Please try again later',
                                showConfirmButton: false,
                                timer: 2500
                            })
                        },
                        100);
                </script>

            <?php } ?>



        <form method="post" >
            <div class="row mb-5">
                <div class="col-xl-6 col-sm-12  col-xs-12 ">
                    <div class="mb-4">
                        <input type="text" name="FirstName"  class="form-control" id="exampleInputFirstName"  placeholder="First Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="Surname" class="form-control" id="exampleInputSurname" placeholder="Surname" required >
                    </div>
                </div>

                <div class="col-xl-6 col-sm-12  col-xs-12 ">
                    <div class="mb-4">
                        <input type="email" name="Email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" name="Subject" class="form-control" id="exampleInputSubject" placeholder="Subject" >
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-xl-12">
                    <div class="mb-3">
                        <textarea  type="text" name="Message"  class="form-control" id="message"  placeholder="Message" style="height: 10rem;" maxlength="996" required></textarea>
                    </div>
                </div>
            </div>
            <input type="submit" value="Submit" name="submit2" class="btn btn-primary mb-5 " id="send">
        </form>
    </div>



<?php
include('includes/footer.php');
?>
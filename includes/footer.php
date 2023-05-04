

<footer>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="ratio ratio-21x9 ">
                    <iframe
                            width="100%"
                            height="550"
                            style="border:0"
                            loading="lazy"
                            allowfullscreen
                            referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d120519.31565742021!2d-3.2476778117608336!3d55.85550172864269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4887b9a7365fccff%3A0x52629bc613f4b94b!2sEdinburgh%20College!5e0!3m2!1spl!2suk!4v1674021147748!5m2!1spl!2suk">
                    </iframe>
                </div>
            </div>
            <div class="col-md-4">
                    <ul>
                        <li><a href="./privacy&policy.php">Privacy Policy</a></li>
                        <li><a href="./GDPR.php">GDPR & Use of Cookies</a></li>
                        <li><a href="./terms&conditions.php">Terms & Conditions</a></li>
                        <li><a href="">Site Map</a></li>
                    </ul>
            </div>
            <div class="col-md-4">
                <div class="social_media">
                <p class="m-3">Find us on</p>
                <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook fa-xl m-2" ></i></a>
                    <a href="https://www.twitter.com/" target="_blank"><i class="fab fa-twitter fa-xl m-2" ></i></a>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram fa-xl m-2" ></i></a>
                <a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube fa-xl m-2" ></i></a>
            </div>
        </div>
        <p class="text-center mt-4">Copyright &copy; 2023 Mobster - All rights reserved. - Developer ACE Group</p>

    </div>
</footer>


<!--    Bootstrap 5.2.3-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js" integrity="sha512-9CWGXFSJ+/X0LWzSRCZFsOPhSfm6jbnL+Mpqo0o8Ke2SYr8rCTqb4/wGm+9n13HtDE1NQpAEOrMecDZw4FXQGg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<script src="vendor/js/swal.js"></script>-->
<script src="vendor/js/sweetalert2.all.js"></script>
<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->

<script>
    $('#logout').on('click', function () {

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success me-2',
                cancelButton: 'btn btn-danger me-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Do you want to logout?',
            text: "Please confirm",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, logout!',
            cancelButtonText: 'No, cancel!',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                swalWithBootstrapButtons.fire(
                    'Your logged out!',
                    window.location.href = 'logout.php',
                )
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your will stay on previous page :)',
                    'error'
                )
            }
        })
    })

</script>

<script>
    $('#login').on('click', function () {

        Swal.fire({
            position: 'Center',
            icon: 'success',
            title: 'Your successfully registered',
            text: 'You will be redirected to the login page in 5 seconds',
            showConfirmButton: false,
            timer: 5000
            window.location.href = 'user-dashboard.php',
        })
        })

</script>

<!--<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.3/dist/sweetalert2.all.min.js"></script>-->
<script>
    $(document).ready(function(){
        $("#owl-demo").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items : 5,
            itemsDesktop : [1000,4],
            itemsDesktopSmall : [714,3],
            itemsMobile : [314,1]
        });
        $("#owl-demo2").owlCarousel({
            autoPlay: 6000, //Set AutoPlay to 3 seconds
            items : 3,
            itemsDesktop : [640,4],
            itemsDesktopSmall : [414,3]

        });
    });
</script>

<!--PayPal requirements below-->
<script
        src="https://www.paypal.com/sdk/js?client-id=AY2AesbweHzJWlAgaoqELloRgvjPhq3ORpuERpMDFRUgMPpnrOXPAapWjsnj25ZhiycRGQPxBaTAX9QE&currency=GBP">
</script>
<script>
    // Set the amount to charge
    const amount = '<?php echo $total; ?>';

    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        style: {
            layout: 'horizontal'
        },
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: amount
                    }
                }]
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                alert('Transaction completed by ' + details.payer.name.given_name + '!');
                console.log(details)

                if (details.status == "COMPLETED") {
                    window.location.replace("payment-successful.php");
                } else {
                    window.location.replace("payment-cancelled.php");
                }
                // window.location.replace("payment-successful.php");

                // Call your server to save the transaction

                return fetch('/path/to/save/transaction', {

                    method: 'post',
                    headers: {
                        'content-type': 'application/json'
                    },
                    body: JSON.stringify({
                        orderID: data.orderID,
                        transaction: details
                    })
                });
            });

        },
        // Show a cancel page, or return to cart
        onCancel: function (data) {
            window.location.replace("payment-cancelled.php");
        }
    }).render('#paypal-button-container');
</script>
<!--PayPal requirements above-->

</body>

</html>
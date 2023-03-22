<?php
?>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Address</h3>
                <p>1234 Street Name<br>City, AA 99999</p>
            </div>
            <div class="col-md-4">
                <h3>Phone Number</h3>
                <p>(123) 456-7890</p>
            </div>
            <div class="col-md-4">
                <h3>Email Address</h3>
                <p><a href="mailto:dd@gmail.com"></a> </p>
            </div>
        </div>
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
    });
</script>

<!--PayPal requirements below-->
<script
        src="https://www.paypal.com/sdk/js?client-id=AY2AesbweHzJWlAgaoqELloRgvjPhq3ORpuERpMDFRUgMPpnrOXPAapWjsnj25ZhiycRGQPxBaTAX9QE&currency=USD">
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
        }
    }).render('#paypal-button-container');
</script>
<!--PayPal requirements above-->

</html>
<?php
# Set page title
$page_title = "Cart";
session_start();
include('includes/header.php');
include('includes/navbar.php');
include ('includes/config.php');


// Check if the form has been submitted to update cart quantities
if(isset($_POST['update_quantity'])) {
    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '1xCMat5k5Cb4', 'mobster')
    or die ("could not connect network");

    foreach($_POST['quantity'] as $product_id => $quantity) {
        // Ensure the quantity is a positive integer
        $quantity = max(0, intval($quantity));

        // If the quantity is zero, remove the item from the cart
        if($quantity == 0) {
            unset($_SESSION['cart'][$product_id]);
        }
        else {
            // Otherwise, update the quantity in the cart
            $_SESSION['cart'][$product_id]['quantity'] = $quantity;

            // Update the quantity in the database
            $query = "UPDATE products SET quantity = $quantity WHERE id = $product_id";
            mysqli_query($con, $query);
        }
    }
}

$total = 0;


?>

<div class="container">
    <h1 class="mt-3 mb-3">Shopping Cart</h1>
    <a href="products.php" class="btn btn-primary">Continue Shopping</a>

    <table class="table">
        <thead>
        <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($_SESSION['cart'])) {
        // Connect to the database
        $con = mysqli_connect('localhost', 'root', '1xCMat5k5Cb4', 'mobster')
        or die ("could not connect network");

        foreach($_SESSION['cart'] as $product_id => $item) {
        $subtotal = $item['price'] * $item['quantity'];
        $total += $subtotal;
        ?>
        <tr>
            <td><?php echo $item['title']; ?></td>
            <td><img src="uploads/<?php echo $item['file_name']; ?>" alt="<?php echo $item['file_name']; ?>"
                     width="100" height="100"></td>

            <td>$<?php echo number_format($item['price'], 2); ?></td>
            <td>

                <form method="POST" action="cart.php">
                    <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
                    <input type="number" name="quantity[<?php echo $product_id; ?>]"
                           value="<?php echo $item['quantity']; ?>" min="1">
                    <button type="submit" name="update_quantity" class="btn btn-sm btn-primary">Update</button>
                </form>
            </td>
            <td>$<?php echo number_format($subtotal, 2); ?></td>
            <td>
                <form method="post" action="update_cart.php">
                    <input type="hidden" name="remove_item" value="<?php echo $product_id; ?>">
                    <button type="submit" class="btn btn-danger">Remove</button>

                </form>
            </td>

            <?php
            }
            }
            ?>
        </tbody>
        <tfoot>
        <tr>

            <td colspan="3" align="right"><strong>Total</strong> </td>
            <td><strong>$<?php echo number_format($total, 2); ?></strong></td>
            <td>
                <div id="paypal-button-container"></div>
            </td>

        </tr>
        </tfoot>
    </table>
</div>



<?php
include('includes/footer.php');
?>
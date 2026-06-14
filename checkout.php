<?php

session_start();

include 'includes/db.php';

if(empty($_SESSION['cart'])){
    header("Location: cart.php");
    exit();
}

$total = 0;

foreach($_SESSION['cart'] as $id => $qty){

$product =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM products WHERE id=$id"
)
);

$total += $product['price'] * $qty;
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Checkout</title>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/style2.css">
</head>

<body>

<header>

    <nav class="navbar">

    <div class="logo">
        <i class="fa-solid fa-paw"></i>
        PetVerse
    </div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="index.php" class="<?php if(basename($_SERVER['PHP_SELF'])=='checkout.php') echo 'active'; ?>">Cart</a></li>
        <li><a href="my-orders.php">Orders</a></li>
    </ul>

    <?php if(isset($_SESSION['user_id'])){ ?>

    <div class="user-menu">

        <div class="user-profile">

            <div class="user-avatar">
                <?php echo strtoupper(substr($_SESSION['user_name'],0,1)); ?>
            </div>

            <span class="user-name">
                <?php echo $_SESSION['user_name']; ?>
            </span>

        </div>

        <a href="logout.php" class="logout-btn">
            Logout
        </a>

    </div>

    <?php } else { ?>

    <div class="guest-menu">

        <a href="login.php" class="login-btn">
            Login
        </a>

        <a href="register.php" class="register-btn">
            Register
        </a>

    </div>

    <?php } ?>

</nav>

</header>

<section class="checkout-container">

<div class="checkout-form">

<h2>Customer Information</h2>

<form action="place-order.php" method="POST">

<input
type="text"
name="customer_name"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email Address"
required>

<input
type="text"
name="phone"
placeholder="Phone Number"
required>

<textarea
name="address"
placeholder="Delivery Address"
required>
</textarea>

<button type="submit" class="btn">
Place Order
</button>

</form>

</div>

<div class="order-summary">

<h2>Order Summary</h2>

<?php

foreach($_SESSION['cart'] as $id => $qty){

$product =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM products WHERE id=$id"
)
);

?>

<div class="summary-item">

<p>
<?php echo $product['name']; ?>
</p>

<p>
<?php echo $qty; ?> ×
$<?php echo $product['price']; ?>
</p>

</div>

<?php } ?>

<hr>

<h3>

Total:
$<?php echo number_format($total,2); ?>

</h3>

</div>

</section>

<footer>

<div class="footer-container">

<div class="footer-section">

<h3>PetVerse Store</h3>

<p>
Your trusted online destination
for pets and pet supplies.
</p>

</div>

<div class="footer-section">

<h3>Quick Links</h3>

<ul>

<li><a href="index.php">Home</a></li>
<li><a href="products.php">Products</a></li>
<li><a href="cart.php">Cart</a></li>
<li><a href="login.php">Login</a></li>

</ul>

</div>

<div class="footer-section">

<h3>Contact</h3>

<p>Email: info@petverse.com</p>

<p>Phone: +250 788 000 000</p>

<p>Kigali, Rwanda</p>

</div>

</div>

<div class="footer-bottom">

<p>
© 2026 PetVerse Store.
All Rights Reserved.
</p>

</div>

</footer>


</body>
</html>
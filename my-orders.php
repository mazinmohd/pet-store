<?php

session_start();
include 'includes/db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$orders =
mysqli_query(
$conn,
"SELECT * FROM orders
WHERE user_id='$user_id'
ORDER BY id DESC"
);

?>

<!DOCTYPE html>
<html>

<head>

<title>My Orders</title>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/style2.css">

</head>

<body>

<!-- YOUR HEADER -->

<header>

    <nav class="navbar">

    <div class="logo">
        <i class="fa-solid fa-paw"></i>
        PetVerse
    </div>

    <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a></li>
        <li><a href="cart.php">Cart</a></li>
        <li><a href="index.php" class="<?php if(basename($_SERVER['PHP_SELF'])=='my-orders.php') echo 'active'; ?>">Orders</a></li>
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

<main>
    <section class="orders-page">

        <h1>My Orders</h1>

        <?php

        if(mysqli_num_rows($orders) > 0){

        while($order = mysqli_fetch_assoc($orders)){

        ?>

        <div class="order-card">

        <div class="order-header">

        <h3>
        Order #<?php echo $order['id']; ?>
        </h3>

        <span>
        <?php echo $order['order_date']; ?>
        </span>

        </div>

        <div class="order-body">

        <p>

        <strong>Name:</strong>

        <?php echo $order['customer_name']; ?>

        </p>

        <p>

        <strong>Total:</strong>

        $<?php echo number_format($order['total_amount'],2); ?>

        </p>

        <p>

        <strong>Address:</strong>

        <?php echo $order['address']; ?>

        </p>

        </div>

        <h4>Products</h4>

        <?php

        $order_id = $order['id'];

        $items =
        mysqli_query(
        $conn,
        "SELECT
        order_items.*,
        products.name
        FROM order_items
        JOIN products
        ON order_items.product_id = products.id
        WHERE order_items.order_id='$order_id'"
        );

        while($item = mysqli_fetch_assoc($items)){

        ?>

        <div class="order-item">

        <span>

        <?php echo $item['name']; ?>

        </span>

        <span>

        Qty:
        <?php echo $item['quantity']; ?>

        </span>

        </div>

        <?php } ?>

        </div>

        <?php

        }

        }else{

        ?>

        <div class="empty-orders">

        <h2>No Orders Yet</h2>

        <p>
        Start shopping to see your orders here.
        </p>

        <a href="products.php" class="btn">

        Browse Products

        </a>

        </div>

        <?php } ?>

    </section>
</main>
<!-- YOUR FOOTER -->
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
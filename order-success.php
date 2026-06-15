<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>

    <title>Order Successful</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

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
            <li><a href="cart.php" class="<?php if(basename($_SERVER['PHP_SELF'])=='order-success.php') echo 'active'; ?>">Cart</a></li>
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

<section class="success-page">
    <div class="success-card">

        <h1>🎉 Order Confirmed!</h1>

        <p>
            Thank you for your purchase.
            Your order has been received successfully.
        </p>

        <a href="products.php" class="btn">
            Continue Shopping
        </a>

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
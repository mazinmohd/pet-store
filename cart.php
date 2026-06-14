<?php

    session_start();

    include 'includes/db.php';

    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $product_id = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        if(isset($_SESSION['cart'][$product_id])){

            $_SESSION['cart'][$product_id] += $quantity;

        }else{

            $_SESSION['cart'][$product_id] = $quantity;

        }

    }

?>
<!DOCTYPE html>
<html>

<head>

    <title>Shopping Cart</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
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
            <li><a href="cart.php" class="<?php if(basename($_SERVER['PHP_SELF'])=='cart.php') echo 'active'; ?>">Cart</a></li>
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
<main>
    <section class="cart-section">

        <?php

            $total = 0;

            if(!empty($_SESSION['cart'])){

        ?>

        <div class="cart-layout">
            <div class="cart-items">

                <h1>Shopping Cart</h1>

                <?php

                    foreach($_SESSION['cart'] as $id => $qty){

                    $product =
                        mysqli_fetch_assoc(
                        mysqli_query(
                        $conn,
                        "SELECT * FROM products WHERE id=$id"
                        )
                    );

                    $itemTotal =
                    $product['price'] * $qty;

                    $total += $itemTotal;

                ?>

                <div class="cart-card">

                    <div class="cart-image">

                        <img
                        src="assets/images/<?php echo $product['image']; ?>"
                        alt="<?php echo $product['name']; ?>">

                    </div>

                    <div class="cart-info">

                        <h3>
                            <?php echo $product['name']; ?>
                        </h3>

                        <p class="cart-category">
                            <?php echo $product['category']; ?>
                        </p>

                        <p class="cart-price">
                            $<?php echo number_format($product['price'],2); ?>
                        </p>

                    </div>

                    <div class="cart-actions">

                        <form action="update-cart.php" method="POST">

                            <input
                            type="hidden"
                            name="id"
                            value="<?php echo $id; ?>">

                            <div class="qty-box">

                                <input
                                type="number"
                                name="quantity"
                                value="<?php echo $qty; ?>"
                                min="1">

                                <button type="submit">
                                    Update
                                </button>

                            </div>

                        </form>

                        <div class="item-total">

                            $<?php echo number_format($itemTotal,2); ?>

                        </div>

                        <a
                        href="remove-cart.php?id=<?php echo $id; ?>"
                        class="remove-btn">
                            Remove
                        </a>

                    </div>

                </div>

                <?php } ?>

            </div>

            <div class="cart-summary-card">

                <h2>Order Summary</h2>

                <div class="summary-row">

                    <span>Items Total</span>

                    <span>
                        $<?php echo number_format($total,2); ?>
                    </span>

                </div>

                <div class="summary-row grand">

                    <span>Grand Total</span>

                    <span>
                        $<?php echo number_format($total,2); ?>
                    </span>

                </div>

                <a
                href="checkout.php"
                class="checkout-btn">
                    Proceed To Checkout
                </a>

                <a
                href="products.php"
                class="continue-btn">
                    Continue Shopping
                </a>

            </div>

        </div>

        <?php } else { ?>

        <div class="empty-cart-modern">
            <h2>Your Cart Is Empty</h2>
            <p>
                Looks like you haven't added any pets yet.
            </p>
            <a href="products.php" class="btn">
                Browse Products
            </a>
        </div>

        <?php } ?>


    </section>
</main>
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
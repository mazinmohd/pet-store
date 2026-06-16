<?php

    session_start();

    include 'includes/db.php';

    if(!isset($_GET['id'])){
        header("Location: products.php");
        exit();
    }

    $id = (int)$_GET['id'];

    $query = "SELECT * FROM products WHERE id = $id";
    $result = mysqli_query($conn,$query);

    $product = mysqli_fetch_assoc($result);

    if(!$product){
        header("Location: products.php");
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $product['name']; ?></title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.png" type="image/x-icon">
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
            <li><a href="products.php" class="<?php if(basename($_SERVER['PHP_SELF'])=='product-details.php') echo 'active'; ?>">Products</a></li>
            <li><a href="cart.php">Cart</a></li>
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


<section class="product-details">

    <div class="product-image">
        <img
        src="assets/images/<?php echo $product['image']; ?>"
        alt="<?php echo $product['name']; ?>">
    </div>

    <div class="product-content">

        <span class="category-badge">
            <?php echo $product['category']; ?>
        </span>

        <h1>
            <?php echo $product['name']; ?>
        </h1>

        <h2 class="price">
            $<?php echo $product['price']; ?>
        </h2>

        <p class="description">
            <?php echo $product['description']; ?>
        </p>

        <div class="stock">
            Stock Available:
            <strong><?php echo $product['stock']; ?></strong>
        </div>

        <form id="addToCartForm">

            <input
            type="hidden"
            name="product_id"
            value="<?php echo $product['id']; ?>">

            <div class="quantity-box">

                <label>Quantity</label>

                <div class="quantity-controls">

                    <button type="button" onclick="decreaseQty()">
                    -
                    </button>

                    <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    value="1"
                    min="1"
                    max="<?php echo $product['stock']; ?>">

                    <button type="button" onclick="increaseQty()">
                    +
                    </button>

                </div>

            </div>

            <button type="submit" class="btn">
                <i class="fa-solid fa-cart-shopping"></i>
                Add To Cart
            </button>

            <a href="products.php" class="btn back-shopping-btn">
                <i class="fa-solid fa-arrow-left"></i>
                Back To Shopping
            </a>

        </form>

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

<script src="assets/js/main.js"></script>

<div id="cartPopup" class="cart-popup">
    <i class="fa-solid fa-circle-check"></i>
    Product added to cart!
</div>

<script>

        document.getElementById("addToCartForm")
        .addEventListener("submit", function(e){

            e.preventDefault();

            let formData = new FormData(this);

            fetch("add-to-cart.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {

                if(data.success){

                    let popup =
                    document.getElementById("cartPopup");

                    popup.classList.add("show");

                    setTimeout(() => {
                        popup.classList.remove("show");
                    }, 3000);
                }
            });

        });

</script>
</body>
</html>
<?php
    session_start();
    include 'includes/db.php';

    $query = "SELECT * FROM products";
    $result = mysqli_query($conn,$query);

?>
<!DOCTYPE html>
<html>

<head>

    <title>Products | PetVerse</title>

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
            <li><a href="products.php" class="<?php if(basename($_SERVER['PHP_SELF'])=='products.php') echo 'active'; ?>">Products</a></li>
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

<section class="page-title">
    <h1>Explore Our Products</h1>
    <p>
    Animals and food products available now
    </p>
</section>

<section class="search-section">
    <input
    type="text"
    id="searchInput"
    placeholder="Search products...">
</section>

<section class="products-container">

    <?php while($product = mysqli_fetch_assoc($result)){ ?>

    <div class="product-card">

        <img
        src="assets/images/<?php echo $product['image']; ?>"
        alt="">

        <div class="product-info">

            <span class="category">
                <?php echo $product['category']; ?>
            </span>

            <h3>
                <?php echo $product['name']; ?>
            </h3>

            <p>
                $<?php echo $product['price']; ?>
            </p>

            <div class="product-buttons">

                <a href="product-details.php?id=<?php echo $product['id']; ?>" class="btn details-btn">
                    View Details
                </a>

                <form class="addToCartForm">

                    <input
                    type="hidden"
                    name="product_id"
                    value="<?php echo $product['id']; ?>">

                    <input
                    type="hidden"
                    name="quantity"
                    value="1">

                    <button type="submit" class="btn cart-btn">
                        Add To Cart
                    </button>

                </form>

            </div>

        </div>

    </div>

    <?php } ?>

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
    document.querySelectorAll(".addToCartForm")
    .forEach(form => {

        form.addEventListener("submit", function(e){

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

    });
</script>
</body>
</html>
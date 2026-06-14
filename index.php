<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>PetVerse Store</title>

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style2.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
</head>
<body>

<!-- Header -->

<header>

    <nav class="navbar">

        <div class="logo">
            <i class="fa-solid fa-paw"></i>
            PetVerse
        </div>

        <ul class="nav-links">
            <li><a href="index.php" class="<?php if(basename($_SERVER['PHP_SELF'])=='index.php') echo 'active'; ?>">Home</a></li>
            <li><a href="products.php">Products</a></li>
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

<!-- Hero Section -->

<section class="hero">

    <div class="hero-content">

        <h1>Everything Your Pets Need In One Place</h1>

        <p>
        Discover healthy animals, premium pet food,
        and everything needed for happy pets.
        </p>

        <a href="products.php" class="btn">
        Shop Now
        </a>

    </div>

    <div class="hero-image">
        <img src="assets/images/hero-pet.avif">
    </div>

</section>

<!-- Categories -->

<section class="categories">

    <h2>Shop By Category</h2>

    <div class="category-container">

        <div class="card">

            <img src="assets/images/big-animal.avif">

            <h3>Big Animals</h3>

            <p>
            Cows, Horses, Goats and more.
            </p>

        </div>

        <div class="card">

            <img src="assets/images/small-animal.webp">

            <h3>Small Animals</h3>

            <p>
            Rabbits, Hamsters, Birds and more.
            </p>

        </div>

        <div class="card">

            <img src="assets/images/pet-food.avif">

            <h3>Animal Food</h3>

            <p>
            Premium nutrition for every pet.
            </p>

        </div>

    </div>

</section>

<!-- Statistics -->

<section class="stats">

    <div class="stat-box">

        <h3>150+</h3>

        <p>Animals Available</p>

    </div>

    <div class="stat-box">

        <h3>300+</h3>

        <p>Food Products</p>

    </div>

    <div class="stat-box">

        <h3>500+</h3>

        <p>Happy Customers</p>

    </div>

</section>

<!-- Testimonials -->

<section class="testimonials">

    <h2>What Customers Say</h2>

    <div class="testimonial-container">

        <div class="testimonial">

            <p>
            "The best online pet shop in Rwanda!"
            </p>

            <h4>- Jean</h4>

        </div>

        <div class="testimonial">

            <p>
            "Fast delivery and healthy animals."
            </p>

            <h4>- Sarah</h4>

        </div>

        <div class="testimonial">

            <p>
            "Great quality pet food."
            </p>

            <h4>- David</h4>

        </div>
        <div class="testimonial">

            <p>
            "Most nice animal platform I ever see."
            </p>

            <h4>- Emanuel</h4>

        </div>

    </div>

</section>

<!-- Newsletter -->

<section class="newsletter">

    <h2>Join Our Newsletter</h2>

    <form>

        <input type="email"
        placeholder="Enter your email">

        <button>
        Subscribe
        </button>

    </form>

</section>

<!-- Footer -->

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

</body>
</html>
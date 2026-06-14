<?php

session_start();
include 'includes/db.php';

$message = "";

if(isset($_POST['register'])){

    $fullname = mysqli_real_escape_string(
        $conn,
        $_POST['fullname']
    );

    $email = mysqli_real_escape_string(
        $conn,
        $_POST['email']
    );

    $password = password_hash(
        $_POST['password'],
        PASSWORD_DEFAULT
    );

    $check =
    mysqli_query(
        $conn,
        "SELECT * FROM users
         WHERE email='$email'"
    );

    if(mysqli_num_rows($check) > 0){

        $message = "Email already exists.";

    }else{

        mysqli_query(
            $conn,
            "INSERT INTO users
            (fullname,email,password)
            VALUES
            (
            '$fullname',
            '$email',
            '$password'
            )"
        );

        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Register</title>

<link rel="stylesheet" href="assets/css/style.css">
<link rel="stylesheet" href="assets/css/style2.css">

    <style>
        

    </style>

</head>

<body>

<!-- Your Header -->

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

<section class="auth-container">

<div class="auth-card">

<h2>Create Account</h2>

<?php if($message){ ?>
<p class="error-msg">
<?php echo $message; ?>
</p>
<?php } ?>

<form method="POST">

<input
type="text"
name="fullname"
placeholder="Full Name"
required>

<input
type="email"
name="email"
placeholder="Email"
required>

<input
type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="register"
class="btn">

Register

</button>

</form>

<p>
Already have an account?

<a href="login.php">
Login
</a>

</p>

</div>

</section>

<!-- Your Footer -->

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
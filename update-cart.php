<?php

    session_start();

    $id = $_POST['id'];
    $quantity = $_POST['quantity'];

    $_SESSION['cart'][$id] = $quantity;

    header("Location: cart.php");
    exit();
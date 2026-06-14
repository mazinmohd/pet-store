<?php

session_start();

include 'includes/db.php';

$name = $_POST['customer_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

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

$user_id = $_SESSION['user_id'];

mysqli_query(
$conn,
"INSERT INTO orders
(
user_id,
customer_name,
email,
phone,
address,
total_amount
)
VALUES
(
'$user_id',
'$name',
'$email',
'$phone',
'$address',
'$total'
)"
);

$order_id = mysqli_insert_id($conn);

foreach($_SESSION['cart'] as $id => $qty){

$product =
mysqli_fetch_assoc(
mysqli_query(
$conn,
"SELECT * FROM products WHERE id=$id"
)
);

$price = $product['price'];

mysqli_query(
$conn,
"INSERT INTO order_items
(
order_id,
product_id,
quantity,
price
)
VALUES
(
'$order_id',
'$id',
'$qty',
'$price'
)"
);

}

unset($_SESSION['cart']);

header("Location: order-success.php");

exit();
<?php

$host = "petverse-db";
$user = "root";
$password = "root";
$database = "pet_store";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if(!$conn){
    die("Connection Failed");
}
?>
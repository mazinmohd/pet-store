<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "pet-store";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database,
    3307
);

if(!$conn){
    die("Connection Failed");
}
?>
<?php

$host = "sql101.infinityfree.com";
$user = "if0_42200143";
$password = "Mazenomer2002";
$database = "if0_42200143_pet_store";

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
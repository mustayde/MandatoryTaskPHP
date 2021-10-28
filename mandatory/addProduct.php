<?php

session_start();
$auth = $_SESSION['prince'];

$con = mysqli_connect('localhost', 'shoppingcart', 'root', 'cars');

mysqli_select_db($con);

$name = $_POST['name'];
$image = $_POST['image'];
$price = $_POST['price'];

$add = "INSERT INTO products(name, image, price) VALUES('$name', '$image', '$price')";
    mysqli_query($con, $add);
    header("location:adminFunction.php");
    echo "Registration Successful";






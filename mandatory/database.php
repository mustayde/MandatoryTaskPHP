<?php
$dbc = mysqli_connect("localhost", "shoppingcart", "root", "cars");

if (!$dbc) {
    echo  "Error: Unable to connect to MySQL" . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}
?>

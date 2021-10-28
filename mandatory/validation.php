<?php



$con = mysqli_connect('localhost', 'shoppingcart', 'root', 'cars');

mysqli_select_db($con);

$name = $_POST['user'];
$pass = $_POST['password'];
$s = " SELECT * FROM carlogin where username = '$name' && password = '$pass'";


$result = mysqli_query($con, $s);



session_start();
$auth = $_SESSION['prince'];

    $row = $result->fetch_array(MYSQLI_NUM);

    if ($row[3] === 'ADMIN') {
        $_SESSION['prince'] = $row[3];
        header('location: loginRegister.php');


    } elseif ($row[3] === 'USER') {
         $_SESSION['prince'] = $row[3];
        header('location: loginRegister.php');

        echo 'right';

    }
else {
    echo 'You have spelt your password or username wrong - go back and try again';
}




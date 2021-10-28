<?php

session_start();
$auth = $_SESSION['prince'];
header('location: loginRegister.php');

$con = mysqli_connect('localhost', 'shoppingcart', 'root', 'cars');

mysqli_select_db($con);

$username = $_POST['user'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];
$user = "USER";

if ($username !== '' && $email !== '' && $phone !== '' && $address !== ''&& $password !== ''){
    if (!preg_match('/^[a-zA-Z ]{6,15}$/i', $username) ){
        unset($_SESSION['user']);
        $_SESSION['user'] = "username must be 6-15 chars & alphabetic only";

     }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        unset($_SESSION['email']);
        $_SESSION['email'] = "email must be a valid email address";
    }
    if (!preg_match('/^\d{8}$/', $phone) ){
        unset($_SESSION['phone']);
        $_SESSION['phone'] = "enter valid phone number of exact 8 digits";
    }
    if (!preg_match('/^[a-zA-Z\d\.\,\- ]{1,60}$/', $address) ){
        unset($_SESSION['address']);
        $_SESSION['address'] = "enter valid address";
    }
    if (!preg_match('/^[\d\w@-]{8,20}$/i', $password) ){
        unset($_SESSION['password']);
        $_SESSION['password'] = "enter valid password";
    }

    else {
        $s = " SELECT * FROM carlogin where name = '$username'";

        $result = mysqli_query($con, $s);

        $num = mysqli_num_rows($result);


        if($num == 1){
            echo "Username already taken";
        } else {
            $reg = "INSERT INTO carlogin(username, email, role, phone, address, password) VALUES('$username', '$email', '$user', '$phone', '$address', '$password')";
            mysqli_query($con, $reg);
            echo "Registration Successful";
        }
    }
}
else{
    $_SESSION['empty'] = "its empy";

}














<?php
session_start();

$auth = $_SESSION['prince'];

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User login and registration</title>
    <link rel="stylesheet" type="text/css" href="design.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstra.4.1/css/bootstrap.min.css">
</head>
<body>

<?php
include ('linker.php');
?>

<?php
if(isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}

?>
    <div class="container">
    <div class="login-box">
    <div class="row">
    <div class="col-md-6 login-left">
        <h2> Login Here</h2>
        <form action="validation.php" method="post">
         <div class="form-group">
            <label>Username</label>
             <input type="text" name="user" class="form-control" required>
         </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary"> Login </button>

        </form>
    </div>

        <div class="col-md-6 login-right">
            <h2> Register Here</h2>
            <form action="registration.php" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="user" class="form-control" required>
                    <?php echo $_SESSION['user'] ?? '' ?>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="emai" name="email" class="form-control" required>
                    <?php echo $_SESSION['email'] ?? '' ?>
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" class="form-control" required>
                    <?php echo $_SESSION['phone'] ?? '' ?>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="address" class="form-control" required>
                    <?php echo $_SESSION['address'] ?? '' ?>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" required>
                    <?php echo $_SESSION['password'] ?? '' ?>
                </div>
                <button type="submit" class="btn btn-primary"> Register </button>

            </form>
        </div>
    </div>
    </div>
    </div>
<?php
unset($_SESSION['user']);
unset($_SESSION['email']);
unset($_SESSION['password']);
unset($_SESSION['phone']);
unset($_SESSION['address']);

?>

</body>
</html>

<?php
session_start();
$auth = $_SESSION['prince'];
$connect = mysqli_connect('localhost', 'shoppingcart', 'root', 'cars');

if (isset($_GET['action'])){
    if ($_GET['action'] == "update"){
        $name = $_POST['name'];
        $image = $_POST['image'];
        $price = $_POST['price'];
        $id = $_GET['id'];

        $updateUser = mysqli_query($connect,"UPDATE `products` SET `name`='$name', `image`='$image' ,`price`='$price'WHERE `id`='$id'");
       header("location:products.php");
    }
    elseif ($_GET['action'] == 'delete'){
        $id = $_GET['id'];
         $deleteUser = mysqli_query($connect,"DELETE FROM `products` WHERE `id`='$id'");
        header("location:products.php");
    }



}


?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="design.css">
    <title>EDIT</title>
</head>
<body>


<div class="col-md-6 login-add">
    <h2> ADD PRODUCTS</h2>
    <form action="addProduct.php" method="post">
        <div class="form-group">
            <label class="add">Name:    </label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="add">Image:   </label>
            <input type="text" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="add">Price:   </label>
            <input type="text" name="price" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary"> Add Product </button>

    </form>
    <h2 class="edit">EDIT PRODUCTS</h2>


    <?php
    $query = "SELECT * FROM products ORDER BY id ASC";
    $result = mysqli_query($connect, $query);
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <div class="col-md-4 form-ud">
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">

                    <form method="post" action="adminFunction.php?action=update&id=<?php echo $row["id"]; ?>">
                        <img src="images/<?php echo $row["image"]; ?>" class="img" /><br />
                        <label for="image">Image</label>
                        <input name="image" class="text-info">
                        <label for="name">Name:  </label>
                        <?php echo $row["name"]; ?>
                        <input name="name" class="text-info">
                        <label for="price">Price: $</label>
                        <?php echo $row["price"]; ?>
                        <input name="price" class="text-danger">
                        <br>
                        <input class="updatebtn" type="submit" value="update" name="update" >
                    </form>

                    <form method="post" action="adminFunction.php?action=delete&id=<?php echo $row["id"]; ?>">
                        <input class="deletebtn" type="submit" value="delete" name="delete" >
                    </form>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
</body>
</html>

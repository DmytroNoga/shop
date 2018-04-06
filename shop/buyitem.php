<table>
<form action="" method="post">
    <tr>
        <!-- type number -->
        <td>Count:</td>
        <td><input type="number" name="count" step="1" min="1" required></td>
    </tr>

    <tr>
        <td colspan="2"><input type="submit" value="Buy!"></td>
    </tr>
</form>
</table>

<?php
include 'dbconnect.php';
include 'session.php'; 


//Если переменная Name передана
if (isset($_GET['id'])) {

// var_dump($_POST["count"]);
// var_dump($_GET['id']);

    if(isset($_SESSION['login_user'])){
        $q = "SELECT `id` FROM `users` WHERE `user_name` = '" . $_SESSION['login_user']. "'";
        $result = mysqli_query($mysql, $q);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    else {

    }

    if(isset($_POST["count"])) {
        $q = "SELECT `count` FROM cart_products WHERE `product_id` LIKE '" .$_GET['id'] . "' AND `user_id` LIKE '" .$row['id']. "'";
        $result = mysqli_query($mysql, $q);
        $row2 = mysqli_fetch_array($result, MYSQLI_ASSOC);
        // зробити каунт, витянути селект, 

        if($row2['count']) {
            $count = ($_POST['count'] + $row2['count']);

            $q = "UPDATE `cart_products` SET `count` = '$count' WHERE `product_id` = '" . $_GET[id] ."' AND `user_id` = '" . $row[id] ."'; ";
            $sql = mysqli_query($mysql, $q);


            if($sql)
                echo $_GET['id'] . " updated in your cart";
        }

        else {
            $q = "INSERT INTO `cart_products` (`product_id`, `user_id`, `count`)";
            $q .= " VALUES ( '" .$_GET['id'] . "', '" .$row['id']. "','" . $_POST['count'] . "')";  
            $sql = mysqli_query($mysql, $q);

            if($sql)
                echo $_GET['id'] . " added to your cart";
        }
    }
    

}
?>

<form action="index.php" method="_GET">
    <input type="submit" value="Home">
</form>
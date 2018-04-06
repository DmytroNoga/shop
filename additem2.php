<table>
<form action="" method="post">
    <tr>
        <td>Name:</td>
        <td><input type="text" name="name"></td>
    </tr>
    <tr>
        <!-- textarea -->
        <td>Description:</td>
        <td><textarea type="text" name="description" ></textarea></td>
    </tr>
    <tr>
        <!-- type number -->
        <td>Price:</td>
        <td><input type="number" name="price" ></td>
    </tr>
        <tr>
        <td>Type:</td>
        <td><input type="text" name="type" ></td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
    </tr>
</form>
</table>

<?php
include 'view_home.php';
include 'dbconnect.php';

//Если переменная Name передана
if (isset($_POST["name"])) {

    $q = "INSERT INTO `products` (`name`, `description`, `price`, `type`) 
        VALUES ('" . $_POST['name'] . "', '" . $_POST['description'] . "', '" . $_POST['price'] . "', '" . $_POST['type'] . "')";
    // $q = "INSERT INTO `products` (`name`, `description`, `price`, `type`) 
        // VALUES ('"$_POST['name']."','".$_POST['description']."','".$_POST['price']."','".$_POST['type'].')');
// var_dump($q);
    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($mysql, $q);

    //Если вставка прошла успешно
    if ($sql) {
        echo "<p>".$_POST['name']." успешно добавлены в таблицу.</p>";
    } else {
        echo "<p>ERROR!!!</p>";
    }
}
?>


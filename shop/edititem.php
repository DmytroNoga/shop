
<table>
<form action="" method="post">
<!--     <tr>
        <td>ID:</td>
        <td><input type="text" name="id"></td>
    </tr> -->
    <tr>
        <td>Description:</td>
        <td><textarea type="text" name="description" ></textarea></td>
    </tr>
    <tr>
        <!-- type number -->
        <td>Price:</td>
        <td><input type="number" name="price" step="0.1" min="0"></td>
    </tr>

    <tr>
        <td colspan="2"><input type="submit" value="OK"></td>
    </tr>
</form>
</table>

<?php
include 'dbconnect.php'; 
// $id = $_GET[id];

//Если переменная Name передана
if (isset($_POST['description'])) {

    $q = "UPDATE `products`
        SET `description` = '" . $_POST['description'] . "', `price` = '" . $_POST['price'] . "'
        WHERE `id` = '" . $_GET[id] . "'";

    //Вставляем данные, подставляя их в запрос
    $sql = mysqli_query($mysql, $q);
    //Если вставка прошла успешно
    if ($sql) {
        echo '<p>id ('. $_GET[id] . ') updated.</p>';
    } else {
        echo "<p>ERROR!!!</p>";
    }
}
?>

<form action="index.php" method="_GET">
    <input type="submit" value="Home">
</form>
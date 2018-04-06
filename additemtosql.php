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
        <td><input type="text" name="Price" ></td>
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
//Если переменная Name передана
if (isset($_POST["Name"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysql_query("INSERT INTO `products` (`name`, `description`) 
                        VALUES ('".$_POST['name']."','".$_POST['description']."')");
    //Если вставка прошла успешно
    if ($sql) {
        echo "<p>Данные успешно добавлены в таблицу.</p>";
    } else {
        echo "<p>ERROR!!!</p>";
    }
}
?>
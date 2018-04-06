<form action="" method="get">
  <input type="text" name="confirm" placeholder="CONFIRM">
  <input type="submit" value="CONFIRM">
</form>

<?php

$host = 'localhost'; 
$database = 'courses'; 
$user = 'root'; 
$password = '1234'; 

$mysql = mysqli_connect($host, $user, $password, $database);

$q1 .= " UPDATE `users` SET `status`='1' WHERE `id`=" . $_GET[id] ."; ";

$sql1 = mysqli_query($mysql, $q1);

if($_GET["confirm"] === 'CONFIRM'){
	header('Location: http://courses.loc/shop/');
}
else
	echo "ERROR!!!";

?>
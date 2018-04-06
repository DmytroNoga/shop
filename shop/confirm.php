<form action="" method="get">
  <input type="text" name="confirm" placeholder="CONFIRM">
  <input type="submit" value="CONFIRM">
</form>

<?php

include 'dbconnect.php';

$q1 .= " UPDATE `users` SET `status`='1' WHERE `id`=" . $_GET[id] ."; ";
$sql1 = mysqli_query($mysql, $q1);
	header('Location: http://courses.loc/shop/');
	
?>
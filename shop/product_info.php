<?php
include 'welcome.php';
include 'dbconnect.php';
$id = $_GET[id];

$q = 'SELECT type FROM `products` WHERE `products`.`id` = \'' . $_GET[id] . '\';';

$result = mysqli_query($mysql, $q);

$type = reset(mysqli_fetch_array($result));

if($type == 'car'){
	$q1 = "SELECT * FROM `products` 
	LEFT JOIN `product_doors` ON `products`.`id` = `product_doors`.`product_id` 
	LEFT JOIN `product_engine` ON `products`.`id` = `product_engine`.`product_id`
	WHERE `products`.`id` = $id";
	$result = mysqli_query($mysql, $q1);
	$row = mysqli_fetch_array($result);
	$text .= '</td><td>'.$row['name'].'</td><td>'.$row['description'].'</td><td>'.$row['price'].'</td><td>'.$row['created'].'</td><td>'.$row['updated'].'</td><td>'.$row['count_doors'].'</td><td>'.$row['engine'].'</td><td>'.$row['engine_type'].'</td><tr>';
	echo "<table><tr><th>Name</th><th>description</th><th>price</th><th>created</th><th>updated</th><th>doors</th><th>Power</th><th>Type</th></tr>";
	    echo $text;
	echo "</table>";
}

elseif($type == 'phone'){
	$q1 = "SELECT * FROM `products` 
	LEFT JOIN `product_camera` ON `products`.`id` = `product_camera`.`product_id` 
	WHERE `products`.`type` = 'phone'
	AND `products`.`id` = $id";
	$result = mysqli_query($mysql, $q1);
		$row = mysqli_fetch_array($result);
	$text .= '</td><td>'.$row['name'].'</td><td>'.$row['description'].'</td><td>'.$row['price'].'</td><td>'.$row['updated'].'</td><td>'.$row['type'].'</td><td>'.$row['quality'].'</td><tr>';
	echo "<table><tr><th>Name</th><th>description</th><th>price</th><th>updated</th><th>type</th><th>quality</th></tr>";
	    echo $text;
	echo "</table>";
}

elseif($type == 'laptop'){
	$q1 = "SELECT * FROM `products`
	LEFT JOIN `products_core` ON `products`.`id` = `products_core`.`product_id` 
	INNER JOIN `cores` ON `cores`.`id` = `products_core`.`core_id` 
	WHERE `products`.`type` = 'laptop'
	AND `products`.`id` = $id";
	$result = mysqli_query($mysql, $q1);
		$row = mysqli_fetch_array($result);
	$text .= '</td><td>'.$row['name'].'</td><td>'.$row['description'].'</td><td>'.$row['price'].'</td><td>'.$row['updated'].'</td><td>'.$row['type'].'</td><td>'.$row['model'].'</td><td>'.$row['cores'].'</td><tr>';
	echo "<table><tr><th>Name</th><th>description</th><th>price</th><th>updated</th><th>type</th><th>model</th><th>cores</th></tr>";
	    echo $text;
	echo "</table>";
}

if($_SESSION['login_user'] != 'Anonim'){
	echo "<a href='buyitem.php?id={$_GET[id]}'>Add to cart</a><br>";
	echo "<a href='edititem.php?id={$_GET[id]}'>Edit item</a>";
}
else{
	echo "<a href='login.php?id={$_GET[id]}'>Add to cart</a><br>";
}
?>
<!-- href="edititem.php?id=".$_GET['id']." -->


<!-- <form action="edititem.php" method="_GET">
	<a href="edititem.php?id=1"></a>
    <input type="submit" value="Edit item">
</form> -->

<form action="index.php" method="_GET">
    <input type="submit" value="Home">
</form>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<form  method="_GET">
<select name="type">

<?php
include 'dbconnect.php';
	$query = "SELECT DISTINCT type FROM products";
	
	$result = mysqli_query($mysql, $query) or die("Error " . mysqli_error($mysql)); 
     while ($row = mysqli_fetch_assoc($result)) {
        echo '<option value="' . $row['type'] . '">' . $row['type'] . '</option>';
    }
?>
</select>
<input type="submit" value="Submit">
</form>

</body>
</html>

<?php
$type = $_GET['type'];
$_POST['type'] = $type;

if(isset($type)){

include 'productClass.php';


include 'phoneClass.php';
include 'laptopClass.php';
include 'carClass.php';

	if($type == 'phone'){
		$phone = new Phone();
		$form = $phone->buildForm();
	}

	elseif($type == 'laptop'){
		$laptop = new Laptop();
		$form = $laptop->buildForm();
	}

	elseif($type == 'car'){
		$car = new Car();
		$form = $car->buildForm();
	}
	else
		echo 'Please choose the type';
	
	// include 'addNewItem.php';
	}
else
	echo 'Please choose the type';
?>
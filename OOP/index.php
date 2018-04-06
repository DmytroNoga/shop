<?php
echo ' index ';
require_once 'dbconnect.php';
include 'Product.php';

include 'Laptop.php';
include 'Car.php';
include 'Phone.php';

$laptop1 = new Laptop('name', 'type');
// $mysqli = new mysqli('localhost', 'courses', 'root', '1234');
// require_once 'Router.php';
// $router = '';

class ProductPhone extends Product {

	// public function getProductAttributes(){
	// 	return[];
	// }

}

?>
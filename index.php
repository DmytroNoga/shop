<?php 
	/*$url = explode("=", $_SERVER['REQUEST_URI']);
	$url = array_filter($url);
	$url = array_values($url);*/

 	/*$year = $_GET['year'];
    echo $year;

function isLeap($year) {
     $i = date("L", mktime(0,0,0, 7,7, $year));
     if ($i == 1)
     return ' -> Високосний';     
}
echo isLeap ($year);*/

$file = file_get_contents('https://lviv.itea.ua/courses-itea/php/php-basic/', true);
echo $file;
?>    
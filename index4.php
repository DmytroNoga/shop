
<form method="POST">

<p><input type= "text" name= "name" placeholder=" Name"></p>
<p><input type= "text" name= "email" placeholder=" Email" value = ""></p>
<input type= "submit" value= "Submit"> 
<?php
if ($name == NULL)
	$name = $_POST['name'];
if ($email == NULL)
	$email = $_POST['email'];
setcookie('my_name', $name, time() + (86400)*5555); // 86400 = 1 день в секундах
//$email = 'adada@i.ua';
//echo $_COOKIE['email'];
?>
</form>

<?php

echo 'Привiт, '. ( $_COOKIE['my_name'] != '' ? $_COOKIE['my_name'] : 'Гiсть') . '!'; // Привет, Миша!
/*if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	if (preg_match("/[^a-zA-Z]/" , $name)!=NULL) 
	        echo "Name ERROR!!!".'<br>';
	
	else
		echo $name.'<br>';

	if (preg_match("|^([a-z0-9_\.\-]{1,20})@([a-z0-9\.\-]{1,20})\.([a-z]{2,4})|is" , $email)==NULL) 
			echo "Email ERROR!!!".'<br>';
	
	else
		echo $email.'<br>';
}*/

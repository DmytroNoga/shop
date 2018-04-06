  <form method="POST" enctype="multipart/form-data">
    <h2>New User</h2>

    <label for="user_name">User Name</label>
    <input type="text" id ="user_name" name="user_name" required><br>

    <label for="email">Email</label>
    <input type="email" id ="email" name="email" required><br>

    <label for="password">Password</label>
    <input type="password" id ="password" name="password" required><br>

    <label for="password_confirm">Confirm Password</label>
    <input type="password" id ="password_confirm" name="password_confirm" required><br>

	<label for="full_name">Full Name</label>
	<input type="text" id ="full_name" name="full_name"><br>

	<input type="submit" value="Log in">  
  
  </form>
<?php

$host = 'localhost'; 
$database = 'courses'; 
$user = 'root'; 
$password = '1234'; 

$mysql = mysqli_connect($host, $user, $password, $database);

if ($_POST["password"] === $_POST["password_confirm"]) {
   // success!

	$q2 = "SELECT `user_name` FROM `users`
		WHERE `user_name` LIKE '" . $_POST['user_name'] . "'";
		$sql2 = mysqli_query($mysql, $q2);
		// var_dump($sql2);
	
	if($sql2 && ($sql2->num_rows == 0)){
		
		$q3 = "SELECT `email` FROM `users`
			WHERE `email` LIKE '" . $_POST['email'] . "'";
			$sql3 = mysqli_query($mysql, $q3);
			// var_dump($sql3);	

		if($sql3 && ($sql3->num_rows == 0)){

			$_POST['password'] = md5($_POST['password']);

				if(isset($_POST['user_name'])) {
				    $q1 .= "INSERT INTO `users` (`user_name`, `email`, `password`";
				   	$q1 .= isset($_POST['full_name']) ? ', `full_name`)' : ')';

				    $q1 .= " VALUES ('" . $_POST['user_name'] . "', '" . $_POST['email'] . "', '" . $_POST['password'] . "'";
				    $q1 .= isset($_POST['full_name']) ? ", '" . $_POST['full_name'] . "')" : ')';

				    $sql1 = mysqli_query($mysql, $q1);
				    // var_dump($sql1);
				    
				    $user_id = $mysql->insert_id;
				// var_dump($user_id);
				}

				if ($sql1){
	    			// echo "<p>Added sql1!!!</p>";
					$url = 'http://courses.loc/11_confirm.php?id='. $user_id . '&hash=' . md5($_POST['user_name']);
					
					$to      = $_POST['email'];
					$subject = 'Registration';
					$message = 'Hello, ' . $_POST['user_name']. "\r\n" .
					' please clik this link '. $url . "\r\n" .
					' for registration' . "\r\n";
					$headers = 'From: webmaster@example.com' . "\r\n" .
    					'Reply-To: webmaster@example.com' . "\r\n" .
    					'X-Mailer: PHP/' . phpversion();

					// mail($to, $subject, $message, $headers);
					if(mail($to, $subject, $message, $headers))
						echo "Please check your email!";
					// var_dump($mail);
	    		}
	    }
	    else 
  			echo ' A email with this name already exists :(';
	}

	else 
  		echo ' A user with this name already exists :(';
}

?>
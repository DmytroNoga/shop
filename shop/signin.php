<html>
   
   <head>
      <title>Signin Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>

	<body bgcolor = "#FFFFFF">

		<div align = "center">
        	<div style = "width:300px; border: solid 1px #333333; " align = "left">
            	<div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Signin</b></div>

				  <div style = "margin:30px">
					  <form method="POST" enctype="multipart/form-data">

					    <label for="user_name">User Name</label><br>
					    <input type="text" id ="user_name" name="user_name" class = "box" required><br><br>

					    <label for="email">Email</label><br>
					    <input type="email" id ="email" name="email" class = "box" required><br><br>

					    <label for="password">Password</label><br>
					    <input type="password" id ="password" name="password" class = "box" required><br><br>

					    <label for="password_confirm">Confirm Password</label><br>
					    <input type="password" id ="password_confirm" name="password_confirm" class = "box" required><br><br>

						<label for="full_name">Full Name</label><br>
						<input type="text" id ="full_name" name="full_name" class = "box"><br><br>

						<input type="submit" value="Submit">  
						
						<form action="login.php" method="_GET">
    						<input type="submit" value="Log In">
						</form>

					  </form>
					</div>
			</div>
		</div>

	</body>

</html>

    
<?php

include 'dbconnect.php';

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
				}

				if ($sql1){
	    			// echo "<p>Added sql1!!!</p>";
					$url = 'http://courses.loc/shop/confirm.php?id='. $user_id . '&hash=' . md5($_POST['user_name']);
					$url2 = 'http://127.0.0.1:1080';
					
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
						echo "Please check your email! ". $url2;
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
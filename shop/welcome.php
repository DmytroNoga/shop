<?php
   include('session.php');
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
    
    <h3 align="right" style="color:Gray">Welcome 
    	<?php 
    	echo $_SESSION['login_user'];
    	if($_SESSION['login_user'] == 'Anonim'){
    		echo ' '.'<a href = "login.php">Log In</a></h3>';
    	}
    	else{
    		echo ' '.'<a href = "logout.php">Log Out</a></h3>';
    	}

    	?>
      
	
   </body>
   
</html>
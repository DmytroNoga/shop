<?php
   include 'dbconnect.php';
   session_start();


   // $user_check = $_SESSION['login_user'];
   // $ses_sql = mysqli_query($mysql,"select user_name from users where user_name = '$user_check' ");  
   // $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   // $login_session = $row['user_name'];

      // var_dump($_SESSION);

   if(!isset($_SESSION['login_user'])){
      $_SESSION['login_user'] = 'Anonim';
      // header("location:login.php");
   }

 //   $value = 'User1';
	
	// setcookie("user_name", $value, time()+3600);

// var_dump($_COOKIE);
// var_dump(htmlspecialchars($_COOKIE["user_name"]));
?>
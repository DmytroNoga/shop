<?php

include 'dbconnect.php';
   session_start();
   // var_dump(session_start());
   // var_dump($_SESSION);
     
  if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
    $myusername = mysqli_real_escape_string($mysql, $_POST['username']);
    $mypassword = mysqli_real_escape_string($mysql, md5($_POST['password'])); 
        

    $sql = "SELECT id FROM users WHERE user_name = '$myusername'";
    $result = mysqli_query($mysql, $sql);
    $count = mysqli_num_rows($result);

    if($count == 0)
      header('Location: http://courses.loc/shop/signin.php');
    else {
          
      $sql = "SELECT status FROM users WHERE user_name = '$myusername'";
      $result = mysqli_query($mysql, $sql);
      // $count = mysqli_num_rows($result);
        
        if (mysqli_affected_rows($mysql) > 0) {
          $row = mysqli_fetch_assoc($result);
        }

        if($row['status'] == 0)
          $error = "Please confirm your registration!"; 
        else {

          $sql = "SELECT id FROM users WHERE user_name = '$myusername' and password = '$mypassword'";
          $result = mysqli_query($mysql, $sql);

          $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
          $active = $row['active'];
              
          $count = mysqli_num_rows($result);

              // If result matched $myusername and $mypassword, table row must be 1 row
            
          if($count != 0) {      
                 // var_dump(session_register("myusername"));
                 
            $_SESSION['login_user'] = $myusername;
                 // header("location: welcome.php");
            
            if(isset($_GET['id'])){
              header("location: buyitem.php?id={$_GET[id]}");
            }
            else
              header("location: index.php");
          } 
          else 
            $error = "Your Login Name or Password is invalid";        
        }
    }
  }
   
?>
<html>
   
   <head>
      <title>Login Page</title>
      
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
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
        
            <div style = "margin:30px">
               
               <form method = "post" enctype="multipart/form-data">
                  
                  <label for="user_name">User Name</label><br>
                  <input type = "text" name = "username" class = "box" required/><br /><br />
                 
                  <label for="password">Password</label><br>
                  <input type = "password" name = "password" class = "box" /><br/><br />
                 
                  <input type = "submit" value = " Submit "/><br />

               </form>

              <form action="signin.php" method="_GET">
                <input type="submit" value="Sign in">
              </form>

               <!-- <?php include 'view_home.php'; ?> -->
               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
          
            </div>
        
         </div>
      
      </div>

   </body>
</html>
<?php
session_start();

echo "Welcome".$_SESSION['uname']. "Your Password: ". $_SESSION['pass'] ;
 ?>

 if(isset($_REQUEST['logout'])){
 session_unset();
 session_destory();
 echo "<script>location.href='login.php'</script>";
}



<!DOCTYPE html>
<html>
    <head>
        
        <title>Profile</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <?php include 'header1.php' ?>
<fieldset>
    <legend align="center" style="font-size: 2.0em">Welcome Sir</legend>
    <br><br>
    <form action="" method="POST">
    <input type="submit" value="Logout" name="logout">
       </form>
      

              <?php include 'sidebar.php' ?>


    
   </body>
   <?php include 'footer.php' ?>
          
</html>

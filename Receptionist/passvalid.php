<?php

if(isset($_POST['submit'])){

  $name=$_POST['name'];
  $pass=$_POST['pass'];
  $confpass=$_POST['confpass'];
  $email =$_POST['email'];

  $dateofbirth =$_POST['dateofbirth'];
  
  if(empty($name)){
  $error_msg['name'] = "Name is required";
}

else if(!preg_match("/^[a-zA-Z-]*$/", $name)){
  $error_msg['name'] = "Only letters allowed";
}

  if(empty($pass)){
  $error_msg['pass'] = "Password is required";
}
 if(empty($confpass)){
  $error_msg['confpass'] = " Confirm Password is required";
}
  else if($pass != $confpass){
  $error_msg['pass3'] = "Password don't match";
}

else if(!preg_match('/^(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pass)){
  $error_msg['pass3'] = "Password don't meet requirments!";
}

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
  $error_msg['email'] = "Invalid email address";
}

if(empty($_POST['gender'])){
  $error_msg['gender'] = "Gender is required";
}

if(empty($dateofbirth)){
  $error_msg['dateofbirth'] = "Date of Birth is required";
}

}


?>



<!DOCTYPE html>
<html>
    <head>
        
        <title>Registration</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <style>
.error {color: #FF0000;}
</style>
    </head>
    <body>

        
          <?php include 'header.php' ?>

             <fieldset>
    <legend align="center" style="font-size: 2.0em">Registration</legend>
             <form action="#" method="post" align="center">

               

   <table cellpadding="2" width="50%" bgcolor="E0E0E0" align="center"cellspacing="2">

  Customer Name: <input type="text" name="name" >
   <?php
     if(isset($error_msg['name'])){
     echo"<div class='error'>" .$error_msg['name']. "</div>";
   }
 ?>
<br><br>

  E-mail: <input type="text" name="email" placeholder="abdullahalhussain@gmail.com">
   <?php
     if(isset($error_msg['email'])){
     echo"<div class='error'>" .$error_msg['email']. "</div>";
   }
 ?>

  <br><br>
        

  PASSWORD: <input type="text" name="pass" >

  <?php
     if(isset($error_msg['pass'])){
     echo"<div class='error'>" .$error_msg['pass']. "</div>";
   }

   if(isset($error_msg['pass3'])){
     echo"<div class='error'>" .$error_msg['pass3']. "</div>";
   }

  ?>
  
  <br><br>
  CONFIRM PASSWORD: <input type="text" name="confpass">
  <?php
     if(isset($error_msg['confpass'])){
     echo"<div class='error'>" .$error_msg['confpass']."</div>"; 
      }

  ?>
<br><br>
GENDER:
  <input type="radio" name="gender" value="female" <?php if(isset($gender) && $gender ='Female') echo 'checked="checked"'; ?>/> Female
  <input type="radio" name="gender" value="male" <?php if(isset($gender) && $gender ='male') echo 'checked="checked"'; ?>/>Male
  <input type="radio" name="gender" value="other"
  <?php if(isset($gender) && $gender ='other') echo 'checked="checked"'; ?>/>Other

  <?php
     if(isset($error_msg['gender'])){
     echo"<div class='error'>" .$error_msg['gender']. "</div>";
   }
     ?>
  <br><br>
  
  DATE OF BIRTH: <input type="Date" name="dateofbirth" min="1953-01-01" max="1998-01-01">
  <?php
     if(isset($error_msg['dateofbirth'])){
     echo"<div class='error'>" .$error_msg['dateofbirth']. "</div>";
   }
     ?>
  <br><br>
<br><br>

  <input type="submit" name="submit" value="Submit">  
  
</form>


  
  



       
  </table>
  </fieldset>
   

     <?php include 'footer.php' ?>
</html>
